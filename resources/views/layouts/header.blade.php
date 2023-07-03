<!DOCTYPE html>
<html lang="en">
<head>
    @stack('title')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand text-light" href="{{url('/')}}">
                    @if(session()->has('user_name'))
                        {{session()->get('user_name')}}
                    @else
                        GUEST
                    @endif
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('/customer')}}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('/customer/view')}}">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{url('/customer/trash')}}">Trash</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>