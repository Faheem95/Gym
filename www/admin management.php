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
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM members WHERE MemberID = '$info[6]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$MemberID = $rows['MemberID'];    
$Name = $rows['Name'];
$DOB = $rows['DOB'];
$Address = $rows['Address'];
$Postcode = $rows['Postcode'];
$Phone = $rows['Phone'];
$email = $rows['email'];

}
}else{
echo("No Account Available");
}
} else{
echo("result error");
}

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
echo("Account Created Successfully");

}else{
echo("Account Not Created");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `members` WHERE MemberID = '$info[6]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("Account Deleted");
}else{
echo("Account Not Deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
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
echo("Account Updated");
}else{
echo("Account Not Updated");
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
                    <form method ="post" action="admin management.php">
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
                            <input type="submit" class="btn btn-primary" name="delete" value="Delete">
                            <input type="submit" class="btn btn-primary" name="update" value="Update">
                            <input type="submit" class="btn btn-primary" name="search" value="Search">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <?php
                        //execute the SQL query and return records
                        $search_query2="SELECT * FROM members";
                        $search_result2=mysqli_query($conn, $search_query2);
                    ?>
                    <table id="t01" class="table">
                        <caption>Member Accounts</caption>
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>DOB</th>                
                                <th>Address</th>
                                <th>Postcode</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $search_result2->fetch_assoc()) {
                                    echo
                                    "<tr>
                                        <td>{$row['MemberID']}</td>
                                        <td>{$row['Name']}</td>
                                        <td>{$row['DOB']}</td>              
                                        <td>{$row['Address']}</td>
                                        <td>{$row['Postcode']}</td>
                                        <td>{$row['Phone']}</td> 
                                        <td>{$row['email']}</td>
                                        <td>{$row['Access']}</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>












<!--<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method ="post" action="admin membership.php">
<input type="number" name="MemberID" placeholder="Member ID" value="<?php echo($MemberID);?>"><br><br>    
<input type="text" name="Name" placeholder="Name" value="<?php echo($Name);?>"><br><br>
<input type="date" name="DOB" value="<?php echo($DOB);?>"><br><br>
<input type="text" name="Address" placeholder="Address" value="<?php echo($Address);?>"><br><br>
<input type="text" name="Postcode" placeholder="Postcode" value="<?php echo($Postcode);?>"><br><br>
<input type="text" name="Phone" placeholder="Phone" value="<?php echo($Phone);?>"><br><br>
<input type="text" name="email" placeholder="email" value="<?php echo($email);?>"><br><br>
<div>
<input type="submit" name="insert" value="Create">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="update" value="Update">
<input type="submit" name="search" value="Search">

</div>
</form>
</body>
</html>

<html>
 <head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
table#t01 {
    width: 100%;    
    background-color: #99ff66;
}
</style>
 </head>
 <body>

    <?php
    //execute the SQL query and return records
    $search_query2="SELECT * FROM members";
    $search_result2=mysqli_query($conn, $search_query2);
    ?>
    <table id="t01" style="width:100%">
        <caption>Manage Member Accounts</caption>
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Date Joined</th>
                <th>Address</th>
                <th>Postcode</th>
                <th>Phone</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $search_result2->fetch_assoc()) {
                echo
                "<tr>
          <td>{$row['MemberID']}</td>
          <td>{$row['Name']}</td>
          <td>{$row['DOB']}</td>    
          <td>{$row['Date_Joined']}</td>
          <td>{$row['Address']}</td>
          <td>{$row['Postcode']}</td>
          <td>{$row['Phone']}</td> 
          <td>{$row['email']}</td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
 </body>-->