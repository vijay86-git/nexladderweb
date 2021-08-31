<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>

		  <div class="bodyPart">
            <div class="row">
               <div class="col-md-12">
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
            
            <div class="row">
                <div class="col-md-12">
                    <h1>Sitemap</h1>
                     <?php
                        foreach($res as $result):
                     ?>
                           <div class="col-md-3">
                                 <div class="sitemap">
                                     <a href="<?php echo route($result['slug']); ?>" title="<?php echo $result['subject'] ?>"><h2><?php echo $result['subject'] ?></h2></a>
                                     <ul>
                                        <?php
                                          foreach ($result['topics'] as $topics):
                                       ?>
                                          <li><a title="<?php echo $topics['topic'] ?>" href="<?php echo topic_route($result['slug'], $topics['slug']); ?>"><?php echo $topics['topic'] ?></a></li>
                                       <?php
                                         endforeach;
                                       ?>
                                     </ul>
                                </div>
                            </div>
                    <?php
                     endforeach;
                    ?>

                 </div>
              </div>

         </div>

<?php $this->endSection(); ?>