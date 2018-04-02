<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
$content="";
$servername = "localhost";
$username="root";
$password="";
$dbname="gym";
$LogID="";
$EquipmentID="";
$EquipmentName="";
$DamageDetails="";
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
$data[0]=$_POST['LogID'];
$data[1]=$_POST['EquipmentID'];
$data[2]=$_POST['EquipmentName'];
$data[3]=$_POST['DamageDetails'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM repairlog WHERE LogID = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$LogID = $rows['LogID'];    
$EquipmentID = $rows['EquipmentID'];
$EquipmentName = $rows['EquipmentName'];
$DamageDetails = $rows['DamageDetails'];

}
}else{
echo("Log Unavailable");
}
} else{
echo("result error");
}

}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `repairlog`(`EquipmentID`, `EquipmentName`, `DamageDetails`) VALUES ('$info[1]','$info[2]','$info[3]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("Log Created Successfully");

}else{
echo("Log Not Created");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `repairlog` WHERE LogID = '$info[0]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("Log Deleted");
}else{
echo("Log Not Deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}
//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `repairlog` SET `EquipmentID`='$info[1]',EquipmentName='$info[2]',DamageDetails='$info[3]' WHERE LogID = '$info[0]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("Log Updated");
}else{
echo("Log Not Updated");
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
                    <form method ="post" action="repair log.php">
                        <div class="form-group">
                            <input type="number" class="form-control" name="LogID" placeholder="Log ID" value="<?php echo($LogID);?>"><br><br>    
                            <input type="number" class="form-control" name="EquipmentID" placeholder="Equipment ID" value="<?php echo($EquipmentID);?>"><br><br>
                            <input type="text" class="form-control" name="EquipmentName" placeholder="Equipment Name" value="<?php echo($EquipmentName);?>"><br><br>
                            <input type="text" class="form-control" name="DamageDetails" placeholder="Damage Details" value="<?php echo($DamageDetails);?>"><br><br>
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
                        $search_query2="SELECT * FROM repairlog";
                        $search_result2=mysqli_query($conn, $search_query2);
                    ?>
                    <table id="t01" class="table">
                        <caption>Repair Log</caption>
                        <thead>
                            <tr>
                                <th>Log ID</th>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>                
                                <th>Damage Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $search_result2->fetch_assoc()) {
                                    echo
                                    "<tr>
                                        <td>{$row['LogID']}</td>
                                        <td>{$row['EquipmentID']}</td>
                                        <td>{$row['EquipmentName']}</td>              
                                        <td>{$row['DamageDetails']}</td>
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