<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
$title = "Update Class Lists";
$content = "Classes run everyday at 10AM, 3PM, 8PM and 10PM. Here you can update the classs list";
$servername = "localhost";
$username="root";
$password="";
$dbname="gym";
$ClassType="";
$ClassSize="";
$Cost="";
$Time="";
$ClassID="";

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
$data[0]=$_POST['ClassType'];
$data[1]=$_POST['ClassSize'];
$data[2]=$_POST['Cost'];
$data[3]=$_POST['Time'];
$data[4]=$_POST['ClassID'];

return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM class WHERE ClassID = '$info[4]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ClassID = $rows['ClassID'];    
$ClassType = $rows['ClassType'];
$ClassSize = $rows['ClassSize'];
$Cost = $rows['Cost'];
$Time = $rows['Time'];

}
}else{
echo("no data are available");
}
} else{
echo("result error");
}

}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `class`(`ClassType`, `ClassSize`, `Cost`,`Time`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]')";
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
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `class` WHERE ClassID = '$info[4]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("data deleted");
}else{
echo("data not deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}
//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `class` SET `ClassType`='$info[0]',ClassSize='$info[1]',Cost='$info[2]',Time='$info[3]' WHERE ClassID = '$info[4]'";
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
                    <form method ="post" action="update class list.php">
                        <div class="form-group">
                            <input type="number" class="form-control" name="ClassID" placeholder="Class ID" value="<?php echo($ClassID);?>"><br><br>    
                            <input type="text" class="form-control" name="ClassType" placeholder="Class Type" value="<?php echo($ClassType);?>"><br><br>
                            <input type="number" class="form-control" name="ClassSize" placeholder="Class Size" value="<?php echo($ClassSize);?>"><br><br>
                            <input type="number" class="form-control" name="Cost" placeholder="Cost" value="<?php echo($Cost);?>"><br><br>
                            <input type="time" class="form-control" name="Time" value="<?php echo($Time);?>"><br><br>
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
                        $search_query2="SELECT * FROM class";
                        $search_result2=mysqli_query($conn, $search_query2);
                    ?>
                    <table id="t01" class="table">
                        <caption>Manage Classes</caption>
                        <thead>
                            <tr>
                                <th>Class ID</th>
                                <th>Class Type</th>
                                <th>Class Size</th>
                                <th>Cost</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $search_result2->fetch_assoc()) {
                                    echo
                                    "<tr>
                                    <td>{$row['ClassID']}</td>          
                                    <td>{$row['ClassType']}</td>
                                    <td>{$row['ClassSize']}</td>
                                    <td>{$row['Cost']}</td>    
                                    <td>{$row['Time']}</td> 
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
<form method ="post" action="update class list.php">
<input type="number" name="ClassID" placeholder="Class ID" value="<?php echo($ClassID);?>"><br><br>    
<input type="text" name="ClassType" placeholder="Class Type" value="<?php echo($ClassType);?>"><br><br>
<input type="number" name="ClassSize" placeholder="Class Size" value="<?php echo($ClassSize);?>"><br><br>
<input type="number" name="Cost" placeholder="Cost" value="<?php echo($Cost);?>"><br><br>
<input type="time" name="Time" value="<?php echo($Time);?>"><br><br>
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
    $search_query2="SELECT * FROM class";
    $search_result2=mysqli_query($conn, $search_query2);
    ?>
    <table id="t01" style="width:100%">
        <caption>Manage Classes</caption>
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Class Type</th>
                <th>Class Size</th>
                <th>Cost</th>
                <th>Time</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $search_result2->fetch_assoc()) {
                echo
                "<tr>
          <td>{$row['ClassID']}</td>          
          <td>{$row['ClassType']}</td>
          <td>{$row['ClassSize']}</td>
          <td>{$row['Cost']}</td>    
          <td>{$row['Time']}</td> 
        </tr>";
            }
            ?>
        </tbody>
    </table>
 </body>-->