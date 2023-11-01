<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/ticker-style.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/hqn.css">

        <!-- Fontawesome -->
            <script src="https://kit.fontawesome.com/d3b4b6d594.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header">
                <div class="header-top black-bg d-none d-md-block">
                   <div class="container">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <i class="fa-regular fa-calendar-days fa-beat-fade" style="color: #fc3f00;"></i>
                                        <li>
                                            <?php
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $current_date = date("D d - m - Y");
                                            echo $current_date;
                                            ?>
                                        </li>

                                        <i class="fa-regular fa-clock fa-beat-fade" style="color: #fc3f00;"></i>
                                        <li>
                                            <?php
                                            $current_time = date("h : i A");
                                            echo $current_time;
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#">Đăng Nhập</a></li>    
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/img/logo/hqn_logo/logo_slogan.jpg" alt="" width="100%"></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-10 header-flex">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>    
                                        <?php 
                                            require_once "connectSql.php";
                                                $sql = "SELECT categories.*
                                                        From categories where  category_id <= '7'";
                                                $result = $conn->query($sql);
                                                ?>

                                      <ul id="navigation">    
                                            <?php
                                                while (($row= $result->fetch_assoc())){
                                                echo "    <li><a href='content_cate.php?category_id={$row['category_id']}'>{$row['category_name']}</a></li> ";
                                                }
                                                // $show = "SELECT posts.*, categories.category_name
                                                // FROM posts
                                                // INNER JOIN categories ON posts.category_id = categories.category_id";
                                                // $result_Show = $conn->query($show);
                                                // if($result_Show->num_rows > 0){
                                                //     while($rowS=$result_Show->fetch_assoc()){
                                                //         echo"
                                                //         <a target='blank' href='content_cate.php?cat_id={$rowS['category_id']}'>
                                                //         {$rowS['category_name']}
                                                //         </a> ";
                                                //     }
                                                // }        
                                            ?>    
                                            <li>
                                                <i class="fa-solid fa-bars" style="color: #fc3f00;"></i>
                                                <ul class="submenu">
                                                    <div class="container">
                                                        <div class="row">
                                                        <?php 
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where  category_id <= '4'";
                                                            $result = $conn->query($sql);
                                                            while (($row= $result->fetch_assoc())){
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                                {$row['category_name']}
                                                            </a></span>
                                                        ";
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="row">
                                                        <?php 
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '4' and category_id <= '8'";
                                                            $result = $conn->query($sql);
                                                            while (($row= $result->fetch_assoc())){
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>
                                                        ";
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="row">
                                                        <?php 
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '8' and category_id <= '12'";
                                                            $result = $conn->query($sql);
                                                            while (($row= $result->fetch_assoc())){
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>                                                        
                                                        ";
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="row">
                                                        <?php 
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '12' and category_id <= '16'";
                                                            $result = $conn->query($sql);
                                                            while (($row= $result->fetch_assoc())){
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>                                                        
                                                        ";
                                                            }
                                                        ?>
                                                        </div>
                                                        <div class="row">
                                                        <?php 
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '16' and category_id <= '20'";
                                                            $result = $conn->query($sql);
                                                            while (($row= $result->fetch_assoc())){
                                                            echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>
                                                            ";
                                                            }
                                                        ?>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input type="text" placeholder="Search">   
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->

    </header>
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="./assets/js/jquery.ticker.js"></script>
        <script src="./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

</body>
</html>