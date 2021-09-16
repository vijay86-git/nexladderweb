<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>

<style>
 ul.liststyles{border:1px solid #f1f1f1;margin:0;padding:0;list-style-type:none;margin-bottom:20px}
 ul.liststyles li {line-height:34px;font-size:13px;border-bottom:1px solid #f1f1f1;padding-left:10px;}
 select option {padding:5px 10px;}
</style>
         <div class="">
            <div class="row">
               <div class="col-md-3">

               	  <ul class="liststyles"> 

               	  	<li id="length-converter" class="currentselected"><span><a href="<?php echo route_to('unit.convertor', 'length-converter') ?>">Length Converter</a> </span> </li> 

               	  	<li id="weight-converter"><span><a href="<?php echo route_to('unit.convertor', 'weight-converter') ?>">Weight Converter</a> </span> </li> 

               	  	<li id="volume-converter"><span><a href="<?php echo route_to('unit.convertor', 'volume-converter') ?>">Volume Converter </a> </span></li> 

               	  	<li id="area-converter"><span><a href="<?php echo route_to('unit.convertor', 'area-converter') ?>">Area Converter </a> </span></li> 

               	  	<li id="temperature-converter"><span><a href="<?php echo route_to('unit.convertor', 'temperature-converter') ?>">Temperature Converter </a> </span></li> 

               	  	<li id="speed-converter"><span><a href="<?php echo route_to('unit.convertor', 'speed-converter') ?>">Speed Converter </a> </span></li>

               	  	<li id="angle-converter"><span><a href="<?php echo route_to('unit.convertor', 'angle-converter') ?>">Angle Converter </a> </span></li> 

               	  	<li id="bytes-converter"><span><a href="<?php echo route_to('unit.convertor', 'bytes-converter') ?>">Bytes/Bits Converter </a> </span></li> 

               	  	<li id="density-converter"><span><a href="<?php echo route_to('unit.convertor', 'density-converter') ?>">Density Converter </a> </span></li> 

               	  	<li id="electric-current-converter"><span><a href="<?php echo route_to('unit.convertor', 'electric-current-converter') ?>">Electric Current Converter </a> </span></li> 

               	  	<li id="energy-converter"><span><a href="<?php echo route_to('unit.convertor', 'energy-converter') ?>">Energy Converter </a> </span></li> 

               	  	<li id="force-converter"><span><a href="<?php echo route_to('unit.convertor', 'force-converter') ?>">Force Converter </a> </span></li> 

               	  	<li id="fuel-converter"><span><a href="<?php echo route_to('unit.convertor', 'fuel-converter') ?>">Fuel Converter </a> </span></li> 

               	  	<li id="mass-converter"><span><a href="<?php echo route_to('unit.convertor', 'mass-converter') ?>">Mass Converter </a> </span></li> 

               	  	<li id="power-converter"><span><a href="<?php echo route_to('unit.convertor', 'power-converter') ?>">Power Converter </a> </span></li> 

               	  	<li id="pressure-converter"><span><a href="<?php echo route_to('unit.convertor', 'pressure-converter') ?>">Pressure Converter </a> </span></li> 

               	  	<li id="time-converter"><span><a href="<?php echo route_to('unit.convertor', 'time-converter') ?>">Time Converter </a> </span></li> 

               	  	<li id="astronomical-converter"><span><a href="<?php echo route_to('unit.convertor', 'astronomical-converter') ?>">Astronomical Converter </a> </span></li> 

               	  	<li id="frequency-converter"><span><a href="<?php echo route_to('unit.convertor', 'frequency-converter') ?>">Frequency Converter </a> </span></li> </ul>

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

                  <div class="row mrgnbtm35">
                     <div class="col-md-12">
                            <div class="col-md-6">

                        		<h5> From: <span id="select_from_title"></span> </h5> 
                        		<input type="text" class="form-control mrgnbtm15" id="from_input" value="1" onchange="convert('<?= $converter ?>');" onkeyup="convert('<?= $converter ?>');"> 

                        		<select size="15" style="height: 555px;" class="span12" id="from_select" onchange="convert('weight-converter');"> 

 								  <?php
 								   $html = '';
                        		   foreach($units as $key => $unit)
                        		   $html .= '<option '.($key == 0 ? "selected" : "").' value="'.$key.'">'.$unit.'</option>';

                        		   echo $html;
                        		  ?>

                        		 </select> 
                        	</div>  

                            <div class="col-md-6">

                        	    <h5>To:<span id="select_to_title"></span> </h5> 
                        	    <input type="text" class="form-control mrgnbtm15" id="to_input" readonly="readonly" /> 

                        		<select size="15" style="height: 555px;" class="span12" id="to_select" onchange="convert('<?= $converter ?>');"> 
                        		 <?=  $html; ?>
                        		</select> 

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

      <script src="<?php echo loadAssetsFiles('build/assets/js/converter/'.$js.'?v=1') ?>"></script>

      <script>
            convert('<?= $converter ?>');
      </script>

      <?php $this->endSection(); ?>
