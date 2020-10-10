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
}
