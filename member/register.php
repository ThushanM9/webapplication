<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Registration</h2>
	</div>
	
    <form style="width: 30%;margin: 0px auto;padding: 20px;border: 1px solid #B0C4DE;background: white;border-radius: 0px 0px 10px 10px; "method="post" action="register.php">
           
		<?php include('../errors.php'); ?>
            
               <div class="input-group">
			<label>Student Number</label>
			<input type="text" name="studentno" value="<?php echo $studentno; ?>">
		</div>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
                <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                </div>
                <div class="input-group">
                        <label>Phone number</label>
                        <input type="text" name="phonnumber" value="<?php echo $phonnumber; ?>">
                </div>
                <div class="input-group">
                        <label>Faculty</label>
                    <select  name="faculty" style="height: 33px;width: 98%;padding: 5px 10px;font-size: 16px;border-radius: 5px;border: 1px solid gray;" value="<?php echo $faculty; ?>">
                    <option></option>
                    <option>Computing</option>
                    <option>Business</option>
                    <option>Engineering</option>
                    <option>Quantity surveyor</option>
                    
                  </select>
                       
                </div>
                <div class="input-group">
                        <label>Year</label>
                        <input type="text" name="year" placeholder="1 or 2 or 3 or 4" value="<?php echo $year; ?>">
                </div>
                <div class="input-group">
                        <label>Semester</label>
                        <input type="text" name="semester" placeholder="1 or 2" value="<?php echo $semester; ?>">
                </div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group ">
			<button type="submit"  class="btn" name="reg_user" onclick="myFunction()">Register</button>



		</div>
		
            
            
            
            <p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
