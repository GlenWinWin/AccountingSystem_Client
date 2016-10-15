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
      @if(Session::get('flash_message') == 'invalid')
      <input type="hidden" value="{{Session::get('flash_message')}}" id="errorLogin">
      <input type="hidden" value="lala" id="forgotPass">
      <input type="hidden" value="lala" id="errorPass">
      @elseif(Session::get('flash_message') == 'forgot')
      <input type="hidden" value="lala" id="errorLogin">
      <input type="hidden" value="lala" id="errorPass">
      <input type="hidden" value="{{Session::get('flash_message')}}" id="forgotPass">
      @elseif(Session::get('flash_message') == 'email')
      <input type="hidden" value="lala" id="errorLogin">
      <input type="hidden" value="lala" id="forgotPass">
      <input type="hidden" value="{{Session::get('flash_message')}}" id="errorPass">
      @endif
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
                                                  <center><a href="" data-toggle="modal" data-target="#myModalForgot">Forgot Password?</a></center>
                                              </form>
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                                {!! Form::close()!!}

                                <!-- Modal for Invalid Password-->
                                <div class="modal fade alert-modal" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog alert-modal-dialog">
                                    <div class="modal-content" style="padding:50px;">
                                        <center>
                                          <img alt="" style="height:150px;padding-bottom:20px;" id="status"/>
                                          <h4 class="modal-title" id="myLabel"></h4></center>
                                        <center>  <p style="font-size:18px" id="myModalMessage"></p></center>
                                          <center><button type="button" class="btn btn-primary btn-md edit-btn" data-dismiss="modal" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.Modal for Forgot Password -->
                                <div class="modal fade alert-modal" id="myModalForgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-sm" >
                                    <div class="modal-content" style="padding:20px;">
                                          <h4 class="modal-title" style="padding:0px 30px;"><b>Forgot Password</b></h4> <br>
                                            {!! Form::open(array('action' => 'UserController@forgotPassword' , 'method' => 'post' , 'id' => 'formAddItemtoSales'))!!}
                                            <input type="email" required="" placeholder="Enter email" class="form-control" name="emailForgot" style="margin-bottom:15px;padding:20px;"/>
                                            <button type="submit" class="btn btn-primary btn-sm" style="width:60%">Submit</button>
                                            {!! Form::close() !!}
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.Modal for Forgot Password -->

        <!-- Javascript -->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
          <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>



    </body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		var errorLogin = document.getElementById("errorLogin").value;
    if(errorLogin != 'lala' || document.getElementById("forgotPass").value == 'lala' && document.getElementById("errorPass") == 'lala'){
      document.getElementById("status").src = 'assets/images/x.png';
      document.getElementById("myLabel").innerHTML = 'Invalid Username/Password';
      document.getElementById("myModalMessage").innerHTML = "The username or password that you've entered doesn't match any account!";
      $("#showModal").modal();
    }
	});
</script>
<script type="text/javascript">
  	$(document).ready(function(){
      var forgotPassword = document.getElementById("forgotPass").value;
      if(forgotPassword != 'lala' || document.getElementById("errorLogin").value == 'lala' && document.getElementById("errorPass") == 'lala'){
              document.getElementById("status").src = 'assets/images/check.png';
        document.getElementById("myLabel").innerHTML = 'Successful!';
        document.getElementById("myModalMessage").innerHTML = "Check your email for your new temporary password!";
        $("#showModal").modal();
      }
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var errorPass = document.getElementById("errorPass").value;
    if(errorPass != 'lala' || document.getElementById("forgotPass").value == 'lala' && document.getElementById("errorLogin") == 'lala'){
      document.getElementById("status").src = 'assets/images/x.png';
      document.getElementById("myLabel").innerHTML = 'Invalid Email';
      document.getElementById("myModalMessage").innerHTML = "Your email is not on the list!";
      $("#showModal").modal();
    }
	});
</script>
