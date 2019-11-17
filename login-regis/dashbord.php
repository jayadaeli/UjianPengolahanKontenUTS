<?php session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else{ ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Export File</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--Script CSS-->
    <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
    
  </head>
  <body>
    <br /><br />
    <div class="container">
     <nav class="navbar navbar-inverse">
      <div class="container-fluid">
       <div class="navbar-header">
        <a class="navbar-brand" href="logout.php">Logout</a>
      </div>
    </div>
  </nav>
  <br />
  <!--h2 align="center">EXPORT FILE</h2-->
  <br />
  <form method="post">
    <p> Welcome !!</p>
    <div class="form-group">
    </form>
  </div>

  <!--Script Javascript-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>

</body>
</html>
<?php } ?>