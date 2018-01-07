
<div class="row">
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
</div>

