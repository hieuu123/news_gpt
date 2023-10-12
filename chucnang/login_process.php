<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $check = "login : false";
$conn = new mysqli("localhost", "root", "", "cmsweb");
if ($conn->connect_error) die($conn->connect_error);
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
  }
}
  echo $check;
?>