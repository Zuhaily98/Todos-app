@extends('layouts.app')

@section('content')

<h1 class="text-center" my-5>Create Todos</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card card-header">Create new todo</div>
            <div class="card card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/store-todos" method="POST">
                    <!-- action is the url to handle POST request. can name the url anything. then go to route file -->
                    <!-- .frm    to create form -->
                    @csrf
                    <!-- to make sure token is secret, and for laravel to make sure the input is from the website itself -->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        <!-- using the name="name", is the only way for this data to go to the server  -->
                        <!-- input.form-control   for text form -->
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Create Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection