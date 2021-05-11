<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>admin</title>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
   .sidebar a {float: right;}
  div.content {margin-right: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
 {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #FFFFFF;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>


<div class="sidebar">
  <a class="active"   href="don_de_song.php">Admin</a>
  <a href="managedonor.php">Gestion des donneurs </a>
  <a href="managevent.php">gestion des événements </a>
  <a href="manageorg.php"> gestion des organisateurs </a>
  <a href="logout.php"> Logout </a>
</div>

<div class="slideshow-container">

			<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="image/ad1.jpg" style="width:100%">

</div>

						<div class="mySlides fade">
  								<div class="numbertext">2 / 5</div>
  											<img src="image/ad2.jpg" style="width:100%">

									</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="image/dam3.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="image/dam6.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="image/dam7.jpg" style="width:100%">

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
	<span class="dot"></span>
	<span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
<br>
<div class="main">
  <div class="content">
<h3>Blood</h3>
   <p><h4>Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.
Donate Blood
Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.

We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.</h4></p>
<h3>Blood bank: </h3>
      <p><h4>We welcome you to in our WebSite. If you are a donor , We appreciate you signing up online as a Donor. If you need blood we are happy to serve you. While the Organisers have taken all steps to obtain accurate and up-to-date information of potential blood donors,
the Organisers  do not guarantee accuracy of the information contained herein or the suitability of the persons listed as any liability for direct or consequential damage to any person using this blood donor list including
loss of life or damage due to infection of any nature arising out of blood transfusion from persons whose names have been listed in this website.
We request donors to update contact details regularly.</h4></p>
	<a href="logout.php"><strong> logout  here</strong> </a>
</div>
</div>



      

</body>
</html>
