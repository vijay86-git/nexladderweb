<?php echo $this->extend('Frontend/Layouts/Template'); ?>
<?php echo $this->section('content'); ?>
         <div class="">
            <div class="row">
               
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

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Twitter Trends - <?php echo $results['name'] ?></h3>
                           </div>

                               <div class="table-responsive">
                                 <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th scope="col"><strong>Rank</strong></th>
                                          <th scope="col"><strong>Trending Topic / Hashtag</strong></th>
                                          <th scope="col"><strong>Tweet Volume</strong></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       <?php
                                        if($results['result']):
                                          foreach($results['result'] as $key => $result):
                                           $cls = ($key % 2) == 0 ? 'bggry' : '';
                                           echo  '<tr class="'.$cls.'">
                                                    <th scope="row">'.($key + 1).'</th>
                                                    <td><a href="'.$result['url'].'" title="'.$result['name'].'" target=\'_blank\'>'.$result['name'].'&nbsp;&nbsp;<i class=\'fa fa-external-link\'></a></td>
                                                    <td>'.(empty($result['tweet_volume']) ? 'Under 10K' : number_format_short($result['tweet_volume'])).'</i></td>
                                                  </tr>';
                                          endforeach;
                                        else:
                                           echo '<tr>
                                                   <td colspan=\'3\' scope="row">Sorry! No Trending Topic / Hashtag found</td>
                                                 </tr>';
                                        endif;
                                       ?>
                                      </tbody>
                                 </table>
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


                  <div class="row twtrtp">

                     <?php
                      if($countries->getNumRows()):
                        foreach($countries->getResult() as $country)
                        echo '<div class="col col-md-3 col-xs-6 twitterloc">
                                 <a href="#'.$country->country_code.'"><b><i class="fa fa-map-marker" aria-hidden="true"></i> '.$country->name.'</b></a>
                               </div>';
                      endif;
                     ?>
                  </div>


                  <div class="row twtrtp mrgntp20 ">
                     <?php
                      if($countries->getNumRows()):
                        foreach($countries->getResult() as $country):
                     ?>
                     <div class="row twitr_lc brdrbtm" id="<?php echo $country->country_code ?>">
                        <h3 style="padding-left:1%">
                           <a href="<?php echo route_to('twitter_trends_country', $country->alias) ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $country->name ?></a>
                        </h3>

                        <div id="<?php echo $country->alias ?>">
                           <?php
                            $get_sub_loc = get_twitter_sub_location($country->woeid);
                            if($get_sub_loc->getNumRows()):
                              foreach($get_sub_loc->getResult() as $get_sub_loc_info)
                              echo '<div class="col col-md-3 col-xs-6 twtr_sub_loc"><a href="'.route_to('twitter_trends_country_place', $country->alias, $get_sub_loc_info->alias).'"><b><i class="fa fa-map-marker" aria-hidden="true"></i> '.$get_sub_loc_info->name.'</b></a></div>';
                            endif;
                           ?>
                        </div>

                     </div>

                  <?php
                     endforeach;
                   endif;
                  ?>
                  </div>


               </div>

               <div class="col-md-3">

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



            </div>
         </div>
      </div>

      <?php $this->endSection(); ?>

      <?php echo $this->section('js'); ?>
      <script>
         function myFunc(){for(var e,t=document.getElementById("search-tools").value.toUpperCase(),n=document.getElementById("countries_list").getElementsByTagName("li"),l=0;l<n.length;l++)console.log(n[l].getElementsByTagName("a")[0]),e=n[l].getElementsByTagName("a")[0],console.log(e),-1<e.innerHTML.toUpperCase().indexOf(t)?n[l].style.display="":n[l].style.display="none"}
      </script>

      <script>
         $(document).ready(function(){
             var maxLength = 300;
             $(".show-read-more").each(function(){
                 var myStr = $(this).text();
                 if($.trim(myStr).length > maxLength){
                     var newStr = myStr.substring(0, maxLength);
                     var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                     $(this).empty().html(newStr);
                     $(this).append(' <a href="javascript:void(0);" class="read-more"><strong>read more...</strong></a>');
                     $(this).append('<span class="more-text">' + removedStr + '</span>');
                 }
             });
             $(".read-more").click(function(){
                 $(this).siblings(".more-text").contents().unwrap();
                 $(this).remove();
             });
         });
         </script>
      <?php $this->endSection(); ?>

