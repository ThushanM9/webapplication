<?php
 $db = mysqli_connect('localhost', 'root', '1234', 'webapplication');
        if (isset($_GET['del1'])) {
            //var_dump($_GET['del']);die;
	$studentno = $_GET['del1'];
        //var_dump($cid);die;
	$query ="DELETE FROM member WHERE studentno='$studentno'";
        
        mysqli_query($db, $query);
        //$_SESSION['cid'] = $cid;
	$_SESSION['message'] = "Deleted Successfully!"; 
	header('location: viewusers.php');
        
        }

	$results = mysqli_query($db, "SELECT * FROM member");

?>
<!DOCTYPE html>
<html>
<head>
        <title>Courses</title>
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
    <?php $results1 = mysqli_query($db, "SELECT * FROM member"); ?>

    <table style="width: 70%;margin: 30px auto; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                            
                                <th style=" border: none;height: 30px;padding: 2px;">Student NUmber</th>
				<th style=" border: none;height: 30px;padding: 2px;">User Name</th>
				<th style=" border: none;height: 30px;padding: 2px;">Email</th>
				<th style=" border: none;height: 30px;padding: 2px;">Address</th>
				<th style=" border: none;height: 30px;padding: 2px;">Phon Number</th>
                                <th style=" border: none;height: 30px;padding: 2px;">Faculty</th>
                                <th style=" border: none;height: 30px;padding: 2px;">Year</th>
                                <th style=" border: none;height: 30px;padding: 2px;">Semester</th>
                                <th style=" border: none;height: 30px;padding: 2px;">password</th>
                            
                            </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results1)) { ?>
                            <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['studentno']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px; magin-left:1cm"><?php echo $row['username']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['email']; ?></td>
                                  
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['address']; ?></td>
                                     <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['phonnumber']; ?></td>
                                      <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['faculty']; ?></td>
                                       <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['year']; ?></td>
                                        <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['semester']; ?></td>
                                         <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['password']; ?></td>
                                    
                                    
                                    
                                    
                                    
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="viewusers.php?del1=<?php echo $row['studentno']; ?>" class="del_btn" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background: #800000;">Delete</a>
                                    </td>
                                   
                            </tr>
                    <?php } ?>
            </table>

   


        
        
</form>
</body>
</html>
	</body>
</html>
