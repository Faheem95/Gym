<?php
$a = $_SERVER['HTTP_REFERER'];

if (strpos($a, '/e-has/') !== false) {
    
} else {
    header("Location: ../login/");
}

?>
<?php
include 'index.php';
include '../include/db connection.php';
$pass         = rtrim($_POST['pwfield']);
$user_id_auth = rtrim($_POST['login_id']);
if (isset($user_id_auth) && isset($pass)) {
    $sql    = "SELECT * FROM auth_user WHERE login_id='$user_id_auth'";
    $result = mysqli_query($con, $sql);
    $count  = mysqli_num_rows($result);
    if ($count == 1) {
        mysqli_query($con, "UPDATE auth_user SET pass_key='$pass' WHERE login_id='$user_id_auth'");
        echo "<html><head><script>alert('Password Updated ,Login Again ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
} else {
    echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>