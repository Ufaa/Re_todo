<style>
  body {
    background-color: navy;
    position: relative;
  }

  .content-area {
    background-color: white;
    width: 50%;
    border-radius: 10px;
    padding: 20px 50px 30px 50px;
    position: absolute;
    top: 50%;
    /*親要素を起点に上から50%*/
    left: 50%;
    /*親要素を起点に左から50%*/
    transform: translateY(-50%) translateX(-50%);
    /*要素の大きさの半分ずつを戻す*/
    -webkit-transform: translateY(-50%) translateX(-50%);
  }

  .add-list {
    display: flex;
    justify-content: space-between;
  }

  .add-content-area {
    width: 80%;
  }

  .add-todo-content {
    width: 100%;
  }

  table {
    margin: auto;
    text-align: center;
    width: 100%;
    border-spacing: 0 20px;
  }

  .todo_content {
    width: 100%;
  }

  input {
    border-radius: 5px;
    border: gray solid thin;
    height: 30px;
  }

  .btn-add {
    color: pink;
    background-color: white;
    border: pink solid 2px;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 15px;
  }

  .btn-update {
    color: orange;
    background-color: white;
    border: orange solid 2px;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 15px;
  }

  .btn-delete {
    color: blue;
    background-color: white;
    border: blue solid 2px;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 15px;
  }
</style>

<head>

</head>

@section('content')

<body>

  <div class="content-area">
    <h1>Todo List</h1>

    <form action="/create" method="post">
      @csrf
      <div class="add-list">
        <div class="add-content-area">
          <input type="text" class="add-todo-content" name="content" value="" placeholder="Todoを入力してください">
        </div>
        <div class="add-button-area">
          <button type="submit" class="btn-add">
            追加
          </button>
        </div>
      </div>
    </form>

    <div class="show-list">
      <div>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($todos as $todo)
          <tr>
            <td>{{$todo -> created_at}}</td>
            <form action="{{route('todos.update',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <td><input type="text" class="todo_content" name="content" value="{{$todo->content}}" placeholder=""></td>
              <td><button type="submit" class="btn-update">更新</button></td>
            </form>
            <form action="{{route('todos.destroy',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <td><button type="submit" class="btn-delete">削除</button></td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>

</body>