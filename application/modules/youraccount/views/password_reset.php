<?php

$message = "<h2  style='margin-top: -5px;'>Reset your password</h2>
    <h4>Please enter your password 2x below to reset</h4>";   
?>

      <div id="new_password" style="display:block; margin-top: 10px; height: 400px;">
      <div class="col-md-6 col-md-offset-3" style="margin-top: 10px;">

      <div class="alert alert-success">
        <?= $message ?>
        <!-- Your password cannot be the same as your username. -->
      </div>      

      <?= validation_errors("<p style='color: red;'>", "</p>"); ?>

      <form id="enableForm" method="post" class="form-horizontal"
            action="youraccount/reset_password">

          <input type="hidden" name="activate_code" value="<?= $activate_code ?>">

          <div class="form-group">
              <label class="col-md-4 control-label">New password</label>
              <div class="col-md-7">
                  <input type="password" class="form-control" name="password" />
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Confirm password</label>
              <div class="col-md-7">
                  <input type="password" class="form-control" name="confirm_password" />
              </div>
          </div>

          <div class="form-group ">
            <div class="col-md-6">
              <a href="<?= base_url() ?>youraccount/logout" class="btn btn-default btn-block" role="button">Cancel</a>            
            </div>          
            <div class="col-md-6">            
              <button type="submit" class="btn btn-primary btn-block"  id="submit-btn"
                      name="submit-form"  value="Submit">Submit Change</button>
            </div>                      
          </div>

      </form>

      </div><!--/col-md-6-->
      </div><!--/id new_password-->

