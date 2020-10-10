<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Todos</title>

</head>

<body>
    <!-- .container -->
    <div class="container">

        <h1 class="text-center my-5">Todos Page</h1> <!-- my-5 means margin y of 5 -->
        
        <div class="row-justify-content-center">
            <!-- .row-justify-content-center -->

            <div class="col-md-8 offset-md-2">

                <div class="card card-default">
                    <!-- .card.card-default -->
                    <div class="card-header">
                        <!-- .card-header -->
                        Todos
                    </div>

                    <div class="card-body">
                        <!-- .card-body -->
                        <ul class="list-group">
                            @foreach($todos as $todo)
                            <li class="list-group-item">
                                {{ $todo->name }}

                                <button class="btn btn-primary btn-sm float-right">View</button>
                                 <!-- button.btn.btn-primary -->
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>