<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Email</title>
  </head>
  <style media="screen">
  body{
    padding: 0;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
    margin: 0;
  }
  .h4, h4 {
    font-size: 18px;
}
.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 10px;
    margin-bottom: 10px;
}
  a:active, a:hover {
    outline: 0;
}
a{
  text-decoration: none;
}
  p{
        margin: 0 0 10px;
        box-sizing: border-box;
  }
  .btn-group-lg>.btn, .btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
  .h1, h1 {
    font-size: 36px;
}
.h1, .h2, .h3, h1, h2, h3 {
    margin-top: 20px;
    margin-bottom: 10px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
h1 {
    margin: .67em 0;
}
  .row{
    margin-right: -15px;
margin-left: -15px;
  }
  .container{
    padding-right: 15px;
padding-left: 15px;
margin-right: auto;
margin-left: auto;
    width: 1060px;
  }
  .site-wrapper {
display: table;
width: 100%;
height: 100%; /* For at least Firefox */
min-height: 100%;

}
.site-wrapper-inner {
display: table-cell;
vertical-align: top;
}
.site-wrapper-inner {
vertical-align: middle;
}
.inner {
padding: 30px;
text-align: center;
}
.cover-container {
margin-right: auto;
margin-left: auto;

}
.btn-primary{
  color: #fff;
background-color: #204d74;
border-color: #204d74;
}
.btn-primary:hover{
  color: #fff;
    background-color: #286090;
    border-color: #204d74;
}
.col-lg-3{
  width:33.33%;
  float:left;
}
.col-lg-6{
  width: 50%;
  float:left;

}
  </style>
  <body style="padding:0;">
    <center><h3><b><?php echo date('F j,Y')?></b></h3></center>

<div class="row">
    <div class="col-lg-12">
      <center>
          <h3>Good day {{$name}}!</h3>
          <h4>Your New Temporary Password: {{$password}} </h4>
      <a href="http://fist.mywebtrafficsource.com/login" class="btn btn-primary btn-lg">Log In</a><center>
    </div>
</div>
  </body>
</html>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
