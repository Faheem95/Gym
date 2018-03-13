<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
header("Location: ./login/");
?>
<?php
$title = "Home";
$content = "Hello World";
        "print in new";

include 'Template.php'

?>
<?php
 $username = "root";
 $password = "";
 $host = "localhost";
 $connector = mysql_connect($host, $username, $password)
    or die("Unable to connect");
 $selected = mysql_select_db("gym", $connector)
    or die("Unable to connect");
 ?>
<p>
<html>
<h2>Total <br>Members</h2><br>
<?php
    //execute the SQL query and return records    
$result = mysql_query("SELECT COUNT(*) FROM members");
$count = mysql_fetch_array($result);
echo "Members currently signed up:" . $count[0] . "<br>";
    
    ?>
    
</html>
</P>
<?php mysql_close($connector); ?>