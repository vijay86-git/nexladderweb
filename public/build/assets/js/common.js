sha1=function(r){var t=function(){function r(){e[0]=1732584193,e[1]=4023233417,e[2]=2562383102,e[3]=271733878,e[4]=3285377520,s=c=0}function t(r){var t,n,o,f,a,u,c,s;for(t=i,n=0;64>n;n+=4)t[n/4]=r[n]<<24|r[n+1]<<16|r[n+2]<<8|r[n+3];for(n=16;80>n;n++)r=t[n-3]^t[n-8]^t[n-14]^t[n-16],t[n]=4294967295&(r<<1|r>>>31);for(r=e[0],o=e[1],f=e[2],a=e[3],u=e[4],n=0;80>n;n++)40>n?20>n?(c=a^o&(f^a),s=1518500249):(c=o^f^a,s=1859775393):60>n?(c=o&f|a&(o|f),s=2400959708):(c=o^f^a,s=3395469782),c=(4294967295&(r<<5|r>>>27))+c+u+s+t[n]&4294967295,u=a,a=f,f=4294967295&(o<<30|o>>>2),o=r,r=c;e[0]=e[0]+r&4294967295,e[1]=e[1]+o&4294967295,e[2]=e[2]+f&4294967295,e[3]=e[3]+a&4294967295,e[4]=e[4]+u&4294967295}function n(r,n){if("string"==typeof r){for(var o=[],e=0,i=(r=unescape(encodeURIComponent(r))).length;e<i;++e)o.push(r.charCodeAt(e));r=o}if(n||(n=r.length),o=0,0==c)for(;o+64<n;)t(r.slice(o,o+64)),o+=64,s+=64;for(;o<n;)if(f[c++]=r[o++],s++,64==c)for(c=0,t(f);o+64<n;)t(r.slice(o,o+64)),o+=64,s+=64}function o(){var r,o,i=[],u=8*s;for(n(a,56>c?56-c:64-(c-56)),r=63;56<=r;r--)f[r]=255&u,u>>>=8;for(t(f),r=u=0;5>r;r++)for(o=24;0<=o;o-=8)i[u++]=e[r]>>o&255;return i}var e,f,i,a,u,c,s;for(e=[],f=[],i=[],a=[128],u=1;64>u;++u)a[u]=0;return r(),{reset:r,update:n,digest:o,digestString:function(){for(var r=o(),t="",n=0;n<r.length;n++)t+="0123456789ABCDEF".charAt(Math.floor(r[n]/16))+"0123456789ABCDEF".charAt(r[n]%16);return t}}}();return t.update(r),t.digestString().toLowerCase()};

$("#inputTextArea").on('input', function() {
             if($('#auto').is(':checked'))
                {
                   generate();
                }
 });

 $(".upper_case").click(function() {
    let outputTextArea = $("#outputTextArea").val();
    $("#outputTextArea").val(outputTextArea.toUpperCase());
 });

 $(".lower_case").click(function() {
    let outputTextArea = $("#outputTextArea").val();
    $("#outputTextArea").val(outputTextArea.toLowerCase());
 });

 $(".clear").click(function() {
    $("#inputTextArea").val('');
    $("#outputTextArea").val('');
    $("#outputTextArea1").val('');
    $("#outputTextArea2").val('');
    $("#outputTextArea3").val('');
    $("#outputTextArea4").val('');
    $("#outputTextArea5").val('');
    $("#outputTextArea6").val('');
 });

 $(".copyInput").click(function() {
    $("#inputTextArea").focus();
    $("#inputTextArea").select();
    document.execCommand("copy");
 });

 $(".copyOutput").click(function() {
    $("#outputTextArea").focus();
    $("#outputTextArea").select();
    document.execCommand("copy");
 });        