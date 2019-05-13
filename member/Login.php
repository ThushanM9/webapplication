<?php include('server.php');
include('../slideshow/slidehshow.php');
        
        //include('addminLogin.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
        <link rel="stylesheet" type="text/css" href="style.css" href="slideshow.css">
</head>
<style>
    .my-form-container { 
            display: block;
            position: absolute;
            top: 15%;
            left: 31%;
            width: 516px;
            height: 350px;
           
            padding: 20px;
            border: 1px solid #B0C4DE;
            
            border-radius: 0px 0px 10px 10px; 
    }
    
    .my-form { 
        
    }
</style>
<body>
    <div>
        <div class="slideshow-container">
                <div class="mySlides fade">
                  <div class="numbertext">1 / 4</div>
                  <img src="../pic/un1.jpg" style="width:100%">
                  <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">2 / 4</div>
                  <img src="../pic/un2.png" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">3 / 4</div>
                  <img src="../pic/un3.jpg" style="width:100%">
                  <div class="text">Caption Three</div>
                </div>
             <div class="mySlides fade">
                  <div class="numbertext">4 / 4</div>
                  <img src="../pic/un4.jpg" style="width:100%">
                  <div class="text">Caption Three</div>
                </div>

           

            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
             </div>
    
    <div class="my-form-container">
        <form class="my-form" method="post" action="Login.php">
                <h1 >Member Login</h1>

                    <?php include('../errors.php');?>

                    <div class="input-group">
                            <label>Student NO:</label>
                            <input type="text" name="studentno" >
                    </div>
                    <div class="input-group">
                            <label>Password:</label>
                            <input type="password" name="password">
                    </div>
                    <div class="input-group">
                            <button type="submit" class="btn" name="login_user">Login</button>

                    <p>
                            Not yet a member? <a href="register.php">Sign up</a>
                            admin login? <a href="../admin/addminLogin.php">Sign in</a>
                    </p>
                </div>
            </form>
            </div>
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
  setTimeout(showSlides, 3500); // Change image every 2 seconds
}
</script>
    
</body>
</html>