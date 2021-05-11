<?php
 // Start the session
 session_start();

 // Database information
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "test";

 try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
}
 catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}



 // Check input
 function checker_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

 // Login Checker

 // define variables and set to empty values
 $usernameErr = $passwordErr = "";
 $username = $password = "";



 if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
 {
// let the user access the main page
header("Location: don_de_song.php");
 }


 else(!empty($_POST['username']) && !empty($_POST['password']))
 {


// let the user login

if (empty($_POST["username"])) {
$usernameErr = "Username is required";
   } else {
$username = test_input($_POST["username"]);
   }

     if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = md5 checker_input($_POST["password"]);
   }


$stmt = $conn->prepare("SELECT * FROM users WHERE user_name:username AND password:password");
$stmt->execute();
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowCount() == 1)
{
    $email = $userRow['email'];

    $_SESSION['user_name'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['LoggedIn'] = 1;

    echo "<h1>Success</h1>";

    }
else
{
    echo "<h1>Error</h1>";
    echo "<p>Sorry, your account could not be found.</p>";
}


 }
 ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Username:</label><input type="text" name="username"/><?php echo $usernameErr;?><br/>
    <label>Password:</label><input type="password" name="password"/><?php echo $passwordErr;?><br/>
    <input type="submit" name="login" id="login" value="Login" />
    </form>
