<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    public function index(){

        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId){
        $todo = Todo::find($todoId);
        return view('todos.show')->with('todo', $todo);
        
    }

    public function create(){
   
        return view('todos.create');
        
    }


    public function store(Request $request){

        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required'
        ]);
        $data = request()->all();
   
        $currTodo = new Todo();
        $currTodo->name = $data['name'];
        $currTodo->description= $data['description'];
        $currTodo->completed= false;
        $currTodo->save();

        session()->flash('success','Todo created successfully');

        return redirect('/todos');
        
    }
  
    public function edit($todoId){

        $todo = Todo::find($todoId);
   
        return view('todos.edit')->with('todo', $todo );
    }

    public function update(){

        
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();
        $dataId = $data['todo_Id'];

        $currTodo = Todo::find($dataId );
   
        $currTodo->name = $data['name'];
        $currTodo->description= $data['description'];
        $currTodo->completed= false;
        $currTodo->save();

        session()->flash('success','Todo updated successfully');

        return redirect('/todos');

    }

    public function delete($todoId){



        $currTodo = Todo::find($todoId );

        $currTodo->delete();

        session()->flash('success','Todo deleted successfully');

        return redirect('/todos');

    }

    public function complete(Todo $todo){

        $todo->completed = true;
        $todo ->save();

        session()->flash('success','Todo Completed successfully');

        return redirect('/todos');

    }


}
