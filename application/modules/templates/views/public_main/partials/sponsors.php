<?php
    $bm_pages=image_pagination( 'public/images/sponsors');
    // checkArray($bm_pages,1);
?>

      <!-- Section Breadcrumbs-->
      <section class="section parallax-container breadcrumbs-wrap" data-parallax-img="<?= base_url() ?>/public/images/bg-breadcrumbs-1.jpg">
        <div class="parallax-content breadcrumbs-custom context-dark">
          <div class="container">
            <h3 class="breadcrumbs-custom-title">Sponsors</h3>
            <ul class="breadcrumbs-custom-path">
              <li><a href="<?= base_url() ?>index.html">Home</a></li>
              <li class="active">Sponsors</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="section section-sm bg-gray-100">    
        <div class="container">
          <!-- Heading Component-->
          <article class="heading-component">
            <div class="heading-component-inner">
              <h5 class="heading-component-title">Our Sponsors
              </h5>
            </div>
          </article>

          <div class="row row-30">  

          <?php foreach ($bm_pages as $key => $sponsor_name) {
              $image_name = current_file($sponsor_name);
              $img_arr =  explode('.', $image_name);
              // echo $img_arr[0]." | ".$img_arr[1]."<br>";
          ?>
          <div class="col-sm-6 col-lg-3" style="width: 100%; max-height: : 150px;"> 
              <!-- Player Info Modern-->
              <div class="player-info-modern">
                <a class="player-info-modern-figure" href="player-page.html">
                   <img src="<?= $sponsor_name ?>"
                        alt="<?= $image_name ?>"
                        width="368" height="286"/></a>

                <div style="background-color: #35AD79; height: 25px;">
                  <div>
                    &nbsp;
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

            </div>
          </div>
        </div>
      </section>
