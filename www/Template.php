<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html/php; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <!--<link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />-->
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                
            </div>
            
            <nav id="navigation"> 
                <ul id="nav" class="nav navbar navbar-dark bg-dark">
                    <li class="nav-item"><a href="index1.php">Home</a></li>
                    <li class="nav-item"><a href="create account.php">Create Gym Account</a></li>
                    <li class="nav-item"><a href="display class.php">Class Sign-Up</a></li>
                    <li class="nav-item"><a href="update class list.php">Manage Classes</a></li>
                    <li class="nav-item"><a href="create staff account.php">Manage Staff Accounts</a></li>
                    <li class="nav-item"><a href="admin management.php">Manage Gym Accounts</a></li>
                    <li class="nav-item"><a href="create membership.php">Manage Memberships</a></li>
                    <li class="nav-item"><a href="equipment.php">Equipment</a></li>
                    <li class="nav-item"><a href="repair log.php">Repair Log</a></li>
                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                
            </div>
            
            <footer>
                <p></p>
            </footer>
        </div>

    </body>
</html>
