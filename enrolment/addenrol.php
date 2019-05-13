<?php include('saveEnrol.php');

?>
<!DOCTYPE html>
<html>
<head>
        <title>Add enrollment key</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
    <?php $results = mysqli_query($con, "SELECT * FROM enrol"); ?>

    <table style="width: 70%;margin: 30px auto; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                                   
                                   <th style=" border: none;height: 30px;padding: 2px;">ID</th>
                                    <th style=" border: none;height: 30px;padding: 2px;">Course Name</th>
                                     <th style=" border: none;height: 30px;padding: 2px;">Enrollment key</th>
                                    
                            </tr>
                    </thead>
                    
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <tr style="border-bottom: 1px solid #cbcbcb;">
                                     <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['id']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px; magin-left:1cm"><?php echo $row['coursename']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['enrolkey']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="update.php?sub=<?php echo $row['id']; ?>" class="edit_btn" style=" text-decoration: none;padding: 2px 5px;background: #105b5e;color: white;border-radius: 3px;" >Edit</a>
                                                             
                                    </td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="saveEnrol.php?del=<?php echo $row['id']; ?>" class="del_btn" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background: #105b5e;">Delete</a>
                                    </td>
                            </tr>
                    <?php } ?>
            </table>

   

    
	<div class="header">
		<h2>Add Enrollment key</h2>
	</div>
	
    <form method="post" action="addenrol.php">
        <?php include('../errors.php'); ?>
        
		 <div class="input-group">
			<label>ID</label>
			<input type="text" name="id" value="<?php echo $id ?>">
		</div>
                <div class="input-group">
			<label>Course Name</label>
			<input type="text" name="coursename" value="<?php echo $coursename ?>">
		</div>
                <div class="input-group">
			<label>Enrollment Key</label>
			<input type="text" name="enrolkey" value="<?php echo $enrolkey ?>">
		</div>
                
               
                <div class="input-group">
                    <?php if($edit_state == false): ?>
                           <button type="submit" class="btn" name="addbtn">ADD</button>
                    <?php else: ?>
                           <button type="submit" class="btn" name="updatee">Update</button>
		<?php endif ?>
                </div>
                       
           
        
        
        
        
</form>
</body>
</html>