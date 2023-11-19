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

  #form__edit {
    margin-bottom: 50px;
    background-color: #fff;
  }

  .openmodal_ {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    text-align: left;
    margin-top: 15px;
    padding-top: 15px;
    padding-bottom: 15px;
    cursor: pointer;
  }
</style>
<?php
include "header.php";
?>


<body>
  <h1 style="text-align: center; margin-top: 25px;">My profile</h1>
  <div class="row d-flex justify-content-center" id="form__edit">
    <div class="col-md-10">
      <div class="card" id="forn">
        <div class="row">
          <form action="chucnang/edit_user_process.php" method="post" id="post">
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
              isset($_SESSION['password']))
              {
                for ($j = 0; $j < $rows; ++$j) {
                  $variable = $result->data_seek($j);
                  $row = $result->fetch_assoc();
                  $user_id = $row['user_id'];
                  $username = $row['username'];
                  $password = $row['password'];
                  $email = $row['email'];
                  $role_name = $row['role_name'];
                  if ($_SESSION['username'] === $username && $_SESSION['password'] === $password && $_SESSION['roles'] === $role_name) {
                    echo '
                    <label for="user_id">ID</label><br><input type="text" name="user_id" placeholder="ID do not edit" value = "' . $user_id . '"> <br>
                    <label for="username">Username</label><br><input type="text" name="username" placeholder="Username" value = "' . $username . '"> <br>
                    <label for="email">Email</label><br><input type="text" name="email" placeholder="Email" value = "' . $email . '"> <br>
                    <label for="password">Password</label><br><input type="password" name="password" placeholder="Price e.g 01.00 $.." value = "' . $password . '"> <br>';
                  }
                }
              }
              if (isset($_SESSION['roles'])) {
                if ($_SESSION['roles'] == "Administrator") {
                  $query = "SELECT * FROM roles;";
                  $result = $conn->query($query);
                  $rows = $result->num_rows;
                  echo '<label for="roles">Roles</label><br>
                    <select name="roles">';
                  for ($j = 0; $j < $rows; ++$j) {
                    $variable = $result->data_seek($j);
                    $row = $result->fetch_assoc();
                    $a = $row['role_id'];
                    $b = $row['role_name'];
                    echo '<option value="' . $a . '">' . $b . '</option>';
                  }
                  echo '</select><br>';echo '<input type="submit" value="Sửa user"></form>';
                }
              }
            ?>
          </form>
          <?php
          if (
            isset($_SESSION['roles']) &&
            isset($_SESSION['username']) &&
            isset($_SESSION['password'])
          ) {
            if ($_SESSION == "admin") {
              echo '</div></div>
            <br>
            <h3>Sửa thông tin các tài khoản trong hệ thống</h3>
            <button class="openmodal_" onclick="openPopup()">Open Popup</button>
            <div class="overlay" id="overlay">
              <div class="popup">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <table>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Roles</th>
                  </tr>';
                  $query = "SELECT * FROM users
                  JOIN roles ON users.role_id = roles.role_id
                  ORDER BY user_id ASC;";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
            $id_role = $row['role_id'];
        
            echo '<form action="chucnang/edit_user_process.php" method="post" id="post">';
            echo '<tr>';
            echo '<td><input type="text" name="user_id" value="' . $user_id . '" readonly></td>';
            echo '<td><input type="text" name="username" value="' . $username . '"></td>';
            echo '<td><input type="text" name="email" value="' . $email . '"></td>';
            echo '<td><input type="password" name="password" value="' . $password . '"></td>';
        
            $rolesQuery = "SELECT * FROM roles;";
            $rolesResult = $conn->query($rolesQuery);
            $rolesRows = $rolesResult->num_rows;
        
            echo '<td><select name="roles">';
            for ($i = 0; $i < $rolesRows; ++$i) {
                $rolesResult->data_seek($i);
                $rolesRow = $rolesResult->fetch_assoc();
                $role_id = $rolesRow['role_id'];
                $role_name = $rolesRow['role_name'];
                if ($role_id == $id_role) {
                  echo '<option value="' . $role_id . '" selected>' . $role_name . '</option>';
                } else {
                  echo '<option value="' . $role_id . '">' . $role_name . '</option>';
                }
            }
            echo '</select></td></tr><tr>';
            
            echo '<td><input type="submit" value="Sửa"></td>';
            echo '<td><a id="update" href="chucnang/delete_user_process.php?user_id=' . $user_id . '">';
            echo '<button type="button" class="btn-primary">Xóa</button></a></td>';
        
            echo '</tr>';
            echo '</form>';
        }
        
        echo '</table>';
            }
          } else {
            echo "Bạn chưa đăng nhập hoặc phiên đăng nhập không hợp lệ";
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
  include 'index_footer.php';
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