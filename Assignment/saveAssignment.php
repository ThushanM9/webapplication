<?php 

	session_start();
               
	// variable declaration
                $assID = "";
                $course ="";
                $subject ="";
                $descrptn ="";
                $file  ="";
        $errors = array(); 
	$_SESSION['success'] = "";
        $edit_state  = false;

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
       
        
        
//insert courses
      if (isset($_POST['addbtn'])) {
		$assID = mysqli_real_escape_string($db, $_POST['assID']);
		$course = mysqli_real_escape_string($db, $_POST['course']);
                $subject = mysqli_real_escape_string($db,$_POST['subject']);
                $descrptn = mysqli_real_escape_string($db,$_POST['descrptn']);
                $file = mysqli_real_escape_string($db, $_POST['file']);
            
                
                if (empty($assID)) { array_push($errors, "Assignment Id is required"); }
		if (empty($course)) { array_push($errors, "Course is required"); }
		if (empty($subject)) { array_push($errors, "Subject is required"); }
                if (empty($descrptn)) { array_push($errors, "Destription is required"); }
                if (empty($file)) { array_push($errors, "File is required"); }
               
                 
                if (count($errors) == 0) {
			$query = "INSERT INTO assignments (assID,course, subject,descrptn,file) 
					  VALUES('$assID','$course', '$subject','$descrptn','$file')";         
		//mysqli_query($db, $query);
                mysqli_query($db, $query);
                     $_SESSION['message'] = "insert Successfully!";
     
      
                
               header('location: addAssignment.php');
               
               
      }
      $results = mysqli_query($db, "SELECT * FROM assignments");
      }
      
      
      //delete course
      
      $db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if (isset($_GET['del'])) {
            //var_dump($_GET['del']);die;
	$assID = $_GET['del'];
        //var_dump($cid);die;
	$query ="DELETE FROM assignments WHERE assID='$assID'";
        
        mysqli_query($db, $query);
        //$_SESSION['cid'] = $cid;
	$_SESSION['message'] = "Deleted Successfully!"; 
	header('location: addAssignment.php');
        
        }

	$results = mysqli_query($db, "SELECT * FROM assignments");


        //update
        //mouse click
        
        
         if (isset($_POST['update'])) {
                $assID = mysqli_real_escape_string($db, $_POST['assID']);
		$course = mysqli_real_escape_string($db, $_POST['course']);
                $subject = mysqli_real_escape_string($db,$_POST['subject']);
                $descrptn = mysqli_real_escape_string($db,$_POST['descrptn']);
                $file = mysqli_real_escape_string($db, $_POST['file']);
             
                mysqli_query($db,"UPDATE assignments SET assID='$assID' ,course='$course' ,subject='$subject', descrptn='$descrptn' , file='$file' Where assID='$assID'");
               $_SESSION['message'] = "Update Successfully!"; 
	header('location: addAssignment.php');
           }
 
        $results = mysqli_query($db,"SELECT * FROM assignments");
?>                        
			