<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
<style>
.suc_msg{border:1px solid #95dec4 !important;background:#d7f3e9;line-height:38px;padding-left:10px;color:#267d5d}
</style>
<div class="bodyPart" style="height: auto !important;">
           
           <div class="row">
              <div class="col-md-12">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Ad 1 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-9716398444039739"
                         data-ad-slot="5095344703"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
              </div>
           </div>
           
           <div class="row">
           <div class="col-md-6" id="form_container">
            <h2>Contact Us</h2>
            <p>
                Please send your message below. We will get back to you at the earliest!
            </p>
            <!-- form start -->
            <form method="POST" action="<?php echo route_to('contact.post'); ?>" accept-charset="UTF-8" role="form" autocomplete="off">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <?php
                         $msg =  \Config\Services::session()->getFlashdata('contact');
                         if ($msg)
                         echo '<p class=\'suc_msg\'>Thanks for contacting us. we\'ll revert you soon!</p>';
                ?>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"><?php echo set_value('message'); ?></textarea>
                        <?php 
                            if (isset($validator))
                            echo $validator->hasError('message') ? ('<p class=\'form_error\'>'.$validator->showError('message').'</p>') : "";
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" />
                        <?php 
                            if (isset($validator))
                            echo $validator->hasError('name') ? ('<p class=\'form_error\'>'.$validator->showError('name').'</p>') : "";
                        ?>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" />
                        <?php 
                            if (isset($validator))
                            echo $validator->hasError('email') ? ('<p class=\'form_error\'>'.$validator->showError('email').'</p>') : "";
                        ?>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-sm-12 form-group">
                        <div data-sitekey="6LfOo4QUAAAAAHdOCVdJhWsfVpGHELenNfF19zcR" class="g-recaptcha">
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                </div>
            </form>
            </div>
          
            <div class="col-md-1"></div>
          
            <div class="col-md-5">
                <div>
                      <address>
                        <i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;<strong>Address:</strong><br>
                        nexladder.com<br>
                        Faridabad<br>
                        Haryana, India, 121001<br>
                        <i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:nexladdermail@gmail.com">nexladdermail@gmail.com</a>
                      </address>
                </div>
                <div style="width:480px;height:350px" id="map"></div>
             
            </div>   
            
            </div>
            
            <script>
                function initMap() {
                  var uluru = {lat: 28.40682445, lng: 77.28997768};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: uluru
                  });
                  var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                  });
                }
              </script>
              <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0OjNT5xwO2H1Rc-P-5Jo6Uap9yx--yMw&amp;callback=initMap"></script>
          
        </div>

<?php $this->endSection(); ?>