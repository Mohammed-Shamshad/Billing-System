<?php
    require("conn.php");
    if (isset($_SESSION['username'])) 
        {
        //echo $_SESSION["username"];
            $email=$_SESSION["username"];
            $query3 = "SELECT * FROM officer_details WHERE email='" . $email. "'";
            $result3 = mysqli_query($con, $query3)or die($mysqli_error($con));
            $row3 = mysqli_fetch_array($result3);
            
    }?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Officer Home | GST BILLING SYSTEM</title>
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
    <body style="background-image: url('../images/im3.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="col-sm-6">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <h4>OFFICER DETAILS</h4>
            </div>
            <div class="panel-body" style="background-color: gray;">            
                <?php include 'header.php';?>
                <table id="t01">
                    <tr><th style="background-color: blue">Employee id</th><td><?php echo $row3['officer_id'];?></td></tr>
                    <tr><th style="background-color: green">Name</th><td><?php echo $row3['name'];?></td></tr> 
                    <tr><th style="background-color: blue">Email</th><td><?php echo $row3['email'];?></td></tr>
                    <tr><th style="background-color: green">Salary</th><td><?php echo $row3['salary'];?></td></tr>
                    <tr><th style="background-color: blue">EL's</th><td><?php echo $row3['el'];?></td></tr>
                    <tr><th style="background-color: green">CL's</th><td><?php echo $row3['cl'];?></td></tr>
                    <tr><th style="background-color: blue">Designation</th><td><?php echo $row3['designation'];?></td></tr>
                </table>
            </div>
            <div class="panel-footer">
                <form action="" method="post"><p>Update your details<input  type="submit" class="btn btn-link" name='submit' value='here'></p> </form>
            </div>
        </div>
    </div>
<?php
    if(isset($_POST['submit']))
    {        
        $email12=$_SESSION["username"];
        $query12 = "SELECT * FROM officer_details WHERE email='" . $email. "'";
        $result12 = mysqli_query($con, $query12) or die($mysqli_error($con));
        $row12 = mysqli_fetch_array($result12);
        include 'update.php';
    }
    if(isset($_POST['update']))
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
    
?>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 6302449887</p>
        </div>
</body>
</html>