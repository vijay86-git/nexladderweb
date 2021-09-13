<?php echo $this->extend('Backend/Layouts/master'); ?>

<?php echo $this->section('content'); ?>

    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">

                    	<div class="ibox-title">
                            <h5 class="padtp5">Update Profile</h5>
                            <span class="pull-right"><label class="req">*</label> required fields</span>
                        </div>

                        <div class="ibox-content">

                        	<?php
		                         $update =  \Config\Services::session()->getFlashdata('update');
		                         if ($update)
		                         echo '<p class=\'suc_msg\'>Updated Profile Successfully!</p>';
		                    ?>

                            <?php echo form_open_multipart(route_to('admin.post.profile'), ['method' => 'post']); ?>
                                <?php echo csrf_field() ?>


                                <div class="form-group row"><label class="col-sm-2 col-form-label">Name <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $response['name']; ?>" class="form-control" name="name" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('name') ? ('<p class=\'form_error\'>'.$validator->showError('name').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Email <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $response['email']; ?>" class="form-control" name="email" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('email') ? ('<p class=\'form_error\'>'.$validator->showError('email').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Password </label>
                                    <div class="col-sm-10">
                                        <input type="password" value="<?php echo set_value('password'); ?>" class="form-control" name="password" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('password') ? ('<p class=\'form_error\'>'.$validator->showError('password').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Confirm Password </label>
                                    <div class="col-sm-10">
                                        <input type="password" value="<?php echo set_value('confirm_password'); ?>" class="form-control" name="confirm_password" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('confirm_password') ? ('<p class=\'form_error\'>'.$validator->showError('confirm_password').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php $this->endSection(); ?>