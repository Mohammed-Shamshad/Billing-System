<?php
        require 'conn.php';
        $query = "SELECT * FROM report";
        $result = mysqli_query($con, $query)or die($mysqli_error($con));
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Report's | GST BILLING SYSTEM</title>
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
    <div class='col-sm-7'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>REPORTS</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <table id="t01" class="col-sm-12">
                    <tr>
                        <th>Report ID:</th>
                        <th>E-Mail:</th>
                        <th>Address</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th>Update</th>
                    </tr>
                    <tr>
                        <?php
                            while ($row = mysqli_fetch_array($result))
                            {  
                                echo '<tr><td>'.$row['Rid'].'</td>';
                                echo '<td>'.$row['Email'].'</td>';
                                echo '<td>'.$row['Address'].'</td>';
                                echo '<td>'.$row['Message'].'</td>';
                                echo '<td>'.$row['status'].'</td>';
                        echo "<td><form action='' method='post'><input type='hidden' name='rid' value='".$row['Rid']."'>"
                        . "<button type='submit' name='submit' class='btn byn-link'>click here </button></form></td></tr>";
                            }   
                        ?>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <p>Update<input  type="submit" class="btn btn-link" name='submit' value='here'></p>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $t=$_POST['rid'];
        //echo $t;
        $query7 = "SELECT * FROM report where Rid = $t";
        $result7 = mysqli_query($con, $query7);
        $row7= mysqli_fetch_array($result7);
        include 'report_pop.php';
    }
    if(isset($_POST['update']))
    {
                    $rid=$_POST['rid'];
            $mes=$_POST['status'];
            $query1="update report set status='$mes' where Rid=$rid";
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