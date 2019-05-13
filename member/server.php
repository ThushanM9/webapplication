<?php 
	session_start();

	// variable declaration
        $studentno ="";
	$username = "";
        $email    = "";
        $address = "";
        $phonnumber = "";
        $faculty = "";
        $year = "";
        $semester = "";
        
        //$adminName="";
	
        $errors = array(); 
       
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
                $studentno = mysqli_real_escape_string($db, $_POST['studentno']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
                $address = mysqli_real_escape_string($db,$_POST['address']);
                $phonnumber = mysqli_real_escape_string($db,$_POST['phonnumber']);
                $faculty = mysqli_real_escape_string($db,$_POST['faculty']);
                $year = mysqli_real_escape_string($db,$_POST['year']);
                $semester = mysqli_real_escape_string($db,$_POST['semester']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
                if (empty($studentno)) { array_push($errors, "Student Number is required"); }
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
                if (empty($address)) { array_push($errors, "Address is required"); }
                if (empty($phonnumber)) { array_push($errors, "Phone number is required"); }
                if (empty($faculty)) { array_push($errors, "faculty is required"); }
                if (empty($year)) { array_push($errors, "Year is required"); }
                if (empty($semester)) { array_push($errors, "Semester is required"); }
                if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
                if (ctype_alpha($username) === false) {
                        array_push($errors,"Name must only contain letters!");
                } 
              
                if(!is_numeric($phonnumber)) {
                      array_push($errors," Data entered was not numeric");
                } else if(strlen($phonnumber) != 10) {
                        array_push($errors," cheack your phone number again");
                }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO member (studentno,username, email,address,phonnumber,faculty,year,semester, password) 
					  VALUES('$studentno','$username', '$email','$address','$phonnumber','$faculty','$year','$semester', '$password')";
			mysqli_query($db, $query);
                        
    
			$_SESSION['success'] = $studentno;
                        
			$_SESSION['success'] = "You are now logged in";
                        
			header('location: index.php');
		}

	}
        

	// ... 

	// LOGIN USER
                if (isset($_POST['login_user'])) {
		$studentno = mysqli_real_escape_string($db, $_POST['studentno']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($studentno)) {
			array_push($errors, "Student Number is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM member WHERE studentno='$studentno' AND password='$password'";
			$results = mysqli_query($db, $query);
                     
                        
                        
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['studentno'] = $studentno;
				$_SESSION['success'] = "You are now logged in";
                                
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
        
        
        
         
    

//admin login

        
     
?>
        





