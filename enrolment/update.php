<?php include('saveEnrol.php');

?>

		
	
<html>
<head>
    
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="header">
        <h2>Update enrollment key</h2>
        </div>>
	
</head>
<body>

        <br><br>
        <form action="" method="post" >
            <div class="input-group">
            <input type="text" name="id" placeholder="ID" required=""><br>
            <input type="text" name="coursename"  placeholder="course name" required=""><br>
            <input type="text" name="enrolkey" placeholder="enrol key" required=""><br>
            </div>
            <button class="btn" type="submit" name="sub" >Update</button> 
            <button onclick="window.location.href='addenrol.php'" class="btn" type="submit" name="back" >Back</button> 
            
 
   
        </form>
</body>
</html>
   
  



