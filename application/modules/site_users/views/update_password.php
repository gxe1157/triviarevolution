
<?php
	if( isset($flash) ) echo $flash;	
?>

<!-- "../public/images/annon_user.png"  -->
<?php
    if( $mode == 'admin_member_profile' )
	    	$this->load->view( 'create_banner');
?>
 

 <div class="row">
 	<div class="col-md-12">
			<form class="form-horizontal" method="post" action="<?= $form_location ?>" >
				<fieldset>			
					<?php if( $mode != 'admin_member_profile' ) { ?>  
					    <div class="form-group"  style="margin: 5px;">
					      <label for="current_password" class="col-sm-4 col-md-4 control-label">
					          Current Password(*)
					      </label>

					      <div class="col-sm-6 col-md-4 inputGroupContainer">
					          <div class="input-group">
					            <span class="input-group-addon">
					              <i class="glyphicon glyphicon-user"></i>
					            </span>
					        	<input type="text"
					        		   id="current_password"
					        		   name="current_password" 
					        		   class="typeahead form-control"
									   autocomplete="autocomplete-off"                    		   
					        		   value="">
					            </div>

					            <!-- Show errors here -->
							    <?= form_error('current_password', '<p style="color: red;">', '</p>') ?>	
					      </div>
					    </div>
					<?php } ?>
				    <div class="form-group"  style="margin: 5px;">
				      <label for="password" class="col-sm-4 col-md-4 control-label">
				          New Password
				      </label>

				      <div class="col-sm-6 col-md-4 inputGroupContainer">
				          <div class="input-group">
				            <span class="input-group-addon">
				              <i class="glyphicon glyphicon-user"></i>
				            </span>
				        	<input type="text"
				        		   id="password"
				        		   name="password" 
				        		   class="typeahead form-control"
								   autocomplete="autocomplete-off"                    		   
				        		   value="">
				            </div>

				            <!-- Show errors here -->
						    <?= form_error('password', '<p style="color: red;">', '</p>') ?>	
				      </div>
				    </div>

				    <div class="form-group"  style="margin: 5px;">
				      <label for="confirm_password" class="col-sm-4 col-md-4 control-label">
				          confirm Password
				      </label>

				      <div class="col-sm-6 col-md-4  inputGroupContainer">
				          <div class="input-group">
				            <span class="input-group-addon">
				              <i class="glyphicon glyphicon-user"></i>
				            </span>
				        	<input type="text"
				        		   id="confirm_password"
				        		   name="confirm_password" 
				        		   class="typeahead form-control"
								   autocomplete="autocomplete-off"                    		   
				        		   value="">
				            </div>

				            <!-- Show errors here -->
						    <?= form_error('confirm_password', '<p style="color: red;">', '</p>') ?>	
				      </div>
				    </div>
					<div class="row">					
					    <div class="col-sm-4 col-md-2  col-md-offset-4 col-sm-offset-2 form-actions">            
					      <button type="submit" class="btn btn-primary  btn-block"
					              name="submit" value="Submit">Submit</button>
					    </div>          
					    <div class="col-sm-4 col-md-2">            
					        <button type="submit" class="btn btn-default btn-block"  id="submit-btn"
					                name="submit" value="<?= $cancel ?>">Cancel</button>
					    </div>                      
					</div>            
          </div>

				</fieldset>
			</form>   
	</div><!--/span-->
</div><!--/row-->

