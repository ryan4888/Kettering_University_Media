<!DOCTYPE html>
<html>

    <head>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home :: Kettering Media</title>

        <script>
            function verifyEmail()
            {
                var emailField = $("#textEmailAddress").val();

                //will validate student email addresses
                //var email = new RegExp(/^\w{4}\d{4}\@kettering.edu$/);

                //will validate all email addresses ending in @kettering.edu
                var email = new RegExp(/@kettering.edu$/);

                if (emailField == "") {

                    alert("Please enter an email address");

                }
                else {

                    if (email.test(emailField)) {

                        //valid email address
                        alert("This is a valid KU email address");

                    }
                    else {

                        //invalid email address
                        alert("Please enter a valid KU email address");

                    }

                }
            }
        </script>

    </head>

    <body>
        <div class="text-center container">

            <img class="img-responsive" src="http://i.imgur.com/LWkM7tM.png" alt="Responsive image">


            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">Images</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="submit_demo.html">Submit</a></li>
                            @if(Auth::guest())
                                <li><a href="{{ url('/auth/login') }}" >Login</a></li>
                                <li><a href="{{ url('/auth/register') }}" >Sign Up</a></li>
                            @else
                                <li><a href="#" >{{ Auth::user()->name }}</a></li>
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Register</div>
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="email" id="textEmailAddress" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" onClick = "verifyEmail()">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>
