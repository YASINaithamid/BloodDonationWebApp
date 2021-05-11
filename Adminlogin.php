
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: adminmenu.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$adminname = $adminpass =$adminemail= "";
$adminname_err = $adminpass_err = $adminemail_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["adminname"]))){
        $adminname_err = "Please enter adminname.";
    } else{
        $adminname = trim($_POST["adminname"]);
    }

    // Check if adminpass is empty
    if(empty(trim($_POST["adminpass"]))){
        $adminpass_err = "Please enter your adminpass.";
    } else{
        $adminpass = trim($_POST["adminpass"]);
    }

    // Validate credentials
    if(empty($adminname_err) && empty($adminpass_err)){
        // Prepare a select statement
        $sql = "SELECT id_ad, adminname, adminpass FROM admin WHERE adminname = :adminname ";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":adminname", $param_adminname, PDO::PARAM_STR);

            // Set parameters
            $param_adminname = trim($_POST["adminname"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if adminname exists, if yes then verify adminpass
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_ad"];
                        $adminname = $row["adminname"];
                        $hashed_adminpass = $row["adminpass"];
                        if(password_verify($adminpass, $hashed_adminpass)){
                            // adminpass is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_ad"] = $id;
                            $_SESSION["adminname"] = $adminname;

                            // Redirect user to welcome page
							header("location: Adminlogin.php");

                        } else{
                            // Display an error message if adminpass is not valid
                            $adminpass_err = "The adminpass you entered was not valid.";
                        }
					}
                } else{
                    // Display an error message if adminname doesn't exist
                    $adminname_err = "No account found with that adminname.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
	<?php include "menu.php"; ?>
</head>
<body>
	<div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
  <img src="image/dam5.jpg" style="float: right" />
    </br></br></br></br></br>
    <div class="wrapper">
        <h2> Admin Login</h2>
        <p>Please fill in your credentials to login as administrator.</p>
        <form action="Adminlogin.php" method="post">
            <div class="form-group <?php echo (!empty($adminname_err)) ? 'has-error' : ''; ?>">
                <label>AdminName</label>
                <input type="text" name="adminname" class="form-control" value="<?php echo $adminname; ?>">
                <span class="help-block"><?php echo $adminname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($adminpass_err)) ? 'has-error' : ''; ?>">
                <label>AdminPass</label>
                <input type="password" name="adminpass" class="form-control">
                <span class="help-block"><?php echo $adminpass_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="admin_singup.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>