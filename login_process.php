<?php
  $conn = new mysqli("localhost", "root", "", "cmsweb");
  if ($conn->connect_error) die($conn->connect_error);
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $check = "login : false";
$query = "SELECT * 
FROM users
JOIN roles ON users.role_id = roles.role_id
";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;
for ($i = 0; $i < $rows; $i++) {
  $result->data_seek($i);
  $email = $result->fetch_assoc()['username'];
  $result->data_seek($i);
  $pass = $result->fetch_assoc()['password'];
  $result->data_seek($i);
  $role = $result->fetch_assoc()['role_name'];
  if ($email == $username && $pass == $password ) {
    $check = $role;
    $_SESSION['username'] = $email;
    $_SESSION['password'] = $pass;
    $_SESSION['roles'] = $role;
    break; // Thoát khỏi vòng lặp sau khi tìm thấy cặp người dùng và mật khẩu khớp
  }
}
  echo $check;
?>