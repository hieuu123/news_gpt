<? session_start(); ?>
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
    width: 600px;
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
  .minwidth
{
    min-height: 500px;
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
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.3s;
  }

  /* Style for popup container */
  .popup {
    height: 70%;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    max-width: 90%;
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
  #edit-category{
    width: 1000px;
    padding: 20px;
  
  }
</style>
<?php
include "header.php";
?>


<body>
  <h1 style="text-align: center;">Add categories</h1>
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 minwidth">
      <div class="card" id="forn">
        <div class="row">
          <form action="chucnang/add_categories_process.php" method="post" id="post">
            <?php // sqltest.php
            /////
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
              for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_assoc();
                $role = $row['role_name'];
                $email = $row['username'];
                $password = $row['password'];
                if ($username_get === $email && $password_get === $password && $role_get === "Administrator") {
                  $check = "admin";
                  $conf = "1";
                } else if ($role_get === $role && $username_get === $email && $password_get === $password) {
                  $check = "user";
                  $conf = "1";
                } else if ($conf === "" && $check === "") {
                  $check = "invalid";
                }
              }
              if ($check == "user" || $check == "admin") {
                $query = "SELECT * FROM categories
                          JOIN groupcategories ON categories.groupcategory_id = groupcategories.groupcategory_id
                          ORDER BY category_id ASC;";
                $result = $conn->query($query);
                $rows = $result->num_rows;
                $category_id = 1;
                for ($j = 0; $j < $rows; ++$j) {
                  $variable = $result->data_seek($j);
                  $row = $result->fetch_assoc();
                  if ($category_id < $row['category_id']) {
                    $category_id = $row['category_id'];
                  }
                }
                $category_id = $category_id + 1;
                echo '
                    <input class="form-control" type="text" name="category_id" value = "' . $category_id . '" style="display: none;" >
                    <label class="form-label" for="category_name">Category Name</label><br><input type="text" name="category_name"> <br>
                    <label class="form-label" for="description">Description</label><br><input type="text" name="description" > <br>';
                $query = "SELECT * FROM groupcategories;";
                $result = $conn->query($query);
                $rows = $result->num_rows;
                echo '<label class="form-label" for="groupcategories">Groupcategories</label><br>
                    <select name="groupcategory_id">';
                for ($j = 0; $j < $rows; ++$j) {
                  $variable = $result->data_seek($j);
                  $row = $result->fetch_assoc();
                  $a = $row['groupcategory_id'];
                  $b = $row['groupcategory_name'];
                  echo '<option value="' . $a . '">' . $b . '</option>';
                }
                echo '</select><br><br>';
                echo '<input class"btn" type="submit" value="Add category">';
                echo '<br></form>';}
            }
          else {
            echo "Bạn chưa đăng nhập hoặc phiên đăng nhập của bạn chưa hợp lệ";
            echo '</select><br>';
            echo '<br></form>';
          }
            ?>
          </form>
          <?php
          if (
            isset($_SESSION['roles']) &&
            isset($_SESSION['username']) &&
            isset($_SESSION['password'])
          ) {
            if ($check == "admin") {
              echo '</div></div><hr>
            <div id = "edit-category"> 
            <span><h3>Chỉnh sửa các Category</h3>
            <input type="submit" onclick="openPopup()" value="Edit Categories" align="center">
            </div>
            <div class="overlay" id="overlay">
              <div class="popup">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <table>
                  <tr>
                    <th>Categories ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Group Categories</th>
                  </tr>';
              $query = "SELECT * FROM categories
                  JOIN groupcategories ON categories.groupcategory_id = groupcategories.groupcategory_id
                  ORDER BY category_id ASC;";
              $result = $conn->query($query);
              $rows = $result->num_rows;

              $queryGroup = "SELECT * FROM groupcategories;";
              $resultGroup = $conn->query($queryGroup);
              $rowsGroup = $resultGroup->num_rows;
              for ($j = 0; $j < $rows; ++$j) {
                $variable = $result->data_seek($j);
                $row = $result->fetch_assoc();
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                $description = $row['description'];
                $groupcategory_id = $row['groupcategory_id'];
                echo '<form action="chucnang/edit_categories_process.php" method="post" id="post">';
                echo '
                <tr>
                    <td><input type="text" name="category_id" value="' . $category_id . '" readonly></td>
                    <td><input type="text" name="category_name" value="' . $category_name . '"></td>
                    <td><input type="text" name="description" value="' . $description . '"></td>
                    <td>
                        <select name="groupcategory_id">';

                for ($i = 0; $i < $rowsGroup; ++$i) {
                  $variable = $resultGroup->data_seek($i);
                  $rowGroup = $resultGroup->fetch_assoc();
                  $a = $rowGroup['groupcategory_id'];
                  $b = $rowGroup['groupcategory_name'];


                  if ($groupcategory_id == $a) {
                    echo '<option value="' . $a . '" selected>' . $b . '</option>';
                  } else {
                    echo '<option value="' . $a . '">' . $b . '</option>';
                  }
                }
                echo '</select></td><td><input type="submit" value="Sửa"></td>
                <td><a id="update" href="chucnang/add_delete_process.php?category_id=' . $category_id . '&">
                <button type="button" class="btn-primary">Xóa</button></a></td>
                </tr></form>';
              }
              echo '</table>';
              echo '</div>
                </div>';
            }
          }
          ?>

          <script>
            function openPopup() {
              document.getElementById("overlay").classList.add("visible");
            }

            function closePopup() {
              document.getElementById("overlay").classList.remove("visible");
            }
          </script>
        </div>
      </div>
    </div>
  </div>
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