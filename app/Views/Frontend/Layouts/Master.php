<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php echo $this->include('Frontend/Partials/Meta.php'); ?>
   </head>
   <body>
      <!-- Page Wrapper -->
      <!-- <div class="pageWrapper"  style="background:url(images/pexels-photo-574071.jpeg);background-repeat:no-repeat;background-position:top center;background-size:1600px auto">-->
      <div class="pageWrapper" style="background:url(<?php echo loadImage('banner.png'); ?>);background-repeat:no-repeat;background-position:center center;">
         <!-- Container -->
         <div class="container">
            <?php echo $this->include('Frontend/Partials/Header.php'); ?>

            <div class="bodySearch">
               <div class="row">
                  <div class="col-md-12">
                     <input type="text" class="bodySearchBox" name="search" placeholder="What do you want to learn?"><button class="magnifierBody"><i class="fa fa-search"></i></button>
                  </div>
               </div>
            </div>

         </div>
         <!-- End Container -->
      </div>

      <div class="container">
         <div class="bodyPart">
               <?php echo $this->renderSection('content') ?>
         </div>
      </div>
      <div class="footer marginTop40">
               <?php echo $this->include('Frontend/Partials/Footer.php'); ?>
      </div>
      <!-- End Wrapper -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="<?php echo loadAssetsFiles('build/assets/js/jquery-3.2.1.min.js?v=1'); ?>"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo loadAssetsFiles('build/assets/js/bootstrap.min.js?v=1'); ?>"></script>
   </body>
</html>