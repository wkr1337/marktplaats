<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<div class="topnav" id="myTopnav">
  <a href="index" class="active">index</a>
  <a href="login">Login</a>
  <a href="register">Register</a>
  <form action="./index" method="post">
    <input id="logout-button" type="submit" name="logoutButton" value="Logout" />
</form>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>