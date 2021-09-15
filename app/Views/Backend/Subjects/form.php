<?php echo $this->extend('Backend/Layouts/master'); ?>

<?php echo $this->section('content'); ?>
<style>
.note-editor.note-frame .note-editing-area .note-editable { height:250px !important; }
</style>
            
	<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">

                        <div class="ibox-title">
                            <a href="<?php echo route_to('admin.camp.index'); ?>"><button class="btn btn-xs btn-info pull-left">&laquo; Back</button></a>&nbsp;<h5 class="padtp5">Add Subject</h5>
                            <span class="pull-right"><label class="req">*</label> required fields</span>
                        </div>


                        <div class="ibox-content">

                            <?php echo form_open_multipart(route_to('admin.subject.create'), ['method' => 'post']); ?>
                                <?php echo csrf_field() ?>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Title<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('title'); ?>" class="form-control" name="title" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('title') ? ('<p class=\'form_error\'>'.$validator->showError('title').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group row"><label class="col-sm-2 col-form-label">Slug<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('slug'); ?>" class="form-control" name="slug" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('slug') ? ('<p class=\'form_error\'>'.$validator->showError('slug').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group row"><label class="col-sm-2 col-form-label">Description <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="description" style="height:300px !important" class="desc"><?php echo set_value('description') ?></textarea>
                                        <?php 
                                          if (isset($validator))
                                          echo $validator->hasError('description') ? ('<p class=\'form_error\'>'.$validator->showError('description').'</p>') : "";
                                        ?>
                                    </div>

                                </div>


                                 <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Logo <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="logo" id="logo" accept="image/*" />
                                       
                                    </div>

                                </div>



                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Status <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="radio" value="1" <?php echo set_value('status') == '1' ? "checked" : ( (! set_value("status")) ? "checked" : "") ?>  class="" name="status" autocomplete="off" />&nbsp;Active
                                        <input type="radio" value="0" <?php echo set_value('status') == '0' ? "checked" : "" ?> class="" name="status" autocomplete="off" />&nbsp;Inactive
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('status') ? ('<p class=\'form_error\'>'.$validator->showError('status').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>


                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Show Nav <span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="radio" value="1" <?php echo set_value('show_nav') == '1' ? "checked" : ( (! set_value("show_nav")) ? "checked" : "") ?>  class="" name="show_nav" autocomplete="off" />&nbsp;Yes
                                        <input type="radio" value="0" <?php echo set_value('show_nav') == '0' ? "checked" : "" ?> class="" name="show_nav" autocomplete="off" />&nbsp;No
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('show_nav') ? ('<p class=\'form_error\'>'.$validator->showError('show_nav').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>



                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Page Title<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('page_title'); ?>" class="form-control" name="page_title" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('page_title') ? ('<p class=\'form_error\'>'.$validator->showError('page_title').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Meta Keywords<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('meta_keywords'); ?>" class="form-control" name="meta_keywords" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('meta_keywords') ? ('<p class=\'form_error\'>'.$validator->showError('meta_keywords').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Meta Description<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('meta_description'); ?>" class="form-control" name="meta_description" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('meta_description') ? ('<p class=\'form_error\'>'.$validator->showError('meta_description').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>






                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $('#start_date, #end_date').datepicker({
    autoclose: true,  
    format: "dd/mm/yyyy"
}); 
</script>

<?php $this->endSection(); ?>