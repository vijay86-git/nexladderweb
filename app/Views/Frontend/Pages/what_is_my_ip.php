<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
<style>
    .mrgntp20{margin-top:20px}
    .head{font-size:22px;font-weight:bold}
</style>

          <div class="bodyPart">
            <div class="row">
               <div class="col-md-6 text-center">
                   <table class="table table-responsive table-bordered table-striped">
                       <thead>
                         <tr class="head">
                            <th colspan="2" class="text-center"><i class="fa fa-hand-o-down" aria-hidden="true"></i> IP Details</th>
                         </tr>
                       </thead>
                       <tbody>
                         
                         <tr>
                           <td>IP Address</td>
                           <td><?php echo ( ! empty($response['geoplugin_request']) ? $response['geoplugin_request'] : 'N/A' ) ?></td>
                         </tr>
                         <tr>
                           <td>City</td>
                           <td><?php echo ( ! empty($response['geoplugin_city']) ? $response['geoplugin_city'] : 'N/A' ) ?></td>
                         </tr>
                         <tr>
                           <td>Region</td>
                           <td><?php echo ( ! empty($response['geoplugin_region']) ? $response['geoplugin_region'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Region Code</td>
                           <td><?php echo ( ! empty($response['geoplugin_regionCode']) ? $response['geoplugin_regionCode'] : 'N/A' ) ?></td>
                         </tr>
                         <tr>
                           <td>Region Name</td>
                           <td><?php echo ( ! empty($response['geoplugin_regionName']) ? $response['geoplugin_regionName'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Country Code</td>
                           <td><?php echo ( ! empty($response['geoplugin_countryCode']) ? $response['geoplugin_countryCode'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Country Name</td>
                           <td><?php echo ( ! empty($response['geoplugin_countryName']) ? $response['geoplugin_countryName'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Continent Code</td>
                           <td><?php echo ( ! empty($response['geoplugin_continentCode']) ? $response['geoplugin_continentCode'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Continent Name</td>
                           <td><?php echo ( ! empty($response['geoplugin_continentName']) ? $response['geoplugin_continentName'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Latitude</td>
                           <td><?php echo ( ! empty($response['geoplugin_latitude']) ? $response['geoplugin_latitude'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Longitude</td>
                           <td><?php echo ( ! empty($response['geoplugin_longitude']) ? $response['geoplugin_longitude'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Timezone</td>
                           <td><?php echo ( ! empty($response['geoplugin_timezone']) ? $response['geoplugin_timezone'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Currency Code</td>
                           <td><?php echo ( ! empty($response['geoplugin_currencyCode']) ? $response['geoplugin_currencyCode'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Currency Symbol UTF8</td>
                           <td><?php echo ( ! empty($response['geoplugin_currencySymbol_UTF8']) ? $response['geoplugin_currencySymbol_UTF8'] : 'N/A' ) ?></td>
                         </tr>

                         <tr>
                           <td>Currency Converter</td>
                           <td><?php echo ( ! empty($response['geoplugin_currencyConverter']) ? $response['geoplugin_currencyConverter'] : 'N/A' ) ?></td>
                         </tr>

                       </tbody>
                     </table>
               </div>

               <div class="col-md-6 text-center">
                  <h1><i class="fa fa-hand-o-down" aria-hidden="true"></i> Location On Map</h1>
                  <iframe width="100%" height="525" id="" src="https://maps.google.com/maps?q=<?php echo $response['geoplugin_latitude'] ?>,<?php echo $response['geoplugin_longitude'] ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

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