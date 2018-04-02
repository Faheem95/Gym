<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
$content="";
$servername = "localhost";
$username="root";
$password="";
$dbname="gym";
$MembershipID="";
$Membership_Length="";
$Date_Created="";
$Membership_Level="";
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
$data[0]=$_POST['MembershipID'];
$data[1]=$_POST['Membership_Length'];
$data[2]=$_POST['Date_Created'];
$data[3]=$_POST['Membership_Level'];
$data[4]=$_POST['MemberID'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM membership WHERE MemberID = '$info[4]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$MembershipID = $rows['MembershipID'];    
$Membership_Length = $rows['Membership_Length'];
$Date_Created = $rows['Date_Created'];
$Membership_Level = $rows['Membership_Level'];
$MemberID = $rows['MemberID'];


}
}else{
echo("No Membership Available");
}
} else{
echo("result error");
}

}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `membership`(`Membership_Length`, `Date_Created`, `Membership_Level`,`MemberID`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("Membership Created Successfully");

}else{
echo("Membership Not Created");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `membership` WHERE MemberID = '$info[4]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("Membership Deleted");
}else{
echo("Membership Not Deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
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
                            <input type="number" class="form-control" name="MembershipID" placeholder="Membership ID" value="<?php echo($MembershipID);?>"><br><br>    
                            <input type="text" class="form-control" name="Membership_Length" placeholder="Membership Length" value="<?php echo($Membership_Length);?>"><br><br>
                            <input type="date" class="form-control" name="Date_Created" value="<?php echo($Date_Created);?>"><br><br>
                            <input type="text" class="form-control" name="Membership_Level" placeholder="Membership Level" value="<?php echo($Membership_Level);?>"><br><br>
                            <input type="number" class="form-control" name="MemberID" placeholder="Member ID" value="<?php echo($MemberID);?>"><br><br>

                        </div>
                        
                        <div>
                            <input type="submit" class="btn btn-primary" name="insert" value="Create">
                            <input type="submit" class="btn btn-primary" name="delete" value="Delete">
                            <input type="submit" class="btn btn-primary" name="search" value="Search">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <?php