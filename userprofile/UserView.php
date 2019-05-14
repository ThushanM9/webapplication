<html>
    <head>
    </head>
    <body>
    <style type="text/css">
        body{
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
        font-weight: 300;
        font-size: 15px;
        background-image:url("books.jpg");
        background-size:cover;
        }
    </style>
    <center>
        <br><br><h1>User Details</h1><br><br>
    </center>
        <table style="width:100%">
        <?php 
        $mysqli = mysqli_connect("localhost","root", "root");
        if (!$mysqli)
        {
            die("Cannot connect: " .mysqli_error());
        }
        mysqli_select_db($mysqli,'webapplication');
        
        if(isset($_POST['Update']))
        {
            $UpdateQuery = "UPDATE member SET studentno = '$_POST[studentno]' ,username = '$_POST[username]' ,email = '$_POST[email]' ,address = '$_POST[address]' ,phonnumber = '$_POST[phonnumber]' ,faculty = '$_POST[faculty]' ,year = '$_POST[year]' ,semester = '$_POST[semester]' ,password = '$_POST[password]' WHERE studentno='$_POST[studentno]'";
            mysqli_query($mysqli,$UpdateQuery);
        }
        
        if(isset($_POST['Delete']))
        {
            $DeleteQuery = "DELETE FROM member WHERE studentno='$_POST[studentno]'";
            mysqli_query($mysqli,$DeleteQuery);  
        }
        
        $sql = "SELECT * FROM member";
        $mydata = mysqli_query($mysqli,$sql);
        
        echo "<table border=10 align=center height=400px font-size:3em color:#0e3c68 font-weight:bold> 
            <tr>
            <td>User ID</td>
            <td>User Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Faculty</td>
            <td>Year</td>
            <td>Semester</td>
            <td>Password</td>
            </tr>";
        while($record = mysqli_fetch_array($mydata))
        {
            
            echo "<form action = UserView.php method = post>";
            echo "<tr>";
            echo "<td>" . "<input type=text name=studentno value=". $record['studentno'] . " </td>";
            echo "<td>" . "<input type=text name=username value=" . $record['username'] . " </td>";
            echo "<td>" . "<input type=text name=email value=" . $record['email'] . " </td>";
            echo "<td>" . "<input type=text name=address value=" . $record['address'] . " </td>";
            echo "<td>" . "<input type=text name=phonnumber value=" . $record['phonnumber'] . " </td>";
            echo "<td>" . "<input type=text name=faculty value=" . $record['faculty'] . " </td>";
            echo "<td>" . "<input type=text name=year value=" . $record['year'] . " </td>";
            echo "<td>" . "<input type=text name=semester value=" . $record['semester'] . " </td>";
            echo "<td>" . "<input type=text name=password value=" . $record['password'] . " </td>";
            //echo "<td>" . "<input type=hidden name=hidden value=" . $record['studentno'] . " </td>";
            echo "<td>" . "<input type=Submit name=Update value=Update" . " </td>";
            echo "<td>" . "<input type=Submit name=Delete value=Delete" . " </td>";
            echo "</tr>";
            echo "</form>";
        }
        
        echo "</table>"; 
        mysqli_close($mysqli);
            
        ?>
        </table>
    </body>
</html>
