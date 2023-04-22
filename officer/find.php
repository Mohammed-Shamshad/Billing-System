<?php require 'conn.php';?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search | GST BILLING SYSTEM</title>
        <?php include 'bootstraplinks.php'; ?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <style>
            table {
                width:100%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
                text-align: left;
            }
            table#t01 tr:nth-child(even) {
                background-color: #eee;
            }
            table#t01 tr:nth-child(odd) {
               background-color: #fff;
            }
            
            table#t01 th {
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body style="background-image: url('../images/im3.jpg');background-position: center;background-repeat: no-repeat;background-size: cover">
        <?php include 'header.php';?>
    <div class='col-sm-6'>
                        <div class='panel panel-primary' >
                            <div class='panel-heading'>
                                <h4>LOCATE</h4>
                            </div>
                            <div class='panel-body'>
                                <p class='text-warning'><i>FIND</i><p>
                                <form method='POST' action=''>
                                    <div class='form-group'>
                                        <input type='text' class='form-control'  placeholder='GST NUMBER' name='gstno'>
                                    </div>
                                    <center><B>OR</B></center>
                                    <BR>
                                    <div class='form-group'>
                                        <input type='text' class='form-control' placeholder='PAN NUMBER' name='adder'>
                                    </div>
                                    <button type='submit' name='find' class='btn btn-primary col-sm-12'>Find</button><br><br>
                                </div>
                            <div class='panel-footer'><p>Know about the company<a href='index.php?error='>Find</a></p></div>
                        </div>
        </div>
        <?PHP
    if(isset($_POST['find']))
    {    
        $gstno = $_POST['gstno'];
        $addr= $_POST['adder'];
        $query ="SELECT * FROM orgdetails WHERE gstno='".$gstno."' or pan = '".$addr."'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $num = mysqli_num_rows($result);
        $query7 = "SELECT * FROM audit where gstno = '$gstno'";
        $result7 = mysqli_query($con, $query7);
        $row7= mysqli_fetch_array($result7);
        $num1 = mysqli_num_rows($result7);
        if($num == 0 && $num1 == 0) 
        {
            echo "<script>alert('Organization Not Found');</script>";
        }
        else 
        {
            $row = mysqli_fetch_array($result);
            echo "<div class='col-sm-6'>
                        <div class='panel panel-primary' style='margin-bottom: 5px'>
                            <div class='panel-heading'>
                                <h4>COMPANY FOUND</h4>
                            </div>
                            <div class='panel-body'>
                            <table id='t01' class='col-sm-12'>
                                <tr><th>GST NO</th><TD>".$row['gstno']."</TD></TR>
                                <tr><th>NAME OF THE ORGANIZATION:</th><TD>".$row['name']."</TD></TR>
                                <tr><th>PHONE NUMBER</th><TD>".$row['contact']."</TD></TR>
                                <tr><th>E-MAIL ID</th><TD>".$row['email']."</TD></TR>
                                <tr><th>ADDRESS</th><TD>".$row['adder']."</TD></TR>
                                <tr><th>PAN NO</th><TD>".$row['pan']."</TD></TR>
                                <tr><th>COMMISSIONERATE</th><TD>".$row['comm']."</TD></TR>
                                <tr><th>LAST AUDIT DATE</th><TD>".$row7['latest']."</TD></TR>
                                <tr><th>REMARKS</th><TD>".$row7['remarks']."</TD></TR>
                            </table>";
                            
            echo "<div class='panel-footer'><p>Find company<a href='find.php'> Here</a></p></div>";
        }
    }
    ?>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 6302449887</p>
        </div>
    </body>
</html>
