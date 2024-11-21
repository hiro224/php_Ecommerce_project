<?php
session_start();
error_reporting(1);
include("connection.php");
if(isset($_POST['log']))
{ if($_POST['id']=="" || $_POST['pwd']=="")
{ $err="fill your id and password first"; }
else 
{$d=mysql_query("select * from user where name='{$_POST['id']}' ");
$row=mysql_fetch_object($d);
$fid=$row->name;
$fpass=$row->pass; 
if($fid==$_POST['id'] && $fpass==$_POST['pwd'])
{$_SESSION['sid']=$_POST['id'];
header('location:home.php'); }
else { $er=" your password is not"; }}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Anime</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link href="tooplate_style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-1.6.3.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" />
    <script src="js/slimbox2.js"></script>
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
</head>
<body>

<div id="tooplate_wrapper">
    <div id="tooplate_header">
        <h1 align="center" style="color: white;">Ocean Anime</h1>
    </div> <!-- END of header -->

    <div id="tooplate_main">
        <div id="contact_form" class="col_2">
            <h2 style="color: white;">Admin Log In</h2>
            <form method="post" name="contact" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="col_4 no_margin_right">
                    <label for="id">User Name:</label>
                    <input type="text" id="id" name="id" class="input-admin" />
                </div>
                <div class="col_4 no_margin_right">
                    <label for="pwd">Password:</label>
                    <input type="password" id="pwd" name="pwd" class="input-admin" />
                </div>
                <button name="log" id="log" value="Log in" class="button-login">Login</button>
            </form>
        </div>   
            <img style="height: 300px; width: 200px;" src="images/gf2.gif" alt="Animated GIF">   
    </div>
</div>

<script src="js/scroll-startstop.events.jquery.js"></script>
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
        
        $('#nav_up').click(function (e) {
            $('html, body').animate({scrollTop: '0px'}, 800);
        });
    });
</script>

</body>
</html>
