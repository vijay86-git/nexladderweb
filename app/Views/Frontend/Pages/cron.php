<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
<style>
    #crontab {font-size:28px}
    #crontab select { border:1px solid #ddd;padding:5px}
    .gen{font-size:22px !important}
    .cron p {font-size:14px;margin:20px 0 0 0}
    #crontab_data { font-weight:bold;font-size:44px;color:#338700}
    .cron_gen_box{border:1px dashed #ddd;border-radius:10px;margin-top:20px;background:#fbfbfb;}

</style>

		  <div class="bodyPart">
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
               <div class="col-md-12 text-center" style="height:400px">
                  <h2>Cron Generator</h2>
                  <p>It is a online tool which help to generate a Cron expression easily.</p>

                  <div class='cron'>
                    <div id='crontab'></div>
                    <div class="cron_gen_box">
                      <p class="gen">Generated cron entry: </p>
                      <p><span class='' id='crontab_data'></span></p>
                    </div>
                  </div>

                  
               </div>
               <div class="col-md-1"></div>
            </div>
         </div>

<?php $this->endSection(); ?>

<?php echo $this->section('js'); ?>
<script src="<?php echo loadAssetsFiles('build/assets/js/cron.js?v=1.0'); ?>"></script>


   <script type="text/javascript">
    $(document).ready(function() {
        $('#crontab').cron({
            initial: "42 3 * * 5",
            onChange: function() {
                $('#crontab_data').text($(this).cron("value"));
            }
        });

        /*$('#example1b').cron({
            initial: "42 3 * * 5",
            onChange: function() {
                $('#example1b-val').text($(this).cron("value"));
            },
            useGentleSelect: true
        });
        $('#example2').cron({
            initial: "42 3 * * 5",
            effectOpts: {
                openEffect: "fade",
                openSpeed: "slow"
            },
            useGentleSelect: true
        });
        
        */
    });
    </script>
<?php $this->endSection(); ?>
