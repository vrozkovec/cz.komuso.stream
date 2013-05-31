<?php

require_once dirname(__FILE__)."/phpfreechat-1.6/src/phpfreechat.class.php";
$params = array();
$params["title"] = "Komuso Chat";
$params["nick"] = "guest".rand(1,1000);  // setup the intitial nickname
$params['firstisadmin'] = true;
//$params["isadmin"] = true; // makes everybody admin: do not use it on production servers ;)
$params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
$params["debug"] = false;
$chat = new phpFreeChat( $params );

?>
  
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
<!--   		<link rel="stylesheet" type="text/css" href="/phpfreechat-2.1.0/client/themes/default/jquery.phpfreechat.min.css" /> -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript" src="js/jwplayer.js"></script>
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">

            <!-- Example row of columns -->
            <div class="row">
                <div class="span6">
                	<h2 class="page-header">Christopher Yohmei Blasdel</h2>
					<div id="chris"></div>
                </div>
                <div class="span6 text-center">
                	<h2 class="page-header">Marek Matvija</h2>
					<div style="margin: 0 auto;" id="marek"></div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                	<h2 class="page-header">Be heard!</h2>
					  <?php $chat->printChat(); ?>
					  <?php if (isset($params["isadmin"]) && $params["isadmin"]) { ?>
					    <p style="color:red;font-weight:bold;">Warning: because of "isadmin" parameter, everybody is admin. Please modify this script before using it on production servers !</p>
					  <?php } ?>
<!--                 	<div id="mychat"><a href="http://www.phpfreechat.net">Creating chat rooms everywhere - phpFreeChat</a></div> -->
                </div>
            </div>


 <!-- Main hero unit for a primary marketing message or call to action -->
            <h2 class="page-header"><a href="javascript:void(0)" id="toggle" onclick="javascript:void(0);">Setup</a></h2>
            
             <div class="row" id="instructions" style="display: none;">
            	<ol>
            		<li><a class="btn" target="_blank" href="http://ks380544.kimsufi.com:5080/demos/publisher.html"><i class="icon-film"></i> Click me to open recording settings</a></li>
            		<li>bottom left box <strong>Settings</strong> :
		            	<ol>
		            		<li>
		            			<strong>Video tab</strong> - select recording device and Start  
		            		</li>
		            		<li>
		            			<strong>Audio tab</strong> - select recording device and Start  
		            		</li>
		            		<li>
		            			<strong>Server</strong> tab
		            			<blockquote>
			            			change Location: rtmp://ks380544.kimsufi.com:8080/oflaDemo 
		            			</blockquote>
		            			press Connect
		            		</li>
		            	</ol>
            		</li>
            		<li>top left box <strong>Monitor</strong> :
		            	<ol>
		            		<li>Publish</strong> tab
		            			<blockquote>
			            			change name to Marek or Christopher
		            			</blockquote>
		            			press Publish
		            		</li>
		            	</ol>
            		</li>            		
            		<li>Video on this page should start automatically.</li>
            	</ol>
            </div>

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->
		
		
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!--         <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> -->

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
<!--   		<script src="/phpfreechat-2.1.0/client/jquery.phpfreechat.min.js" type="text/javascript"></script> -->
<!-- 		<script type="text/javascript"> -->
<!--   			$('#mychat').phpfreechat({ serverUrl: '/phpfreechat-2.1.0/server' }); -->
<!-- 		</script> -->

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
         
         //~ getPlayer("Christopher", 'chris');
			  //~ getPlayer("Marek", 'marek');
			  
				  
			  function komusoPlayer(id, stream){
					jwplayer(id).setup({
						file: "rtmp://ks380544.kimsufi.com:8080/oflaDemo/flv:"+stream,
						primary: "flash",
						autostart: true
					});
				}
				
				komusoPlayer('chris', "Christopher");
				komusoPlayer('marek', "Marek");
				
				$("#toggle").click(function() {
					$("#instructions").toggle('slow');
				});
				
		</script>
            
    </body>
</html>
