


<br />
<br />
<br />
<br />
<br />

<form method="post">

<select multiple="" size="15" style="height: 555px;" class="span12" id="from_select" onchange="convert('frequency-converter');"> <option selected="" value="0">1/second</option> <option value="1">cycle/second</option> <option value="2">degree/hour</option> <option value="3">degree/minute</option> <option value="4">degree/second</option> <option value="5">gigahertz</option> <option value="6">hertz</option> <option value="7">kilohertz</option> <option value="8">megahertz</option> <option value="9">millihertz</option> <option value="10">radian/hour</option> <option value="11">radian/minute</option> <option value="12">radian/second</option> <option value="13">revolution/hour</option> <option value="14">revolution/minute</option> <option value="15">revolution/second</option> <option value="16">RPM</option> <option value="17">terrahertz</option> </select>


<input type="button" name="submit" value="submit" onclick="t()">


</form>




<script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
function t()
 {
  var myarray = []; 
    $("#from_select option").each(function() {

      let v = $(this).html();
      myarray.push(`"${v}"`);

    });

      console.log(myarray.join(","));
 }

</script>

