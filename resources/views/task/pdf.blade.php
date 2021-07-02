<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$task->name}}</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url({{ asset('Roboto-Regular.ttf') }});
        }
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: bold;
            src: url({{ asset('Roboto-Bold.ttf') }});
        }
        body {
            font-family: 'Roboto';
        }
    </style>
</head>
<body>

<h1>Task: {{$task->name}}</h1>

<div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">Task description: <b>{!!$task->task_description!!}</b></li>
        <li class="list-group-item">Status: <b>{!!$task->tasksStatus->name!!}</b></li>
        <li class="list-group-item">Added on: <b>{!!$task->add_date!!}</b></li>
        <li class="list-group-item">Updated on: <b>{!!$task->completed_date!!}</b></li>
    </ul>
</div>

</body>
</html>




