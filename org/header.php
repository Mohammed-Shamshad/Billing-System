<?php
    if (isset($_SESSION['username'])) 
        {
            $email=$_SESSION["username"];
            $query3 = "SELECT * FROM orgdetails WHERE email='" . $email. "'";
            $result3 = mysqli_query($con, $query3)or die($mysqli_error($con));
            $row3 = mysqli_fetch_array($result3);
            $name=$row3['name'];
    }?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php"><strong>GST BILLING SYSTEM</strong></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <button type="button" class="btn btn-info btn-lg" disabled="true"><?php echo $name?></button>
                <li><a href="bill.php"><span class="glyphicon glyphicon-user"></span>BILL</a></li>
                <li><a href="menu.php"><span class="glyphicon glyphicon-user"></span>MENU</a></li>
                <li><a href="logout_script.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</div>