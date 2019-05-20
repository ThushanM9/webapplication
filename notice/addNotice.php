<?php include('adminmenu.php');
include('saveNotice.php');

if(isset($_GET['edit'])){
    $noticeID=$_GET['edit'];
     $edit_state = true;
		$rec = mysqli_query($db,"SELECT * FROM notice WHERE noticeID='$noticeID'");
                $record = mysqli_fetch_array($rec);
                $noticeID = $record['noticeID'];
                $noticeTopic = $record['noticeTopic'];
              
                                           
		//mysqli_query($db, "UPDATE info SET cid='$cid', cname='$cname', cfullname='$cfullname, cpdf='$cpdf WHERE cid=$cid");
		//$_SESSION['message'] = "Address updated!"; 
		//header('location: index.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
        <title>Courses</title>
	<link rel="stylesheet" type="text/css" href="cou.css">
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
    <?php $results = mysqli_query($db, "SELECT * FROM notice"); ?>

    <table style="width: 70%;margin: 30px auto; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <th style=" border: none;height: 30px;padding: 2px;">Notice ID</th>
                                    <th style=" border: none;height: 30px;padding: 2px; margin-rights:2cm;">Notice</th>
                                    
                                    <th style=" border: none;height: 30px;padding: 2px;" colspan="2">Action</th>
                            </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['noticeID']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px; magin-left:1cm"><?php echo $row['noticeTopic']; ?></td>
                                  
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="addNotice.php?edit=<?php echo $row['noticeID']; ?>" class="edit_btn" style=" text-decoration: none;padding: 2px 5px;background: #2E8B57;color: white;border-radius: 3px;" >Edit</a>
                                    </td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="saveNotice.php?del=<?php echo $row['noticeID']; ?>" class="del_btn" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background: #800000;">Delete</a>
                                    </td>
                            </tr>
                    <?php } ?>
            </table>

   

    
	<div class="header">
		<h2>Courses</h2>
	</div>
	
    <form method="post" action="addNotice.php">
        <?php include('../errors.php'); ?> 
        
		 
                <div class="input-group">
			<label>Notice Id</label>
			<input type="text" name="noticeID" value="<?php echo $noticeID ?>">
		</div>
                <div class="input-group">
			<label>Notice </label>
			<input type="text" name="noticeTopic" value="<?php echo $noticeTopic ?>">
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