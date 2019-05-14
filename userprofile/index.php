<?php 

define ('DB_HOST','localhost'); // set database host
define ('DB_USER','root'); // set database user
define ('DB_PASS','root'); // set database password
define ('DB_NAME','webapplication'); // set database name


$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>