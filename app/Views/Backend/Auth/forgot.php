<?php echo $this->extend('Backend/Layouts/template'); ?>

<?php echo $this->section('content'); ?>

<style>
.form_error{color:#721c24;text-align:left;padding-top:5px;}
.wdth100{width:100%;}
.form_success{color:#267d5d;background:#d7f3e9;padding:10px 0 10px 5px;border:1px solid #267d5d;text-align:left}
.form_failure{color:#de2102;background:#fce3e4;padding:10px 0 10px 5px;border:1px solid #de2102;text-align:left}
</style>
<?php echo form_open(route_to('admin.post.forgot'), ['method' => 'post']); ?>
    <?php echo csrf_field() ?>

    <div class="form-group">
         <h2><strong>Forgot Password</strong></h2>
    </div>

    <?php
         $forgot_msg =  \Config\Services::session()->getFlashdata('forgot_msg');
         if (1 == $forgot_msg)
         echo '<p class=\'form_success\'>Your Password has been sent successfully!</p>';
         if (2 == $forgot_msg)
         echo '<p class=\'form_failure\'>The email does not belongs to admin account!</p>';
    ?>

    <div class="form-group">
        <label class="text-left wdth100">Email <span>*</span></label>
        <input autocomplete="off" type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" />
        <?php 
            if (isset($validator))
            echo $validator->hasError('email') ? ('<p class=\'form_error\'>'.$validator->showError('email').'</p>') : "";
        ?>
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">Recover Password</button>
    <a href="<?php echo route_to('admin.get.login'); ?>">Sign in ?</a>

  <?php echo form_close(); ?>

  <p class="m-t"> <small>&copy; <?php echo date("Y"); ?></small> </p>

  <?php $this->endSection(); ?>