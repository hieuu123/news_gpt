<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
  <title>Trang E-commerce</title>

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
    width: 500px;
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
</style>
<?php
include 'header.php';
?>

<body>
    <script>
            var check_1 = 0;
    </script>
    <form action="add_categories.php" style="display: none;" method="post">
        <input type="text" name="username" id="user">
        <input type="text" name="password" id="pass">
        <input type="text" name="roles" id="r">
        <input type="text" name="check" id="c">
        <input type="submit" id="dangnhap">
    </form>
  <h1 style="text-align: center;">Add categories</h1>
  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card" id="forn">
        <div class="row">
          <form action="edit_user_process.php" method="post" id="post">
            <?php // sqltest.php
            /////
            $conn = new mysqli("localhost", "root", "", "cmsweb");
            if ($conn->connect_error) die($conn->connect_error);
            if (isset($_POST['check']) ) {
                echo "<script>check_1 = 1;</script> ";
                
            }
            $query = "SELECT * FROM users
          JOIN roles ON users.role_id = roles.role_id
          ORDER BY user_id ASC;";
            $result = $conn->query($query);
            $rows = $result->num_rows;
            if (
              isset($_POST['roles']) &&
              isset($_POST['username']) &&
              isset($_POST['password'])
            ) {
              $role_get = $_POST['roles'];
              $username_get = $_POST['username'];
              $password_get = $_POST['password'];
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
                    echo '
                    <label for="category_id">ID</label><br><input type="text" name="category_id" placeholder="ID do not edit" value = "' . $rows . '"> <br>
                    <label for="username">Username</label><br><input type="text" name="username" placeholder="Username" value = "' . $username . '"> <br>
                    <label for="password">Password</label><br><input type="password" name="password" placeholder="Price e.g 01.00 $.."> <br>';
                }
                else{
                  echo "Bạn chưa đăng nhập hoặc phiên đăng nhập của bạn chưa hợp lệ";
                }
                if ($check == "admin") {
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
                }
                echo '<br><input type="submit" value="Sửa user">';
                echo '</select><br></form>';
              }
            ?>
          </form>

          <body>
            <button onclick="openPopup()">Open Popup</button>

            <div class="overlay" id="overlay">
              <div class="popup">
                <span class="close-button" onclick="closePopup()">&times;</span>
                <table>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                  </tr>
                  <?php
                  for ($j = 0; $j < $rows; ++$j) {
                    $query = "SELECT * FROM users
          JOIN roles ON users.role_id = roles.role_id
          ORDER BY user_id ASC;";
                    $result = $conn->query($query);
                    $rows = $result->num_rows;
                    $variable = $result->data_seek($j);
                    $row = $result->fetch_assoc();
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $email = $row['email'];
                    $role_name = $row['role_name'];
                    echo '
                        <tr>
                            <td><input type="text" name="user_id" value="' . $user_id . '" readonly></td>
                            <td><input type="text" name="username" value="' . $username . '"></td>
                            <td><input type="text" name="email" value="' . $email . '"></td>
                            <td><input type="password" name="password" value="' . $password . '"></td>
                        </tr>';
                  }
                  ?>
                </table>

                <button type="submit">Submit</button>
              </div>
            </div>
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
  <script>
    var username = document.getElementById('user');
    var password = document.getElementById('pass');
    var roles = document.getElementById('r');
    document.getElementById('c').value = check_1;
    username.value = localStorage.getItem('username');
    password.value = localStorage.getItem('password');
    roles.value = localStorage.getItem('role');
    if (check_1 == 0) {
        var check_button = document.getElementById('dangnhap');
        check_button.click();
    }
</script>
  <?php
  include 'footer.php';
  ?>
</body>

</html>