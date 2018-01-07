<?php defined('BASEPATH') OR exit('No direct script access allowed');
  if( isset( $default['flash']) ) {
    echo $this->session->flashdata('item');
    unset($_SESSION['item']);
  }
  $arrImgNames = array();
  $display_row =  $this->uri->segment(2) =='member_upload' ? "none" : "block";
  $set_dir_path =  $this->uri->segment(2) =='member_upload' ? "1" : "2";
  $return_url = $this->uri->segment(2) =='member_upload' ? "youraccount/welcome" : "site_users/update_user/".$member_id;
?>

<!-- "../public/images/annon_user.png"  -->
<div class="row" style="display : <?= $display_row ?>;">
  <div class="col-md-12">
      <?= $alert_mess ?>
  </div>

  <div class="col-md-2" style="border: 0px solid red; ">
    <img src="<?= base_url().'upload/'.$user_avatar ?>"
         class="img-thumbnail"
         style="width: 175px; height:150px;"
         alt="avatar"
         id="previewImg">
        <h2 style="margin-top: -5px;"><small><span  id="fullname">
            <?= $fullname.' [ '.$member_id .' ]' ?></span></small></h2>
  </div>
  <div class="col-md-10" style="border: 0px solid red; ">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
  </div>
</div>

<div class="row">
    <form id="upload-image-form" enctype="multipart/form-data">

	<div class="col-md-12">
			<table class="table table-striped table-bordered" cellspacing="0" width="90%">
			  <thead>
				  <tr>
					  <th style="width: 15%;">Image</th>
					  <th style="width: 20%;">Required Documents</th>
					  <th style="width: 20%;">Image Name</th>
					  <th style="width: 10%;">Upload Date</th>
					  <th style="width: 30%;">Actions</th>
				  </tr>
			  </thead>
			  <tbody>
					<?php
						$x = 0;
						foreach( $image_list as $key => $role ) {
							$image_recno = $users_images[$role][0];
							$image_name  = $users_images[$role][1];

			        if(!empty($users_images[$role][1]))
			                   $arrImgNames[] = $users_images[$role][1];

							$show_img    = $image_name ? 'upload/'.$users_images[$role][2]: "public/images/list-default-thumb.png";
							$create_date = $users_images[$role][3] ? convert_timestamp( $users_images[$role][3], 'datepicker_us') : '';

              $pre_upload = $image_name == '' ? "block" : "none";
              $completed_upload = $pre_upload == "block" ? "none" : "block";
					?>
						<tr>
							<td>
								<img src="<?= base_url().$show_img ?>"
								     class = "img-responsive"
								     id="previewImg_<?= $x ?>"
								     style="width: 100%;">
							</td>

							<td class="right"><?= $role ?>
                  <input type="hidden" name="role[]" id="role_<?= $x ?>"
                         value="<?= $role.'_'.$key ?>" />
              </td>
							<td class="right" id="image_name_<?= $x ?>"><?= $image_name;  ?></td>
							<td class="right" id="image_date_<?= $x ?>"><?= $create_date;  ?></td>
							<td class="right">

                <!-- upload file input -->
                <div id="pre_upload_<?= $x ?>" style="display:<?= $pre_upload ?>" >
                        <input type="file" name="file[]" id="imageFile_<?= $x ?>" />
                </div>
                <!-- upload file input -->

                <div id="completed_upload_<?= $x ?>" style="display:<?= $completed_upload ?>">
                    <a href="#" >
                        <button class="btn btn-danger btn-sm"
                                id="removeImg_<?= $x ?>"
                                value="<?= $image_recno ?>"
                                type="button"
                                onClick="javascript: remove(this)"
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                Remove
                        </button>
                    </a>
                </div>
                <div id="confirm_upload_<?= $x ?>" style="display:none">
                      <a href="#" >
                          <button class="btn btn-sm btn-primary"
                                  id="upload-button_<?= $x ?>"
                                  type="submit"
                                  onClick="javascript: upload_image(this)">Upload image
                          </button>
                      </a>
                      <a href="#" >
                         <button  class="btn btn-sm btn-default"
                                  id="cancelImg_<?= $x ?>"
                                  type="button"
                                  onClick="javascript: cancel(this) ">Cancel</button>
                      </a>
                </div>
       					<div id="message_<?= $x ?>"></div>
							</td>
						</tr>
			    	<?php $x++; } ?>

<input type="hidden" name="member_id" id="member_id"
       value="<?= $member_id ?>" />
<input type="hidden" name="total_boxes" id="total_boxes"
       value="<?= count($image_list) ?>" />
<input type="hidden" name="dbf_images" id="dbf_images"
       value='<?= json_encode($arrImgNames) ?>' >
<input type="hidden" name="set_dir_path" id="set_dir_path"
              value='<?= $set_dir_path ?>' >

			  </tbody>
		  </table>

	</div><!--/span-->
	</form>
</div><!--/row-->

<div class="row">
<div class="col-md-12 ">
  <!-- use bootstrap alert codes: warning, danger etc. -->
  <a href="<?= base_url().$return_url ?>">
    <button type="button" class="btn btn-default tab-button">Return</button></a>
</div>
</div>
