<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
         <div class="">
            <div class="row">
               <div class="col-md-3">

                   <p class="st" style="display:none"><a title="Home" href='<?php echo route_to('/') ?>'><i class="fa fa-home">&nbsp;</i></a>&raquo;&nbsp;<a title="Google Trends" href="<?= route_to('gogole_trends') ?>">Google Trends</a> &raquo;&nbsp;India United states of america</p>

                   <div class="search-box">
                     <input class="form-control brdernone" name="tools_search" id="search-tools" class="search-tool-holder" placeholder="Search Country..." type="text" onkeyup="return myFunc()" /><i class="fa fa-search"></i>
                   </div>
                    <?php 
                      if($countries->getNumRows()):
                         echo '<ul class="list-group-list" id="countries_list">';
                         $i = 0;
                         foreach ($countries->getResult() as $country):
                         $cls = $i % 2 == 0 ? 'bggry' : '';
                         echo '<li class="list-group-item '.$cls.'"><i aria-hidden="true" class=\'fa fa-map-marker\'>&nbsp;</i><a itemprop="url" href="'.route_to('google_trends_country', $country->alias).'">'.$country->title.'</a></li>'; 
                         $i++;
                         endforeach;
                         echo '</ul>';
                       endif;
                   ?>
                  
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <!-- Ad 7 -->
                  <ins class="adsbygoogle"
                     style="display:inline-block;width:270px;height:600px"
                     data-ad-client="ca-pub-9716398444039739"
                     data-ad-slot="5997201134"></ins>
                  <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
               </div>
               <div class="col-md-9">
                  <!-- content -->
                  <div class="row mrgnbtm15">
                     <div class="col-md-12 mrgnbtm15">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Ad 1 -->
                        <ins class="adsbygoogle"
                           style="display:block"
                           data-ad-client="ca-pub-9716398444039739"
                           data-ad-slot="5095344703"
                           data-ad-format="auto"></ins>
                        <script>
                           (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                     </div>
                  </div>


                  <div class="sec-head-row text-center">
                     <div class="sec-head">
                        <h1 class="page-title" itemprop="headline"><?php echo $name; ?> Google Trends <span style="color:green;font-size:16px;"><?php echo date("M, d Y"); ?></span></h1>
                     </div>
                  </div>


                  <?php
                   $no_image = loadImage('no_image.png');
                   if(count($results)):
                     foreach($results as $trend):
                  ?>
                  <div class="row mrgnbtm35">
                     <div class="col-md-12">
                     <div class="row shadow-box">
                           <div class="col-md-3 imgset">
                              <a target="_blank" href="<?php echo $trend->news_url ?>"><img onerror="this.onerror=null; this.src='<?php echo $no_image ?>'" src="<?php echo $trend->image ?>" alt="<?php echo $trend->title ?>" title="<?php echo $trend->title ?>" style="width:100%" /></a>
                           </div>
                           <div class="col-md-9 googletrends">

                              <div class="google_trends_info">
                                <span class="google_trend_heading"><a target="_blank" href="<?php echo $trend->news_url ?>"><?php echo $trend->title ?>:</a></span> 
                                <span class="google_trends_badge"><a target="_blank" href="<?php echo $trend->news_url ?>"><?php echo $trend->formattedTraffic ?></a></span>
                              </div>


                              <div class="trend_related_container">
                               <?php
                                 $trends_related = get_trending_related($trend->id);
                                 if(count($trends_related)):
                                    foreach($trends_related as $trend_info):
                               ?>
                                 <div class="trend_related">
                                    <p><strong><a target="_blank" href="<?php echo $trend_info->url ?>"><?php echo $trend_info->title ?>&nbsp;<i class="fa fa-external-link">&nbsp;</i></a></strong> <span class="badge">source: <?php echo $trend_info->source ?></span></p>
                                    <p class="fnt12"><?php echo $trend_info->snipped ?></p>
                                 </div>

                              <?php
                                endforeach;
                               endif;
                              ?>

                              </div>
                              
                             
                           </div>
                     </div>

                     </div>
                  </div>

                  <?php
                     endforeach;
                   endif;
                  ?>

                  <div class="row mrgnTpBtm">
                     <div class="col-md-12">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Ad 3 -->
                        <ins class="adsbygoogle"
                           style="display:inline-block;width:728px;height:90px"
                           data-ad-client="ca-pub-9716398444039739"
                           data-ad-slot="9117871264"></ins>
                        <script>
                           (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>

      <?php $this->endSection(); ?>


      <?php echo $this->section('js'); ?>

      <script>
         function myFunc(){for(var e,t=document.getElementById("search-tools").value.toUpperCase(),n=document.getElementById("countries_list").getElementsByTagName("li"),l=0;l<n.length;l++)console.log(n[l].getElementsByTagName("a")[0]),e=n[l].getElementsByTagName("a")[0],console.log(e),-1<e.innerHTML.toUpperCase().indexOf(t)?n[l].style.display="":n[l].style.display="none"}
      </script>


      <?php $this->endSection(); ?>

