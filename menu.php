
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color:#bb0a1e;
}



.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: green;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #bb0a1e;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.ac
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #4CAF50;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
 <a class="active"  href="don_de_song.php">Home</a>
  <a href="whygiveblood.php"> WHY GIVE BLOOD ?</a>
  <a href="thedonatingpro.php"> DONATING PROCESS !</a>
  <a href="whocangiveblood.php"> WHO CAN GIVE BLOOD ?</a>
  <a href="contact1.php"> CONTACT US </a>
  
  <div class="dropdown">
    <button class="dropbtn">Administration 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Adminlogin.php">Manage events </a>
      <a href="Adminlogin.php">Manage donors</a>
      <a href="Adminlogin.php">Organizors</a>
	  <a href="admin_singup.php">ad_singup</a>
	  <a href="Adminlogin.php">ad_login</a>
    </div>
  </div> 
  <!--<a href="login1.php" > Login </a>-->
  <a href="singup.php" class="log"> Sing up </a>
</div>


</body>
</html>

