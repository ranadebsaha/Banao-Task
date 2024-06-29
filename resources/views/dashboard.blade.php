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
                <form method="post" action="{{url('/api/todo/add')}}">
                    <input name="user_id" type="hidden" value="{{Session::get('user_id')}}">
                    <div class="mb-3">
                        <label for="" class="form-label">Enter Task</label>
                        <input type="text" class="form-control" name="task" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary" name="submit" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>

                </form>

                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Task</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($task as $t)
                                <tr class="">
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$t->task}}</td>
                                    <td>{{$t->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <p class="text-center"><a href="{{url('/logout')}}">Log Out</a></p>

        </div>
    </div>
</div>
</div>
</body>

</html>