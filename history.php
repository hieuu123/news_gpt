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
            <h2>Lịch sử xem của người dùng</h2>
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $query = "SELECT username, history.time_view, title, content, history.post_id FROM `history` INNER join `posts` on history.post_id = posts.post_id INNER JOIN `users` on history.user_id = users.user_id where username = '$username';";
                $conn = new mysqli("localhost", "root", "", "cmsweb");
                if ($conn->connect_error) die($conn->connect_error);
                echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Ngày xem</th>
                    <th scope="col">Tiêu đề bài đăng</th>
                  </tr>
                </thead>
                <tbody>';
                if ($result = $conn->query($query)) {
                    $rows = $result->num_rows;
                        for ($j = 0; $j < $rows; ++$j) {
                            $variable = $result->data_seek($j);
                            $row = $result->fetch_assoc();
                            $post_id = $row['post_id'];
                            $username = $row['username'];
                            $time_view = $row['time_view'];
                            $title = $row['title'];

                            echo '';
                            echo '<tr>';
                            echo '<td>' . $username . '</td>';
                            echo '<td>' . $time_view . '</td>';
                            echo '<td><a  class="a_tool" href="detail_M.php?post_id=' . $post_id . '">' . $title . '</a></td>';
                            echo '</tr>';
                            echo '';
                        }
                        echo '</tbody></table>';
                }               
            }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </body>
    <?php
    include_once("footer.php");
    ?>

</html>