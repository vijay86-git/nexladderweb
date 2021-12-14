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
    #encode_data {word-break:break-all;margin:20px 0;font-size:16px;padding:10px;border:1px dashed #ddd;border-radius:10px;display:none;}

</style>

		  <div class="bodyPart">

            <div class="row">
               <div class="col-md-12 text-center">
                  <h2><strong>Online Base64 Encode Tool</strong></h2>
                  <p><textarea class="form-control" name="txt" placeholder="Type / Paste Text Here.." rows="6"></textarea></p>
                  <p><button class="btn btn-lg btn-success" id="encode_now" type="button">Encode Now</button></p>
                  <p><div id="encode_data"></div></p>

                  <p>In programming, Base64 is a group of binary-to-text encoding schemes that represent binary data (more specifically, a sequence of 8-bit bytes) in an ASCII string format by translating the data into a radix-64 representation. The term Base64 originates from a specific MIME content transfer encoding. Each non-final Base64 digit represents exactly 6 bits of data. Three bytes (i.e., a total of 24 bits) can therefore be represented by four 6-bit Base64 digits. <a rel="nofollow" href="https://en.wikipedia.org/wiki/Base64" target="_blank"><strong>read more &raquo;</strong></a></p>
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
<script src="<?php echo loadAssetsFiles('build/assets/js/jquery.base64.min.js?v=1.0'); ?>"></script>
<script type="text/javascript">
    $(function(){
       $("#encode_now").click(function(){
           $("#encode_data").html("");
           var txt = $.trim($('textarea[name="txt"]').val());
           if(txt == '') {
             alert("Please enter text you want to encode");
             return false;
           }
           let enc = $.base64.encode(txt);
           $("#encode_data").html(enc).css('display', 'block');
       });
  });

</script>
<?php $this->endSection(); ?>