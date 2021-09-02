<?php echo $this->extend('Frontend/Layouts/Master'); ?>

<?php echo $this->section('content'); ?>

			 <div class="row">
               <div class="col-md-9 col-sm-9">
                  <div class="courseContainer">
                     <div class="row">
                        <div class="col-md-12 col-sm-12">
                           <div class="learnTechnologies">
                              <h2>Learn Technologies</h2>
                           </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                           <div class="row margin15">

                           	<?php 
                                  if($subjects->getNumRows()):
                                   foreach ($subjects->getResult() as $subject)
								   echo '<div class="col-md-3 col-sm-3">
			                                 <div>
			                                    <a title="'.ucwords($subject->name).'" href="'.route($subject->slug).'" class="">
			                                    <span class="courseImg"><img src="'.$subject->image.'" alt="'.$subject->name.'" class="img-responsive" /></span>
			                                    <span class="coursename">'.ucwords($subject->name).'</span>
			                                    </a>
			                                 </div>
			                              </div>';
								  endif;
                            ?>
                            </div>

                        </div>
                     </div>
                     <div class="row">
                        <div class="content about">
                           <p>nexladder.com is a learning online platform that helps anyone can learn Web Technologies. nexladder provides all web tutorials like Php, Mysqli, Vuejs, Html, Jquery etc in simple and easy steps starting from basic to advanced concepts with examples. nexladder helps students, developers and project manager where they can learn topics in easy and simple language with examples. To make our website better for you, we bring updates to the website regularly.</p>
                           <p><strong>Our mission</strong> - To help you learn the skills you need to achieve your goal.</p>
                        </div>
                     </div>
                     <div class="row" style="height:20px"></div>
                     <div class="row">
                        <div class="col-md-5 col-sm-5 text-center">
                           <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                           
                           <ins class="adsbygoogle"
                              style="display:inline-block;width:300px;height:250px"
                              data-ad-client="ca-pub-9716398444039739"
                              data-ad-slot="4680411731"></ins>
                           <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                           </script>
                        </div>
                        <div class="col-md-5 col-sm-5 text-center">
                           <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                           
                           <ins class="adsbygoogle"
                              style="display:inline-block;width:300px;height:250px"
                              data-ad-client="ca-pub-9716398444039739"
                              data-ad-slot="9106262970"></ins>
                           <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                           </script>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 margin15 pull-left">
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnexladder&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=541506242974269" width="300" height="214" style="border:none;overflow:hidden;margin:10px 0 0 0" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                  
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                  <ins class="adsbygoogle"
                     style="display:inline-block;width:270px;height:600px"
                     data-ad-client="ca-pub-9716398444039739"
                     data-ad-slot="6679889118"></ins>
                  <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>

               </div>
            </div>

<?php $this->endSection(); ?>

