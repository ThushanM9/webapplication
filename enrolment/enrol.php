<?php include('save.php');

 $errors = array();
$cid =""; 
 $errors = array(); 
       
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');


if (isset($_POST['enrol'])) {
   /* if (isset($_POST['adminbtn'])) {
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
	}*/
		
		$cid = mysqli_real_escape_string($db, $_POST['cid']);
		if (empty($cid)) {
			array_push($errors, "enrolment key is required");
		}
		
                if ($cid != 1234) {
			array_push($errors, "enrolment key is wrong");
		}
                
                else{
                    header('location: addcourse.php');
                }
		/*if (count($errors) == 0) {
			$cid = md5($cid);
			$query = "SELECT * FROM courses WHERE cname='$cname' and cid='$cid'";
			$results = mysqli_query($db, $query);
                     */
                
                        
			/*if (mysqli_num_rows == 1) {
				$_SESSION['cid'] = 1234;
				$_SESSION['success'] = "You are now logged in";
                                
				header('location: addcourse.php');
			}else {
				array_push($errors, "Wrong Enrollment Key combination");
			}
		

                }
*/
            

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enrol</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Enrolling to the course </h2>
	</div>
	
    <form method="post" action="">

		<?php include('../errors.php'); ?>

		
		<div class="input-group">
			<label>Enrollment key:</label>
			<input type="password" name="cid" placeholder="Click to enter text">
		</div>
		<div class="input-group">
			<button onclick="window.location.href='addcourse.php'"  class="btn" type="submit"  name="enrol">Enrol me</button>
		</div>
		
	</form>
    
   
</body>
</html>