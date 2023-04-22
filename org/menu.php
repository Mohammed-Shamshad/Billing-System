<?php
        require 'conn.php';
        if (isset($_SESSION['username'])) {
            //echo $_SESSION['username'];
            $querygst ="SELECT * FROM orgdetails WHERE email='".$_SESSION['username']."';";
            $resultgst = mysqli_query($con,$querygst) or die(mysqli_error($con));
            $rowgst= mysqli_fetch_array($resultgst);
            $gstno=$rowgst['gstno'];
            $gstnomenu=$rowgst['gstno'].'menu';
            //echo $gstnomenu;
            $querymenu ="SELECT * FROM ".$gstnomenu;
            $resultmenu = mysqli_query($con,$querymenu) or die(mysqli_error($con));
        }
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu | GST BILLING SYSTEM</title>
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
    <body style="background-color: lightblue;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <?php include 'header.php';?>
    <div class='col-sm-6'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>REPORTS</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <table id="t01" class="col-sm-12">
                    <tr>
                        <th>PRODUCT ID:</th>
                        <th>PRODUCT NAME:</th>
                        <th>PRICE</th>
                        <th>GST</th>
                        <th>UPDATE</th>
                        <th style="background-color: blue"><form action='' method='post'><button type='submit' name='addproduct' class='btn byn-link'>click here </button></form></th>
                    </tr>
                    <tr>
                        <?php
                            while ($rowmenu = mysqli_fetch_array($resultmenu))
                            {  
                                echo '<tr><td>'.$rowmenu['productid'].'</td>';
                                echo '<td>'.$rowmenu['pname'].'</td>';
                                echo '<td>'.$rowmenu['price'].'</td>';
                                echo '<td>'.$rowmenu['gst'].'</td>';
                                echo "<td><form action='' method='post'><input type='hidden' name='rid' value='".$rowmenu['productid']."'><button type='submit' name='submit' class='btn byn-link'>click here </button></form></td></tr>";
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
        $query7 = "SELECT * FROM $gstnomenu where productid = '$t'";
        $result= mysqli_query($con, $query7);
        $row7= mysqli_fetch_array($result) or die(mysqli_error($con));
        include 'product_update.php';
    }
if(isset($_POST['update']))  
        {  
            $p=$_POST['price'];
            $rid=$_POST['pid'];
            $query1="update $gstnomenu set price=$p where productid=$rid";
            $result1=mysqli_query($con, $query1) or die(mysqli_error($con));
            if($result1==1){        
                echo "<script>alert('PRODUCT UPDATED');</script>";
            } 
        }
if(isset($_POST['delete']))
        {
            $p=$_POST['price'];
            $rid=$_POST['pid'];
            $query2="delete from $gstnomenu where productid=$rid";
            $result2=mysqli_query($con, $query2) or die(mysqli_error($con));
            if($result2==1){        
            echo "<script>alert('PRODUCT DELETED');</script>";
            }
        }
if(isset($_POST['addproduct']))
{
    include 'addproduct.php';
}
if(isset($_POST['add']))
        {
            $rid1=$_POST['pname'];
            $rid2=$_POST['price'];
            $rid3=$_POST['gst'];
            $query3="insert into $gstnomenu(productid,pname,price,gst) values('','$rid1',$rid2,$rid3);";
            $result3=mysqli_query($con, $query3) or die(mysqli_error($con));
            if($result3==1){        
         echo "<script>alert('PRODUCT ADDED');</script>";       
        }
    }