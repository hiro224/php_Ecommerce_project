<?php
	error_reporting(1);
	
	include("connection.php");
	
	if($_REQUEST['log']=='out')
	{
		session_destroy();
		header("location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wave cafe</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--
Template 2066 Wood Stock
http://www.tooplate.com/view/2066-wood-stock
-->
<link href="tooplate_style.css" rel="stylesheet" type="text/css" />

<script type="text/JavaScript" src="js/jquery-1.6.3.js"></script> 

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/tooplate-wave-cafe.css">
<style>
	.footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
</style>



</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Ocean Anime</h1>
          </div>
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <img style="height:150px; width:150px;" src="img/gf1.gif"/>
          </div>
          
        </div>        
      </div>
    <div id="tooplate_main">
    	
      <h2 style="color:yellow;"><span>Thank you for shopping with us</span></h2>
          <p><font color="white"><i>Order sent successfully!</i></font></p>
		  <p>Your order no. is <?php echo "<font size='4' color='white'>".$_REQUEST['order_no']."</font>";?></p>
		  <p>Thank you. Please come again.</p>
		  <br><br>
		  <button class="button-logout"><a href="?log=out">Log out</a></button> 
        
        

        <div class="clear"></div>
    </div>
    <div style="display:none;" class="nav_up" id="nav_up"></div>
</div> <!-- END of tooplate_wrapper -->

    <div class="clear"></div>
	<div class="footer">
    Copyright © 2048 Knon
</div>

<script src="js/scroll-startstop.events.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		var $elem = $('#content');
		
		$('#nav_up').fadeIn('slow');
		
		$(window).bind('scrollstart', function(){
			$('#nav_up,#nav_down').stop().animate({'opacity':'0.2'});
		});
		$(window).bind('scrollstop', function(){
			$('#nav_up,#nav_down').stop().animate({'opacity':'1'});
		});
		
		$('#nav_up').click(
			function (e) {
				$('html, body').animate({scrollTop: '0px'}, 800);
			}
		);
	});
</script>

</body>
</html>