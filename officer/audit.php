<?php require 'conn.php';?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Audit | GST BILLING SYSTEM</title>
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
                <h4>REPORTS</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <table id='t01' class='col-sm-12'>
                    <tr>
                        <th>GST NO:</th>
                        <th>LAST AUDIT:</th>
                        <th>UPDATE</th>
                    </tr>
                    <tr>
                    <?php
                        $date= date('Y-m-d');
                        $query = "SELECT * FROM audit where DATEDIFF('$date',latest)>365;";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        while ($row = mysqli_fetch_array($result))
                            {
                                echo '<tr><td>'.$row['gstno'].'</td>';
                                echo '<td>'.$row['latest'].'</td>';
                                echo "<td><form action='' method='post'><input type='hidden' name='gst' value='".$row['gstno']."'>"
                                 . "<button type='submit' name='submit' class='btn byn-link'>click here </button></form></td></tr>";
                            }
                        ?>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <p>Audit report's<a href="audit.php">Here</a></p>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $t=$_POST['gst'];
        //echo $t;
        $query7 = "SELECT * FROM audit where gstno = '$t'";
        $result7 = mysqli_query($con,$query7) or die(mysqli_error($con));
        $row7= mysqli_fetch_array($result7);
        include 'audit_pop.php';
    }
    if(isset($_POST['update']))
    {
            $gstno=$_POST['rid'];
            $date=$_POST['new'];
            $rem=$_POST['remark'];
            $query1="update audit set previovs='latest',latest='$date', remarks='$rem' where gstno='$gstno'";
            $result1=mysqli_query($con, $query1) or die(mysqli_error($con));
            if($result1==1)
            {        
                echo "<script>alert('STATUS UPDATED');</script>";
            }
            else
            {
                echo "<script>alert('STATUS UPDATE UNSUCCESSFUL');</script>";
            }
    }