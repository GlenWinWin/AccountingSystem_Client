<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log-in</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/login.css">



    </head>

    <body>


                            {!! Form::open(array('route' => 'user.store'))!!}
                            <!-- Top content -->
                            <div class="top-content">

                                <div class="inner-bg">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2 text">
                                                <h1 style="text-shadow: 2px 2px black;"><strong>Login Form</strong></h1>
                                                <div class="description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3 form-box">
                                              <div class="form-top">
                                                <div class="form-top-left">
                                                  <h3>Login to our site</h3>
                                                    <p>Enter your username and password to log on:</p>
                                                </div>
                                                <div class="form-top-right">
                                                  <i class="fa fa-lock" style="color:black;"></i>
                                                </div>
                                                </div>
                                                <div class="form-bottom">
                                              <form role="form" action="" method="post" class="login-form">
                                                <div class="form-group">
                                                  <label class="sr-only" for="form-username">Username</label>
                                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="sr-only" for="form-password">Password</label>
                                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                                  </div>
                                                  <center><button type="submit" class="btn">Log-in</button></center>
                                              </form>
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                                {!! Form::close()!!}



        <!-- Javascript -->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
          <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>



    </body>

</html>
