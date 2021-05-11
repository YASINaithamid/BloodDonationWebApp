<?php include "menu.php"; ?>

<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$adminname = $adminpass =$adminemail= "";
$adminname_err = $adminpass_err = $adminemail_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate adminname
    if(empty(trim($_POST["adminname"]))){
        $adminname_err = "Please enter a uadminname.";
    } else{
        $adminname=$_POST["adminname"];
        
    }

    // Validate adminpass
    if(empty(trim($_POST["adminpass"]))){
        $adminpass_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["adminpass"])) < 6){
        $adminpass_err = "Password must have atleast 6 characters.";
    } else{
        $adminpass = trim($_POST["adminpass"]);
    }

    
    // Validate adminemail
    $adminemail=$_POST["adminemail"];
    if(empty(trim($_POST["adminemail"]))){
        $adminemail_err = "Please enter a email.";}
    /*else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email";
    }*/
    


     // Check input errors before inserting in database
    if(empty($adminname_err) && empty($adminpass_err) && empty($adminemail_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO admin (adminname, adminpass, adminemail) VALUES (:adminname, :adminpass, :adminemail)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":adminname", $param_adminname, PDO::PARAM_STR);
            $stmt->bindParam(":adminpass", $param_adminpass, PDO::PARAM_STR);
            $stmt->bindParam(":adminemail", $param_adminemail, PDO::PARAM_STR);
        

            // Set parameters
            $param_adminname= $adminname;
            $param_adminemail=$adminemail;
            $param_adminpass = password_hash($adminpass, PASSWORD_DEFAULT); // Creates a adminpass hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">

       body{ font: 20px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
 
    <div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
  <img src="image/dam8.jpg" style="float: right" />
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an admin account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($adminname_err)) ? 'has-error' : ''; ?>">
                <label>AdminName</label>
                <input type="text" name="adminname" class="form-control" value="<?php echo $adminname; ?>">
                <span class="help-block"><?php echo $adminname_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($adminemail_err)) ? 'has-error' : ''; ?>">
                <label>AdminEmail:</label>
                <input type="email" name="adminemail" class="form-control" value="<?php echo $adminemail; ?>">
                <span class="help-block"><?php echo $adminemail_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($adminpass_err)) ? 'has-error' : ''; ?>">
                <label>AdminPass:</label>
                <input type="password" name="adminpass" class="form-control" value="<?php echo $adminpass; ?>">
                <span class="help-block"><?php echo $adminpass_err; ?></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="adminlogin.php">Login here</a>.</p>
              <p>  </br> </br> </br>  </br></p>
        </form>
        <?php
        include "footer.php";
        ?>

</body>


</html>
