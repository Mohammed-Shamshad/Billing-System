<div class='col-sm-6'>
    <div class="panel panel-primary" >
        <div class="panel-heading">
            <h4>UPDATE OFFICER DETAILS</h4>
        </div>
        <div class="panel-body" style="background-color: gray;">
            <form action='index.php' method='post' class='col-lg-12'>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>OFFICER ID:</label><input class='form-control' name='ofid' type='text' value='<?php echo $row12['officer_id'];?>' readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>NAME:</label><input class='form-control' name='name' type='text' value='<?php echo $row12['name'];?>' >
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>E-MAIL:</label><input class='form-control' name='email' type='text' value='<?php echo $row12['email'];?>' readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>SALARY:</label><input class='form-control' name='sal' type='text' value='<?php echo $row12['salary'];?>' readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>EL's:</label><input class='form-control' name='el' type='text' value='<?php echo $row12['el'];?> '  readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>CL's:</label><input class='form-control' name='cl' type='text' value='<?php echo $row12['cl'];?>' readonly>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <label>DESIGNATION:</label><input class='form-control' name='desig' type='text' value='<?php echo $row12['designation'];?>' readonly>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>OLD PASSWORD</label><input class='form-control' name='old' type='text'>
                </div>
                <div class='form-group col-lg-5 col-lg-offset-1'>
                    <label>NEW PASSWORD</label><input class='form-control' name='new' type='text'>
                </div>
                <div class='form-group col-lg-10 col-lg-offset-1'>
                    <input type='submit' value='UPDATE' name='update' class='btn-block btn-primary'>
                </div>
            </form>
            </div>
        <div class="panel-footer">
                <p>EMPLOYEE'S DETAILS<p>
            </div>
    </div>
</div>
