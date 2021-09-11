<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
         <div class="">
            <div class="row">
               <div class="col-md-3">

                   <p class="st" style="display:none"><a title="Home" href='<?php echo route_to('/') ?>'><i class="fa fa-home">&nbsp;</i></a>&raquo;&nbsp;<a title="Youtube Trends" href="<?= route_to('youtube_trends') ?>">Youtube Trends</a> &raquo;&nbsp;India United states of america</p>
                   <div class="search-box">
                     
                     <input class="form-control brdernone" name="tools_search" id="search-tools" class="search-tool-holder" placeholder="Search Country..." type="text" onkeyup="return myFunc()" /><i class="fa fa-search"></i>
                   </div>
                    <?php 
                      if($countries->getNumRows()):
                         echo '<ul class="list-group-list" id="countries_list">';
                         $i = 0;
                         foreach ($countries->getResult() as $country):
                         $cls = $i % 2 == 0 ? 'bggry' : '';
                         echo '<li class="list-group-item '.$cls.'"><i aria-hidden="true" class=\'fa fa-map-marker\'>&nbsp;</i><a itemprop="url" href="'.route_to('youtube_trends_country', $country->alias).'">'.$country->title.'</a></li>'; 
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
                        <h1 class="page-title" itemprop="headline"><?php echo $name ?> Youtube Trends <span style="color:green;font-size:16px;"><?php echo date("M, d Y"); ?></span></h1>
                     </div>
                  </div>

                  <?php
                   $no_image = loadImage('no_image.png');
                   if(count($results)):
                     foreach($results as $trend):
                        $stats      = json_decode($trend->stats);
                        $link       = getenv('YOUTUBE_BASE_URL') . $trend->yt_id;
                        $thumbnails = json_decode($trend->thumbnails);
                        $img = $thumbnails->medium->url;
                        $uploaded_on = $trend->published_at;
                        $uploaded_on_time = '';
                        if($uploaded_on):
                           list($date, $time) = explode('T', $uploaded_on);
                           $uploaded_on_time  = 'on ' . date('D, j M\'y', strtotime($date));
                        endif;

                        $likeCount     = number_format_short($stats->likeCount ?? 0);
                        $viewCount     = number_format_short($stats->viewCount ?? 0);
                        $commentCount  = number_format_short($stats->commentCount ?? 0);
                        $dislikeCount  = number_format_short($stats->dislikeCount ?? 0);
                        $favoriteCount = number_format_short($stats->favoriteCount ?? 0);
                  ?>
                  <div class="row mrgnbtm35">
                     <div class="col-md-12">
                        <div class="row shadow-box">
                           <div class="col-md-3 imgset">
                              <a target="_blank" href="<?php echo $link ?>"><img onerror="this.onerror=null; this.src='<?= $no_image ?>'" src="<?php echo $img ?>" alt="<?php echo $trend->title ?>" title="<?php echo $trend->title ?>" style="width:100%" /></a>
                           </div>
                           <div class="col-md-9 googletrends">
                              <div class="google_trends_info">
                                <h2 class="google_trend_heading"><a href="<?php echo $link ?>"><?php echo $trend->title ?>:</a></h2> 
                                <span class="google_trends_badge">Upload by: <?php echo $trend->channel_title ?> <?php echo $uploaded_on_time ?></span>
                              </div>


                              <div class="trend_related_container">
                               
                                 <div class="trend_related">
                                    <p style="color:#028002;padding-top:5px;" class="">
                                       <i class="fa fa-eye"></i>:<b><?php echo $viewCount ?></b> Views, <i class="fa fa-thumbs-up"></i>:<b><?php echo $likeCount ?></b> Likes, <i class="fa fa-thumbs-down"></i>:<b><?php echo $dislikeCount ?></b> Dislikes, <i class="fa fa-comments"></i>:<b><?php echo $commentCount ?></b> Comments </p>
                                 </div>

                                 <p class="show-read-more"><?php echo $trend->description ?></p>
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

      <script>
         $(document).ready(function(){
             var maxLength = 300;
             $(".show-read-more").each(function(){
                 var myStr = $(this).text();
                 if($.trim(myStr).length > maxLength){
                     var newStr = myStr.substring(0, maxLength);
                     var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                     $(this).empty().html(newStr);
                     $(this).append(' <a href="javascript:void(0);" class="read-more"><strong>read more...</strong></a>');
                     $(this).append('<span class="more-text">' + removedStr + '</span>');
                 }
             });
             $(".read-more").click(function(){
                 $(this).siblings(".more-text").contents().unwrap();
                 $(this).remove();
             });
         });
         </script>
      <?php $this->endSection(); ?>

