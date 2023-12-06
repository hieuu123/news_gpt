<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Trang E-commerce</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
<style>
    #post {
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-bottom: 10px;
    }

    input[type="text"],
    select {
        padding: 5px 50px;
        border: 1px solid #ccc;
        border-radius: 3px;
        outline: none;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    .search-container input[type="text"] {
        padding: 10px;
        border-radius: 5px 0 0 5px;
    }

    .search-container button {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }

    .search-container button:hover {
        background-color: #45a049;
    }

    #ctl {
        margin-top: 25px;
    }

    #forn {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-top: 15px;
    }
</style>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    /* Style for popup overlay */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: visibility 0s, opacity 0.3s;
    }

    /* Style for popup container */
    .popup {
        height: 70%;
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        overflow-y: scroll;
    }

    /* Show the popup when the overlay is visible */
    .overlay.visible {
        visibility: visible;
        opacity: 1;
    }

    /* Style for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        height: 50%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Style for the close button */
    .close-button {
        position: absolute;
        top: 20px;
        right: 20px;
        cursor: pointer;
        font-size: 25px;
        color: white;
    }

    /* Style for input fields */
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 5px;
        box-sizing: border-box;
    }
    .mybtn {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
}
</style>
<?php
include "header.php";
?>


<body>
    <h1 style="text-align: center;">Post Edit Table</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card" id="forn">
                <div class="row">
                        <?php // sqltest.php
                        /////
                        $ckct = 0;
                        $conn = new mysqli("localhost", "root", "", "cmsweb");
                        if ($conn->connect_error) die($conn->connect_error);
                        $query = "SELECT * FROM users
          JOIN roles ON users.role_id = roles.role_id
          ORDER BY user_id ASC;";
                        $result = $conn->query($query);
                        $rows = $result->num_rows;
                        if (
                            isset($_SESSION['roles']) &&
                            isset($_SESSION['username']) &&
                            isset($_SESSION['password'])
                        ) {
                            $role_get = $_SESSION['roles'];
                            $username_get = $_SESSION['username'];
                            $password_get = $_SESSION['password'];
                            $query = "SELECT * FROM users
          JOIN roles ON users.role_id = roles.role_id
          ORDER BY user_id ASC;";
                            $result = $conn->query($query);
                            $rows = $result->num_rows;
                            $check = "";
                            $conf = "";
                            $user_id = "";
                            for ($j = 0; $j < $rows; ++$j) {
                                $result->data_seek($j);
                                $row = $result->fetch_assoc();
                                $role = $row['role_name'];
                                $email = $row['username'];
                                $password = $row['password'];
                                if ($username_get === $email && $password_get === $password && $role_get === "Administrator") {
                                    $check = "admin";
                                    $conf = "1";
                                    $user_id = $row['user_id'];
                                } else if ($role_get === $role && $username_get === $email && $password_get === $password) {
                                    $check = "user";
                                    $conf = "1";
                                    $user_id = $row['user_id'];
                                } else if ($conf === "" && $check === "") {
                                    $check = "invalid";
                                }}
                            if ($check == "admin") {
                        echo '
              <div class="popup">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <table>
                  <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Group Categories</th>
                    <th>Edit & Delete</th>
                  </tr>';
              $query = "SELECT * FROM posts
                  JOIN categories ON posts.category_id = categories.category_id;";
                $result = $conn->query($query);
                $rows = $result->num_rows;
                $ckct = 1;
              for ($j = 0; $j < $rows; ++$j) {
                $variable = $result->data_seek($j);
                $row = $result->fetch_assoc();
                $post_id = $row['post_id'];
                $title = $row['title'];
                $category_name = $row['category_name'];
                $created_at = $row['created_at'];
                echo '<form action="post_edit.php" method="post" id="post">';
                echo '
                <tr>
                    <td><input type="text" name="post_id" value="' . $post_id . '" readonly></td>
                    <td><input type="text" name="title" value="' . $title . '"></td>
                    <td><input type="text" name="category_name" value="' . $category_name . '"></td>
                    <td><input type="text" name="created_at" value="' . $created_at . '"></td>
                    <input type="hidden" name="roles" value="'.$role_get.'">
                    <input type="hidden" name="username" value="'.$username_get.'">
                    <input type="hidden" name="password" value="'.$password_get.'">
                    ';
                    echo '<td>
                    <input class="mybtn" type="submit" value="Sửa">
                    <a id="update" href="post_del_process.php?post_id=' . $post_id . '&roles=' . $role_get . 
                    '&username=' . $username_get . '&password=' . $password_get . '">
                        <button type="button" class="mybtn" style="margin-left:10px;">Xóa</button>
                    </a>
                    </form>
                </td>';
              }
              echo '</table>';
              echo '</div>';}
              elseif ($check == "user") {
                echo '
              <div class="popup">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <table>
                  <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Group Categories</th>
                    <th>Edit & Delete</th>
                  </tr>';
              $query = "SELECT * FROM posts
                  JOIN categories ON posts.category_id = categories.category_id;";
                $result = $conn->query($query);
                $rows = $result->num_rows;
              for ($j = 0; $j < $rows; ++$j) {
                $variable = $result->data_seek($j);
                $row = $result->fetch_assoc();
                $post_id = $row['post_id'];
                $title = $row['title'];
                $category_name = $row['category_name'];
                $created_at = $row['created_at'];
                $user_id1 = $row['user_id'];
                if ($user_id === $user_id1) {
                $ckct = 1;
                echo '<form action="post_edit.php" method="post" id="post">';
                echo '
                <tr>
                    <td><input type="text" name="post_id" value="' . $post_id . '" readonly></td>
                    <td><input type="text" name="title" value="' . $title . '"></td>
                    <td><input type="text" name="category_name" value="' . $category_name . '"></td>
                    <td><input type="text" name="created_at" value="' . $created_at . '"></td>
                    <input type="hidden" name="roles" value="'.$role_get.'">
                    <input type="hidden" name="username" value="'.$username_get.'">
                    <input type="hidden" name="password" value="'.$password_get.'">
                    ';
                    echo '<td>
                    <input class="mybtn" type="submit" value="Sửa">
                    <a id="update" href="post_del_process.php?post_id=' . $post_id . '&roles=' . $role_get . '&username=' . $username_get . '&password=' . $password_get . '">
                        <button type="button" class="mybtn" style="margin-left:10px;">Xóa</button>
                    </a>
                </td>';}
                }
                
                echo '</table>';
                if($ckct == 0)
              {
                echo "<p>Bạn chưa đăng nội dung nào cả.</p>";
              }
                echo '</div>';  
              }
              
            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change() {
            var fileInput = document.getElementById('user_image');
            var file = fileInput.files[0];

            var uploadDir = "luutru/";
            var fileName = uploadDir + file.name;

            var imageInput = document.getElementById('image');
            imageInput.value = fileName;
            console.log('File đã được chọn: ' + fileName);
        }
    </script>
    <?php
    include 'footer.php';
    ?>
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