<div class='col-sm-6'>
    <div class="panel panel-primary" >
        <div class="panel-heading">
            <h4>UPDATE OFFICER DETAILS</h4>
        </div>
        <div class="panel-body" style="background-color: gray;">
            <form action='index.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>E-MAIL:</label><input class='form-control' name='desig' type='text' value='<?php echo $_POST['e'];?>' readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>OLD PASSWORD</label><input class='form-control' name='old' type='text'>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>NEW PASSWORD</label><input class='form-control' name='new' type='text'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update1' class='btn-block btn-primary'>
                </div>
            </form>
            <form action='index.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST NUMBER:</label><input required="true" class='form-control' name='gstno' type='text' readonly value="<?php echo $_POST['gst'];?>">
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>GST RETURN FILED OF:</label><input required="true" class='form-control' name='gstdate' type='date'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update2' class='btn-block btn-primary'>
                </div>
            </form>
            </div>
        <div class="panel-footer">
            <p>COMPANY'S DETAILS<p>
        </div>
    </div>
</div>
