<?php 

	session_start();

	// variable declaration
        $cid ="";
        $cname="";
        $cfullname="";
        $cpdf = "";
        $errors = array(); 
	$_SESSION['success'] = "";
        $edit_state  = false;

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
       
        
        
//insert courses
      if (isset($_POST['addbtn'])) {
		$cid = mysqli_real_escape_string($db, $_POST['cid']);
		$cname = mysqli_real_escape_string($db, $_POST['cname']);
                $cfullname = mysqli_real_escape_string($db,$_POST['cfullname']);
                $cpdf = mysqli_real_escape_string($db, $_POST['cpdf']);
            
                
                if (empty($cid)) { array_push($errors, "cid is required"); }
		if (empty($cname)) { array_push($errors, "cname is required"); }
		if (empty($cfullname)) { array_push($errors, "cfullnas is required"); }
                if (empty($cpdf)) { array_push($errors, "pdf is required"); }
               
                
                
                if (ctype_alpha($cname) === false) {
                        array_push($errors,"Shoart Name must only contain letters and!");
                } 
       
                     if (ctype_alpha(str_replace(' ', '', $cfullname)) === false) {
                    array_push($errors,"Full Name must contain letters and spaces only");
                    
                }if (count($errors) == 0) {
			$query = "INSERT INTO courses (cid,cname, cfullname,cpdf) 
					  VALUES('$cid','$cname', '$cfullname','$cpdf')";         
		//mysqli_query($db, $query);
                mysqli_query($db, $query);
                     $_SESSION['message'] = "insert Successfully!";
     
      
                
               header('location: courses.php');
               
               
      }
      $results = mysqli_query($db, "SELECT * FROM courses");
      }
      
      
      //delete course
      
      $db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if (isset($_GET['del'])) {
            //var_dump($_GET['del']);die;
	$cid = $_GET['del'];
        //var_dump($cid);die;
	$query ="DELETE FROM courses WHERE cid='$cid'";
        
        mysqli_query($db, $query);
        //$_SESSION['cid'] = $cid;
	$_SESSION['message'] = "Deleted Successfully!"; 
	header('location: courses.php');
        
        }

	$results = mysqli_query($db, "SELECT * FROM courses");


        //update
        //mouse click
        
        
         if (isset($_POST['update'])) {
                $cid = mysqli_real_escape_string($db, $_POST['cid']);
		$cname = mysqli_real_escape_string($db, $_POST['cname']);
                $cfullname = mysqli_real_escape_string($db,$_POST['cfullname']);
                $cyear = mysqli_real_escape_string($db,$_POST['cyear']);
                $csem = mysqli_real_escape_string($db,$_POST['csem']);
                $cpdf = mysqli_real_escape_string($db, $_POST['cpdf']);
             
                mysqli_query($db,"UPDATE courses SET cid='$cid' ,cname='$cname' ,cfullname='$cfullname', cpdf='$cpdf' Where cid='$cid'");
               $_SESSION['message'] = "Update Successfully!"; 
	header('location: courses.php');
           }
 
        $results = mysqli_query($db,"SELECT * FROM courses");
?>                        
			