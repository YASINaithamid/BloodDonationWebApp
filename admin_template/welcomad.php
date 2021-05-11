<?php
include "menu.php";
?>

<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ 
		font: 14px sans-serif; 
		text-align: center; 
		}
    </style>
</head>
<body>
	<div class="col-md-7">
          <img src="image/dam3.jpg" width="200px">
      </div>

    <div class="page-header">
      
        <h1></br></br></br></br></br>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Thank you. 
		Based on the answers you provided, we advise 
		that you do not register to be a blood donor.

If you would like more information, please call us on 0300 123 23 23.

You can still help us to save lives. Please consider joining the.</h1>
    </div>

    <p>
        <a href="singup.php" class="btn btn-warning">Mannage your activities</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <?php
    include "footer.php";
    ?>

</body>
</html>
