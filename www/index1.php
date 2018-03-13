<?php
error_reporting( E_ALL ^ E_DEPRECATED );
 $username = "root";
 $password = "";
 $host = "localhost";
 $connector = mysql_connect($host, $username, $password)
    or die("Unable to connect");
 $selected = mysql_select_db("gym", $connector)
    or die("Unable to connect");
 ?>
<?php

$title = "";
$content = '';
include 'Template.php';

?>



<html>
<h2>Total <br>Members</h2><br>
<body>
    <p>
<?php
    //execute the SQL query and return records    
$result = mysql_query("SELECT COUNT(*) FROM members");
$count = mysql_fetch_array($result);
echo "Members currently signed up:" . $count[0] . "<br>";
    
    ?>
    </p>
</body>    
</html>
<?php mysql_close($connector); ?>