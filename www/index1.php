
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
<br></br>
<head>
<style>
body {
    background-image: url("og.png");
    background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    background-position: center; 
}
</style>
</head>
<body>

    <p>
<?php
    //execute the SQL query and return records    
$result = mysql_query("SELECT COUNT(*) FROM members");
$count = mysql_fetch_array($result);
echo "Members currently signed up :" . $count[0] . "<br>";
    
    ?>
    </p>

    <p>
<?php
    //execute the SQL query and return records    
$result = mysql_query("SELECT COUNT(*) FROM membership");
$count = mysql_fetch_array($result);
echo "Active Memberships: " . $count[0] . "<br>";
    
    ?>
    </p>

    <p>
<?php
    //execute the SQL query and return records    
$result = mysql_query("SELECT COUNT(*) FROM class");
$count = mysql_fetch_array($result);
echo "Classes Available :" . $count[0] . "<br>";
    
    ?>
    </p>
</body>    
</html>
<?php mysql_close($connector); ?>