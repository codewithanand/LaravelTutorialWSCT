<!doctype html>
<html lang="en">

<head>
    <title>Form Validation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registration</h1>
        <form action="{{url("/")}}/register" method="post">
            @csrf
            <x-input type="text" name="username" label="Full Name" />
            <x-input type="text" name="email" label="Email Address" />
            <x-input type="password" name="password" label="Password" />
            <x-input type="password" name="cpassword" label="Confirm Password" />
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>