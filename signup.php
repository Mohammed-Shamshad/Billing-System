<?php
require("conn.php");
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up | GST BILLING SYSTEM</title>
        <?php include 'bootstraplinks.php'; ?>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body style="background-image: url('images/imj.jpg');background-position: center;background-repeat: no-repeat;background-size: cover">
        <?php include 'header.php'; ?>
        <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" >
                            <div class="panel-heading" style="">
                                <h4>SIGNUP</h4>
                            </div>
                            <form  action="" method="POST">
                            <div class="form-group col-lg-6">
                                <input class="form-control" type='hidden'>
                            </div>
                            <div class="form-group col-lg-6">
                                <input class="form-control" type='hidden'>
                            </div>
                            <div class="form-group col-lg-6">
                                <input class="form-control" placeholder="Assesseename" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="e-mail" required = "true">
                                <?php echo $_GET['m1']; ?>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control"  placeholder="PAN Number" name="pan" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control"  placeholder="Name On PAN Card" name="npan" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" placeholder="GST Number" name="gstno" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control"  placeholder="Phone number" maxlength="10" size="10" name="contact" required = "true">
                                <?php echo $_GET['m1']; ?>
                            </div>
                            <div class="form-group col-lg-6">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="type">
                                    <option value="- Category of Registrant : -">-NO OF PRODUCTS-</option>
                                    <option value="SINGLEPRODUCT">SINGLE PRODUCT</option>
                                    <option value="MULTIPLEPRODUCTs">MULTIPLE PRODUCT'S</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control"  placeholder="Commissionerate" name="Commissionerate" required = "true">
                            </div>
                            <div class="form-group col-lg-6">
                                <select class="form-control" name="Taxable">
                                <?php
                                $qu="select * from products;";
                                $result= mysqli_query($con,$qu) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='" . $row['product_name'] ."'>" . $row['product_name'] ."</option>";
                                }                                       
                                ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary col-sm-12">Submit</button>
                            <div class="panel-footer"><p>Have an account? <a href="login.php?error=">Login</a></p></div>
                        </form>
                        </div>
        </div>
        <div class="footer">
            <p>Copyright &copy;GST BILLING SYSTEM. All Rights Reserved  |  Contact Us: +91 6302449887</p>
        </div>
    </body>
</html>
<?php
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  if(isset($_POST['submit'])){
  $name = $_POST['name'];

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $pan=$_POST['pan'];
  
  $npan=$_POST['npan'];
  
  $gstno=$_POST['gstno'];
  
  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $contact = $_POST['contact'];

  $city = $_POST['city'];

  $address = $_POST['address'];
  
  $type=$_POST['type'];
  
  $Commissionerate=$_POST['Commissionerate'];
  
  $Taxable=$_POST['Taxable'];
  $qu1="select * from products where product_name='$Taxable'; ";
  $result36= mysqli_query($con,$qu1) or die(mysqli_error($con));
  $rowta = mysqli_fetch_array($result36);
  $gstper= $rowta['Gst'];
  
  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[789][0-9]{9}$/";

  $query ="SELECT * FROM orgdetails WHERE gstno='$gstno' OR email='$email'";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
  $num = mysqli_num_rows($result);
  $roal='org';
  $gstnomenu=$gstno.'menu';
  $gstnobill=$gstno.'bill';
  if ($num != 0) {
    $m = "<span class='red'>GST Number Already Exists</span>";
    header('location: signup.php?m1=' . $m);
    echo "<script>alert('REGISTRATION FAILED');</script>";
  } 
else{    
   $query = "INSERT INTO orgdetails(name,email,password,contact,city,adder,pan,npan,gstno,type,comm,taxa,gstper)VALUES('"
            . $name . "','" . $email. "','" . $password . "','" . $contact. "','"
            . $city . "','". $address . "','". $pan . "','". $npan 
            . "','". $gstno . "','". $type . "','". $Commissionerate . "','". $Taxable. "','".$gstper . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $query3="create table $gstnomenu(productid int primary key AUTO_INCREMENT,pname varchar(50),price float,gst float);";
    mysqli_query($con, $query3) or die(mysqli_error($con));
    $query4="create table $gstnobill(recipt char(50),order_id int primary key AUTO_INCREMENT,product_name varchar(50),"
            . "quantity int,price float,discount double,gst float,amount double);";
    mysqli_query($con, $query4) or die(mysqli_error($con));
    $query1 = "INSERT INTO login(username,password,role)VALUES('". $email . "','". $password. "','"."org"."')";
    mysqli_query($con, $query1) or die(mysqli_error($con));
    $query71="INSERT INTO audit(gstno,latest)VALUES('". $gstno . "','". date("Y/m/d")."')";
    mysqli_query($con, $query71) or die(mysqli_error($con));
    $query29="INSERT INTO gst_returns(gstno,fileddate)VALUES('". $gstno . "','".date("Y/m/d")."')";
    mysqli_query($con, $query29) or die(mysqli_error($con));
    echo "<script>alert('SUCCESSFULLY REGISTERED');</script>";
}
}