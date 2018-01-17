<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
    ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      text-align: right;
    }

    ul.lt {
      text-align: left;
    }

    li {
      padding-right: .6em;
    }

    .rd-navbar-search {
      display: block;
      border: 0px #fff solid;
    }  
</style>

  <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" >
<!--            data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px" data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" -->

            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel-inner container">
                <div class="rd-navbar-collapse rd-navbar-panel-item rd-navbar-panel-item-left">
                  <!-- Owl Carousel-->
                  <p>left top</p>
                </div>
                <div class="rd-navbar-panel-item rd-navbar-panel-item-right" >
                    <div>
                      <form class="navbar-form" role="search">
                      <div class="input-group" style="height: 40px;">
                          <input type="text" class="form-control" placeholder="Enter your search request here..." name="q">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"  aria-hidden="true"></i></button>
                          </div>
                      </div>
                      </form>
                    </div>
                    </form>

                </div>
                <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
              </div>
            </div>

            <div class="rd-navbar-main">
              <div class="rd-navbar-main-top">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand link-circle" href="index.html"><img class="brand-logo " src="<?= base_url() ?>public/images/site-img/site_logo.png" alt="" width="129" height="129"/></a>
                  </div>
                  <!-- RD Navbar List-->
                  <div class="rd-navbar-list">
<!--                         <ul class="list-inline lt">
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-1-inverse-75x42.png" alt="" width="75" height="42"/></a></li>
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-2-inverse-78x41.png" alt="" width="78" height="41"/></a></li>
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-3-inverse-65x44.png" alt="" width="65" height="44"/></a></li>

                        </ul>
 -->
                  </div>

                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search">
                    <div>

<!--                         <ul class="list-inline rt" >
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-1-inverse-75x42.png" alt="" width="75" height="42"/></a></li>
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-2-inverse-78x41.png" alt="" width="78" height="41"/></a></li>
                          <li><a class="rd-navbar-list-link" href="#"><img src="<?= base_url() ?>public/images/partners-3-inverse-65x44.png" alt="" width="65" height="44"/></a></li>

                        </ul>
 -->                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-main-bottom rd-navbar-darker">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav"> 
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">About Us</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url() ?>About-Us">About Us</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url() ?>Sponsors">Sponsors</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="<?= base_url() ?>Gallery">Gallery</a>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="<?= base_url() ?>schedule">Calender</a>
                    </li>

                    <li class="rd-nav-item"><a class="rd-nav-link" href="#">Staff</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-menu rd-navbar-dropdown">
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url()?>Current-Staff">Current Staff</a></li>
                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?= base_url() ?>Join-The-Revolution">Join The Revolution</a></li>
                      </ul>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="<?= base_url() ?>Contact-Us">Contact Us</a>
                    </li>

                  </ul>
                  <div class="rd-navbar-main-element">
                    <ul class="list-inline list-inline-sm">
                      <li><a class="icon icon-xs icon-light fa fa-facebook" href="#"></a></li>
                      <li><a class="icon icon-xs icon-light fa fa-twitter" href="#"></a></li>
                      <li><a class="icon icon-xs icon-light fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon icon-xs icon-light fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
      </div>