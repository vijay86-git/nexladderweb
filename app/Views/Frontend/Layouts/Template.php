<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <?php echo $this->include('Frontend/Partials/Meta.php'); ?>
   </head>
   <body>
      <!-- Page Wrapper -->
      <div class="pageWrapper inner">
         <!-- Container -->
         <div class="container height200">
            <?php echo $this->include('Frontend/Partials/Inner_Header.php'); ?>
         </div>
         <!-- End Container -->
      </div>
      <div class="container">
         <?php echo $this->renderSection('content') ?>
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