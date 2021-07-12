<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoList</title>
<style>
html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

/* change colours to suit your needs */
ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

/* change colours to suit your needs */
mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

/* change border colour to suit your needs */
hr {
    display:block;
    height:1px;
    border:0;  
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}
/* card */
.card{
  background-color:green;
  height:100vh;
  width:100vw;
  position:relative;
}
.todolist{
  background-color:white;
  position:absolute;
  top:50%;
  left:50%;
  width:50vw;
  transform:translate(-50%,-50%);
  border-radius:5px;
  padding:25px;
}
.ttl{
  font-weight:bold;
  font-size:25px;
  padding-bottom:20px
}
.form-create{
  margin-bottom:30px;
}
.content-create{
  border:1px solid grey;
  padding:15px 10px;
  border-radius:5px;
  width:80%;
}
.content-control{
  border:1px solid grey;
  padding:10px 10px;
  border-radius:5px;
  width:80%;
}
table tbody tr th{
  padding-bottom:20px;
}
table tbody tr td{
  padding-bottom:20px
}
.button-create{
  border:2px solid fuchsia;
  padding:10px 15px;
  color:fuchsia;
  font-weight:bold;
  border-radius:5px;
  background-color:white;
  cursor: pointer;
}
.button-update{
  border:2px solid orange;
  padding:10px 15px;
  color:orange;
  font-weight:bold;
  border-radius:5px;
  background-color:white;
  cursor: pointer;
}
.button-delete{
  border:2px solid navy;
  padding:10px 15px;
  color:navy;
  font-weight:bold;
  border-radius:5px;
  background-color:white;
  cursor: pointer;
}
table{
  text-align:center;
  width:100%;
}
</style>
</head>
<body>
  <div class="card">
    <div class="todolist">
      <p class="ttl">Todo List</p>
      @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
      @endif
      <form action="/todo/create" method="post" class="form-create">
      @csrf
        <input type="text" name="content" class="content-create" >
        <input type="submit" value="追加" class="button-create">
      </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach($contents as $content)
            <tr>
              <td>
              {{$content->created_at}}
              </td>
              <form action="{{route('todo.update',$content->id)}}" method="post" >
              @csrf
              {{method_field('post')}}
              <td>
                <input type="hidden" name="id" value="{$content->id}">
                <input type="text" name="content" class="content-control" value="{{$content->content}}">
              </td>
              <td>
                <input type="submit" value="更新"class="button-update">
              </td>
              </form>
              <td>
                <form action="{{url('/todo/delete',$content->id)}}" method="post">
                @csrf
                {{method_field('post')}}
                <input type="submit" value="削除" class="button-delete">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</body>
</html>