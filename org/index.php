<?php
    require("conn.php");
    $querygst ="SELECT * FROM orgdetails WHERE email='".$_SESSION['username']."';";
    $resultgst = mysqli_query($con,$querygst) or die(mysqli_error($con));
    $rowgst= mysqli_fetch_array($resultgst);
    $gstno=$rowgst['gstno'];        
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORG's HOME | GST BILLING SYSTEM</title>
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
    <body style="background-image: url('../images/im4.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
        <?php include 'header.php';?>
        <div class="col-sm-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h4>OFFICER DETAILS</h4>
            </div>
            <div class="panel-body" style="background-color: gray;">            
                <?php include 'header.php';?>
                <table id="t01">
                    <tr><th style="background-color: blue">COMPANY'S NAME</th><td><?php echo $row3['name'];?></td></tr>
                    <tr><th style="background-color: green">GST NUMBER</th><td><?php echo $row3['gstno'];?></td></tr> 
                    <tr><th style="background-color: blue">Email</th><td><?php echo $row3['email'];?></td></tr>
                    <tr><th style="background-color: green">PHONE NUMBER</th><td><?php echo $row3['contact'];?></td></tr>
                    <tr><th style="background-color: blue">ADDRESS</th><td><?php echo $row3['adder'];?></td></tr>
                </table>
            </div>
            <div class="panel-footer">
                <form action="" method="post">
                    <input type="hidden" name="e" value="<?php echo $_SESSION['username'];?>"><p>Update your details and GST Return's
                    <input type="hidden" name='gst' value="<?php echo $row3['gstno'];?>">
                    <input  type="submit" class="btn btn-link" name='submit' value='here'></p>
                </form>
            </div>
        </div>
    </div>
        <?php
    if(isset($_POST['submit']))
    {        
        include 'update.php';
    }
    if(isset($_POST['update1']))
    {
        if($_POST['old'] == '' || $_POST['new'] == ''){
            echo "<script>alert('ENTER BOTH THE PASSWORD');</script>";
        }
        else
        {
            $e=$_SESSION["username"];
            $password1 = $_POST['old'];
            //echo $password1;
            $password1 = mysqli_real_escape_string($con, $password1);
            $password1 = MD5($_POST['old']);
            //echo $password1;
            $password2 = $_POST['new'];
            $password2 = MD5($password2);
            $query24 = "SELECT * FROM login WHERE username='" . $e . "'";
            $result24 = mysqli_query($con, $query24)or die($mysqli_error($con));
            $row24 = mysqli_fetch_array($result24);
            if ($row24['password'] == $password1) {
                $qup="update login set password='$password2' where username='$e'";
                $re=mysqli_query($con, $qup)or die($mysqli_error($con));
                echo "<script>alert('password changed successfully');</script>";
            }
            else 
            {
                echo "<script>alert('password change unsuccessfully');</script>";
            }
        }
    }
    if(isset($_POST['update2']))
    {
        $gstn=$_POST['gstno'];
        $gstd=$_POST['gstdate'];
        $query24 = "update gst_returns set fileddate='$gstd' where gstno='$gstn'";
        $result24 = mysqli_query($con, $query24)or die($mysqli_error($con));
        if($result24 == 1)
        {
            echo "<script>alert('updated successfully');</script>";
        }
        else
        {
            echo "<script>alert('update unsuccessfully');</script>";
        }
            
    }
?>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 85008 43469</p>
        </div>
    </body>
</html>