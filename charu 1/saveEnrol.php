<?php 

	session_start();

	// variable declaration
        $id="";
        $coursename ="";
        $enrolkey="";
        
        $errors = array(); 
	$_SESSION['success'] = "";
        $edit_state  = false;

	// connect to database
	$con = mysqli_connect('localhost', 'root', '1234', 'webapplication');
       
        
        
//insert courses
      if (isset($_POST['addbtn'])) {
                $id = mysqli_real_escape_string($con, $_POST['id']);
		$coursename = mysqli_real_escape_string($con, $_POST['coursename']);
		$enrolkey = mysqli_real_escape_string($con, $_POST['enrolkey']);
                
            
                 if (empty($id)) { array_push($errors, "ID is required"); }
                if (empty($coursename)) { array_push($errors, "course name is required"); }
		if (empty($enrolkey)) { array_push($errors, "Emrollment key is required"); }
		
             
                
       
                     if (ctype_alpha(str_replace(' ', '', $coursename)) === false) {
                    array_push($errors,"Course Name must contain letters and spaces only");
                    
      }if (count($errors) == 0) {
			$query = "INSERT INTO enrol ( id, coursename, enrolkey) 
					  VALUES('$id','$coursename','$enrolkey')";         
		//mysqli_query($db, $query);
                mysqli_query($con, $query);
                    echo $_SESSION['message'] = "insert Successfully!";
     
      
                $_SESSION['success'] = "added Successfully!"; 
               header('location: addenrol.php');
               
      }
      
      }
      
      
      //delete course
      
      $con = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if (isset($_GET['del'])) {
            //var_dump($_GET['del']);die;
	$id = $_GET['del'];
        //var_dump($enrolkey);die;
	$query ="DELETE FROM enrol WHERE id='$id'";
        
        mysqli_query($con, $query);
       
	$_SESSION['message'] = "Deleted Successfully!"; 
	header('location: addenrol.php');
        
        
        
      
}
          
    //update


 
   $con = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if(isset($_POST['sub']))
        {
            
            if (mysqli_query($con,"UPDATE enrol SET coursename='$_POST[coursename]', enrolkey='$_POST[enrolkey]' WHERE id='$_POST[id]' ;")) 
                    
            $_SESSION['message'] = "Updated Successfully!"; 
            
        
    
       header('location: addenrol.php');
        }   
      
 $results = mysqli_query($con, "SELECT * FROM enrol");


?>