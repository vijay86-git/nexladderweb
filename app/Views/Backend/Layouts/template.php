<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nexladder Web Tutorials | Login</title>
        <link href="<?php echo base_url(); ?>/backend/assets/css/bootstrap.min.css?v=<?php echo filemtime(DOC_ROOT_BACKEND_CSS . 'bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/backend/assets/font-awesome/css/font-awesome.css?v=<?php echo filemtime(DOC_ROOT_BACKEND_CSS . 'font-awesome.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/backend/assets/css/animate.css?v=<?php echo filemtime(DOC_ROOT_BACKEND_CSS . 'animate.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/backend/assets/css/style.css?v=<?php echo filemtime(DOC_ROOT_BACKEND_CSS . 'style.css'); ?>" rel="stylesheet">
        <style type="text/css">
            .middle-box{ width:800px !important }
        </style>
    </head>
    <body class="gray-bg">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <?php echo $this->renderSection('content') ?>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>/backend/assets/js/jquery-3.1.1.min.js?v=<?php echo filemtime(DOC_ROOT_BACKEND_JS . 'jquery-3.1.1.min.js'); ?>"></script>
        <script src="<?php echo base_url(); ?>/backend/assets/js/popper.min.js?v=<?php echo filemtime(DOC_ROOT_BACKEND_JS . 'popper.min.js'); ?>"></script>
        <script src="<?php echo base_url(); ?>/backend/assets/js/bootstrap.js?v=<?php echo filemtime(DOC_ROOT_BACKEND_JS . 'bootstrap.js'); ?>"></script>
    </body>
</html>