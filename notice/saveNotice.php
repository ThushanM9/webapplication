<?php 

	session_start();

	// variable declaration
        $noticeID ="";
        $noticeTopic="";
        
        $errors = array(); 
	$_SESSION['success'] = "";
        $edit_state  = false;

	// connect to database
	$db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
       
        
        
//insert courses
      if (isset($_POST['addbtn'])) {
		$noticeID = mysqli_real_escape_string($db, $_POST['noticeID']);
		$noticeTopic = mysqli_real_escape_string($db, $_POST['noticeTopic']);
               
                
                if (empty($noticeID)) { array_push($errors, "Notice Id is required"); }
		if (empty($noticeTopic)) { array_push($errors, "Notices is required"); }
		
               
       
         
                    
                if (count($errors) == 0) {
			$query = "INSERT INTO notice (noticeID,noticeTopic) 
					  VALUES('$noticeID','$noticeTopic')";         
		//mysqli_query($db, $query);
                mysqli_query($db, $query);
                     $_SESSION['message'] = "insert Successfully!";
     
      
                
               header('location: addNotice.php');
               
               
      }
      $results = mysqli_query($db, "SELECT * FROM notice");
      }
      
      
      //delete notice
      
      $db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if (isset($_GET['del'])) {
            //var_dump($_GET['del']);die;
	$noticeID = $_GET['del'];
        //var_dump($cid);die;
	$query ="DELETE FROM notice WHERE noticeID='$noticeID'";
        
        mysqli_query($db, $query);
        //$_SESSION['cid'] = $cid;
	$_SESSION['message'] = "Deleted Successfully!"; 
	header('location: addNotice.php');
        
        }

	$results = mysqli_query($db, "SELECT * FROM notice");


        //update
        //mouse click
        
        
         if (isset($_POST['update'])) {
                $noticeID = mysqli_real_escape_string($db, $_POST['noticeID']);
		$noticeTopic = mysqli_real_escape_string($db, $_POST['noticeTopic']);
               
             
                mysqli_query($db,"UPDATE notice SET noticeID='$noticeID' ,noticeTopic='$noticeTopic'");
               $_SESSION['message'] = "Update Successfully!"; 
	header('location: addNotice.php');
           }
 
        $results = mysqli_query($db,"SELECT * FROM notice");
?>                        
			