<?php echo $this->extend('Backend/Layouts/master'); ?>
<?php echo $this->section('content'); ?>
<style>
    ul.pagination li.active{opacity:0.7}
    ul.pagination li{background: #ddd}
    .srch{width:27%;display:inline;font-size:13px}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title padbtm20">
                <h5>List of Images</h5>

                <?php echo form_open_multipart(route_to('admin.images.create'), ['method' => 'post']); ?>
                    <?php echo csrf_field() ?>
                    <label><strong>Image</strong></label>
                    <input type="file" name="image" required="" class="form-control srch" autocomplete="off" accept="image/*" />
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <?php echo form_close(); ?>

            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <?php
                         $msg =  \Config\Services::session()->getFlashdata('saved');
                         if ($msg)
                         echo '<p class=\'suc_msg\'>Saved Successfully!</p>';

                         $update =  \Config\Services::session()->getFlashdata('update');
                         if ($update)
                         echo '<p class=\'suc_msg\'>Updated Successfully!</p>';

                    ?>
                        <table class="table table-striped table-bordered table-hover" role="grid">
                            <thead>
                                <th>#</th>
                                <th>Image</th>
                                <th>Full Url</th>
                                <th>Added at</th>
                            </thead>
                            <tbody>
                            <?php 
                               if (count($images_res)):

                                $per_page = PAGINATION_PER_PAGE;

                                foreach ($images_res as $key => $images_arr):

                                    $serial_no =  ($key + 1) + ($currentffset - 1) * $per_page;
                            ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?php echo $serial_no; ?></td>
                                    <td class="sorting_1"><img src="<?php echo base_url('uploads/'.$images_arr['image_url']); ?>" alt="" width="120" /></td>
                                    <td class="sorting_1"><?php echo base_url('uploads/'.$images_arr['image_url']); ?></td>
                                    <td><?php echo date('D, j M\' y h:i A', $images_arr['unix_timestamp']); ?></td>
                                   
                                </tr>
                        
                            <?php
                              endforeach;
                            else:
                                echo "<tr><td colspan='5'>Sorry, no data found.</td></tr>";
                            endif;
                            ?>
                            </tbody>

                            <tfoot>
                                <th>#</th>
                                <th>Image</th>
                                <th>Full Url</th>
                                <th>Added at</th>
                            </tfoot>
                        </table>
                        <div style="margin:0 0 0 1px"><?php echo $pager->links(); ?></div>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php $this->endSection(); ?>