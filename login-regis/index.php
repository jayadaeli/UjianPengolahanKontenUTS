<?php session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit'])) {
  $_SESSION['submit']='';
}
if(isset($_POST['submit']))
{

  $ret=mysqli_query($con,"SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {
$extra="dashbord.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
  $_SESSION['login']=$_POST['username'];  
  $uip=$_SERVER['REMOTE_ADDR'];
  $status=0;
  $errormsg="Invalid username or password";
  $extra="login.php";
}
}
if(isset($_POST['change']))
{
 $email=$_POST['email'];
 $id=$_POST['iduser'];
 $password=md5($_POST['password']);
 $query=mysqli_query($con,"SELECT * FROM users WHERE userEmail='$email' and idUser='$id'");
 $num=mysqli_fetch_array($query);
 if($num>0)
 {
  mysqli_query($con,"update users set password='$password' WHERE userEmail='$email' and idUser='$id' ");
  $msg="Password Changed Successfully";
}
else
{
  $errormsg="Invalid email id or idUser no";
}
}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/profile.gif">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="login/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Example</title>
  <script type="text/javascript">
    function valid()
    {
      if(document.forgot.password.value!= document.forgot.confirmpassword.value)
      {
        alert("Password and Confirm Password Field do not match  !!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover">
    </div>
    
  </section>
  <section class="login-content">
    <div class="login-box">
     <p style="padding-left:20%; color:red">
      <?php if($errormsg){
        echo htmlentities($errormsg);
      }?>
    </p>
    <p style="padding-left:20%;  color:green">
      <?php if($msg){
        echo htmlentities($msg);
      }?></p>
      
      <form class="login-form" method="post">
        <a class="brand" href="../index.html">
          <div class="thumbnail"><center><img src="images/profile.gif" height="100"/></center></div></a><p/>
          <div class="form-group">
            <input class="form-control" name="username" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <p class="semibold-text mb-2"><a href="registration.php">Create an Account</a></p>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" name="forgot" method="post">
          <a class="brand" href="index.php">
            <div class="thumbnail"><center><img src="images/profile.gif" height="100"/></center></div></a><p/>
            <div class="form-group">
              <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="iduser" placeholder="Identity Number">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" id="password" name="password" placeholder="New Password">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
            </div>
            <div class="form-group btn-container">
              <button type="submit" name="change" onclick="return valid();" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET PASSWORD</button>
            </div>
            <div class="form-group mt-2">
              <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
          </form>
        </div>
      </section>
      <!-- Essential javascripts for application to work-->
      <script src="login/js/jquery-3.2.1.min.js"></script>
      <script src="login/js/popper.min.js"></script>
      <script src="login/js/bootstrap.min.js"></script>
      <script src="login/js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="login/js/plugins/pace.min.js"></script>
      

      <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
  </html>