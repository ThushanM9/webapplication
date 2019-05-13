
<?php session_start();
//include('../errors.php');
$adminName="";
	
        $errors = array(); 
       
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
if (isset($_POST['adminbtn'])) {
		$adminName = mysqli_real_escape_string($db, $_POST['adminName']);
		$adminPassword= mysqli_real_escape_string($db, $_POST['adminPassword']);

		if (empty($adminName)) {
			array_push($errors, "Admin Name is required");
		}
		if (empty($adminPassword)) {
			array_push($errors, "Admin Password is required");
		}

		if (count($errors) == 0) {
			//$adminPassword = md5($adminPassword);
			$query = "SELECT * FROM admin WHERE adminName='$adminName' AND adminPassword='$adminPassword'";
                        //echo $query;die;
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['adminName'] = $adminName;
				$_SESSION['success'] = "Admin You are now logged in";
				header('location:adminmenu.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Administrator Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <form method="post" action="addminLogin.php">
	
     <h2 style="color: silver; font-size:50px; font-family: fantasy;">Administrator Login </h2>
		<?php include('../errors.php'); ?>

		<div class="input-group">
			<label style="color: white; font-size:30px;">User Name:</label>
			<input type="text" name="adminName" placeholder="User Name:" >
		</div>
		<div class="input-group">
			<label style="color: white;font-size:30px;">Password:</label>
			<input type="password" name="adminPassword" placeholder="Pasword">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="adminbtn">Login</button>
		</div>
		
	</form>
     <?php  
       
   
         

?>
   
</body>
</html>