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
                <div class="alert-success"></div>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TaskModal">
                    Add
                </button>
                <br>
                <br>
                <div class="modal fade" id="TaskModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Enter your Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" id="addtask">

                                <div class="modal-body">
                                    <p>
                                    <div class="mb-3">
                                        <input name="user_id" type="hidden" value="{{Session::get('user_id')}}">
                                        <input type="text" class="form-control" name="task" id="task"
                                            aria-describedby="helpId" placeholder="Enter Task" />
                                    </div>
                                    </p>
                                    <div class="alert-danger"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Task</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div id="tasks">
                            @php
                                $i = 1;
                            @endphp
                            @foreach($task as $t)
                                <tr class="">
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$t->task}}</td>
                                    <td>{{$t->status}}</td>
                                    
                                    <td>
                                            <button type="button" data-task-id="{{$t->id}}" data-task="{{$t->task}}" data-bs-toggle="modal" data-bs-target="#statusModal"
                                                class="btn btn-primary change-status-btn" id="">
                                                Change Status
                                            </button>
                                    </td>

                                </tr>
                                <div class="modal fade" id="statusModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Change Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" id="addstatus">
                                                <div class="modal-body">
                                                    <p>
                                                        <input type="hidden" name="task_id" id="taskid">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="task" id="task-name" aria-describedby="helpId" disabled/>
                                                    </div>
                                                    </p>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select form-select-lg" name="status" id="">
                                                        <option selected value="pending">Pending</option>
                                                        <option value="done">Done</option>
                                                    </select>
                                                </div>
                                                <div class="alert-danger"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-center"><a href="{{url('/logout')}}">Log Out</a></p>
    </div>
</div>
</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#addtask').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/api/todo/add',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    $('#TaskModal').modal('hide');
                    alert(response.message);
                    location.reload();
                },
                error: function (xhr, status, error) {
                    $('.modal-body .alert-danger').html(xhr.responseJSON.message).addClass('alert').show();

                }
            });
        });
        $('.change-status-btn').click(function(){
            var taskid=$(this).data('task-id');
            var task=$(this).data('task');
            document.getElementById('taskid').value=taskid;
            document.getElementById('task-name').value=task;
        });
        $('#addstatus').submit(function (event) {
            event.preventDefault();
            var taskid = $(this).data('task-id');
            var status = $(this).data('status');
            $.ajax({
                type: 'POST',
                url: '/api/todo/status',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    $('#statusModal').modal('hide');
                    alert(response.message);
                    location.reload();

                },
                error: function (xhr, status, error) {
                    $('.modal-body .alert-danger').html(xhr.responseJSON.message).addClass('alert').show();

                }
            });
        });
    });
</script>

</html>