<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $email = $phone =$comment= "";
$name_err = $email_err = $phone_err =$comment_err= "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_m FROM message WHERE name = :name";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);

            // Set parameters
            $param_name = trim($_POST["name"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $name_err = "This name is already taken.";
                } else{
                    $name = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
   // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a valid email.";
    } 
	
    // Validate name
    
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter an name.";
		}
		
    //$name=$_POST["name"];
    
	$name= $_POST["name"];
	
	$email= $_POST["email"];
	$phone= $_POST["phone"];
	$comment= $_POST["comment"];

	if (isset($_POST['Submit'])) {
			header("location: don_de_song.php");
			}
			
    // Check input errors before inserting in database
    if(  empty($lieu_err) &&  empty($name_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO message (name, email, phone, comment) VALUES (:name, :email, :phone, :comment) ";
       if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
			$stmt->bindParam(":comment", $param_comment, PDO::PARAM_STR);


            // Set parameters
            $param_name= $name;
            $param_email=$email;
            $param_phone=$phone;
			$param_comment=$comment;
			
			//execute statement
           $stmt->execute();

           

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
      .wrapper{ width: 600px; padding: 20px; }
	  .box {
        width: 2002px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }

    </style>
	<?php include "menu.php"; ?>
</head>
<body>
  
    <div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
	<img src="image/dam11.jpg" width="800px"   style="float: right" />
    <div class="wrapper">
	
		</br>
        <h2>write your message here :</h2>
        </br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			
			
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
			 <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
			 <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label >phone</label>
                <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($comment_err)) ? 'has-error' : ''; ?>">
                <label >comment</label>
				<textarea name="comment" class="form-control" rows="3" cols="28" rows="5" placeholder="Comments"></textarea>
                
                <span class="help-block"><?php echo $comment_err; ?></span>
            </div>
            <div class="form-grousp">
				
                <input type="submit" class="btn btn-primary" value="envoyer">
                
            </div>
			</br></br></br>
           
        </form>
	</div>
	
	
	
        
</body>


</html>
