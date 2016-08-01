<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Here</title>
  </head>
  <body>
    <center>
    {!! Form::open(array('route' => 'user.store'))!!}
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" name="username" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <button class="btn btn-default submit">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
    {!! Form::close()!!}
  </center>
  </body>
</html>
