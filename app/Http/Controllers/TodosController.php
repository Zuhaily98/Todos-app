<?php

namespace App\Http\Controllers;

use App\Models\Todo;   //call Todo model to communicate with db
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        // fetch all todos table in db and display in index.blade.php
        return view('todos.index')->with('todos', Todo::all());
    }
}
