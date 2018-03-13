<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
$content="";
$servername = "localhost";
$username="root";
$password="";
$dbname="gym";
$Name="";
$DOB="";
$Address="";
$Postcode="";
$Phone="";
$email="";
$MemberID="";
include 'Template.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
}
//get data from the form
function getData()
{
$data = array();
$data[0]=$_POST['Name'];
$data[1]=$_POST['DOB'];
$data[2]=$_POST['Address'];
$data[3]=$_POST['Postcode'];
$data[4]=$_POST['Phone'];
$data[5]=$_POST['email'];
$data[6]=$_POST['MemberID'];
return $data;
}

//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `members`(`Name`, `DOB`, `Address`,`Postcode`,`Phone`,`email`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("data inserted successfully");

}else{
echo("data are not inserted");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}

//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `members` SET `Name`='$info[0]',DOB='$info[1]',Address='$info[2]',Postcode='$info[3]',Phone='$info[4]',email='$info[5]' WHERE MemberID = '$info[6]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("data updated");
}else{
echo("data not updated");
}
}
}catch(Exception $ex){
echo("error in update".$ex->getMessage());
}
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>

    <body>
        <div class="containers">
            <div class="row">
                <div class="col-md-auto">
                    <form method ="post" action="create membership.php">
                        <div class="form-group">
                            <input type="number" class="form-control" name="MemberID" placeholder="Member ID" value="<?php echo($MemberID);?>"><br><br>    
                            <input type="text" class="form-control" name="Name" placeholder="Name" value="<?php echo($Name);?>"><br><br>
                            <input type="date" class="form-control" name="DOB" value="<?php echo($DOB);?>"><br><br>
                            <input type="text" class="form-control" name="Address" placeholder="Address" value="<?php echo($Address);?>"><br><br>
                            <input type="text" class="form-control" name="Postcode" placeholder="Postcode" value="<?php echo($Postcode);?>"><br><br>
                            <input type="text" class="form-control" name="Phone" placeholder="Phone" value="<?php echo($Phone);?>"><br><br>
                            <input type="text" class="form-control" name="email" placeholder="email" value="<?php echo($email);?>"><br><br>
                        </div>
                        
                        <div>
                            <input type="submit" class="btn btn-primary" name="insert" value="Create">
                            <input type="submit" class="btn btn-primary" name="update" value="Update">
                        </div>
                    </form>
                </div>
    </body>
</html>















<!--<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method ="post" action="create membership.php">
<input type="text" name="Name" placeholder="Name" value="<?php echo($Name);?>"><br><br>
<input type="date" name="DOB" value="<?php echo($DOB);?>"><br><br>
<input type="text" name="Address" placeholder="Address" value="<?php echo($Address);?>"><br><br>
<input type="text" name="Postcode" placeholder="Postcode" value="<?php echo($Postcode);?>"><br><br>
<input type="text" name="Phone" placeholder="Phone" value="<?php echo($Phone);?>"><br><br>
<input type="text" name="email" placeholder="email" value="<?php echo($email);?>"><br><br>
<div>
<input type="submit" name="insert" value="Create">
<input type="submit" name="update" value="Update">


</div>
</form>
</body>
</html>-->