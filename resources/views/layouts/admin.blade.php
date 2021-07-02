<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Egzaminas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('./assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('./assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('./assets/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('./assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('../resources/sass/custom.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('./assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('./assets/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{route('task.index')}}"><span>Egzamin</span>Task</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">11</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <em class="fa fa-twitter-square">&nbsp;</em>
                                </a>
                                <div class="message-body"><small class="pull-right">8 mins ago</small>
                                    <a href="#"><strong>Office Larry</strong> commented on <strong>your photo: "Best task manager ever!"</strong>.</a>
                                    <br /><small class="text-muted">16:20 pm - 14/06/2021</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <em class="fa fa-twitter-square">&nbsp;</em>
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>HR Stacy</strong>.</a>
                                    <br /><small class="text-muted">15:05 pm - 14/06/2021</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img style="width: 50px;" src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-female-icon.png" class="img-responsive" alt="Profile pic">
        </div>
        <div class="profile-usertitle">
            @if(Auth::user())
                <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
            @endif
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu" style="flex-direction: column">
        <li class="active"><a href="{{route('admin.index')}}"><em class="fa fa-home">&nbsp;</em> Home</a></li>

        <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-star-o">&nbsp;</em> Statuses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="{{route('status.index')}}">
                        <span class="fa fa-star">&nbsp;</span> Status list
                    </a></li>
                <li><a class="" href="{{route('status.create')}}">
                        <span class="fa fa-star-half-empty">&nbsp;</span> Add new status
                    </a></li>
            </ul>
        </li>
        <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-check-square-o">&nbsp;</em> Tasks <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="{{route('task.index')}}">
                        <span class="fa fa-check-circle">&nbsp;</span> Task list
                    </a></li>
                <li><a class="" href="{{route('task.create')}}">
                        <span class="fa fa-check-circle-o">&nbsp;</span> Add new task
                    </a></li>
            </ul>
        </li>
        <li><a href="#"><em class="fa fa-id-card">&nbsp;</em> About</a></li>
        <li><a href="#"><em class="fa fa-user-circle">&nbsp;</em> Profile</a></li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <em class="fa fa-power-off">&nbsp;</em>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div><!--/.sidebar-->


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="container mt-3 text-center">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-3 text-center">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if(session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success_message')}}
                    </div>
                @endif

                @if(session()->has('info_message'))
                    <div class="alert alert-info" role="alert">
                        {{session()->get('info_message')}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @yield('content')

</div>


<script src="{{asset('./assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('./assets/js/chart.min.js')}}"></script>
<script src="{{asset('./assets/js/chart-data.js')}}"></script>
<script src="{{asset('./assets/js/easypiechart.js')}}"></script>
<script src="{{asset('./assets/js/easypiechart-data.js')}}"></script>
<script src="{{asset('./assets/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('./assets/js/custom.js')}}"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>
