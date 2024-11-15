<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('frontend/style.css')}}">
    <title>Task-1</title>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container" id="loginForm">
                    <h2 class="text-center">Login</h2>
                    <form method="post" action="{{url('/')}}/login">
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
                            <label for="email">Email</label>
                            <input type="text" value="{{old('email')}}" name="email" class="form-control" id="email" placeholder="Enter Email id">
                        @error('email')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" name="password"  id="loginPassword" placeholder="Password">
                            @error('password')
                            <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <p class="toggle-form">Go to Register Page <a href="{{url('/')}}">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>