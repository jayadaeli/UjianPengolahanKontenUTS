<?php
include('config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $iduser=$_POST['iduser'];
  $status=1;
  $query=mysqli_query($con,"insert into users(fullName,userEmail,password,idUser,status) values('$fullname','$email','$password','$iduser','$status')");
  $msg="Registration successfull. Now You can login !";
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
  <link rel="stylesheet" type="text/css" href="login/css/mainregister.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration</title>
  
  <script>
    function iduserAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availabilytyiduser.php",
        data: 'iduser=' + $("#iduser").val(),
        type: "POST",
        success: function(data) {
          $("#iduser-availability-status1").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover">
      <div id="particles-js"></div>
    </div>
  </section>
  <section class="login-content">
    <div class="login-box">
     <p style="padding-left:20%; color:green">
      <?php if($msg){ echo htmlentities($msg); }?>
      <form class="login-form" method="post">
       <a class="brand" href="index.php">
        <div class="thumbnail"><center><img src="images/profile.gif" height="100"/></center></div></a><p/>
        <div class="form-group">
          <input class="form-control" name="fullname" type="text" placeholder="Full Name" autofocus required="required">
        </div>
        <div class="form-group">
          <input class="form-control" type="email" placeholder="Email" name="email" placeholder="Email" autofocus required="required">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" maxlength="10" name="iduser" id="iduser" onBlur="iduserAvailability()" placeholder="Identity Number" required="required">
          <span id="iduser-availability-status1" style="font-size:12px;"></span>
        </div>
        
        <div class="form-group">
          <input class="form-control" type="password" required="required" name="password" placeholder="Password">
        </div>
        <div class="form-group btn-container">
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
        </div><p/>
        <div class="form-group mt-2">
          <p class="semibold-text mb-0">Account Already?<a href="index.php"> Sign in</a></p>
        </div>
      </form>
    </div>
  </section>

  </body>
  </html>