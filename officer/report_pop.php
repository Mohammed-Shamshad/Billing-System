<div class='col-sm-5'>
        <div class='panel panel-primary' >
            <div class='panel-heading'>
                <h4>REPORT UPDATE</h4>
            </div>
            <div class='panel-body' style='background-color: gray;'>            
                <form action='reports.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>REPORT ID:</label><input class='form-control' name='rid' type='text' value='<?php echo $row7['Rid'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>E-MAIL:</label><input class='form-control' name='email' type='text' value='<?php echo $row7['Email'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>ADDRESS:</label><input class='form-control' name='Address' type='text' value='<?php echo $row7['Address'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>MESSAGE:</label><input class='form-control' name='message' type='text' value='<?php echo $row7['Message'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>STATUS:</label><input class='form-control' name='status' type='text' value='<?php echo $row7['status'];?>'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update' class='btn-block btn-primary'>
                </div>
            </form>
            </div></div></div>
