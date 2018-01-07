 				<div class="row">
 				<div class="col-md-12 ">
 				<?php
					// $user_main
					for($i = 0; $i < count($fld_group); $i++ ) {
						$key =$fld_group[$i]; 
						$findme = 'drop_down_sel'; ?>

						<?php if ( strpos($input_type[$key], $findme) === false ): ?>					
			                <div class="form-group"  style="margin: 5px;">
			                  <label for="<?= $key ?>" class="col-sm-4 col-md-4 control-label">
			                      <?= $labels[$key] ?>
			                  </label>

			                  <div class="col-sm-6 col-md-5 inputGroupContainer">
			                      <div class="input-group">
			                        <span class="input-group-addon">
			                          <i class="glyphicon glyphicon-user"></i>
			                        </span>
			                    	<input type="text"
			                    		   id="<?= $key ?>"
			                    		   name="<?= $key ?>" 
			                    		   class="typeahead form-control"
										   autocomplete="autocomplete-off"                    		   
			                    		   value="<?= $columns->$key ?>">
			                        </div>

			                        <!-- Show errors here -->
			    				  	<span class="<?= $key ?> clear_error_mess"
								  		  style="color: red; text-align: left;"></span>

			                  </div>
			                </div>
					<?php else: $pos = explode("|", $input_type[$key]); ?>  
							<div class="form-group">
							  <label for="<?= $key ?>" class="col-sm-4 col-md-4 control-label">
							  		<?= $labels[$key] ?>
 					  		  </label>
							  <div class="col-sm-6 col-md-5 inputGroupContainer">
							  	<div class="input-group" style="width: 50%; margin-left: 7px;">
			                        <span class="input-group-addon">
			                          <i class="glyphicon glyphicon-user"></i>
			                        </span>
		                            <?php
		                              $additional_dd_code = 'class="form-control"';
		                              $additional_dd_code .=' id="'.$key.'"';

		                              echo form_dropdown(
		                                    $key,
											$Select_option[ $pos[1] ],
		                                    $columns->$key, // selected option value
		                                    $additional_dd_code);
		                            ?>
	                        	</div>
							  </div>
							</div>  
						<?php endif ?>  

		            <?php } ?>
	            </div>

				<div class="col-sm-6 col-sm-offset-4 col-md-6 col-md-offset-3">
	                <ul class="list-inline">
		                <li><button type="button" 
		                            class="btn btn-default tab-button <?= $cancel ?>"
		                            >Cancel</button></li>                                                              
		                <li><button type="button"  
		                            id="<?= $submit_id ?>-<?= $update_id ?>" 
		                            class="btn btn-primary">Save Changes</button></li>
	            	</ul>
				</div>
	            </div>