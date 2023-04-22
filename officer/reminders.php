<?php 
require 'conn.php';
require_once ('../phpmail/PHPMailerAutoload.php');
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reminders | GST BILLING SYSTEM</title>
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
                <h4>REMINDERS</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <table id='t01' class='col-sm-12'>
                    <tr>
                        <th>GST NO:</th>
                        <th>LAST GST RETURN FILED:</th>
                        <th>UPDATE</th>
                    </tr>
                    <tr>
                    <?php
                        $date= date('Y-m-d');
                        $query = "SELECT * FROM gst_returns where DATEDIFF('$date',fileddate) > 120;";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        while ($row = mysqli_fetch_array($result))
                            {
                                echo '<tr><td>'.$row['gstno'].'</td>';
                                echo '<td>'.$row['fileddate'].'</td>';
                                echo "<td><form action='' method='post'><input type='hidden' name='gst' value='".$row['gstno']."'>"
                                 . "<button type='submit' name='submit' class='btn byn-link'>click here </button></form></td></tr>";
                            }
                        ?>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">
                <p>Click here for Reminders<a href="reminders.php">Here</a></p>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
if(isset($_POST['submit']))
    {
        $t=$_POST['gst'];
        $t1=$_POST['gst'].'bill';
        //echo $t1;
        $query7 = "SELECT * FROM orgdetails where gstno = '$t'";
        $result= mysqli_query($con, $query7);
        $row7= mysqli_fetch_array($result) or die(mysqli_error($con));
        $query71 = "SELECT sum(gst) FROM $t1";
        $result71= mysqli_query($con, $query71);
        $row71= mysqli_fetch_array($result71) or die(mysqli_error($con));
        //echo $row71['sum(gst)'];
        include 'reminder_pop.php';
    }
if(isset($_POST['update']))
    {
            $rid=$_POST['rid'];
            $mes=$_POST['email'];
            $amt=$_POST['remark'];
            $mail = new PHPMailer();                           // Passing `true` enables exceptions
            //Server settings                                       // Enable verbose debug output
            $mail->isSMTP();                            
                                                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com;';                        // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                 // Enable SMTP authentication
            $mail->Username = 'cssmurty@gmail.com';                 // SMTP username
            $mail->Password = 'ss@1997#gmail';                      // SMTP password
            $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                      // TCP port to connect to
                                                    
            //Recipients                                        
            $mail->setFrom('cssmurty.000webhostapp.com');           //replace this with your active domain.
            $mail->addAddress ($mes);      // Add a recipient      

            //Content
            $mail->isHTML(true);                           // Set email format to HTML
            $mail->Subject = 'GST RETURNS REMINDER';
            $mail->Body    = "THE GST AMOUNT TO BE PAID IS RS ".$amt."/-";
            if($mail->send())
            {
                echo "<script>alert('REMINDER SENT');</script>";
            }
    }    