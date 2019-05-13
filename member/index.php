<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.success {
	color: red; 
	margin-bottom: 15px;
        margin-right: 200px;
        font-size: 20px;
        text-align:center; 
}
</style>

</head>
<body>

<div class="topnav">
    <a class="active" href="index.php">Home</a>
  <a href="#userprofile">User Profile</a>
  <a href="../member/Year_Sem.php">Courses</a>
  <a href="#about">About</a>



<?php 
	session_start(); 
 
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['studentno']);
		header("location: Login.php");
	}

?>

	

 
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['studentno'])) : ?>
                        <p style="color: white; margin-left: 38cm;">Welcome</p>
                        <p style="color: white; margin-left: 38cm;">Student No:-<strong><?php echo $_SESSION['studentno']; ?></strong></p>
                        <p style="color: white; margin-left: 38cm;">Student Name:-<strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'"style="color: red; margin-left: 38cm;" >logout</a> </p>
		<?php endif ?>
	

</div>	
</body>

</html>
