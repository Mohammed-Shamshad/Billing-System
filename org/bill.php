<?php
require("conn.php");
require_once ('../phpmail/PHPMailerAutoload.php');
$querygst ="SELECT * FROM orgdetails WHERE email='".$_SESSION['username']."';";
            $resultgst = mysqli_query($con,$querygst) or die(mysqli_error($con));
            $rowgst= mysqli_fetch_array($resultgst);
            $n=$rowgst['name'];
            //echo $n;
            $gstno=$rowgst['gstno'];
            $gstnomenu=$rowgst['gstno'].'menu';
            $gstnobill=$rowgst['gstno'].'bill';
            //echo $gstnomenu;
            $querymenu ="SELECT * FROM ".$gstnomenu;
            $resultmenu = mysqli_query($con,$querymenu) or die(mysqli_error($con));
$result=0;
$st='';
$at=0;
if(isset($_POST['save']))  
{
    $name=$_POST['name']; 
    for($i = 0; $i<count($_POST['pname']); $i++)  
    {
        if($_POST['quantity'][$i]>0)
        {
            $result=mysqli_query($con,"INSERT INTO $gstnobill  
            SET   
            recipt = '{$_POST['name']}',
            order_id = '',
            product_name = '{$_POST['pname'][$i]}',
            quantity = '{$_POST['quantity'][$i]}',
            price = '{$_POST['price'][$i]}',
            discount = '{$_POST['discount'][$i]}',
            gst = '{$_POST['gstamt'][$i]}',
            amount = '{$_POST['amount'][$i]}'");
            $st=$st."{$_POST['pname'][$i]}"." X "."{$_POST['quantity'][$i]}"."="."{$_POST['amount'][$i]}"."<br>" ; 
            $at=$at+"{$_POST['amount'][$i]}"+"{$_POST['gstamt'][$i]}";
        }
    }
    if($st=='')
    {
        echo "<script>alert('NO ITEMS SELECTED');</script>";
    }
    else
    {
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
        $mail->addAddress ($name);      // Add a recipient      

        //Content
        $mail->isHTML(true);                           // Set email format to HTML
        $mail->Subject = 'BILL';
        $mail->Body    = "You have got some items at $n"."<br>"
                        ."$st"."<br>"
                        ."Total amount paid = $at"    ;
        $mail->send();
    }
echo $st;
echo $at;
$result=$result+1;
} 
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Billing | GST BILLING SYSTEM</title>
        <?php include 'bootstraplinks.php'; ?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>  
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript"> 
                $(function()  
                {
                $('body').delegate('.quantity,.price,.discount,.gst','keyup',function()  
                {
                    var tr=$(this).parent().parent();
                    var price=tr.find('.price').val(); 
                    var dis=tr.find('.discount').val();
                    var gst=tr.find('.gst').val();
                    var qty=tr.find('.quantity').val();
                    var gstamt=((qty*price)*gst)/100;
                    tr.find('.gstamount').val(gstamt);
                    var amt =(qty * price)-(qty * price *dis)/100;
                    tr.find('.amount').val(amt);
                    total();
                    });
                    });
                function total()  
                {
                    var t=0;
                    var g=0;
                    $('.amount').each(function(i,e)
                    {
                    var amt =$(this).val()-0;
                    t+=amt;
                    });
                    $('.gstamount').each(function(i,e)
                    {
                    var gstamt =$(this).val()-0;
                    g+=gstamt;
                    });
                    $('.total').html(t+g);
                    $('.tgst').html(g);
                }
        </script>
    </head>
    <body style="background-image: url('../images/im4.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;">
        <?php include 'header.php';?>
        <div>
            <center style="color: #b43d3d"><h1>INVOICE</h1></center>
            <form method="post" action="">
                    <input type="email" placeholder="EMAIL ADDRESS" name="name" required="true" class="form-control">
                <br>
                <table style="background-color: #9df39f" class="col-lg-10 table table-bordered table-hover">  
                    <tr><th>Product Name</th>  
                    <th>Quantity</th>  
                    <th>Price</th>  
                    <th>Discount</th>
                    <th>GST %</th>
                    <th>GST Amount</th>
                    <th>Amount</th></tr>
                        <?php
                            while ($rowmenu = mysqli_fetch_array($resultmenu))
                            {
                                echo "<tr><td><input class='form-control' style='width:400px;' name='pname[]' readonly value='".$rowmenu['pname']."'></td>";
                                echo "<td><input type='text'  class='form-control quantity' name=quantity[]</td>";
                                echo "<td><input type='text' class='form-control price' name=price[] readonly value=".$rowmenu['price']."></td>";
                                echo "<td><input type='text' class='form-control discount' name=discount[]</td>";
                                echo "<td><input type='text' class='form-control gst' name=gst[] readonly value=".$rowmenu['gst']."></td>";
                                echo "<td><input type='text' class='form-control gstamount' readonly name=gstamt[]</td>";
                                echo "<td><input type='text' class='form-control amount' readonly name=amount[]</td></tr>";
                            }   
                        ?>    
                <tr style="background-color: #5ba1cf">
                    <th style="color: #b43d3d;">TOTAL GST:</th>
                    <th style="text-align:center;" class="tgst">0<b></b></th>    
                    <th></th>  
                    <th></th>  
                    <th></th>
                    <th style="color: #b43d3d;">TOTAL AMOUNT</th>
                    <th style="text-align:center;" class="total">0<b></b></th>  
                </tr>
            </table>
                <div>
                    <input type="submit" class="btn btn-primary col-sm-offset-1 col-sm-10" name="save" value="Save Record">
                </div>
            </form>
        </div>
    </body>
</html>