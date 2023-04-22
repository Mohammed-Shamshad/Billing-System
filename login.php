<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | GST BILLING SYSTEM</title>
        <?php include 'bootstraplinks.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body style="background-image: url('images/imj.jpg');background-position: center;background-repeat: no-repeat;background-size: cover">
        <?php include 'header.php'; ?>
        <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login</i><p>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="E-mail" name="user" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary">Login</button><br><br>
                                <?php
                                echo $_GET['error'];?></form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php?m1=">Register</a></p></div>
                        </div>
        </div>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 6302449887</p>
        </div>
    </body>
</html>
<?php
require("conn.php");
require_once ('phpmail/PHPMailerAutoload.php');
if(isset($_POST['login']))
{
$user = $_POST['user'];
$user = mysqli_real_escape_string($con, $user);
$password = $_POST['password'];
$password = MD5($password);
$password = mysqli_real_escape_string($con, $password);
// Query checks if the email and password are present in the database.
$query = "SELECT * FROM login WHERE username='" . $user . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  header('location: login.php?error='.$error);
} 
else { 
    $row = mysqli_fetch_array($result);
    if($row['role']=='org')
    {
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $row['role'];
        header('location:org/index.php');
    }
    else{
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $row['role'];
        echo $_SESSION['username'];
        header('location:officer/index.php');
    }
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
    $mail->addAddress ($user);      // Add a recipient      

    //Content
    $mail->isHTML(true);                           // Set email format to HTML
    $mail->Subject = 'LOGIN ALERT';
    $mail->Body    = 'You have just now logined in to ur account.'
                     . 'If it is mot you please change ur password';
    $mail->send();
   
}
}
