<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        // dd($todos);
        return view('/todo', ['todos' => $todos]);
    }

    public function create(Request $request)
    {
        //Modelで$fillableの指定を忘れずに！
        Todo::create([
            'content' => $request->content,
        ]);
        return redirect('/');
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Todo $todo)
    {
        Todo::where('id', $todo->id)
            ->update([
                'content' => $request->content,
            ]);
        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo = Todo::where('id', $todo->id)->first();
        $todo->delete();
        return redirect('/');
    }
}