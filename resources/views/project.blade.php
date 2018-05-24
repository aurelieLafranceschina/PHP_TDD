<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <h1>Liste de projets</h1>
        </div>
        <div class="projectList">
            @foreach ($projects as $project)
                <li class="list-group-item list">{{$project->project_name}}
                    <button><a href="/projectDetails/{{$project->id}}">Détail du projet</a></button>
                </li>

            @endforeach
        </div>

        <div class="form50">
            @if(Auth::check())
            <h2> Créer un nouveau projet </h2>

            <form action="/project" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="newProject"><h2>Nom du projet</h2></label>
                    <input type="text" class="form-control" name="newProject">
                </div>
                <div class="form-group">
                    <label for="newDescription"><h2>Description du projet</h2></label>
                    <input type="text"  title="description" class="form-control" name="newDescription">
                </div>
                <div class="form-group">
                    <label for="newAuthorName"><h2>Auteur du projet</h2></label>
                    <input type="text"  class="form-control" name="newAuthorName">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
                @endif
        </div>

        <div class="links">
            <a href="{{ url('/') }}">Accueil</a>
        </div>
    </div>
</div>
</body>
</html>
