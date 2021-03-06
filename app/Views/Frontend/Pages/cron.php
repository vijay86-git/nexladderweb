<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
<style>
    .mrgntp20{margin-top:20px;}
    #crontab {font-size:24px}
    #crontab select { border:1px solid #ddd;padding:3px}
    .gen{font-size:22px !important}
    .cron p {font-size:14px;margin:20px 0 0 0}
    #crontab_data { font-weight:bold;font-size:44px;color:#338700}
    .cron_gen_box{border:1px dashed #ddd;border-radius:10px;margin-top:20px;background:#fbfbfb;}
    .info ul li {line-height:26px;}

</style>

		  <div class="bodyPart">

            <div class="row">
               <div class="col-md-12 text-center">
                  <h2><strong>Cron Generator</strong></h2>
                  <p>It is a online tool which help to generate a Cron expression easily.</p>

                  <div class='cron'>
                    <div id='crontab'></div>
                    <div class="cron_gen_box">
                      <p class="gen">Generated cron entry: </p>
                      <p><span class='' id='crontab_data'></span></p>
                    </div>

                    <div class="info">
                          <ul>
                            <li>The first number is the minutes after the hour (0-59)</li>
                            <li>The second is the hour of the day (0-23, with 0 being 12 AM EST)</li>
                            <li>The third number is the day of the month (1-31)</li>
                            <li>The fourth is the month of the year (1-12)</li>
                            <li>The fifth is the day of the week (0-6, with 0 = Sunday and 6 = Saturday, etc.)</li>
                           </ul>
                      </div>

                  </div>

               </div>
            </div>

            <div class="row mrgntp20">
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
});
</script>
<?php $this->endSection(); ?>