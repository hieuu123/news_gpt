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
    <?php
    include_once("header.php");
    ?>
    <title>Tìm kiếm bằng Google CSE</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        [id^="btn-sum-form"] {
            display: none;
            margin: 0 auto;
        }

        [id^="input-sum-form"] {
            border: none;
        }


        .a_tool {
            color: black;
        }

        .a_tool:hover {
            color: #0069d9;
        }

        .btn_tool {
            color: #ff656a;
            cursor: pointer;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .c {
            margin-top: 15px;
            min-height: 500px;
        }

        .form_date {
            width: 25%;
        }

        .form_sl {
            width: 50%;
        }
        .nutxephang{
            height: 15px;
        }
    </style>
    </head>

    <body>
        <div class="container c">
            <h2>Bảng xếp hạng các bài viết</h2>

            <form action="" method="post" >
                <div class="form-group">
                    <input type="hidden" name="theoview" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary nutxephang">Bảng xếp hạng theo view</button>
            </form>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="theorating" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary nutxephang">Bảng xếp hạng theo rating</button>
            </form>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="theofavourite" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary nutxephang">Bảng xếp hạng theo favourite</button>
            </form>
            <?php
            if (isset($_POST['theoview'])) {
                $theoview = $_POST['theoview'];
                echo "<br><h2>Bảng xếp hạng theo view:</h2>";
                $query = "SELECT posts.*, categories.*, users.*, IFNULL(view_count.count, 0) AS view_count
                FROM posts
                JOIN categories ON posts.category_id = categories.category_id
                JOIN users ON posts.user_id = users.user_id
                LEFT JOIN (
                  SELECT post_id, COUNT(*) AS count
                  FROM history
                  GROUP BY post_id
                ) AS view_count ON posts.post_id = view_count.post_id
                ORDER BY view_count DESC;";
                $conn = new mysqli("localhost", "root", "", "cmsweb");
                if ($conn->connect_error) die($conn->connect_error);
                echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên tác giả</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Ngày đăng</th>
                    <th scope="col">Số lượt xem</th>
                  </tr>
                </thead>
                <tbody>';
                        $result = $conn->query($query);
                        $rows = $result->num_rows;
                        for ($j = 0; $j < $rows; ++$j) {
                            $variable = $result->data_seek($j);
                            $row = $result->fetch_assoc();
                            $post_id = $row['post_id'];
                            $title = $row['title'];
                            $username = $row['username'];
                            $category_name = $row['category_name'];
                            $created_at = $row['created_at'];
                            $time = $row['view_count'];
                            echo '';
                            echo '<tr>';
                            echo '<td><a  class="a_tool" href="detail_M.php?post_id=' . $post_id . '">' . $title . '</a></td>';
                            echo '<td>' . $username . '</td>';
                            echo '<td>' . $category_name . '</td>';
                            echo '<td>' . $created_at . '</td>';
                            echo '<td>' . $time . '</td>';
                            echo '</tr>';
                            echo '';
                        }
                        echo '</tbody></table>';
            }
            if (isset($_POST['theorating'])) {
                $theoview = $_POST['theorating'];
                echo "<br><h2>Bảng xếp hạng theo rating:</h2>";
                $query = "SELECT posts.*, categories.*, users.*, ROUND(IFNULL(avg_rating.avg_score, 0), 1) AS rating
                FROM posts
                JOIN categories ON posts.category_id = categories.category_id
                JOIN users ON posts.user_id = users.user_id
                LEFT JOIN (
                  SELECT post_id, AVG(score) AS avg_score
                  FROM rating
                  GROUP BY post_id
                ) AS avg_rating ON posts.post_id = avg_rating.post_id
                ORDER BY rating DESC;";
                $conn = new mysqli("localhost", "root", "", "cmsweb");
                if ($conn->connect_error) die($conn->connect_error);

                if (1 + 1 == 2) {
                echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên tác giả</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Ngày đăng</th>
                    <th scope="col">Rating</th>
                  </tr>
                </thead>
                <tbody>';
                    if (1 + 1 == 2) {
                        $result = $conn->query($query);
                        $rows = $result->num_rows;
                        for ($j = 0; $j < $rows; ++$j) {
                            $variable = $result->data_seek($j);
                            $row = $result->fetch_assoc();
                            $post_id = $row['post_id'];
                            $title = $row['title'];
                            $username = $row['username'];
                            $category_name = $row['category_name'];
                            $created_at = $row['created_at'];
                            $time = $row['rating'];
                            echo '';
                            echo '<tr>';
                            echo '<td><a  class="a_tool" href="detail_M.php?post_id=' . $post_id . '">' . $title . '</a></td>';
                            echo '<td>' . $username . '</td>';
                            echo '<td>' . $category_name . '</td>';
                            echo '<td>' . $created_at . '</td>';
                            echo '<td>' . $time . '</td>';
                            echo '</tr>';
                            echo '';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "Không tìm thấy kết quả nào cho từ khóa '$query'.";
                    }
                } else {
                    echo "Không tìm thấy kết quả cho từ khóa '$query'.";
                }
            }
            if (isset($_POST['theofavourite'])) {
                $theoview = $_POST['theofavourite'];
                echo "<br><h2>Bảng xếp hạng theo favorite:</h2>";
                $query = "SELECT posts.*, categories.*, users.*, IFNULL(favorite_count.count, 0) AS favorite_count
                FROM posts
                JOIN categories ON posts.category_id = categories.category_id
                JOIN users ON posts.user_id = users.user_id
                LEFT JOIN (
                  SELECT post_id, COUNT(*) AS count
                  FROM favorite
                  GROUP BY post_id
                ) AS favorite_count ON posts.post_id = favorite_count.post_id
                ORDER BY favorite_count DESC;";
                $conn = new mysqli("localhost", "root", "", "cmsweb");
                if ($conn->connect_error) die($conn->connect_error);

                if (1 + 1 == 2) {
                echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên tác giả</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Ngày đăng</th>
                    <th scope="col">Favorite</th>
                  </tr>
                </thead>
                <tbody>';
                    if (1 + 1 == 2) {
                        $result = $conn->query($query);
                        $rows = $result->num_rows;
                        for ($j = 0; $j < $rows; ++$j) {
                            $variable = $result->data_seek($j);
                            $row = $result->fetch_assoc();
                            $post_id = $row['post_id'];
                            $title = $row['title'];
                            $username = $row['username'];
                            $category_name = $row['category_name'];
                            $created_at = $row['created_at'];
                            $time = $row['favorite_count'];
                            echo '';
                            echo '<tr>';
                            echo '<td><a  class="a_tool" href="detail_M.php?post_id=' . $post_id . '">' . $title . '</a></td>';
                            echo '<td>' . $username . '</td>';
                            echo '<td>' . $category_name . '</td>';
                            echo '<td>' . $created_at . '</td>';
                            echo '<td>' . $time . '</td>';
                            echo '</tr>';
                            echo '';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "Không tìm thấy kết quả nào cho từ khóa '$query'.";
                    }
                } else {
                    echo "Không tìm thấy kết quả cho từ khóa '$query'.";
                }
            }
            // include('get_content.php');

            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </body>
    <?php
    include_once("footer.php");
    ?>

</html>