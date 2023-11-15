<!DOCTYPE html>
<html lang="en">
<head>
    <style>
               .card {
                    border: none;
                    box-shadow: 5px 6px 6px 2px #e9ecef;
                    border-radius: 4px;
                    width: 500px;
                    margin-left: -80px;
                }
                .dots{
                    height: 4px;
                    width: 4px;
                    margin-bottom: 2px;
                    background-color: #bbb;
                    border-radius: 50%;
                    display: inline-block;
                }
                .badge{
                    padding: 7px;
                    padding-right: 9px;
                    padding-left: 16px;
                    box-shadow: 5px 6px 6px 2px #e9ecef;
                }
                .check-icon{
                    font-size: 17px;
                    color: #c3bfbf;
                    top: 1px;
                    position: relative;
                    margin-left: 3px;
                }
                .form-check-input{
                    margin-top: 6px;
                    margin-left: -24px !important;
                    cursor: pointer;
                }
                .form-check-input:focus{
                    box-shadow: none;
                }
                .icons i{
                    margin-left: 8px;
                }
                .reply{
                    margin-left: 12px;
                }
                .reply small{
                    color: #b7b4b4;
                }
                .reply small:hover{
                    color: green;
                    cursor: pointer;
                }     
    </style>
</head>
<body>
    <?php
    include_once ("header.php");
    ?>
        <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                    <!-- Hot Aimated News Tittle-->
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
                            <!-- Trending Tittle -->                 
                            <div class="about-right mb-90">
<?php
include_once("connectSql.php");

if (isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $sql = "SELECT title, content, category_id FROM posts WHERE post_id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
                                <div class="about-img">
                                    <img src="assets/img/trending/trending_top.jpg" alt="">
                                </div>
                                <div class="section-tittle mb-30 pt-30">
                                    <h3><?php echo $row["title"]; ?></h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                    <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                    <p class="about-pera1 mb-25">
                                        My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.
                                        the refractor telescope uses a convex lens to focus the light on the eyepiece.
                                        The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see.
                                        Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the celestial body.
                                        Aperture is a fancy word for how big the lens of your telescope is. But it’s an important word because the aperture of the lens is the key to how powerful your telescope is. Magnification has nothing to do with it, its all in the aperture.
                                        Focuser is the housing that keeps the eyepiece of the telescope, or what you will look through, in place. The focuser has to be stable and in good repair for you to have an image you can rely on.
                                        Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                        Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                </div> 
                                <div class="section-tittle">
                                    <h3>Unordered list style?</h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">The refractor telescope uses a convex lens to focus the light on the eyepiece.
                                        The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see.</p>
                                    <p class="about-pera1 mb-25">Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the celestial body.</p>
                                    <p class="about-pera1 mb-25">
                                        My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.
                                        the refractor telescope uses a convex lens to focus the light on the eyepiece.
                                        The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see.
                                        Collimation is a term fo
                                        Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p> 
                                        <p class="about-pera1 mb-25">
                                        Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                        Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                        <p class="about-pera1 mb-25">
                                        Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                        Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                </div>
                                <?php
    } else {
        echo "Không tìm thấy bài viết.";
    }
} else {
    echo "Không tìm thấy bài viết.";
}
?>
                                <div class="social-share pt-30">
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- From -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-contact contact_form mb-80" action="submit_comment.php" method="post" id="contactForm" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                <input type='hidden' id='post-id' name='post_id' value='<?php echo $postId; ?>'>
                                                    <textarea class="form-control w-100 error" name="message" id="message" cols="50" rows="4" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your comment!'" placeholder="Enter Message"></textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="button button-contactForm boxed-btn" >Submit</button>
                                        </div>
                                    </form>
                <!-- Hiển thị bình luận -->
                            <div id='comment-section'>
                                <div class='container mt-5'>
                                <div class='row d-flex justify-content-center'>
                                    <div class='col-md-8'>
                                <?php
                                // Truy vấn cơ sở dữ liệu để lấy các bình luận và sắp xếp theo thời gian gần nhất
                                $postId = $_GET['post_id']; // Lấy post_id từ URL hoặc bất cứ cách nào phù hợp
                                $commentQuery = "SELECT users.user_id, users.username, comments.created_at, comments.content, posts.post_id
                                                FROM comments
                                                INNER JOIN users ON comments.user_id = users.user_id
                                                INNER JOIN posts ON comments.post_id = posts.post_id
                                                WHERE comments.post_id = '$postId'
                                                ORDER BY comments.created_at DESC";
                                $commentResult = $conn->query($commentQuery);

                                if ($commentResult->num_rows > 0) {
                                    while ($comment = $commentResult->fetch_assoc()) {
                                        echo "
                                            <div class='card p-3 mt-2'>
                                                <div class='comment d-flex justify-content-between align-items-center'>
                                                    <div class='comment-info user d-flex flex-row align-items-center'>
                                                        <strong class='user-info font-weight-bold text-primary'>
                                                            {$comment['username']} 
                                                        </strong>
                                                        <small class='comment-content font-weight-bold'>
                                                            {$comment['content']}
                                                        </small>
                                                    </div>
                                                    <small class='date-info'>{$comment['created_at']}</small>
                                                </div>
                                                <div class='action d-flex justify-content-between mt-2 align-items-center'>
                                                    <div class='reply px-4'>
                                                        <small>Remove</small>
                                                        <span class='dots'></span>
                                                        <small>Reply</small>
                                                        <span class='dots'></span>
                                                        <small>Translate</small>
                                                    </div>
                                                    <div class='icons align-items-center'>
                                                        <i class='fa fa-star text-warning'></i>
                                                        <i class='fa fa-check-circle-o check-icon'></i>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                } else {
                                    echo "Chưa có bình luận nào.";
                                }                                
                                ?>
                            </div>
                            </div>
                            </div>
                            </div>
                            
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Follow Us</h3>
                            </div>
                            <!-- Flow Socail -->
                            <div class="single-follow mb-45">
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">  
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div> 
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                        <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- New Poster -->
                            <div class="news-poster d-none d-lg-block">
                                <img src="assets/img/news/news_card.jpg" alt="">
                            </div>
                        </div>
                   </div>
            </div>
        </div>
        <!-- About US End -->
    </main>

    <?php
    include_once ("footer.php");
    ?>
</body>
</html>