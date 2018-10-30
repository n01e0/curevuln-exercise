### 脆弱性の悪用

CSSや各種データの格納ディレクトリなどに情報が残されている可能性があります。
例えば
```HTML
<img src="./data/administrator.png" alt="管理者" width="200" height="200">
```
タグ内のsrc要素にdataというディレクトリ構造があるので試しにdataディレクトリのパスをURLに打ち込んでみましょう。

するとディレクトリ内部のデータが全て見えます。