<?php
session_start();
if (empty($_SESSION['sid'])) {
    header('Location: index.php');
    exit();
}

include("connection.php");

// Fetch the total number of orders
$query = "SELECT COUNT(*) AS total_orders FROM orders";
$result = mysql_query($query) or die("Failed to retrieve orders count: " . mysql_error());
$row = mysql_fetch_assoc($result);
$total_orders = $row['total_orders'];

// Fetch the total number of feedbacks
$feedback_query = "SELECT COUNT(*) AS total_feedbacks FROM content";
$feedback_result = mysql_query($feedback_query) or die("Failed to retrieve feedback count: " . mysql_error());
$feedback_row = mysql_fetch_assoc($feedback_result);
$total_feedbacks = $feedback_row['total_feedbacks'];

mysql_close($con);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wood Stock - Home</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="tooplate_style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.6.3.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" />
    <script type="text/javascript" src="js/slimbox2.js"></script>
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <style>
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .nav_up {
            display: none;
            position: fixed;
            bottom: 60px;
            right: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px;
            cursor: pointer;
        }
        .nav_up:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div id="tooplate_wrapper">
    <h1 class="header">Play Station</h1>
    <div id="tooplate_header1">
        <a href="home.php" class="sitetitle">Wood Stock</a>
        <div id="tooplate_menu">
            <ul>
                <li><a href="home.php" class="selected">Home</a></li>
                <li><a href="insert.php">Insert</a></li>
                <li><a href="view-product.php">Product</a></li>
                <li><a href="view-order.php">Order</a></li>
                <li><a href="view-feedback.php">Feedback</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div> <!-- end of tooplate_menu -->
    </div> <!-- END of header -->
    <div id="tooplate_main">
        <h2 class="header">Welcome Admin</h2>
        <h4>Total Orders  =  <strong><?php echo $total_orders; ?> orders</strong></h4>
		<h4>Total Feedbacks  =  <strong><?php echo $total_feedbacks; ?> feetbacks</strong></h4>
    </div> <!-- END of tooplate_main -->

    <div class="nav_up" id="nav_up">Scroll to Top</div>
</div> <!-- END of tooplate_wrapper -->

<div class="footer">
    Copyright © 2048 Your Company Name
</div>

<script src="js/scroll-startstop.events.jquery.js"></script>
<script type="text/javascript">
$(function() {
    $('#nav_up').fadeIn('slow');

    $(window).on('scrollstart', function() {
        $('#nav_up').stop().animate({'opacity': '0.2'});
    });

    $(window).on('scrollstop', function() {
        $('#nav_up').stop().animate({'opacity': '1'});
    });

    $('#nav_up').click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
    });
});
</script>

</body>
</html>
