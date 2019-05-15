<?php include('../admin/adminmenu.php');
include('saveAssignment.php');

if(isset($_GET['edit'])){
    $assID=$_GET['edit'];
     $edit_state = true;
		$rec = mysqli_query($db,"SELECT * FROM assignments WHERE assID='$assID'");
                $record = mysqli_fetch_array($rec);
                $assID = $record['assID'];
                $course = $record['course'];
                $subject =$record['subject'];
                $descrptn =$record['descrptn'];
                $file = $record['file'];
                                           
		//mysqli_query($db, "UPDATE info SET cid='$cid', cname='$cname', cfullname='$cfullname, cpdf='$cpdf WHERE cid=$cid");
		//$_SESSION['message'] = "Address updated!"; 
		//header('location: index.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
        <title>Courses</title>
	<link rel="stylesheet" type="text/css" href="ass.css">
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
    <?php $results = mysqli_query($db, "SELECT * FROM assignments"); ?>

    <table style="width: 70%;margin: 30px auto; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <th style=" border: none;height: 30px;padding: 2px;">Assignment ID</th>
                                    <th style=" border: none;height: 30px;padding: 2px; margin-rights:2cm;">Course </th>
                                    <th style=" border: none;height: 30px;padding: 2px;">Subject</th>
                                    <th style=" border: none;height: 30px;padding: 2px;">Description</th>
                                    <th style=" border: none;height: 30px;padding: 2px;">File</th>
                                    <th style=" border: none;height: 30px;padding: 2px;" colspan="2">Action</th>
                            </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['assID']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px; magin-left:1cm"><?php echo $row['course']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['subject']; ?></td>
                                   <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['descrptn']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['file']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="addAssignment.php?edit=<?php echo $row['assID']; ?>" class="edit_btn" style=" text-decoration: none;padding: 2px 5px;background: #2E8B57;color: white;border-radius: 3px;" >Edit</a>
                                    </td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="saveAssignment.php?del=<?php echo $row['assID']; ?>" class="del_btn" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background: #800000;">Delete</a>
                                    </td>
                            </tr>
                    <?php } ?>
            </table>

   

    
	<div class="header">
		<h2>Assignment</h2>
	</div>
	
    <form method="post" action="addAssignment.php">
        <?php include('../errors.php'); ?> 
        
		 
                <div class="input-group">
			<label>Assignment Id</label>
			<input type="text" name="assID" value="<?php echo $assID ?>">
		</div>
                <div class="input-group">
			<label>Course</label>
			<input type="text" name="course" value="<?php echo $course ?>">
		</div>
                <div class="input-group">
			<label>Subject</label>
			<input type="text" name="subject" value="<?php echo $subject ?>">
		</div>
                <div class="input-group">
			<label>Description</label>
			<input type="text" name="descrptn" value="<?php echo $descrptn?>">
		</div>
                
                <div class="input-group">
                    
                        <label>Assignment Upload:</label>
                        <input type="file" name="file" value="<?php echo $file ?>">
                </div>     
                <div class="input-group">
                    <?php if($edit_state == false): ?>
                           <button type="submit" class="edit_btn" name="addbtn" style=" text-decoration: none; padding: 2px 5px; background: #2E8B57;color: white;border-radius: 3px;">Save</button>
                    <?php else: ?>
                           <button type="submit" class="del_btn" name="update" style=" text-decoration: none;padding: 2px 5px;background:blue;color: white;border-radius: 3px;">Update</button>
		<?php endif ?>
                </div>
                       
           
        
        
        
        
</form>
</body>
</html>