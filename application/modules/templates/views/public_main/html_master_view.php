<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<?= $this->load->view('html_head') ?>

  <body class="animsition-overlay">
    <div class="preloader loaded"> 
      <div class="preloader-body">
        <div class="preloader-item"></div>
      </div>
    </div>

    <!-- Page-->
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header rd-navbar-dark">
          <?= $this->load->view('html_navbar') ?>       
      </header>

      <!-- Main Content -->
      <div class="div-menu-message">
          <?php 
              $data = ( isset($columns) && !empty($columns) ) ? : null;
              $data = ( isset($columns_not_allowed) && !empty($columns_not_allowed) ) ? : array();
// quit($view_module." | ".$contents,1);

              $this->load->view( $view_module.'/'.$contents, $data );
          ?>
      </div> <!-- End Main Content -->



      <!-- Page Footer-->
          <?= $this->load->view('html_footer') ?>                            
      <!-- Modal Video-->
      <div class="modal modal-video fade" id="modal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/GRlsN4GyPxo"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="<?= base_url() ?>public/js/core.min.js"></script>
    <script src="<?= base_url() ?>public/js/script.js"></script>
  </body>
</html>


