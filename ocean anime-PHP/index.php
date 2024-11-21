<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Anime</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- FontAwesome -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- Google Fonts -->
    <link rel="stylesheet" href="css/tooplate-wave-cafe.css">
    <link href="tooplate_style.css" rel="stylesheet" type="text/css" />
    <style>
        /* Custom styles for improved form and table design */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 240px;
            text-align: center;
            padding: 10px;
        }
        .product-item img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .product-info {
            padding: 10px;
        }
        .product-info h3 {
            margin: 0 0 10px;
        }
        .buy-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #009999;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .buy-button:hover {
            background-color: #007f7f;
        }
        .input_field {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit_button {
            padding: 10px 20px;
            background-color: #009999;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .submit_button:hover {
            background-color: #007f7f;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        .contact-form {
            margin: 20px 0;
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-form textarea {
            resize: vertical;
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
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Product</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>Register</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>About</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        <main class="tm-main">
          <div id="drink" class="tm-page-content">
            <!-- Product Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <h1 style="color: #009999; margin-top:20px;">Anime Figures</h1>
                </li>
              </ul>
            </nav>

            <div id="cold" class="tm-tab-content">
              
              <?php
              include("connection.php");

              $query = "SELECT * FROM item";
              $result = mysql_query($query);

              if (!$result) {
                  die("Query failed: " . mysql_error());
              }
              ?>

              <div class="product-container">
                <?php
                while ($arr = mysql_fetch_array($result)) {
                    $i = $arr['img'];
                    $productName = htmlspecialchars($arr['prod_no']);
                    $price = htmlspecialchars($arr['price']);
                ?>
                    <div class="product-item">
                        <img src="admin/image/<?php echo $i; ?>" alt="Product Image">
                        <div class="product-info">
                            <h3><?php echo $productName; ?></h3>
                            <p><b>Price:</b> <?php echo $price; ?></p>
                            <a href="login.php?img=<?php echo $i; ?>" class="buy-button">Buy</a>
                        </div>
                    </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">              
              <h2 class="tm-text-primary tm-about-header">Register form</h2>
              <div class="tm-list-item tm-list-item-2">
            
    	
          <div style="margin-left:20px;" id="comment_form">
            
            <?php
				error_reporting(1);
				include("connection.php");
				if($_POST['sub'])
				{ 
				$name=$_POST['t1'];
				$email=$_POST['t2'];
				$password=$_POST['t3'];
				$phone=$_POST['t4'];
				$city=$_POST['t5'];
				$town=$_POST['t6'];
				if(mysql_query("insert into register(name,email,password,phone,city,township) values('$name','$email','$password','$phone','$city','$town')"))
				{
				//echo "<script>location.href='reg_success.php?email=$email'</script>"; 
				header("location:reg_success.php?name=$name & email=$email");}
				else {$error= "user already exists";}}

			?>
            <form style="margin: left 100px;" method="post">
                <label>Name </label>
                <input type="text" name="t1" id="t1" class="input_field" />
                <label>Email</label>
                <input type="email" name="t2" id="t2" class="input_field" />
				 <label>Password</label>
                <input type="password" name="t3" id="t3" class="input_field" />
				 <label>Phone </label>
                <input type="text" name="t4" id="t4" class="input_field" />
				 <label>City </label>
                <input type="text" name="t5" id="t5" class="input_field" />
				 <label>Country </label>
                <input type="text" name="t6" id="t6" class="input_field" />
                <input style="margin-left:20px" type="submit" name="sub" id="sub" value="Register" class="submit_button" />
				 <input style="margin-left:20px" type="reset" name="Cancel" value="Cancel" class="submit_button" />
				<label><?php echo "<font color='red'>$error</font>";?></label>
            </form>
            
        
					</div>    
                  </div> 
                </div>
              </div> 
     


          <!-- Special Items Page -->
          <div id="special" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">              
              <h2 class="tm-text-primary tm-about-header">About Ocean Anime</h2>
              <div class="tm-list-item tm-list-item-2">                
                <img src="img/anime collection.jpg" alt="Image" class="tm-list-item-img tm-list-item-img-big">
                <div class="tm-list-item-text-2">
                  <p>This is a shop that sells anime figures for anime lovers at the cheapest prices!</p>
                </div>                
              </div>
            </div>
            <div class="tm-black-bg tm-mb-20 tm-about-box-2">              
              <div class="tm-list-item tm-list-item-2">                
                <div class="tm-list-item-text-2">
                  <h2 class="tm-text-primary">How We Began</h2>
                  <p>Began in 2012 in Tokyo.</p>                  
                </div>                
                <img src="img/luffy king.jpg" alt="Image" class="tm-list-item-img tm-list-item-img-big tm-img-right">                
              </div>
              <p>When I started collecting Anime Figures.</p>
            </div>            
          </div>

          <!-- Contact Page -->
          <div id="contact" class="tm-black-bg tm-page-content">
    <?php
    error_reporting(1);
    include("connection.php");

    $successMessage = '';
    $errorMessage = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub'])) {
        $name = mysql_real_escape_string($_POST['t1']);
        $email = mysql_real_escape_string($_POST['t2']);
        $phone = mysql_real_escape_string($_POST['t3']);
        $mesg = mysql_real_escape_string($_POST['t4']);

        if (mysql_query("INSERT INTO content (name, email, phone, mesg) VALUES ('$name', '$email', '$phone', '$mesg')")) {
            // Redirect to prevent resubmission
            header("Location: ".$_SERVER['PHP_SELF']."?success=1");
            exit();
        } else {
            $errorMessage = "Error sending message: " . mysql_error();
        }
    }

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        $successMessage = "Message sent successfully";
    }
    ?>

    <h2 style="color: #009999">Contact Information</h2>
    <div style="margin-left:20px;" id="comment_form" class="contact-form">
        <h3 style="color: #009999">Send a Message</h3>
        <form method="post">
            <label for="t1">Name</label>
            <input type="text" id="t1" name="t1" class="input_field" required />

            <label for="t2">Email</label>
            <input type="email" id="t2" name="t2" class="input_field" required />

            <label for="t3">Phone</label>
            <input type="text" id="t3" name="t3" class="input_field" required />

            <label for="t4">Message</label>
            <textarea id="t4" name="t4" rows="4" class="input_field" required></textarea>

            <input type="submit" name="sub" id="sub" value="Send" class="submit_button" />

            <?php if ($successMessage): ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <?php if ($errorMessage): ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
        </form>
    </div>
</div>



        </main>
      </div>    
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright KnonPage</p>
    </footer>
  </div>
  
  <!-- Background video -->
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
      </video>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>    
  <script>
    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }    

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`)); 
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){
      initPage();

      $('.tm-page-link').click(function(event) {
        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });

      $('.tm-tab-link').on('click', e => {
        e.preventDefault(); 
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab

      setVideoSize();

      let timeout;
      window.onresize = function(){
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

      const btn = $("#tm-video-control-button");
      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });
    
  </script>
  
</body>
</html>
