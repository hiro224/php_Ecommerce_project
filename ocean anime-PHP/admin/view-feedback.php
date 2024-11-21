<?php
session_start();
if (empty($_SESSION['sid'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wood Stock - Feedback</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="tooplate_style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.6.3.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" />
    <script type="text/javascript" src="js/slimbox2.js"></script>
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px dotted #000;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: black;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
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
        <a href="index.html" class="sitetitle">Wood Stock</a>
        <div id="tooplate_menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="insert.php">Insert</a></li>
                <li><a href="view-product.php">Product</a></li>
                <li><a href="view-order.php">Order</a></li>
                <li><a href="view-feedback.php" class="selected">Feedback</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div> <!-- end of tooplate_menu -->
    </div> <!-- END of header -->
    
    <div id="tooplate_main">
        <h2 class="header">View Feedback Messages</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
            <?php
            error_reporting(E_ALL); // Enable full error reporting
            include("connection.php");

            $sel = mysql_query("SELECT * FROM content");
            if (!$sel) {
                die("Query failed: " . mysql_error());
            }

            while ($row = mysql_fetch_array($sel)) {
                echo "<tr>";
                echo "<td>{$row['con_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['mesg']}</td>";
                echo "</tr>";
            }

            mysql_close($con);
            ?>
        </table>
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
