<div class='col-sm-5'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>PRODUCT</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <form action='menu.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>PRODUCT ID:</label><input class='form-control' name='pid' type='text' required="true" value='<?php echo $row7['productid'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>PRODUCT NAME:</label><input class='form-control' name='pname' type='text' value='<?php echo $row7['pname'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>PRICE:</label><input class='form-control' name='price' type='text' required="true" value='<?php echo $row7['price'];?>'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST PERCENTAGE:</label><input class='form-control' name='gst' type='text' required="true" value='<?php echo $row7['gst'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update' class='btn-block btn-primary'>
                </div>
                <div class="form-group col-lg-10 col-lg-offset-1">
                    <input type='submit' value='DELETE' name="delete" class="btn-block btn-primary">
                </div>
            </form>
            </div></div></div>
