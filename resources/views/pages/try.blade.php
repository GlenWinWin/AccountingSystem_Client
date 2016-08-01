<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    @yield('css')
    <title></title>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  	<div class="container">
  		<div class="navbar-header">
  			<a id="menu-toggle" href="#" class="navbar-toggle">
  					<span class="sr-only">Toggle navigation</span>
  			        <span class="icon-bar"></span>
  			        <span class="icon-bar"></span>
  			        <span class="icon-bar"></span>
  			</a>
    			<a class="navbar-brand" href="#">
    				logo
    			</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse ">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Log Out</a></li>
                          </ul>
                        </li>

          </ul>
        </div>
  		</div>
    </nav>
      <div class=" col-lg-3">

  		<div id="sidebar-wrapper" class="sidebar-toggle">
          <div class="profile-userpic">
            <img src="assets/images/joyth.jpg" class="img-responsive" alt="">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">
              Joyce Ann Potestades
            </div>
            <div class="profile-usertitle-job">
              Channel Builder
            </div>
          </div>
        <ul class="nav">
          <li class="active">
            <a href="#">
            <i class="glyphicon glyphicon-home"></i>
            Genealogy </a>
          </li>
          <li>
            <a href="#">
            <i class="glyphicon glyphicon-user"></i>
          Transaction</a>
          </li>
          <li>
            <a href="#" target="_blank">
            <i class="glyphicon glyphicon-ok"></i>
            Privileges Bonus </a>
          </li>
          <li>
            <a href="#">
            <i class="glyphicon glyphicon-flag"></i>
            Chart </a>
          </li>

    	</div>
</div>
<div class="col-lg-9">
  <table class="table table-design">
    <thead class="thead">
      <tr>
        <th>Code</th>
        <th>Description</th>
        <th>User ID</th>
        <th>Date and Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">joyth</th>
        <td>joyth</td>
        <td>joyth</td>
        <td>joyth</td>
      </tr>
      <tr>
        <th scope="row">joyth</th>
        <td>joyth</td>
        <td>joyth</td>
        <td>joyth</td>
      </tr>
      <tr>
        <th scope="row">joyth</th>
        <td>joyth</td>
        <td>joyth</td>
        <td>joyth</td>
      </tr>
      <tr>
        <th scope="row">joyth</th>
        <td>joyth</td>
        <td>joyth</td>
        <td>joyth</td>
      </tr>
      <tr>
        <th scope="row">joyth</th>
        <td>joyth</td>
        <td>joyth</td>
        <td>joyth</td>
      </tr>
    </tbody>
  </table>
  <center>
    <ul class="pagination pagination-color">
      <li><a href="#"><<</a></li>
      <li><a href="#">1</a></li>
      <li class="active"><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">>></a></li>
    </ul>
  </center>
</div>
  </body>
</html>
@yield('javascript')
