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
                <h5>List of Topics</h5>

                <?php echo form_open(route_to('admin.subject.index'), ['method' => 'get']); ?>
                    <?php echo csrf_field() ?>
                    <label><strong>Search</strong></label>
                    <input type="text" name="title" required="" class="form-control srch" autocomplete="off" placeholder="Title & enter" value="<?php echo $title ?>" />
                <?php echo form_close(); ?>

                <a href="<?php echo route_to('admin.topic.new'); ?>"><button type="button" class="btn btn-primary pull-right">Add Topic</button></a>
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
                                <th>Title</th>
                                <th>Status</th>
                                <th>Added at</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                               if (count($topics_res)):

                                $per_page = PAGINATION_PER_PAGE;

                                foreach ($topics_res as $key => $topics_arr):

                                    $serial_no =  ($key + 1) + ($currentffset - 1) * $per_page;
                                
                            ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?php echo $serial_no; ?></td>
                                    <td class="sorting_1"><?php echo ucwords($topics_arr['topic']); ?></td>
                                    <td class="sorting_1"><?php echo $topics_arr['status'] == 1 ? "<span class='btn-xs btn-success'>Active</span>" : "<span class='btn-xs btn-danger'>Inactive</span>"; ?></td>
                                    <td><?php echo date('D, j M\' y h:i A', $topics_arr['unix_timestamp']); ?></td>
                                    <td class="center">

                                        <a href="<?php echo route_to('admin.topic.edit', $topics_arr['id']); ?>"><button class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i></button></a>

                                    </td>
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
                                <th>Title</th>
                                <th>Status</th>
                                <th>Added at</th>
                                <th>Action</th>
                            </tfoot>
                        </table>
                        <div style="margin:0 0 0 1px"><?php echo $pager->links(); ?></div>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php $this->endSection(); ?>