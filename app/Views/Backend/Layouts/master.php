<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Nexladder Web Tutorials | Dashboard</title>
		<link href="<?php echo base_url(); ?>/backend/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/backend/assets/css/font-awesome.css" rel="stylesheet">
		<!-- Toastr style -->
		<link href="<?php echo base_url(); ?>/backend/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
		<!-- Gritter -->
		<link href="<?php echo base_url(); ?>/backend/assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/backend/assets/css/animate.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/backend/assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/backend/assets/css/summernote-bs4.css" rel="stylesheet">
	</head>
	<body>
		    <div id="wrapper">
					<?php echo $this->include('Backend/Partials/nav.php'); ?>

					<div id="page-wrapper" class="gray-bg dashbard-1">
						<div class="wrapper wrapper-content">
							<?php echo $this->renderSection('content') ?>
						</div>
						<?php echo $this->include('Backend/Partials/footer.php'); ?>
					</div>
			</div>
<!-- Toast notification -->

<!-- Mainly scripts -->
<script src="<?php echo base_url(); ?>/backend/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>/backend/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>/backend/assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/backend/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>/backend/assets/js/summernote-bs4.js"></script>

<script>
$(document).ready(function(){
    $('.desc').summernote();
});
</script>

</body>
</html>