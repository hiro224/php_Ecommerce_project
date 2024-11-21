<?php
session_start();
if (empty($_SESSION['sid'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['sub'])) {
    error_reporting(E_ALL); // Enable all error reporting for development

    include("connection.php");

    $img = $_FILES['img']['name'];
    $prono = mysql_real_escape_string($_POST['t1']);
    $price = mysql_real_escape_string($_POST['t2']);

    if (!empty($img) && !empty($prono) && !empty($price)) {
        $qry = "INSERT INTO item (img, prod_no, price) VALUES ('$img', '$prono', '$price')";
        $result = mysql_query($qry) or die("Save items query failed: " . mysql_error());

        if ($result) {
            // Ensure the directory exists
            $uploadDir = "image/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Move the uploaded file
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $img);

            $err = "<font size='+2'>Item inserted successfully</font>";
        } else {
            $err = "<font size='+2'>Item could not be inserted</font>";
        }
    } else {
        $err = "<font size='+2'>Please fill in all fields</font>";
    }

    mysql_close($con);
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
        .product-form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 5px;
            width: 600px;
            background-color: #e056562a;
        }
        .product-form table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-form td {
            padding: 10px;
        }
        .product-form input[type="text"],
        .product-form input[type="file"] {
            width: 100%;
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
        #tooplate_menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #tooplate_menu ul li {
            display: inline;
            margin-right: 10px;
        }
        #tooplate_menu ul li a {
            text-decoration: none;
            color: #333;
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
                    <li><a href="insert.php" class="selected">Insert</a></li>
                    <li><a href="view-product.php">Product</a></li>
                    <li><a href="view-order.php">Order</a></li>
                    <li><a href="view-feedback.php">Feedback</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div id="tooplate_main">
            <div id="contact_form" class="product-form">
                <h2>Insert Image</h2>
                <form name="testform" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><span class="style3">Image:</span></td>
                            <td><input name="img" type="file" required></td>
                        </tr>
                        <tr>
                            <td><span class="style3">Product Name:</span></td>
                            <td><input name="t1" type="text" class="input-admin" required></td>
                        </tr>
                        <tr>
                            <td><span class="style3">Price:</span></td>
                            <td><input name="t2" type="text" class="input-admin" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button class="button-login" name="sub" type="submit">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <h2 class="text-center"><?php echo isset($err) ? $err : ''; ?></h2>
            </div>
        </div>
    </div>
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
