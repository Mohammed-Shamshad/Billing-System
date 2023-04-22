<div class='col-sm-5'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>AUDIT UPDATE</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <form action='reminders.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST NO:</label><input class='form-control' name='rid' type='text' value='<?php echo $row7['gstno'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>E-MAIL:</label><input class='form-control' name='email' type='text' value='<?php echo $row7['email'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST TO BE PAID:</label><input class='form-control' name='remark' type='text' value='<?php echo $row71['sum(gst)'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='SEND REMINDER' name='update' class='btn-block btn-primary'>
                </div>    
            </form>
            </div></div></div>
