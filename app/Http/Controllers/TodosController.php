<?php

namespace App\Http\Controllers;

use App\Models\Todo;   //call Todo model to communicate with db
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        // fetch all todos table in db and display in index.blade.php
        //with('todos', Todo::all()), using keyword 'todos' here because the route is set to todos also. Route::get('todos', 'TodosController@index');
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show($todoid) //todoid is the dynamic part of url. ex: todos/11, 11 is the dynamic url 
    {
        return view('todos.show')->with('todo', Todo::find($todoid));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        // to make sure user must fill in the form before submitting
        // by using "|", more validation rules can be added
        $this->validate(request(), [
            'name' => 'required|min:4|max:15',
            'description' => 'required'
        ]);

        // dd(request()->all());    to check data
        
        $data = request()->all(); 

        $todo = new Todo(); //create a new instance of the model

        $todo->name = $data['name']; //assign value from form to db
        $todo->description = $data['description'];
        $todo->completed = false; //completed is assigned as false by default

        $todo->save();  //db query to save the $todo into db

        session()->flash('success','Todo created successfully!');

        return redirect('/todos'); //after saving a new todo, user will redirect to the todos page

    }

    //route model binding
    //1:make sure all the dynamic url are the same
    //2:change $todoid into Todo $todo
    //laravel will automatically search for the spesific todo in the db 
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo); //find($todoid) is used to find the specific id
    }

    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:15',
            'description' => 'required'
        ]);
        
        $data = request()->all();  //get the data

        $todo->name = $data['name']; 
        $todo->description = $data['description'];

        $todo->save();
        
        session()->flash('success','Todo updated successfully!');

        return redirect('/todos'); 

    }

    public function destroy(Todo $todo) //since there is dynamic url in the route, must include it as a parameter for this function
    {
        $todo->delete(); //delete() is a laravel function that will run the query to delete the selected record from database

        session()->flash('success','Todo deleted successfully!');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = True;
        $todo->save();

        session()->flash('success','Todo completed successfully');

        return redirect('/todos');
    }
}
