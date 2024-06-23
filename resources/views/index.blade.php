<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task-1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
    <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container" id="loginForm">
        <h2 class="text-center">Registration Form</h2>
        <form method="post" action="{{url('/')}}/">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif

            @csrf
            <div class="form-group">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputEmail4" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">
                        *{{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="inputEmail4" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">
                        *{{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
                @error('password')
                    <span class="text-danger">
                        *{{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary m-2">Submit</button>
                <p class="toggle-form">Go to Login Page <a href="{{url('/login')}}">Login</a></p>
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>