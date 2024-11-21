<?php
session_start();
if (empty($_SESSION['sid'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wood Stock - Gallery</title>
    <link href="tooplate_style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.6.3.js"></script>
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css">
    <script src="js/slimbox2.js"></script>
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css">
    <style>
        /* Inline styles for simplicity, consider moving to an external stylesheet */
        .product-table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            border: 1px solid #000;
        }
        .product-table th, .product-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        .product-table img {
            max-width: 200px;
            height: auto;
        }
        .footer {
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        #tooplate_header1 {
            padding: 10px;
        }
     
        
        #tooplate_menu ul li a.selected {
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="tooplate_wrapper">
        <h1 class="text-center">Play Station</h1>
        <div id="tooplate_header1">
            <a href="index.html" class="sitetitle">Wood Stock</a>
            <div id="tooplate_menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="insert.php">Insert</a></li>
                    <li><a href="view-product.php" class="selected">Product</a></li>
                    <li><a href="view-order.php">Order</a></li>
                    <li><a href="view-feedback.php">Feedback</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div id="tooplate_main">
            <h2 class="text-center">View Product</h2>
            <?php
            error_reporting(E_ALL);
            include("connection.php");

            // Make sure to replace mysql_* functions with mysqli_* or PDO in the future
            $sel = mysql_query("SELECT * FROM item");

            if ($sel) {
                echo "<table class='product-table'>
                <tr>
                    <th>Image</th>
                    <th>Product No</th>
                    <th>Price</th>
                </tr>";

                while ($arr = mysql_fetch_array($sel)) {
                    $i = $arr['img'];
                    echo "<tr>
                        <td><img src='image/$i' alt='Product Image'></td>
                        <td>{$arr['prod_no']}</td>
                        <td>{$arr['price']}</td>
                    </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>
    <div class="clear"></div>
        <div class="footer">
			Copyright © 2048 Your Company Name 
		</div>
    <script src="js/scroll-startstop.events.jquery.js"></script>
    <script>
    $(function() {
        var $elem = $('#content');

        $('#nav_up').fadeIn('slow');

        $(window).on('scrollstart', function() {
            $('#nav_up, #nav_down').stop().animate({'opacity': '0.2'});
        });

        $(window).on('scrollstop', function() {
            $('#nav_up, #nav_down').stop().animate({'opacity': '1'});
        });

        $('#nav_up').click(function() {
            $('html, body').animate({scrollTop: '0px'}, 800);
        });
    });
    </script>
</body>
</html>
