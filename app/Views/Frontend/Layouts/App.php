<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>nexladder</title>
    <?php 
      $style_file_path = $_SERVER['DOCUMENT_ROOT'] . '/build/assets/css/style.css';
      $ftime           = filemtime($style_file_path);
    ?>
    <link rel="stylesheet" href="<?php echo loadAssetsFiles('build/assets/css/bootstrap.min.css?v=1') ?>">
    <link rel="stylesheet" href="<?php echo loadAssetsFiles('build/assets/css/font-awesome.css?v=1') ?>">
    <link rel="stylesheet" href="<?php echo loadAssetsFiles('build/assets/css/style.css') ?>?v=<?php echo $ftime; ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111558941-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-111558941-1');
        </script>

  </head>
  <body>
    
    <div class="container">
       <div class="bodyPart">
           <?php echo $this->renderSection('content') ?>
       </div>
   </div>

    <!-- End Wrapper -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo loadAssetsFiles('build/assets/js/jquery-3.2.1.min.js?v=1') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo loadAssetsFiles('build/assets/js/bootstrap.min.js?v=1') ?>"></script>
  </body>
</html>