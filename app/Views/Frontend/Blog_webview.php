<?php echo $this->extend('Frontend/Layouts/Blog'); ?>

<?php echo $this->section('content'); ?>

         <div class="container">
            <div id="primary" class="content-area 
               col-md-8">
               <main itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main" role="main">
                  <article id="post-188" class="content-single-page post-188 post type-post status-publish format-standard hentry category-php">
                     <header class="entry-header single-header">
                        <h1 itemprop="headline" class="entry-title single-title"><?php echo $heading ?></h1>
                        <div class="colored-line-left"></div>
                     </header>
                     <!-- .entry-header -->
                     <div itemprop="text" class="entry-content">
                       <?php echo $content ?>
                     </div>
                     <!-- .entry-content -->
                  </article>
                  <!-- #post-## -->
               </main>
               <!-- #main -->
            </div>
            <!-- #primary -->
         </div>

<?php $this->endSection(); ?>