<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      <section class="section swiper-container swiper-slider swiper-classic bg-gray-2" data-loop="true" data-autoplay="false" data-simulate-touch="false" data-lazy-loading="true" data-slide-effect="fade">
        <div class="swiper-wrapper">
          <div class="swiper-slide" data-slide-bg="<?= base_url() ?>public/images/site-img/TriviaRevolution_WebSlider.jpg">
            <div class="container">
              <div class="swiper-slide-caption">
                
<!--            <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Trivia Revolution.</h1>
                <h4 data-caption-animate="fadeInUp" data-caption-delay="200">Not your average trivia.</h4>
 -->
                <!-- <a class="button button-gray-outline" data-caption-animate="fadeInUp" data-caption-delay="300" href="about-us.html">Read More</a> -->
                
              </div>
            </div>
          </div>
<!--           <div class="swiper-slide" data-slide-bg="<?= base_url() ?>public/images/landing-soccer-slider-1-slide-2-1920x671.jpg">
            <div class="container">
              <div class="swiper-slide-caption">
                <h1 data-caption-animate="fadeInUp" data-caption-delay="100">We are <br> pros</h1>
                <h4 data-caption-animate="fadeInUp" data-caption-delay="200">In everything concerning soccer</h4><a class="button button-gray-outline" data-caption-animate="fadeInUp" data-caption-delay="300" href="about-us.html">Read More</a>
              </div>
            </div>
          </div>
        </div> -->
        <div class="swiper-button swiper-button-prev"></div>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </section>
      
      <section class="section section-md bg-gray-100">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-12 owl-carousel-outer-navigation">
              <!-- Heading Component-->
              <article class="heading-component">
                <div class="heading-component-inner">
                  <h5 class="heading-component-title">Latest News
                  </h5>
                  <div class="owl-carousel-arrows-outline">
                    <div class="owl-nav">
                      <button class="owl-arrow owl-arrow-prev"></button>
                      <button class="owl-arrow owl-arrow-next"></button>
                    </div>
                  </div>
                </div>
              </article>

              <!-- Owl Carousel-->
              <div class="owl-carousel" data-items="1" data-md-items="2" data-lg-items="3" data-dots="false" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-nav-custom=".owl-carousel-outer-navigation">
                <!-- Post Carmen-->
                <article class="post-carmen"><img src="<?= base_url() ?>public/images/news-5-2-369x343.jpg" alt="" width="369" height="343"/>
                  <div class="post-carmen-header">
                    <!-- Badge-->
                    <div class="badge badge-secondary">The Team
                    </div>
                  </div>
                  <div class="post-carmen-main">
                    <h4 class="post-carmen-title"><a href="blog-post.html">Daily top 10 news: Chelsea, world cup 2017 &amp; more</a></h4>
                    <div class="post-carmen-meta">
                      <div class="post-carmen-time"><span class="icon mdi mdi-clock"></span>
                        <time datetime="2017">April 15, 2017</time>
                      </div>
                      <div class="post-carmen-comment"><span class="icon mdi mdi-comment-outline"></span><a href="#">345</a></div>
                      <div class="post-carmen-view"><span class="icon fl-justicons-visible6"></span>234
                      </div>
                    </div>
                  </div>
                </article>
                <!-- Post Carmen-->
                <article class="post-carmen"><img src="<?= base_url() ?>public/images/news-5-3-369x343.jpg" alt="" width="369" height="343"/>
                  <div class="post-carmen-header">
                    <!-- Post Video Button--><a class="post-video-button" href="#modal1" data-toggle="modal"><span class="icon material-icons-play_arrow"></span></a>
                  </div>
                  <div class="post-carmen-main">
                    <h4 class="post-carmen-title"><a href="blog-post.html">Liverpool must stop Coutinho from joining Barcelona</a></h4>
                    <div class="post-carmen-meta">
                      <div class="post-carmen-time"><span class="icon mdi mdi-clock"></span>
                        <time datetime="2017">April 15, 2017</time>
                      </div>
                      <div class="post-carmen-comment"><span class="icon mdi mdi-comment-outline"></span><a href="#">345</a></div>
                      <div class="post-carmen-view"><span class="icon fl-justicons-visible6"></span>234
                      </div>
                    </div>
                  </div>
                </article>
                <!-- Post Carmen-->
                <article class="post-carmen"><img src="<?= base_url() ?>public/images/news-5-4-369x343.jpg" alt="" width="369" height="343"/>
                  <div class="post-carmen-header">
                    <!-- Badge-->
                    <div class="badge badge-primary">The League
                    </div>
                  </div>
                  <div class="post-carmen-main">
                    <h4 class="post-carmen-title"><a href="blog-post.html">Why would Messi swap Barca for Manchester?</a></h4>
                    <div class="post-carmen-meta">
                      <div class="post-carmen-time"><span class="icon mdi mdi-clock"></span>
                        <time datetime="2017">April 15, 2017</time>
                      </div>
                      <div class="post-carmen-comment"><span class="icon mdi mdi-comment-outline"></span><a href="#">345</a></div>
                      <div class="post-carmen-view"><span class="icon fl-justicons-visible6"></span>234
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Upcoming Match
                    </h5><a class="button button-xs button-gray-outline" href="sport-elements.html">Calendar</a>
                  </div>
                </article>

                <!-- Game Result Bug-->
                <article class="game-result">
                  <div class="game-info game-info-creative">
                    <p class="game-info-subtitle">Real Stadium - 
                      <time datetime="08:30"> 08:30 PM</time>
                    </p>
                    <h3 class="game-info-title">Champions league semi-final 2017</h3>
                    <div class="game-info-main">
                      <div class="game-info-team game-info-team-first">
                        <figure><img src="<?= base_url() ?>public/images/team-atletico-100x100.png" alt="" width="100" height="100"/>
                        </figure>
                        <div class="game-result-team-name">Atletico</div>
                        <div class="game-result-team-country">Italy</div>
                      </div>
                      <div class="game-info-middle game-info-middle-vertical">
                        <time class="time-big" datetime="2017-04-17"><span class="heading-3">Fri 19</span> May 2017
                        </time>
                        <div class="game-result-divider-wrap"><span class="game-info-team-divider">VS</span></div>
                        <div class="group-sm">
                          <div class="button button-sm button-share-outline">Share
                            <ul class="game-info-share">
                              <li class="game-info-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              <li class="game-info-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                            </ul>
                          </div><a class="button button-sm button-primary" href="#">Buy tickets</a>
                        </div>
                      </div>
                      <div class="game-info-team game-info-team-second">
                        <figure><img src="<?= base_url() ?>public/images/team-bavaria-fc-113x106.png" alt="" width="113" height="106"/>
                        </figure>
                        <div class="game-result-team-name">Celta Vigo</div>
                        <div class="game-result-team-country">Spain</div>
                      </div>
                    </div>
                  </div>
                  <div class="game-info-countdown">
                    <div class="countdown countdown-bordered" data-type="until" data-time="31 Dec 2018 16:00" data-format="dhms" data-style="short"></div>
                  </div>
                </article>
              </div>
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Popular news
                    </h5><a class="button button-xs button-gray-outline" href="news-1.html">All news</a>
                  </div>
                </article>

                <div class="row row-30">
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-2-1-368x287.jpg" alt="" width="368" height="287"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Sadio mane still makes a difference, sam wilson admits</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Liverpool would love to welcome Philippe Coutinho back, but Sadio Mane is carrying...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-2-2-368x287.jpg" alt="" width="368" height="287"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Robertson's decent debut at european cup 2017</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Robertson, in his first Anfield outing as a Liverpool player, looked assured at left-back...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Gloria-->
                    <article class="post-gloria"><img src="<?= base_url() ?>public/images/post-gloria-1-769x429.jpg" alt="" width="769" height="429"/>
                      <div class="post-gloria-main">
                        <h3 class="post-gloria-title"><a href="blog-post.html">Premier League Winners and Losers: a quick look</a></h3>
                        <div class="post-gloria-meta">
                          <!-- Badge-->
                          <div class="badge badge-primary">The League
                          </div>
                          <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <div class="post-gloria-text">
                          <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                          <p>During this year’s premier league, we are glad to announce that there are new players who are...</p>
                        </div><a class="button" href="blog-post.html">Read more</a>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-2-3-368x287.jpg" alt="" width="368" height="287"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Pochettino and ‘gaffer’s son’ Rose estranged – reports</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Danny Rose and Mauricio Pochettino were once so close that he was nicknamed “the gaffer’s...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <!-- Post Future-->
                    <article class="post-future"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-2-4-368x287.jpg" alt="" width="368" height="287"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Coutinho’s camp: It was all Barca’s fault and we can prove it</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-secondary">The Team
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Philippe Coutinho is reportedly seeking clear-the-air talks with Liverpool after...</p>
                        </div>
                        <div class="post-future-footer group-flex group-flex-xs"><a class="button button-gray-outline" href="blog-post.html">Read more</a>
                          <div class="post-future-share">
                            <div class="inline-toggle-parent">
                              <div class="inline-toggle icon material-icons-share"></div>
                              <div class="inline-toggle-element">
                                <ul class="list-inline">
                                  <li>Share</li>
                                  <li><a class="icon fa-facebook" href="#"></a></li>
                                  <li><a class="icon fa-twitter" href="#"></a></li>
                                  <li><a class="icon fa-google-plus" href="#"></a></li>
                                  <li><a class="icon fa-instagram" href="#"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Future-->
                    <article class="post-future post-future-horizontal"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-3-1-370x325.jpg" alt="" width="370" height="325"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">Zidane: “We’re not going to change the way we play at the Calderón”</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon mdi mdi-fire"></span>
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>Back when I played football in high school, I took a fair number of hits that had me seeing stars. But my coach would just tell me to shake it…</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-12">
                    <!-- Post Future-->
                    <article class="post-future post-future-horizontal"><a class="post-future-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/news-3-2-370x325.jpg" alt="" width="370" height="325"/></a>
                      <div class="post-future-main">
                        <h4 class="post-future-title"><a href="blog-post.html">NFL Will Handle Referee Pete Morelli’s Use of Profanity Internally</a></h4>
                        <div class="post-future-meta">
                          <!-- Badge-->
                          <div class="badge badge-primary">The League
                          </div>
                          <div class="post-future-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2017">April 15, 2017</time>
                          </div>
                        </div>
                        <hr/>
                        <div class="post-future-text">
                          <p>The NFL will internally address referee Pete Morelli's recent microphone gaffe, a league spokesman said, but it does not appear Morelli...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Top Players
                    </h5><a class="button button-xs button-gray-outline" href="roster.html">See all team</a>
                  </div>
                </article>

                <div class="row row-30">
                  <div class="col-md-6">
                    <!-- Player Info Modern-->
                    <div class="player-info-modern"><a class="player-info-modern-figure" href="player-page.html"><img src="<?= base_url() ?>public/images/player-1-368x286.png" alt="" width="368" height="286"/></a>
                      <div class="player-info-modern-footer">
                        <div class="player-info-modern-number">
                          <p>05</p>
                        </div>
                        <div class="player-info-modern-content">
                          <div class="player-info-modern-title">
                            <h5><a href="player-page.html">Jack Windsor</a></h5>
                            <p>Midfielder</p>
                          </div>
                          <div class="player-info-modern-progress">
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Pass Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">80</span>
                            </article>
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Shots Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">60</span>
                            </article>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Player Info Modern-->
                    <div class="player-info-modern"><a class="player-info-modern-figure" href="player-page.html"><img src="<?= base_url() ?>public/images/player-2-368x286.png" alt="" width="368" height="286"/></a>
                      <div class="player-info-modern-footer">
                        <div class="player-info-modern-number">
                          <p>21</p>
                        </div>
                        <div class="player-info-modern-content">
                          <div class="player-info-modern-title">
                            <h5><a href="player-page.html">Joe Perkins</a></h5>
                            <p>Midfielder</p>
                          </div>
                          <div class="player-info-modern-progress">
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Pass Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">95</span>
                            </article>
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Shots Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">70</span>
                            </article>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Player Info Modern-->
                    <div class="player-info-modern"><a class="player-info-modern-figure" href="player-page.html"><img src="<?= base_url() ?>public/images/player-3-368x286.png" alt="" width="368" height="286"/></a>
                      <div class="player-info-modern-footer">
                        <div class="player-info-modern-number">
                          <p>21</p>
                        </div>
                        <div class="player-info-modern-content">
                          <div class="player-info-modern-title">
                            <h5><a href="player-page.html">David Hawkins</a></h5>
                            <p>Defender</p>
                          </div>
                          <div class="player-info-modern-progress">
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Pass Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">90</span>
                            </article>
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Shots Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">75</span>
                            </article>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Player Info Modern-->
                    <div class="player-info-modern"><a class="player-info-modern-figure" href="player-page.html"><img src="<?= base_url() ?>public/images/player-4-368x286.png" alt="" width="368" height="286"/></a>
                      <div class="player-info-modern-footer">
                        <div class="player-info-modern-number">
                          <p>21</p>
                        </div>
                        <div class="player-info-modern-content">
                          <div class="player-info-modern-title">
                            <h5><a href="player-page.html">Harry Stevenson</a></h5>
                            <p>Goalkeeper</p>
                          </div>
                          <div class="player-info-modern-progress">
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Pass Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">55</span>
                            </article>
                            <!-- Linear progress bar-->
                            <article class="progress-linear progress-bar-modern">
                              <div class="progress-header">
                                <p>Shots Acc</p>
                              </div>
                              <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                              </div><span class="progress-value">95</span>
                            </article>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Aside Block-->
            <div class="col-lg-4">
              <aside class="aside-components">
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">In the spotlight
                      </h5><a class="button button-xs button-gray-outline" href="news-1.html">All news</a>
                    </div>
                  </article>

                  <!-- List Post Classic-->
                  <div class="list-post-classic">
                                      <!-- Post Classic-->
                                      <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/blog-element-1-94x94.jpg" alt="" width="94" height="94"/></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="blog-post.html">Raheem Sterling turns the tide for Manchester</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2017">April 15, 2017</time>
                                          </div>
                                        </div>
                                      </article>
                                      <!-- Post Classic-->
                                      <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/blog-element-2-94x94.jpg" alt="" width="94" height="94"/></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="blog-post.html">Prem in 90 seconds: Chelsea's crisis is over!</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2017">April 15, 2017</time>
                                          </div>
                                        </div>
                                      </article>
                                      <!-- Post Classic-->
                                      <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/blog-element-3-94x94.jpg" alt="" width="94" height="94"/></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="blog-post.html">Good vibes back at struggling Schalke</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2017">April 15, 2017</time>
                                          </div>
                                        </div>
                                      </article>
                                      <!-- Post Classic-->
                                      <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="blog-post.html"><img src="<?= base_url() ?>public/images/blog-element-4-94x94.jpg" alt="" width="94" height="94"/></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="blog-post.html">Liverpool in desperate need of backup players</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2017">April 15, 2017</time>
                                          </div>
                                        </div>
                                      </article>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">latest Games results
                      </h5>
                    </div>
                  </article>

                  <!-- Game Result Classic-->
                  <article class="game-result game-result-classic">
                    <div class="game-result-main">
                      <div class="game-result-team game-result-team-first">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-atletico-55x55.png" alt="" width="55" height="55"/>
                        </figure>
                        <div class="game-result-team-name">Atletico</div>
                        <div class="game-result-team-country">USA</div>
                      </div>
                      <div class="game-result-middle">
                        <div class="game-result-score-wrap">
                          <div class="game-result-score game-result-team-win">2<span class="game-result-team-label game-result-team-label-top">Win</span>
                          </div>
                          <div class="game-result-score-divider">
                            <svg x="0px" y="0px" width="7px" height="21px" viewbox="0 0 7 21" enable-background="new 0 0 7 21" xml:space="preserve">
                              <g>
                                <circle cx="3.5" cy="3.5" r="3"></circle>
                                <path d="M3.5,1C4.879,1,6,2.122,6,3.5S4.879,6,3.5,6S1,4.878,1,3.5S2.122,1,3.5,1 M3.5,0C1.567,0,0,1.567,0,3.5S1.567,7,3.5,7      S7,5.433,7,3.5S5.433,0,3.5,0L3.5,0z"></path>
                              </g>
                              <g>
                                <circle cx="3.695" cy="17.5" r="3"></circle>
                                <path d="M3.695,15c1.378,0,2.5,1.122,2.5,2.5S5.073,20,3.695,20s-2.5-1.122-2.5-2.5S2.316,15,3.695,15 M3.695,14      c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5s3.5-1.567,3.5-3.5S5.628,14,3.695,14L3.695,14z"></path>
                              </g>
                            </svg>
                          </div>
                          <div class="game-result-score">1
                          </div>
                        </div>
                        <div class="game-results-status">Home</div>
                      </div>
                      <div class="game-result-team game-result-team-second">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-real-madrid-41x59.png" alt="" width="41" height="59"/>
                        </figure>
                        <div class="game-result-team-name">Real madrid</div>
                        <div class="game-result-team-country">Spain</div>
                      </div>
                    </div>
                    <div class="game-result-footer">
                      <ul class="game-result-details">
                        <li>New Yorkers Stadium</li>
                        <li>
                          <time datetime="2017-04-14">April 14, 2017</time>
                        </li>
                      </ul>
                    </div>
                  </article>
                  <!-- Game Result Classic-->
                  <article class="game-result game-result-classic">
                    <div class="game-result-main">
                      <div class="game-result-team game-result-team-first">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-bavaria-fc-56x52.png" alt="" width="56" height="52"/>
                        </figure>
                        <div class="game-result-team-name">Bavaria FC</div>
                        <div class="game-result-team-country">Germany</div>
                      </div>
                      <div class="game-result-middle">
                        <div class="game-result-score-wrap">
                          <div class="game-result-score">2
                          </div>
                          <div class="game-result-score-divider">
                            <svg x="0px" y="0px" width="7px" height="21px" viewbox="0 0 7 21" enable-background="new 0 0 7 21" xml:space="preserve">
                              <g>
                                <circle cx="3.5" cy="3.5" r="3"></circle>
                                <path d="M3.5,1C4.879,1,6,2.122,6,3.5S4.879,6,3.5,6S1,4.878,1,3.5S2.122,1,3.5,1 M3.5,0C1.567,0,0,1.567,0,3.5S1.567,7,3.5,7      S7,5.433,7,3.5S5.433,0,3.5,0L3.5,0z"></path>
                              </g>
                              <g>
                                <circle cx="3.695" cy="17.5" r="3"></circle>
                                <path d="M3.695,15c1.378,0,2.5,1.122,2.5,2.5S5.073,20,3.695,20s-2.5-1.122-2.5-2.5S2.316,15,3.695,15 M3.695,14      c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5s3.5-1.567,3.5-3.5S5.628,14,3.695,14L3.695,14z"></path>
                              </g>
                            </svg>
                          </div>
                          <div class="game-result-score game-result-team-win">3<span class="game-result-team-label game-result-team-label-top">Win</span>
                          </div>
                        </div>
                        <div class="game-results-status">Away</div>
                      </div>
                      <div class="game-result-team game-result-team-second">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-atletico-55x55.png" alt="" width="55" height="55"/>
                        </figure>
                        <div class="game-result-team-name">Atletico</div>
                        <div class="game-result-team-country">USA</div>
                      </div>
                    </div>
                    <div class="game-result-footer">
                      <ul class="game-result-details">
                        <li>New Yorkers Stadium</li>
                        <li>
                          <time datetime="2017-04-14">April 14, 2017</time>
                        </li>
                      </ul>
                    </div>
                  </article>
                  <!-- Game Result Classic-->
                  <article class="game-result game-result-classic">
                    <div class="game-result-main">
                      <div class="game-result-team game-result-team-first">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-atletico-55x55.png" alt="" width="55" height="55"/>
                        </figure>
                        <div class="game-result-team-name">Atletico</div>
                        <div class="game-result-team-country">USA</div>
                      </div>
                      <div class="game-result-middle">
                        <div class="game-result-score-wrap">
                          <div class="game-result-score game-result-team-win">4<span class="game-result-team-label game-result-team-label-top">Win</span>
                          </div>
                          <div class="game-result-score-divider">
                            <svg x="0px" y="0px" width="7px" height="21px" viewbox="0 0 7 21" enable-background="new 0 0 7 21" xml:space="preserve">
                              <g>
                                <circle cx="3.5" cy="3.5" r="3"></circle>
                                <path d="M3.5,1C4.879,1,6,2.122,6,3.5S4.879,6,3.5,6S1,4.878,1,3.5S2.122,1,3.5,1 M3.5,0C1.567,0,0,1.567,0,3.5S1.567,7,3.5,7      S7,5.433,7,3.5S5.433,0,3.5,0L3.5,0z"></path>
                              </g>
                              <g>
                                <circle cx="3.695" cy="17.5" r="3"></circle>
                                <path d="M3.695,15c1.378,0,2.5,1.122,2.5,2.5S5.073,20,3.695,20s-2.5-1.122-2.5-2.5S2.316,15,3.695,15 M3.695,14      c-1.933,0-3.5,1.567-3.5,3.5s1.567,3.5,3.5,3.5s3.5-1.567,3.5-3.5S5.628,14,3.695,14L3.695,14z"></path>
                              </g>
                            </svg>
                          </div>
                          <div class="game-result-score">1
                          </div>
                        </div>
                        <div class="game-results-status">Home</div>
                      </div>
                      <div class="game-result-team game-result-team-second">
                        <figure class="game-result-team-figure game-result-team-figure-big"><img src="<?= base_url() ?>public/images/team-sevilla-57x46.png" alt="" width="57" height="46"/>
                        </figure>
                        <div class="game-result-team-name">Sevilla</div>
                        <div class="game-result-team-country">Spain</div>
                      </div>
                    </div>
                    <div class="game-result-footer">
                      <ul class="game-result-details">
                        <li>New Yorkers Stadium</li>
                        <li>
                          <time datetime="2017-04-14">April 14, 2017</time>
                        </li>
                      </ul>
                    </div>
                  </article>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Follow us
                      </h5>
                    </div>
                  </article>

                  <!-- Buttons Media-->
                  <div class="group-sm group-flex"><a class="button-media button-media-facebook" href="#">
                      <h4 class="button-media-title">50k</h4>
                      <p class="button-media-action">Like<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-facebook"></span></a><a class="button-media button-media-twitter" href="#">
                      <h4 class="button-media-title">120k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-twitter"></span></a><a class="button-media button-media-google" href="#">
                      <h4 class="button-media-title">15k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-google"></span></a><a class="button-media button-media-instagram" href="#">
                      <h4 class="button-media-title">85k</h4>
                      <p class="button-media-action">Follow<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-instagram"></span></a></div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Our Awards
                      </h5>
                    </div>
                  </article>

                  <!-- Owl Carousel-->
                  <div class="owl-carousel owl-carousel-dots-modern awards-carousel" data-items="1" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="0" data-mouse-drag="true">
                                      <!-- Awards Item-->
                                      <div class="awards-item"> 
                                        <div class="awards-item-main">
                                          <h4 class="awards-item-title"><span class="text-accent">World</span>Champions
                                          </h4>
                                          <div class="divider"></div>
                                          <h5 class="awards-item-time">December 2014</h5>
                                        </div>
                                        <div class="awards-item-aside"> <img src="<?= base_url() ?>public/images/thumbnail-minimal-1-67x147.png" alt="" width="67" height="147"/>
                                        </div>
                                      </div>
                                      <!-- Awards Item-->
                                      <div class="awards-item"> 
                                        <div class="awards-item-main">
                                          <h4 class="awards-item-title"><span class="text-accent">Best</span>Forward
                                          </h4>
                                          <div class="divider"></div>
                                          <h5 class="awards-item-time">June 2015</h5>
                                        </div>
                                        <div class="awards-item-aside"> <img src="<?= base_url() ?>public/images/thumbnail-minimal-2-68x126.png" alt="" width="68" height="126"/>
                                        </div>
                                      </div>
                                      <!-- Awards Item-->
                                      <div class="awards-item"> 
                                        <div class="awards-item-main">
                                          <h4 class="awards-item-title"><span class="text-accent">Best</span>Coach
                                          </h4>
                                          <div class="divider"></div>
                                          <h5 class="awards-item-time">November 2016</h5>
                                        </div>
                                        <div class="awards-item-aside"> <img src="<?= base_url() ?>public/images/thumbnail-minimal-3-73x135.png" alt="" width="73" height="135"/>
                                        </div>
                                      </div>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Standings
                      </h5><a class="button button-xs button-gray-outline" href="standings.html">Full Standings</a>
                    </div>
                  </article>

                  <!-- Table team-->
                  <div class="table-custom-responsive">
                    <table class="table-custom table-standings table-classic">
                      <thead>
                        <tr>
                          <th colspan="2">Team Position</th>
                          <th>W</th>
                          <th>L</th>
                          <th>PTS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>1</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-atletico-37x37.png" alt="" width="37" height="37"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Atletico</div>
                              <div class="team-country">USA</div>
                            </div>
                          </td>
                          <td>153</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>2</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-sevilla-45x35.png" alt="" width="45" height="35"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Sevilla</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>120</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>3</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-real-madrid-29x43.png" alt="" width="29" height="43"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Real Madrid</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>100</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>4</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-celta-vigo-37x34.png" alt="" width="37" height="34"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Celta Vigo</div>
                              <div class="team-country">Italy</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>5</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-barcelona-36x31.png" alt="" width="36" height="31"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Barcelona</div>
                              <div class="team-country">Spain</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                        <tr>
                          <td><span>6</span></td>
                          <td class="team-inline">
                            <div class="team-figure"><img src="<?= base_url() ?>public/images/team-bavaria-fc-39x37.png" alt="" width="39" height="37"/>
                            </div>
                            <div class="team-title">
                              <div class="team-name">Bavaria FC</div>
                              <div class="team-country">Germany</div>
                            </div>
                          </td>
                          <td>98</td>
                          <td>30</td>
                          <td>186</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Gallery
                      </h5>
                    </div>
                  </article>

                  <article class="instafeed" data-instafeed-tagname="tm_63853_football" data-instafeed-get="tagged" data-instafeed-sort="least-liked" data-lightgallery="group">
                    <div class="row row-10 row-narrow">
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                      <div class="col-6 col-sm-4 col-md-6 col-lg-4" data-instafeed-item=""><a class="thumbnail-creative" data-lightgallery="item" href="#" data-images-standard_resolution-url="href"><img src="<?= base_url() ?>public/images/_blank.png" alt="" data-images-thumbnail-url="src"/>
                          <div class="thumbnail-creative-overlay"></div></a>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Team Stats
                      </h5>
                    </div>
                  </article>

                  <div class="table-custom-responsive">
                    <table class="table-custom table-custom-bordered table-team-statistic">
                      <tr>
                        <td>
                          <p class="team-statistic-counter">109</p>
                          <p class="team-statistic-title">Points Per Game</p>
                        </td>
                        <td>
                          <p class="team-statistic-counter">65</p>
                          <p class="team-statistic-title">Rebounds Per Game</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="team-statistic-counter">23.6</p>
                          <p class="team-statistic-title">Assists Per Game</p>
                        </td>
                        <td>
                          <p class="team-statistic-counter">102</p>
                          <p class="team-statistic-title">Points Allowed</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="aside-component">
                  <div class="owl-carousel-outer-navigation">
                    <!-- Heading Component-->
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Shop
                        </h5>
                        <div class="owl-carousel-arrows-outline">
                          <div class="owl-nav">
                            <button class="owl-arrow owl-arrow-prev"></button>
                            <button class="owl-arrow owl-arrow-next"></button>
                          </div>
                        </div>
                      </div>
                    </article>

                    <!-- Owl Carousel-->
                    <div class="owl-carousel" data-items="1" data-dots="false" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-nav-custom=".owl-carousel-outer-navigation">
                      <article class="product">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon material-icons-whatshot"></span>
                          </div>
                          <div class="product-figure"><img src="<?= base_url() ?>public/images/shop/product-small-1.png" alt=""/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px;">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              </ul>
                            </div><a class="product-button fl-bigmug-line-shopping202" href="shopping-cart.html" style="font-size: 26px;"></a><a class="product-button fl-bigmug-line-zoom60" href="images/shop/product-1-original.jpg" data-lightgallery="item" style="font-size: 25px;"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="product-page.html">Nike hoops elite backpack</a></h6>
                          <div class="product-price"><span class="product-price-old">$400</span><span class="heading-6 product-price-new">$290</span>
                          </div>
                          <ul class="product-rating">
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star_half"></span></li>
                          </ul>
                        </footer>
                      </article>
                      <article class="product">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-shop">new
                          </div>
                          <div class="product-figure"><img src="<?= base_url() ?>public/images/shop/product-small-2.png" alt=""/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px;">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              </ul>
                            </div><a class="product-button fl-bigmug-line-shopping202" href="shopping-cart.html" style="font-size: 26px;"></a><a class="product-button fl-bigmug-line-zoom60" href="images/shop/product-2-original.jpg" data-lightgallery="item" style="font-size: 25px;"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="product-page.html">Nike Air Zoom Pegasus</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">$290</span>
                          </div>
                          <ul class="product-rating">
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star_half"></span></li>
                          </ul>
                        </footer>
                      </article>
                      <article class="product">
                        <header class="product-header">
                          <div class="product-figure"><img src="<?= base_url() ?>public/images/shop/product-small-3.png" alt=""/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px;">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-facebook" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-instagram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-twitter" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-google-plus" href="#"></a></li>
                              </ul>
                            </div><a class="product-button fl-bigmug-line-shopping202" href="shopping-cart.html" style="font-size: 26px;"></a><a class="product-button fl-bigmug-line-zoom60" href="images/shop/product-3-original.jpg" data-lightgallery="item" style="font-size: 25px;"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="product-page.html">Nike distressed baseball hat</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">$290</span>
                          </div>
                          <ul class="product-rating">
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star"></span></li>
                            <li><span class="material-icons-star_half"></span></li>
                          </ul>
                        </footer>
                      </article>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </section>
