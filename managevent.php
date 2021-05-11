<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$lieu = $organisateur = $date = "";
$lieu_err = $organisateur_err =$date_err= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate organisateur
    if(empty(trim($_POST["organisateur"]))){
        $organisateur_err = "Please enter a organisateur.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_ev FROM evenement WHERE organisateur = :organisateur";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":organisateur", $param_organisateur, PDO::PARAM_STR);

            // Set parameters
            $param_organisateur = trim($_POST["organisateur"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $organisateur_err = "This organisateur is already taken.";
                } else{
                    $organisateur = trim($_POST["organisateur"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    // Validate lieu 
    if(empty(trim($_POST["lieu"]))){
        $lieu_err = "Please enter a place.";
    } 
	
    // Validate organisateur
    
    if(empty(trim($_POST["organisateur"]))){
        $organisateur_err = "Please enter an organisateur.";
		}
		
    //$organisateur=$_POST["organisateur"];
    $lieu=$_POST["lieu"];
    $date=$_POST["date"];

	if (isset($_POST['Submit'])) {
			header("location: welcome1.php");
			}
			
    // Check input errors before inserting in database
    if(  empty($lieu_err) &&  empty($organisateur_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO evenement (lieu, date, organisateur) VALUES (:lieu, :date, :organisateur) ";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":lieu", $param_lieu, PDO::PARAM_STR);
            $stmt->bindParam(":date", $param_date, PDO::PARAM_STR);
            $stmt->bindParam(":organisateur", $param_organisateur, PDO::PARAM_STR);
			


            // Set parameters
            $param_lieu= $lieu;
            $param_date=$date;
            $param_organisateur=$organisateur;
			
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
  
    <<div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
  <img src="image/dam5.jpg"  style="float: right" />
    <div class="wrapper">
		</br>
        <h2>Ajouter  un evenement :</h2>
        </br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($lieu_err)) ? 'has-error' : ''; ?>">
                <label>Lieu :</label>
                <input type="text" name="lieu" class="form-control" value="<?php echo $lieu; ?>">
                <span class="help-block"><?php echo $lieu_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($Organisateur_err)) ? 'has-error' : ''; ?>">
                <label>Organisateur :</label>
                <input type="text" name="organisateur" class="form-control" value="<?php echo $organisateur; ?>">
                <span class="help-block"><?php echo $organisateur_err; ?></span>
            </div>
			
			<div class="form-group">
				<label>date de l'evenement :</label>
                <input type="date" class="form-control" name="date" value="<?php echo $date ;?>"
							min="2020-05-25T00:00" max="2021-05-14T00:00">
            </div>
            <div class="form-grousp">
				
                <input type="submit" class="btn btn-primary" value="ajouter">
                
            </div>
			</br></br></br>
            <div class="form-group">
			<label> <h2>Supprimer un evenement :</h2></label></br>
				<a href="delete.php">Si vous voullez supprimer un evenement cliquer ici . </a>
            </div>
        </form>
	</div>
	
	
	
        
</body>


</html>
