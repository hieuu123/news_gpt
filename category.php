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
<style>
    .trand-right-img{
        width: 120px;
        height: 100px;
    }
    .trend-bottom-img{
        width: 236.67px;
        height: 157.78px;
        
    }
    
    .text-hidden {
        max-width: 236.67px; /* Kích thước tối đa của div container */
        /* overflow: hidden; Ẩn nội dung vượt quá kích thước */
        /* white-space: nowrap; Ngăn các từ bị ngắt dòng */
        /* text-overflow: ellipsis; Hiển thị dấu ba chấm khi nội dung bị ẩn */
        /* display: block; Thay đổi display thành block */
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1; /* Số dòng tối đa hiển thị */
        -webkit-box-orient: vertical;
    }
</style>
</head>
<body>
<main>
            <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="assets/img/trending/trending_top.jpg" alt="">
                                <div class="trend-top-cap">
                                    <span>Appetizers</span>
                                    <h2>
                                        <a href="detail_M.php">Welcome To The Best Model Winner<br> Contest At Look of the year</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                        <!-- Anh Nhan viet tu day nha-->
                            <?php 
                                require_once "connectSql.php"; 
                                // Kiểm tra nếu tồn tại tham số category_id trong URL
                                if (isset($_GET['category_id'])) {
                                    $category_id = $_GET['category_id'];
                                    $start_row = 0; // Hàng bắt đầu
                                    $end_row = 2;   // Hàng kết thúc
                                    // Truy vấn cơ sở dữ liệu để lấy bài viết thuộc category_id
                                    $sql = "SELECT posts.*, categories.category_id
                                            FROM posts inner join categories on posts.category_id = categories.category_id
                                            WHERE posts.category_id = $category_id
                                            LIMIT $start_row, " . ($end_row - $start_row + 1);
                                    $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        // $count=0;
                                        while( $row = $result->fetch_assoc()){
                                        echo "
                                            <div class='col-lg-4'>
                                                <div class='single-bottom mb-35'>
                                                    <div class='trend-bottom-img mb-30'>
                                                        <img src='{$row['image']}' alt='posts' style='width: 100%; height: 100%;'>
                                                    </div>
                                                    <div class='trend-bottom-cap'>
                                                        <a class='text-hidden' href='detail_M.php?post_id={$row['post_id']}'>
                                                            <span class='color2 text-hidden'>{$row['title']}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                        // $count++;
                                        }
                                        } else {
                                                echo "Không có bài viết thuộc category này.";
                                            }
                                } else {
                                        echo "Không tìm thấy category.";
                                    }
                            ?>

                        <!--Tới đây nhé -->
                            </div>
                        </div>
                    </div>

                    <!-- Riht content -->
                    <div class="col-lg-4">
                    <?php
                       require_once "connectSql.php";

                        if (isset($_GET["category_id"])) {
                            $category_id = $_GET["category_id"];
                            // Điều chỉnh truy vấn SQL với LIMIT
                            $start_row = 3; // Hàng bắt đầu (là hàng thứ 4)
                            $end_row = 7;   // Hàng kết thúc (là hàng thứ 8)
                            
                            $sql = "SELECT posts.*, post_id, categories.category_id
                                    FROM posts INNER JOIN categories ON posts.category_id = categories.category_id
                                    WHERE posts.category_id = $category_id
                                    LIMIT $start_row, " . ($end_row - $start_row + 1);
                                    // ORDER BY posts.created_at DESC/ASC -- lấy 3 bài viết mới nhất/ cũ nhất
                                    // LIMIT 3";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                    <div class='trand-right-single d-flex'>
                                        <div class='trand-right-img'>
                                            <img src='{$row['image']}' alt='hinh anh'>
                                        </div>
                                        <div class='trand-right-cap'>
                                        <a class ='text-hidden' href='detail_M.php?post_id={$row['post_id']}'>
                                            <span class='color1'>{$row['title']}</span>
                                            </a>
                                            <h4>
                                                <a class ='text-hidden' href='detail_M.php?post_id={$row['post_id']}'>
                                                    {$row['content']}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    ";
                                }
                            } else {
                                echo "Không có bài viết thuộc category này.";
                            }
                        } else {
                            echo "Không tìm thấy category.";
                        }
                    ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
    <div class="col-12">
        <div class='weekly2-news-active dot-style d-flex dot-style'>
            <?php 
            require_once "connectSql.php";
            if(isset($_GET["category_id"])){
                $category_id = $_GET["category_id"];

                $sql = "SELECT posts.*, categories.category_id
                        FROM posts INNER JOIN categories ON posts.category_id = categories.category_id
                        WHERE posts.category_id = ?
                        ORDER BY posts.created_at DESC
                        LIMIT 5";

                // Sử dụng Prepared Statements để bảo vệ mã của bạn khỏi SQL injection
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $category_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        // Format ngày tháng
                        $formattedDate = date("d M Y", strtotime($row['created_at']));

                        // Hiển thị một phần nội dung và liên kết đến trang chi tiết
                        echo "
                            <div class='weekly2-single'>
                                <div class='weekly2-img'>
                                    <img src='assets/img/news/weekly2News1.jpg' alt='Hinh Anh'>
                                </div>
                                <div class='weekly2-caption'>
                                    <span class='color1'>{$row['title']}</span>
                                    <p>{$formattedDate}</p>
                                    <h4><a href='detail_M.php?post_id={$row['post_id']}'>Read More</a></h4>
                                </div>
                            </div>
                        ";
                    }
                } else {
                    echo "Không có bài viết thuộc category này!!";
                }
            } else {
                echo "This category is not found!!";
            }
            ?>
        </div>
    </div>
</div>
            </div> <!-- row-->
        </div>
    </div>           
    <!-- End Weekly-News -->

</main>
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
