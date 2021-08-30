<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Editor - nexladder web tutorials</title>
	<meta name="description" content="Try and test code online and see the real-time results." />
	<meta charset="UTF-8" />
	<meta property="og:title" content="Test Code Online" />
    <meta property="og:description" content="View the live example as well as try and test it using the online HTML editor." />
	<meta property="og:image" content="/lib/images/signature.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <meta name="msvalidate.01" content="F13063B8299624F18B7C4E98367AE3E1" />
	<link rel="stylesheet" href="<?php echo loadAssetsFiles('codemirror/lib/bin/css/codemirror.css?v=1'); ?>" />
	<link rel="stylesheet" href="<?php echo loadAssetsFiles('codemirror/lib/bin/css/html-mode-1.3.css?v=1.1');  ?>" />
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/js/jquery-1.7.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/js/codemirror.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/js/html-mode-1.1.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/mode/xml.js?v=1');  ?>"></script>    
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/mode/javascript.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/mode/css.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/mode/htmlmixed.js?v=1');  ?>"></script>
	<script type="text/javascript" src="<?php echo loadAssetsFiles('codemirror/lib/bin/js/active-line.js?v=1');  ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        	updatePreview();
    	});    
	</script>
	<style type="text/css">
		.CodeMirror{font-size: 12px; line-height: 16px; font-family:MenschRegular,Menlo,Monaco,consolas,monospace;background: url("lib/images/gutter-bg.gif") repeat-y -26px 0 transparent;}
		.CodeMirror-activeline-background {background: #e8f2ff !important;}
		.CodeMirror-scroll{overflow:auto;}
	</style>


    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111558941-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-111558941-1');
        </script>

</head>
<body>

    <form name="myForm" id="myForm" class="codelab">
        <div class="header-wrapper">
            <div class="header-top">
                <div class="pattern">&nbsp;</div>
            </div>
            <div class="header">
                <div class="logo-box">
                    <div class="logo">
                        <img src="<?php echo loadLogoCodeMirror('codemirror/lib/bin/images/logo.png'); ?>" alt="CodeLab" />
                    </div>
                </div>
                <div class="control-bar">
                    <div class="buttons">
                        <a href="javascript:void(0);" onClick="updatePreview();" class="btn btn-primary">Show Output</a>
						<a href="javascript:void(0);" onClick="toggleView();" class="toggle-view" title="Change Editor Layout"><i></i></a>
                    </div>                            
                </div>
                <div class="top-ad-box">

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
            <div class="clear">&nbsp;</div>
            </div>
        </div>
        <div class="frame-box vr">
            <div class="pane-wrapper row">
              <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6">
                <div class="pane" id="code-pane">
                    <div class="outer-area">
                        <span class="show-preview-pane">&nbsp;</span>
                        <div class="inner-area">
                            <input type="hidden" id="current-code" name="current-code" />
                            <textarea id="code" name="code">
<?php 
include_once($file) 
?>
                            </textarea>	
                            <script>
                                var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                                    mode: "text/html",
                                    tabMode: "indent",
                                    styleActiveLine: true,
                                    lineNumbers: true,
                                    lineWrapping: true
                                });
                            </script>									
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6">
                    <div class="pane" id="preview-pane">
                        <div class="outer-wrapper">
                            <span class="hide-preview-pane">&nbsp;</span>
                            <div class="output-area">
                                <iframe id="preview" name="preview" style="padding:10px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="codelab-footer">        
            <label class="auto-update"><input type="checkbox" id="check"> Auto update</label>
            <script>
                var delay;
                var checkbox = document.getElementById("check");
                editor.on("change", function(){
                    editor.refresh();
                    if(checkbox.checked==true){            
                        clearTimeout(delay);
                        delay = setTimeout(updatePreview, 300); // Don't use parenthesis 
                    }
                });
                //setTimeout(updatePreview, 300);
            </script>
            <div class="social-widget-wrapper">
                <!-- Social widget -->
                  <p class="social-link">Share this example with 
                    <a id="facebook-share-btn" href="https://facebook.com/sharer.php?u={{ Request::url() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,top=150, left='+((screen.width/2)-300));return false;">Facebook</a>, 
                    <a id="twitter-share-btn" href="https://twitter.com/share?text={{ $text }}&amp;url={{ Request::url() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,top=150, left='+((screen.width/2)-300));return false;">Twitter</a>, 
                    <a id="google-share-btn" href="https://plus.google.com/share?url={{ Request::url() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=438,width=600,top=150, left='+((screen.width/2)-300));return false;">Google +</a>
                  </p>
                <!-- End:Social widget -->
            </div>
            <div class="clear">&nbsp;</div>
        </div>



        
    </form>
        
</body>
</html>

