<?php echo $this->extend('Backend/Layouts/master'); ?>

<?php echo $this->section('content'); ?>
	<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Overall</span>
                                </div>
                                <h5>Total Camps</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="<?php echo route_to('admin.camp.index'); ?>"><?php echo $total_camp; ?></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Overall</span>
                                </div>
                                <h5>Total Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="<?php echo route_to('admin.user.index'); ?>"><?php echo $total_users; ?></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Overall</span>
                                </div>
                                <h5>Total Requests</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="<?php echo route_to('admin.blood.index'); ?>"><?php echo $total_sent; ?></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right">Overall</span>
                                </div>
                                <h5>Total News</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><a href="<?php echo route_to('admin.news.index'); ?>"><?php echo $total_news; ?></a></h1>
                            </div>
                        </div>
            </div>
        </div>
<?php $this->endSection(); ?>