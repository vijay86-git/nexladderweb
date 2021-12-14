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
                  <h2><strong>Online QRCode Generator</strong></h2>
                  <p>Create / Generate QRCode From Text.</p>

                  <form method="post">
                    <table class="table table-responsive table-hover table-bordered">
                     <tr class=""><td colspan=3><textarea class="form-control" name="txtin" placeholder="Type / Paste Text Here.." rows="6"></textarea></td></tr>
                        <tr class="">
                            <td style="text-align:center">
                                <h4>Select Size:</h4>
                            </td>
                                <td> 
                                    <select name="size" class="form-control">
                                        <option value="100x100">100x100</option>
                                        <option value="150x150">150x150</option>
                                        <option value="200x200" selected>200x200</option>
                                        <option value="250x250">250x250</option>
                                        <option value="300x300">300x300</option>
                                        <option value="350x350">350x350</option>
                                        <option value="400x400">400x400</option>
                                        <option value="450x450">450x450</option>
                                        <option value="500x500">500x500</option>
                                        <option value="550x550">550x550</option>
                                        <option value="600x600">600x600</option>
                                        <option value="650x650">650x650</option>
                                        <option value="700x700">700x700</option>
                                        <option value="750x750">750x750</option>
                                        <option value="800x800">800x800</option>
                                    </select>
                                </td>
                            <td>
                        <button class="btn btn-lg btn-success" id="qr_gen" type="button">Generator QR Code</button></td></tr>
                        <tr class="">
                            <td colspan=3 style="text-align:center"><div id="qrcode"></div></td>
                        </tr>
                    </table>
                 </form>

                 <p>A QR code (an initialism for Quick Response code) is a type of matrix barcode (or two-dimensional barcode) invented in 1994 by the Japanese automotive company Denso Wave. A barcode is a machine-readable optical label that can contain information about the item to which it is attached. In practice, QR codes often contain data for a locator, identifier, or tracker that points to a website or application. A QR code uses four standardized encoding modes (numeric, alphanumeric, byte/binary, and kanji) to store data efficiently; extensions may also be used. <a rel="nofollow" href="https://en.wikipedia.org/wiki/QR_code" target="_blank"><strong>read more &raquo;</strong></a></p>

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
<script src="<?php echo loadAssetsFiles('build/assets/js/qr.js?v=1.0'); ?>"></script>
<script type="text/javascript">
    $(function(){
       $("#qr_gen").click(function(){
           $("#qrcode").html("");
           var txt = $.trim($('textarea[name="txtin"]').val());
           if(txt == '') {
             alert("Please enter text you want to embed in OR Code");
             return false;
           }
           var size      = $('select[name="size"]').val();
           var sizeSplit = size.split('x');
           var width     = sizeSplit[0];
           var height    = sizeSplit[1];
           generateQRcode(width, height, txt);
           return false;
       });
      
      function generateQRcode(width, height, text) {
         $('#qrcode').qrcode({width: width,height: height,text: text});
      }
      
  });

</script>
<?php $this->endSection(); ?>