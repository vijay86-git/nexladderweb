    <?php echo $this->extend('Backend/Layouts/master'); ?>

<?php echo $this->section('content'); ?>
<style>
.note-editor.note-frame .note-editing-area .note-editable { height:250px !important; }
</style>
            
	<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">

                        <div class="ibox-title">
                            <a href="<?php echo route_to('admin.sections.index'); ?>"><button class="btn btn-xs btn-info pull-left">&laquo; Back</button></a>&nbsp;<h5 class="padtp5">Add Section</h5>
                            <span class="pull-right"><label class="req">*</label> required fields</span>
                        </div>


                        <div class="ibox-content">

                            <?php echo form_open(route_to('admin.section.create'), ['method' => 'post']); ?>
                                <?php echo csrf_field() ?>


                                <div class="form-group row"><label class="col-sm-2 col-form-label">Select Subject<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="subject" class="form-control">
                                            <option value="">-- Select --</option>
                                            <?php 
                                              if (count($subjects)):
                                                foreach ($subjects as $subject):
                                                  $selected = (set_value('subject') == $subject->id) ? "selected" : "";
                                                  echo "<option ".$selected." value='".$subject->id."'>".ucwords($subject->name)."</option>";
                                                endforeach;
                                              endif;
                                            ?>
                                        </select>
                                       <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('subject') ? ('<p class=\'form_error\'>'.$validator->showError('subject').'</p>') : "";
                                        ?>
                                    </div>
                                   
                                </div>
                                <div class="hr-line-dashed"></div>



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


                                <div class="form-group row"><label class="col-sm-2 col-form-label">Sort<span class="req">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo set_value('sort'); ?>" class="form-control" name="sort" autocomplete="off" />
                                         <?php 
                                            if (isset($validator))
                                            echo $validator->hasError('sort') ? ('<p class=\'form_error\'>'.$validator->showError('sort').'</p>') : "";
                                        ?>
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