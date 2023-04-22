<?php
    
    if (isset($_SESSION['username'])) 
        {
            $email=$_SESSION["username"];
            $query1 = "SELECT * FROM officer_details WHERE email='" . $email. "'";
            $result1 = mysqli_query($con, $query1)or die($mysqli_error($con));
            $row1 = mysqli_fetch_array($result1);
            $name=$row1['name'];
    }?>
<nav class="navbar navbar-inverse bg-primary navbar-fixed-top">
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
                        <li id="1"><a href="audit.php"><span class="glyphicon glyphicon-user"></span>Audit</a></li>
                        <li id="1"><a href="reminders.php"><span class="glyphicon glyphicon-bell"></span>Reminders</a></li>
                        <li id="1"><a href="reports.php"><span class="glyphicon glyphicon-flag"></span>Report</a></li>
                        <li><a href="find.php"><span class="glyphicon glyphicon-search"></span>Find</a></li>
                        <li><a href="logout_script.php"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
</nav>

