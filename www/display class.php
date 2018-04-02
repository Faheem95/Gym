<!doctype html>
<?php
error_reporting( E_ALL ^ E_DEPRECATED );
    $content="";
    $servername = "localhost";
    $username="root";
    $password="";
    $dbname="gym";
    $Members_MemberID="";
    $Name="";
    $Class_ClassID="";
    $ClassType="";

    include 'Template.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //connect to mysql database
    try{
        $conn =mysqli_connect($servername,$username,$password,$dbname);
    }catch(MySQLi_Sql_Exception $ex){
        echo("error in connecting");
    }
    

    function getData()
    {
    $data = array();
    $data[0]=$_POST['Members_MemberID'];
    $data[1]=$_POST['Class_ClassID'];
    return $data;


    }


    if(isset($_POST['insert'])){
    $info = getData();
    $insert_query="INSERT INTO `members_has_class`(`Members_MemberID`,`Class_ClassID`) VALUES ('$info[0]','$info[1]')";
    try{
    $insert_result=mysqli_query($conn, $insert_query);
    if($insert_result)
    {
        if(mysqli_affected_rows($conn)>0){
        echo("Class Sign-Up Successful");

        }else{
        echo("Class Sign-Up Unsuccessful");
        }
    }
    }catch(Exception $ex){
    echo("error inserted".$ex->getMessage());
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
                    <form method ="post" action="display class.php">
                        <div class="form-group">
                            <input type="number" class="form-control" name="Members_MemberID" placeholder="Member ID" value="<?php echo($Members_MemberID);?>"><br><br>    
                            <input type="number" class="form-control" name="Class_ClassID" placeholder="Class ID" value="<?php echo($Class_ClassID);?>"><br><br>
                        </div>

                        <div>
                            <input type="submit" class="btn btn-primary" name="insert" value="Sign Up">
                        </div>
                    </form>
                </div>
                <div class="col">
                    <?php
                        //execute the SQL query and return records
                        $search_query2="SELECT * FROM class";
                        $search_result2=mysqli_query($conn, $search_query2);
                    ?>
                    <table id="t02" class="table">
                        <caption>Available Classes</caption>
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

<!-- <html> 
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
table#t02 {
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
    <table id="t02" style="width:100%">
        <caption>Available Classes</caption>
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
 </body>
 </html>-->


