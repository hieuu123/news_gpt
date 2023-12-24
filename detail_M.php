<?php
ob_start();
session_start(); ?>
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

        .dots {
            height: 4px;
            width: 4px;
            margin-bottom: 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .badge {
            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef;
        }

        .check-icon {
            font-size: 17px;
            color: #c3bfbf;
            top: 1px;
            position: relative;
            margin-left: 3px;
        }

        .form-check-input {
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer;
        }

        .form-check-input:focus {
            box-shadow: none;
        }

        .icons i {
            margin-left: 8px;
        }

        .reply {
            margin-left: 12px;
        }

        .reply small {
            color: #b7b4b4;
        }

        .reply small:hover {
            color: green;
            cursor: pointer;
        }

        .dai {
            width: 200%;
        }

        p>a {
            color: blue;
        }

        p>a:hover {
            color: black;
        }

        .buttonfavourite {
            background-color: pink;
        }

        .buttonfavourite:hover {
            background-color: palevioletred;
        }
        #cmt{
            color: black;
            font-size: small;
        }
    </style>
</head>

<body>
    <?php
    include_once("header.php");
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
                                    <li class="news-item"><a>Tiêu đề 1</a></li>
                                    <li class="news-item"><a>Tiêu đề 2</a></li>
                                    <li class="news-item"><a>Tiêu đề 3</a></li>
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
                                $sql = "SELECT * FROM posts WHERE post_id = $post_id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                            ?>
                                    <div class="about-img">
                                        <?php
                                        $image = $row["image"];
                                        echo '<img src="' . $image . '" alt="">';
                                        ?>
                                    </div>
                                    <div class="section-tittle mb-30 pt-30">
                                        <h1 style=""><?php echo $row["title"]; ?></h1>
                                    </div>
                                    <div class="about-prea">
                                        <?php echo $row["content"]; ?>
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
                        <button class="favorite-button buttonfavourite" id="favouritebtn">
                            <i class="fas fa-heart "></i> Favorite
                        </button><br><br><br>
                        <script>
                            const button = document.getElementById('favouritebtn');

                            button.addEventListener('click', function() {
                                const url = 'favourite_process.php?favorite=true&post_id=<?php echo $_GET["post_id"]; ?>';

                                fetch(url)
                                    .then(response => {
                                        if (response.ok) {
                                            // Process successful response here
                                            console.log('Favorite request sent successfully!');
                                            return response.text(); // Parse response body as text
                                        } else {
                                            // Handle error response here
                                            console.error('Error sending favorite request.');
                                        }
                                    })
                                    .then(data => {
                                        // Handle response data here
                                        console.log('Favorite request sent successfully!');
                                        alert(data);
                                    })
                                    .catch(error => {
                                        // Handle network or fetch error here
                                        console.error('Fetch error:', error);
                                    });
                            });
                        </script>
                        <?php include('star.php') ?>
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-contact contact_form mb-80" action="submit_comment.php" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type='hidden' id='post-id' name='post_id' value='<?php echo $_GET['post_id']; ?>'>
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="50" rows="4" 
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your comment!'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                                    </div>
                                </form>
                                <!-- Hiển thị bình luận -->
                                <div id='comment-section'>
                                    <div class='container mt-5'>
                                        <div class='row d-flex justify-content-center'>
                                            <div class='col-md-8'>
                                                <?php
                                                // Truy vấn cơ sở dữ liệu để lấy các bình luận và sắp xếp theo thời gian gần nhất
                                                if (isset($_GET['post_id'])) {
                                                    $postId = $_GET['post_id'];
                                                    // Lấy post_id từ URL hoặc bất cứ cách nào phù hợp
                                                    $commentQuery = "SELECT users.user_id, users.username, comments.created_at, comments.content, posts.post_id, comments.comment_id
                                                FROM comments
                                                INNER JOIN users ON comments.user_id = users.user_id
                                                INNER JOIN posts ON comments.post_id = posts.post_id
                                                WHERE comments.post_id = '$postId'
                                                ORDER BY comments.created_at DESC";
                                                    $commentResult = $conn->query($commentQuery);
                                                    if ($commentResult !== false) {
                                                        if ($commentResult->num_rows > 0) {
                                                            while ($comment = $commentResult->fetch_assoc()) {
                                                                echo "
                                                <div class='card p-3 mt-2 dai'>
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
                                                            
                                                            <a id='cmt' href='s_comment_del.php?comment_id={$comment['comment_id']}'>Remove</a>
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
                                                    } else {
                                                        echo "Query execution failed.";
                                                    }
                                                } else {
                                                    echo "Trang bị lỗi.";
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
    echo "<br>";
    include_once("connectSql.php");
    if (isset($_GET["post_id"])) {
        $post_id = $_GET["post_id"];
        if (isset($_SESSION['roles']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $role_get = $_SESSION['roles'];
            $username_get = $_SESSION['username'];
            $password_get = $_SESSION['password'];
            $query = "SELECT * FROM users
        JOIN roles ON users.role_id = roles.role_id
        Where username = '$username_get'
        ORDER BY user_id ASC";
            $result = $conn->query($query);
            $rows = $result->num_rows;
            $result->data_seek($rows);
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
            $insertViewSql = "INSERT INTO history (user_id, post_id, time_view) VALUES ('$user_id' ,'$post_id', now())";
            if ($conn->query($insertViewSql) === TRUE) {
            } else {
                echo "Lỗi: " . $insertViewSql . "<br>" . $conn->error;
            }
        }
    }
    ?>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>