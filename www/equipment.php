<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
$content="";
$servername = "localhost";
$username="root";
$password="";
$dbname="gym";
$EquipmentID="";
$EquipmentName="";
$EquipmentType="";
$Available="";
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
$data[0]=$_POST['EquipmentID'];
$data[1]=$_POST['EquipmentName'];
$data[2]=$_POST['EquipmentType'];
$data[3]=$_POST['Available'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM equipment WHERE EquipmentID = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$EquipmentID = $rows['EquipmentID'];    
$EquipmentName = $rows['EquipmentName'];
$EquipmentType = $rows['EquipmentType'];
$Available = $rows['Available'];

}
}else{
echo("No Equipment Available");
}
} else{
echo("result error");
}

}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `equipment`(`EquipmentName`, `EquipmentType`, `Available`) VALUES ('$info[1]','$info[2]','$info[3]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("Equipment Added Successfully");

}else{
echo("Equipment Not Added");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `Equipment` WHERE EquipmentID = '$info[0]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("Equipment Deleted");
}else{
echo("Equipment Not Deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}
//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `equipment` SET `EquipmentName`='$info[1]',EquipmentType='$info[2]',Available='$info[3]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("Equipment Updated");
}else{
echo("Equipment Not Updated");
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
                    <form method ="post" action="equipment.php">
                        <div class="form-group">
                            <input type="number" class="form-control" name="EquipmentID" placeholder="Equipment ID" value="<?php echo($EquipmentID);?>"><br><br>    
                            <input type="text" class="form-control" name="EquipmentName" placeholder="Equipment Name" value="<?php echo($EquipmentName);?>"><br><br>
                            <input type="text" class="form-control" name="EquipmentType" placeholder="Equipment Type" value="<?php echo($EquipmentType);?>"><br><br>
                            <input type="text" class="form-control" name="Available" placeholder="Availability" value="<?php echo($Available);?>"><br><br>
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
                        $search_query2="SELECT * FROM equipment";
                        $search_result2=mysqli_query($conn, $search_query2);
                    ?>
                    <table id="t01" class="table">
                        <caption>Equipment List</caption>
                        <thead>
                            <tr>
                                <th>Equipment ID</th>
                                <th>Equipment Name</th>
                                <th>Equipment Type</th>                
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $search_result2->fetch_assoc()) {
                                    echo
                                    "<tr>
                                        <td>{$row['EquipmentID']}</td>
                                        <td>{$row['EquipmentName']}</td>
                                        <td>{$row['EquipmentType']}</td>              
                                        <td>{$row['Available']}</td>
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
