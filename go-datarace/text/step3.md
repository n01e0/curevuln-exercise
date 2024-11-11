## 防御策

Mutexを使用し、値の更新が発生するような作業を行う関数ではロックを取るようにしましょう。

```diff
--- a/go-datarace/main.go
+++ b/go-datarace/main.go
@@ -4,6 +4,7 @@ import (
        "encoding/json"
        "fmt"
        "net/http"
+       "sync"
 )

 type Task struct {
@@ -14,17 +15,19 @@ type Task struct {
 var (
        tasks  = []Task{}
        nextID = 1
+       mu     sync.Mutex
 )

 func addTaskHandler(w http.ResponseWriter, r *http.Request) {
        if r.Method == http.MethodPost {
+               mu.Lock()
+               defer mu.Unlock()
                var task Task
                if err := json.NewDecoder(r.Body).Decode(&task); err != nil {
                        http.Error(w, "Bad request", http.StatusBadRequest)
                        return
                }

-               // Intentionally allow race condition for demonstration
                task.ID = nextID
                nextID++
                tasks = append(tasks, task)
```

ここで気をつけないといけないのが、「対象となる変数を更新するタイミングだけロックを取れば良いという訳ではない」ということです。

試しに以下のような変更をしてみましょう

```diff
diff --git a/go-datarace/main.go b/go-datarace/main.go
index 57a5742..48a04f4 100644
--- a/go-datarace/main.go
+++ b/go-datarace/main.go
@@ -4,6 +4,7 @@ import (
 	"encoding/json"
 	"fmt"
 	"net/http"
+	"sync"
 )
 
 type Task struct {
@@ -14,6 +15,7 @@ type Task struct {
 var (
 	tasks  = []Task{}
 	nextID = 1
+	mu     sync.Mutex
 )
 
 func addTaskHandler(w http.ResponseWriter, r *http.Request) {
@@ -24,8 +26,9 @@ func addTaskHandler(w http.ResponseWriter, r *http.Request) {
 			return
 		}
 
-		// Intentionally allow race condition for demonstration
 		task.ID = nextID
+        mu.Lock()
+        defer mu.Unlock()
 		nextID++
 		tasks = append(tasks, task)
 
```

また、goroutineの中でデータをやりとりする場合にはchannelを使うとData Raceを防ぐことができます。

Go言語では`go func`などを用いて簡単に並行処理を行うことができますが、くれぐれもRaceには気をつけましょう。
特に、`interface`が存在するときは、最悪の場合任意コード実行にも繋がります。
