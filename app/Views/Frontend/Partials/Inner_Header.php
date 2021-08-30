		<!-- Top Bar -->
            <div class="topBar">
               <div class="row">
                <div class="col-md-6">
                 <div class="socialinner">
                  <ul>
                     <li><a href="<?php echo getenv('socal.facebook_url') ?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="<?php echo getenv('socal.twitter_url') ?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a target="_blank" href="<?php echo getenv('apps.android_url') ?>" title="Download Android App"><img width="120" src="<?php echo loadImage('android_google_play.png'); ?>" alt=""></a></li>
                  </ul>
               </div>
              </div>
              <div class="col-md-6">
                 <div class="searchbar text-right">
                   <!-- form search -->

                    <form method="get" action="https://www.google.com/search" target="_blank"> 
                       <input autocomplete="off" type="text" class="searchTextTop" name="q" placeholder="Search on Nexladder..." title="Search on Nexladder"><button class="magnifier"><i class="fa fa-search"></i></button>
                       <input type="hidden" name="sitesearch" value="https://nexladder.com">
                     </form>

                   <!-- close -->
                  </div>
              </div>
             </div>
             <div class="seperator">&nbsp;</div>
          </div>

          <!-- Close -->

          <!-- Header part -->
            
            <div class="headerSection">
               <div class="row">
                  <div class="col-md-3">
                     <div class="sitelogo"><a href="<?php echo route_to('/'); ?>" title="nexladder web tutorials"><img src="<?php echo loadImage('nexlogo.png'); ?>" alt="nexladder web tutorials" /></a></div>
                  </div>
                  <div class="col-md-9">
                     <!-- navigation -->
                     <nav class="navbar navbar-inverse-inner">
                        <div class="container-fluid">
                           <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span> 
                              </button>
                              <a class="navbar-brand" href="#"></a>
                           </div>
                           <div class="collapse navbar-collapse" id="navBar">
                              <ul class="nav navbar-nav">
                                 <li class=""><a title="Home" href="<?php echo route_to('/') ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                 <?php 
                                  $getNavLanguages = getNavLanguages(); 
                                  if($getNavLanguages->getNumRows()):
                                   foreach ($getNavLanguages->getResult() as $language)
								   echo '<li><a title="" href="'.route($language->slug).'">'.$language->name.'</a></li>';
								  endif;
                                 ?>
                              </ul>
                           </div>
                        </div>
                     </nav>
                     <!-- close navigation -->
                  </div>
               </div>
            </div>
        


         