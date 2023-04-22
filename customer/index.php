<?php require("conn.php");?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Home | GST BILLING SYSTEM</title>
        <?php include 'bootstraplinks.php'; ?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body style="background-image: url('../images/im2.jpg');background-position: center;background-repeat: no-repeat;background-size: cover">
        <?php include 'header.php'; ?>
        <div class="col-sm-6">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOCATE</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>FIND</i><p>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="GST NUMBER" name="gstno">
                                    </div>
                                    <center><B>OR</B></center>
                                    <BR>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ADDRESS" name="adder">
                                    </div>
                                    <?php 
                                        $code=rand(1000,9999);
                                        echo "<center>".$code."</center>";
                                        echo "<input type='hidden' name='code1' value='$code'>";
                                    ?>
                                    <br>
                                    <input type='hidden' name='code1' value='<?php echo $code?>'>
                                    <center><input name="captcha" type="text" required></center>
                                    <br>
                                    <button type="submit" name="find" class="btn btn-primary col-sm-12">Find</button><br><br>
                                </form>
                                        <?php
                                echo $_GET['error'];?></form><br/>
                            </div>
                            <div class="panel-footer"><p>Know about the company<a href="index.php?error=">Find</a></p></div>
                        </div>
        </div>
        <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>REPORT</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>File a Report</i><p>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input  type="text" class="form-control"  placeholder="Company's Address" name="address" required = "true">
                                    </div>
                                    <div>
                                        <textarea  name="message" id="message" class="form-control" placeholder="Message"></textarea>
                                        <?php echo $_GET['error']; ?>
                                    </div>
                                    <br>
                                    <?php 
                                        $code=rand(1000,9999);
                                        echo "<center>".$code."</center>";
                                    ?>
                                    <br>
                                    <center>
                                        <input type='hidden' name='code2' value='<?php echo $code?>'>
                                        <input name="captcha" type="text" required></center>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary col-lg-12">REPORT</button>
                                </form>
                                <br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php?m1=">Register</a></p></div>
                        </div>
        </div>
        <br><br><br>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 6302449887</p>
        </div>
<?php
    require_once ('../phpmail/PHPMailerAutoload.php');
    if(isset($_POST['find']))
    {    
        $cap=$_POST['captcha'];
        $cap1=$_POST['code1'];
        //echo $cap;
        //echo $cap1;
        if($cap == $cap1){
            $gstno = $_POST['gstno'];
            //echo $gstno;
            $addr= $_POST['adder'];
            $query ="SELECT * FROM orgdetails WHERE gstno = '$gstno' or adder = '".$addr."'";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
            $num = mysqli_num_rows($result);
            if($num == 1)
            {
                $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
                //header('location: login.php?error='.$error);
                echo "<script>alert('Organization Found');</script>";
            }
            if($num == 0) 
            {
                echo "<script>alert('Organization Not Found');</script>";
            }
            //echo $num;
            }
        else {echo "<script>alert('Invalid captcha');</script>";}
    }
    if(isset($_POST['submit']))
    {
        $cap=$_POST['captcha'];
        $cap1=$_POST['code2'];
        //echo $cap;
        //echo $cap1;
        if($cap == $cap1){
            $name = $_POST['address'];
            $name = mysqli_real_escape_string($con, $name);
            $email = $_POST['email'];
            $email = mysqli_real_escape_string($con, $email);
            $pan=$_POST['message'];
            $query = "INSERT INTO report(Address, Email,status,Message,Rid)VALUES('" . $name . "','"
                                                                      . $email. "','active','"
                                                                      . $pan  . "','" 
                                                                      ."')";
            $ressult=mysqli_query($con, $query) or die(mysqli_error($con));
            if($ressult==1)
            {
                echo "<script>alert('Report filed successfully');</script>";
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
                $mail->addAddress ($email);      // Add a recipient      

                //Content
                $mail->isHTML(true);                           // Set email format to HTML
                $mail->Subject = 'REPORT SUMMARY';
                $mail->Body    = "YOU HAVE JUST NO FILED A REPORT AGAINST $name"
                                 . "Your message is '$pan' <br> If it is not you please do replay to this mail";
                if($mail->send())
                {
                    echo "<script>alert('REPORT SUMMARY SENT TO YOUR MAIL');</script>";
                }            
            }
            else
            {
                echo "<script>alert('Report unsuccessfully');</script>";
            }
    }
    else{
        echo "<script>alert('Invalid captcha');</script>";
    }
            }?>
    </body>
</html>