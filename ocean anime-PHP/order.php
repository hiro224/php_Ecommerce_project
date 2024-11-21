<?php
error_reporting(1);
session_start();
$i=$_REQUEST['img'];
$_SESSION['sid']=$_POST['id'];
include("connection.php");
$i=$_REQUEST['img'];
if($_POST['ord'])
{ 
$prodno=$_POST['prodno'];
$price=$_POST['price'];
$name=$_POST['nam'];
$phone=$_POST['pho'];
$add=$_POST['add'];
$ordno=ord.rand(100,500);
if(mysql_query("insert into orders(productno,price,name,phone,address,order_no) values('$prodno','$price','$name','$phone','$add','$ordno')"))
{
//echo "<script>location.href='ordersent.php?prod'</script>";
header("location:ordersent.php?order_no=$ordno");  }
else {$error= "user already exists";}}

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
            <h1 class="tm-site-name">Order item page</h1>
          </div>
          
        </div>        
      </div>
    <div id="tooplate_main">
	
    	<div class="tm-black-bg tm-page-content" >
          <div id="comment_form">
            <h2 style="color:white;" align="center">Order form</h2>
        <?php
			include("connection.php");
			$sel=mysql_query("select * from item  where img='$i' ");
			$mat=mysql_fetch_array($sel);
			
			
			?>
            <form style="margin-left: 10px;"  method="post">
				
                <label>Product No. </label>
                <input type="text" name="prodno" id="prodno" value="<?php echo $mat['prod_no'];?>" class="input_field" />
                <label>price.  </label>
                <input type="text" name="price" id="price" value="<?php echo $mat['price'];?>" class="input_field" />
				 <label>Name. </label>
                <input type="text" name="nam" id="nam" class="input_field" />
				 <label>Phone. </label>
                <input type="text" name="pho" id="php" class="input_field" />
				 <label>Address.</label>
                <textarea id="add" name="add" rows="0" cols="0" class="required"></textarea><br>
				 
         <input style="color: white;" type="submit" name="ord" id="ord" value="sent order" class="submit_button" />
				 <input style="color: white;" type="submit" name="Cancel" value="Cancel" class="submit_button" />
				
            </form>
            
        
        </div>  
            
            
            
            
            
            
        </div> <!-- END of content -->
                
		
            
           
      </div>
        
        <div class="clear"></div>
		
    </div> <!-- END of tooplate_main -->
    <div style="display:none;" class="nav_up" id="nav_up"></div>
</div>
<!-- END of tooplate_wrapper -->

    <div class="clear"></div>
    <div class="footer">
        Copyright © 2048 Knon
    </div> <!-- END of tooplate_footer_wrapper -->

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

