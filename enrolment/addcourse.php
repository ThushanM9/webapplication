<?php
 include('../member/index.php');
include('save.php');
?>
<!DOCTYPE html>
<html>
<head>
        <title>Add courses</title>
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
    <?php $results = mysqli_query($db, "SELECT * FROM courses"); ?>

    <table style="width: 70%;margin: 30px auto; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <th style=" border: none;height: 30px;padding: 2px;">CID</th>
                                    <th style=" border: none;height: 30px;padding: 2px; margin-rights:2cm;">Course Short Name</th>
                                    <th style=" border: none;height: 30px;padding: 2px;">Course FUll Name</th>
                                    <th style=" border: none;height: 30px;padding: 2px;">Course PDF</th>
                            </tr>
                    </thead>
                    
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <tr style="border-bottom: 1px solid #cbcbcb;">
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['cid']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px; magin-left:1cm"><?php echo $row['cname']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['cfullname']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;"><?php echo $row['cpdf']; ?></td>
                                    <td style=" border: none;height: 30px;padding: 2px;">
                                        
                            </tr>
                    <?php } ?>
            </table>

   

    
	
        
                
           
        
        
        
        

</body>
</html>