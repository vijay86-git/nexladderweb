<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>

<style>
 ul.liststyles{border:1px solid #f1f1f1;margin:0;padding:0;list-style-type:none;margin-bottom:20px}
 ul.liststyles li {line-height:34px;font-size:13px;border-bottom:1px solid #f1f1f1;padding-left:10px;}
.activecls{background:#e6e6e6}
.padlft14{padding-left:14px;}
.icons i{font-size:16px;cursor:pointer;}
textarea{resize:none;font-size:15px;}
.containter_tools{border: 1px dashed #ddd;border-radius:10px;padding:20px}
.opt{padding:5px 10px;cursor:pointer}
.form-control-cls{width:100%;height:70px;border:1px solid #ddd;padding:15px;border-radius:5px;}
.heading{background:#5bc0de;border-bottom:3px solid #3fa2bf;padding:10px;color:#fff}
.outline0{outline:0}
h3{font-weight:bold}
.lnehght{line-height:60px;}
.margintp15{margin-top:15px;}
.padtp15{padding-top:15px}
</style>
         <div class="">
            <div class="row">
               <div class="col-md-3">

               	  <ul class="liststyles"> 
                        <?php echo view('Frontend/Converter/Inc_tools'); ?>
               	  </ul>

               
                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                   <!-- Ad 7 -->
                  <ins class="adsbygoogle"
                     style="display:inline-block;width:270px;height:600px"
                     data-ad-client="ca-pub-9716398444039739"
                     data-ad-slot="5997201134"></ins>
                  <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
               </div>
               <div class="col-md-9">
                  <!-- content -->
                  <div class="row mrgnbtm15">
                     <div class="col-md-12 mrgnbtm15">
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

                  <div class="row mrgnbtm35 containter_tools">
                     <div class="col-md-12">

                     	<div class="row">
                     	   <div class="col-md-12">
                     	   	<h1 class="heading">MD6 Hash Generator</h1>
                     	   </div>
                     	</div>

                     	<div class="row">
                     	   	<div class="col-md-6">
                     	         <h3>Enter the text</h3>
                     	      </div>

                     	      <div class="col-md-6 icons text-right">
                     	      	  <span class="opt clear" title="Clear"><i class="fa fa-trash">&nbsp;</i></span>
                     	      	  <span class="opt copyInput" title="Copy to Clipboard"><i class="fa fa-clone">&nbsp;</i></span>
                     	      </div>
                     	</div>


                     	<div class="row mrgnbtm15">
                     		<div class="col-md-12">
                     	  		<textarea placeholder="Enter Text to Generate MD6 Hash" name="inputTextArea" id="inputTextArea" class="form-control-cls"></textarea>
                     	  	</div>
                     	</div>

                     	<div class="row mrgnbtm15">
                     		<div class="col-md-12">
                             <label><input type="checkbox" name="auto" id="auto" value="1" checked="checked" /> Auto</label>
                     		  <button class="btn btn-xs btn-info outline0" onclick="generate()">Generate</button>
                     		</div>
                     	</div>


                        <div class="row margintp15">
                              <div class="col-md-1 padtp15">
                                 <h3>MD6-128</h3>
                              </div>

                              <div class="col-md-9 icons text-right">
                                   <textarea readonly="" placeholder="MD6-128 Result" name="outputTextArea1" id="outputTextArea1" class="form-control-cls"></textarea>
                              </div>

                              <div class="col-md-2 icons text-right lnehght">
                                   <span class="copyOutput" data-attr="1" title="Copy to Clipboard"><i class="fa fa-clone">&nbsp;</i></span>
                                   <span class="" title="">32 length</span>
                              </div>

                        </div>



                        <div class="row margintp15">
                              <div class="col-md-1 padtp15">
                                 <h3>MD6-256</h3>
                              </div>

                              <div class="col-md-9 icons text-right">
                                   <textarea readonly="" placeholder="MD6-256 Result" name="outputTextArea2" id="outputTextArea2" class="form-control-cls"></textarea>
                              </div>

                              <div class="col-md-2 icons text-right lnehght">
                                   <span class="copyOutput" data-attr="2" title="Copy to Clipboard"><i class="fa fa-clone">&nbsp;</i></span>
                                   <span class="" title="">64 length</span>
                              </div>

                        </div>


                        <div class="row margintp15">
                              <div class="col-md-1 padtp15">
                                 <h3>MD6-512</h3>
                              </div>

                              <div class="col-md-9 icons text-right">
                                   <textarea readonly="" placeholder="MD6-512 Result" name="outputTextArea3" id="outputTextArea3" class="form-control-cls"></textarea>
                              </div>

                              <div class="col-md-2 icons text-right lnehght">
                                   <span class="copyOutput" data-attr="3" title="Copy to Clipboard"><i class="fa fa-clone">&nbsp;</i></span>
                                   <span class="" title="">128 length</span>
                              </div>

                        </div>

                     
                     	    
                     </div>
                       
                  </div>

                  <div class="row mrgnTpBtm">
                     <div class="col-md-12">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Ad 3 -->
                        <ins class="adsbygoogle"
                           style="display:inline-block;width:728px;height:90px"
                           data-ad-client="ca-pub-9716398444039739"
                           data-ad-slot="9117871264"></ins>
                        <script>
                           (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>

      <?php $this->endSection(); ?>

      <?php echo $this->section('js'); ?>

      <script src="<?php echo loadAssetsFiles('build/assets/js/md6.js?v=1.0'); ?>"></script>
      <script src="<?php echo loadAssetsFiles('build/assets/js/common.js?v=1.0'); ?>"></script>
      <script>

         function generate()
          {
             let inputTextArea = $("#inputTextArea").val();

             var md6Hash = new md6hash();
             $("#outputTextArea1").val(md6Hash.hex(inputTextArea, 128));
             $("#outputTextArea2").val(md6Hash.hex(inputTextArea, 256));
             $("#outputTextArea3").val(md6Hash.hex(inputTextArea, 512));
          }

         $(".copyInput").click(function() {
            let attr = $(this).data("attr");
            $(`#inputTextArea${attr}`).focus();
            $(`#inputTextArea${attr}`).select();
            document.execCommand("copy");
         });

         $(".copyOutput").click(function() {
            let attr = $(this).data("attr");
            $(`#outputTextArea${attr}`).focus();
            $(`#outputTextArea${attr}`).select();
            document.execCommand("copy");
         });         

      </script>

      <?php $this->endSection(); ?>
