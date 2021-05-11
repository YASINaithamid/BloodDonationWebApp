<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password =$email= "";
$username_err = $password_err = $confirm_password_err = $email_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM donneurs WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    // Validate email
    $email=$_POST["email"];
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";}
    /*else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email";
    }*/
    $tel=$_POST["tel"];
    $groupage=$_POST["groupage"];
    $rhesus=$_POST["rhesus"];
    $kell=$_POST["kell"];
    $phynotypage=$_POST["phynotypage"];
    $type_donneur=$_POST["type_donneur"];


    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO donneurs (username, password, email,tel,groupage,rhesus,kell,phynotypage,type_donneur) VALUES (:username, :password, :email, :tel, :groupage, :rhesus, :kell, :phynotypage, :type_donneur)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":tel", $param_tel, PDO::PARAM_STR);
            $stmt->bindParam(":groupage", $param_groupage, PDO::PARAM_STR);
            $stmt->bindParam(":rhesus", $param_rhesus, PDO::PARAM_STR);
            $stmt->bindParam("kell", $param_kell, PDO::PARAM_STR);
            $stmt->bindParam(":phynotypage", $param_phynotypage, PDO::PARAM_STR);
            $stmt->bindParam(":type_donneur", $param_type_donneur, PDO::PARAM_STR);


            // Set parameters
            $param_username= $username;
            $param_email=$email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_tel=$tel;
            $param_groupage= $groupage;
            $param_rhesus= $rhesus;
            $param_kell= $kell;
            $param_phynotypage= $phynotypage;
            $param_type_donneur= $type_donneur;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: welcome2.php");
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
		
		/*// send an email to the admin
		if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$tel=$_POST['tel'];
		

		$to='yassinaithamid@gmail.com'; 
		$subject=' New blood donnor has been submited';
		$message="Name :".$username."\n"."tel :".$tel."\n"."was submited :"."\n\n";
		$headers="From: ".$email ;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you ! you are a life saver "." ".$username.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}
	// send an email to the donnor
		if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$ademail='yassinaithamid@gmail.com';
		$headers="From: ".$ademail ;
		

		$to=$email ;
		$subject=' New blood donnor has been submited';
		$message="Hi".$username."\n". "Sent Successfully! Thank you ! you are a life saver We will contact you shortly!" ."\n". "<h1>your username is :".$username."\n"."  password :".$password."\n </h1>";

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you ! you are a life saver "." ".$username.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}*/
	
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
	  .box {
        width: 120px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }

    </style>
</head>
<body>
  <?php  include "menu.php"; ?>
    <div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
  <img src="image/dam5.jpg" style="float: right" />
    <div class="wrapper" >
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>

           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php /*echo (!empty($email_err)) ? 'has-error' : ''; */?>">
                <label>phone number</label>
                <input type="tel" name="tel" class="form-control" >
                <span class="help-block"></span>
            </div>
			<div class="form-group">
                <label>sexe    :</label></br>
                <select class="box" name="sexe">
                    <option> Select </option>
                    <option> Homme </option>
                    <option> Femme </option>
                  </select>
            </div>
            <div class="form-group ">
                <label>groupage ABO : </label></br>
                  <select class="box" name="groupage">
                    <option> Select </option>
                    <option> A-positive </option>
                    <option> A-negative </option>
                    <option> B-positive </option>
                    <option> B-negative </option>
                    <option> AB-positive </option>
                    <option> AB-negative </option>
                    <option> O-positive </option>
                    <option> O-negative </option>
                  </select>
            </div></br>
            <div class="form-group ">
                <label>RHESUS    :</label></br>
                <select class="box" name="rhesus">
                    <option> Select </option>
                    <option> RH+ </option>
                    <option> RH- </option>
                  </select>
            </div></br>
            <div class="form-group " >
                <label>phenotypage :</label></br>
                <select class="box" name="phynotypage">
                    <option> Select </option>
                  
									<option>CCEe	</option>
									<option>CCee	</option>
									<option>CcEE	</option>
									<option>CcEe	</option>
									<option>Ccee	</option>
									<option>ccEE	</option>
									<option>ccEe	</option>
									<option>ccee	</option>
									<option>CC--	</option>
									<option>Cc--	</option>
									<option>cc--	</option>
									<option>--EE	</option>
									<option>--Ee	</option>
									<option>--ee	</option>
                  </select>
            </div></br>
            <div class="form-group ">
                <label> KELL       :</label></br>
                <select class="box" name="kell">
                    <option> Select </option>
                    <option> K+ </option>
                    <option> F- </option>
                  </select>
            </div></br>

            <div  class="form-group ">
                <label>Type de don :</label></br>
                <select class="box" name="type_donneur">
                    <option> Select </option>
                    <option> Don par aphérèse </option>
                    <option> Don de plasma. </option>
                    <option> Don de plaquettes </option>
                  </select>
            </div></br>
			
            <div class="form-group">
				
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
              <p>    </br></p>
        </form>
        

</body>


</html>
