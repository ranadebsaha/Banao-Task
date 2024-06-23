<!doctype html>
<html lang="en">

<head>
    <title>Task-1</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <h1 class="text-center">DashBoard</h1>
                    <br>
                    <br>
                    @if(Session::has('name'))
                <h3 class="text-center"> Hello, 
                    {{Session::get('name')}}
                </h3>
                    @endif
                    <br>
                    <p class="text-center"><a href="{{url('/logout')}}">Log Out</a></p>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>