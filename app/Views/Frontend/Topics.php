<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>

         <div class="bodyPart">
            <div class="row">
               <div class="col-md-3">

               		<?php 
                      if($sections->getNumRows()):
                       foreach ($sections->getResult() as $section):
		                echo '<ul class="list-group">
		                         <li class="list-group-item disabled"><strong>'.$section->section.'</strong></li>';
		                    
		                      foreach (get_section_topics($section->id) as $topic):
		                      echo '<li class="list-group-item"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><a class="" title="'.$topic->topic.'" href="'.topic_route($slug, $topic->slug).'">'.$topic->topic.'</a></li>';
		                      endforeach;
		                    
		                echo '</ul>';
		  
		                endforeach;
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
                     <div class="col-md-12">
                        <h1 class='headingtop'><?php echo ucwords($topic_arr['topic']); ?></h1>
                        <div class="topnexprev">
                           <div class="share">
                              <label>share with:</label>
                              <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url(uri_string()); ?>" class="btn" title="share with facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                              <a target="_blank" href="http://twitter.com/share?url=<?php echo base_url(uri_string()); ?>&text=<?php echo ucwords($topic_arr['topic']); ?>" class="btn" title="share with twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                              <a target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?php echo base_url(uri_string()); ?>&description=<?php echo ucwords($topic_arr['topic']); ?>" class="btn" title="share with pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                              <a target="_blank" href="http://www.tumblr.com/share/link?url=<?php echo base_url(uri_string()); ?>" class="btn" title="share with tumblr"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
							<?php echo stripslashes($topic_arr['detail']); ?>
                     </div>
                  </div>
                  
                  <div class="row">
                   <div class="col-md-12">
                     <div class="col-md-6 col-sm-6 text-left pad0">
                      <?php
                        if(!empty($nextprevarr['prevlink'])):
                      ?>
                           <a title="<?php echo $nextprevarr['prevtopic'] ?>" href="<?php echo $nextprevarr['prevlink'] ?>" class="btn btn-default prev"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Previous</a><span class='nexprv'><a title="<?php echo $nextprevarr['prevtopic'] ?>" href='<?php echo  $nextprevarr["prevlink"] ?>'><?php echo $nextprevarr["prevtopic"] ?></a></span>
                     <?php
                        endif;
                     ?>

                     </div>
                     <div class="col-md-6 col-sm-6 text-right pad0">
                     <?php
                      if (!empty($nextprevarr['nextlink'])):
                     ?>
                         <span class='nexprv'><a title="<?php echo  $nextprevarr['nexttopic'] ?>" href='<?php echo $nextprevarr["nextlink"] ?>'><?php echo  $nextprevarr["nexttopic"] ?></a></span><a title="<?php echo  $nextprevarr['nexttopic'] ?>" href="<?php echo  $nextprevarr["nextlink"] ?>" class="btn btn-default next">Next  <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                     <?php 
                      endif;
                     ?>
                     </div>
                   </div> 
                 </div> 

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

                  <?php
                   if(! empty(current_url(true)->getSegment(2))):
                  ?>
                    <div class="row mrgnTpBtm">
                      <div class="col-md-12">

                       <div id="disqus_thread"></div>
                         <script>

                         /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                         
                         var disqus_config = function () {
                         this.page.url = '<?php echo base_url(uri_string()); ?>';  // Replace PAGE_URL with your page's canonical URL variable
                         this.page.identifier = <?php echo $topic_arr['id']; ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                         };
                         
                         (function() { // DON'T EDIT BELOW THIS LINE
                         var d = document, s = d.createElement('script');
                         s.src = 'https://nexladder.disqus.com/embed.js';
                         s.setAttribute('data-timestamp', +new Date());
                         (d.head || d.body).appendChild(s);
                         })();
                         </script>
                         <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                      </div>
                    </div>
               <?php
                  endif;
               ?>

               </div>
            </div>
         </div>
      </div>

      <?php $this->endSection(); ?>


