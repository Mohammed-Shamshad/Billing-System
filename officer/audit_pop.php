<div class='col-sm-5'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>AUDIT UPDATE</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <form action='audit.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST NO:</label><input class='form-control' name='rid' type='text' value='<?php echo $row7['gstno'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>LAST AUDIT DATE:</label><input class='form-control' name='email' type='text' value='<?php echo $row7['latest'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>NEW AUDIT DATE:</label><input class='form-control' name='new' type='date'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>PREVIOUS REMARKS:</label><input class='form-control' name='message' type='text' value='<?php echo $row7['remarks'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>NEW REMARKS:</label><input class='form-control' name='remark' type='text'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update' class='btn-block btn-primary'>
                </div>
            </form>
            </div></div></div>
