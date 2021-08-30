<?php echo $this->extend('Frontend/Layouts/App'); ?>

<?php echo $this->section('content'); ?>

<div class="row">

     <div class="col-md-12" style="margin:15px 0 0 0">
        <h2><strong><?php echo stripslashes($info['topic']) ?></strong></h2>
     </div>

     <div class="col-md-12" style="margin:15px 0 0 0">
        <?php echo stripslashes($info['detail']) ?>
     </div>

</div>

<?php $this->endSection(); ?>