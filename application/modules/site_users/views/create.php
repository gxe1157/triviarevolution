
<?php
	$form_location = base_url().$this->uri->segment(1)."/update_user/".$update_id;
  $show_buttons = true;

  $user_form = $mode == 'member_profile' ? 'style="margin-top: 15px;"' : null;

?>


<h2 style="margin-top: -10px;"><small><?= $default['page_header'] ?></small></h2>
<!-- "../public/images/annon_user.png"  -->
<div class="row">
  <div class="col-md-12">
    <?php
        if( $default['is_deleted'] ){
          $show_buttons = false;
          echo '<div class="col-md-12 alert alert-danger">
                    <strong>Alert!</strong> This user account has been Deleted.
                </div>';      
        } else if( $status == 2 ) {
          echo '<div class="col-md-12 alert alert-warning">
                    <strong>Alert!</strong> This user account has been Suspened.
                </div>';      
        }             
    ?>      
    </div> <!-- // col-md-12 -->

    <?php if( $mode == 'admin_member_profile' ) { ?>  
      <div class="col-md-3">
        <img src="<?= base_url().'upload/'.$user_avatar ?>"
             class="img-responsive img-thumbnail"
             style="width: 90%;"
             alt="avatar"  
             id="previewImg">
            <h2 style="margin-top: -5px;">
              <small><?= $fullname.' [ '.$member_id .' ]' ?></small>
            </h2>
      </div>     
      <div class="col-md-9">
        <?php if( isset( $default['flash']) ): ?>
                  echo $this->session->flashdata('item');
                  unset($_SESSION['item']);
        <?php endif;?>

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
      </div>   
    <?php }; ?>
  </div>  <!-- // row -->
    <!-- form -->
<div class="row" <?= $user_form ?> >    
  <div class="col-md-12">
    <form id="users_admin" class="form-horizontal"
          method="post" action="<?= $form_location ?>" >  
          <!-- Nav tabs -->
          <div class="card">
            <ul class="nav nav-tabs nav-clr" role="tablist">
              <li role="presentation" class="active"><a href="#user_main" aria-controls="user" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>User</span></a></li>

              <li role="presentation" ><a href="#user_address" aria-controls="Address" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Home Address</span></a></li>

              <li role="presentation" ><a href="#user_mail_to" aria-controls="Mail_Address" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Mail Address</span></a></li>

              <li role="presentation"><a href="#user_info" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>Profile</span></a></li>

              <li role="presentation"><a href="#user_employment_le" aria-controls="user_employment_le" role="tab" data-toggle="tab"><i class="fa fa-plus-square-o"></i>  <span>Law Enforcement Employment</span></a></li>

              <li role="presentation"><a href="#user_employment_prv_sector" aria-controls="user_employment_prv_sector" role="tab" data-toggle="tab"><i class="fa fa-plus-square-o"></i>
                <span>Private Sector Employment</span></a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="user_main">
                <?php 
                  $data['fld_group'] = $user_main;
                  $data['submit_id']  = 'submit-user_main';
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="user_address">
                <?php 
                  $data['fld_group'] = $user_address;
                  $data['submit_id']  = 'submit-user_address';              
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="user_mail_to">
                <?php 
                  $data['fld_group'] = $user_mail_to;
                  $data['submit_id']  = 'submit-user_mail_to';                            
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="user_info">
                <?php 
                  $data['fld_group'] = $user_info;
                  $data['submit_id']  = 'submit-user_info';                            
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="user_employment_le">
                <?php 
                  $data['fld_group'] = $user_employment_le;
                  $data['submit_id']  = 'submit-user_employment_le';                            
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="user_employment_prv_sector">
                <?php 
                  $data['fld_group'] = $user_employment_prv_sector;
                  $data['submit_id']  = 'submit-user_employment_prv_sector';                            
                  $this->load->view( 'create_partial', $data);
                ?>
              </div>
            </div> <!-- Tab panes -->

          </div> <!-- card end -->
    </form>
    <!-- //form -->
  </div>  
</div> <!-- // end row -->

<div class="row">
<div class="col-md-12" style="margin-top: -15px;" >
  <?php if( is_numeric($update_id) && $show_buttons && ($mode == 'admin_member_profile') ): ?>
    <!-- use bootstrap alert codes: warning, danger etc. -->
    <a class ="btnConfirm" id="reset_pswrd-warning"
       href="<?= base_url().$this->uri->segment(1) ?>/update_password/<?= $update_id ?>">
      <button type="button" class="btn btn-primary ">Reset Password</button></a>
   
    <?php if($status == 2): ?>
      <a href="<?= base_url().$this->uri->segment(1) ?>/change_account_status/<?= $update_id ?>/1">
        <button type="button" class="btn btn-primary">Re-activate Account</button></a>
    <?php else: ?>    
      <a href="<?= base_url().$this->uri->segment(1) ?>/change_account_status/<?= $update_id ?>/2">      
        <button type="button" class="btn btn-primary">Suspend Account</button></a>
    <?php endif; ?>    


    <a href="<?= base_url().$this->uri->segment(1) ?>/update_password/<?= $update_id ?>">
      <button type="button" class="btn btn-primary tab-button">Payments</button></a>

    <a href="<?= base_url().$this->uri->segment(1) ?>/manage_uploads/<?= $update_id ?>">
      <button type="button" class="btn btn-info tab-button">Uploaded Image</button></a>


    <a class ="btnConfirm " id="delete-danger"
       href="<?= base_url().$this->uri->segment(1) ?>/delete/<?= $update_id ?>/<?= $default['username'] ?>">
      <button type="button" class="btn btn-danger">Delete Account</button></a>
  <?php endif ?>   
</div>
</div> <!-- row end -->

