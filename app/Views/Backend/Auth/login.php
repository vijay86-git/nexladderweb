<?php echo $this->extend('Backend/Layouts/template'); ?>

<?php echo $this->section('content'); ?>

<style>

</style>

<?php echo form_open(route_to('admin.post.login'), ['method' => 'post']); ?>
    <?php echo csrf_field() ?>

    <div class="form-group">
         <img class="img-responsive" src="<?php echo base_url(); ?>/backend/assets/images/administrator.png" width="150" align="center" alt="" />
         <h2><strong>Welcome Administrator</strong></h2>
    </div>

    <?php
         $login_failed =  \Config\Services::session()->getFlashdata('login_failed');
         if ($login_failed)
         echo '<p class=\'form_failure\'>The email or password you entered is incorrect!</p>';
    ?>

    <div class="form-group">
        <label class="text-left wdth100">Email <span>*</span></label>
        <input autocomplete="off" type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" />
        <?php 
            if (isset($validator))
            echo $validator->hasError('email') ? ('<p class=\'form_error\'>'.$validator->showError('email').'</p>') : "";
        ?>
    </div>
    <div class="form-group">
        <label class="text-left wdth100">Password <span>*</span></label>
        <input autocomplete="off" type="password" class="form-control" placeholder="Password" name="password" />
        <?php 
          if (isset($validator))
          echo $validator->hasError('password') ? ('<p class=\'form_error\'>'.$validator->showError('password').'</p>') : "";
        ?>
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
    <a href="<?php echo route_to('admin.forgot.index'); ?>">Lost your password?</a>

  <?php echo form_close(); ?>

  <p class="m-t"> <small>&copy; <?php echo date("Y"); ?></small> </p>

  <?php $this->endSection(); ?>