<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$roles = 5;
$check = "register : undentify";
$conn = new mysqli("localhost", "root", "", "cmsweb");
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM users;";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;
$id = $rows + 1;
for ($i = 0; $i < $rows; $i++) {
    $result->data_seek($i);
    $username1 = $result->fetch_assoc()['username'];
    if ($username1 == $username) {
        $check = "1";
    }
}
if ($check != "1") {
    $query = "INSERT INTO `users`(`user_id`, `username`, `password`, `email`, `role_id`) VALUES ('$id','$username','$password','$email','$roles')";
    if ($conn->query($query) === TRUE) {
        $check = "register : success";
    } else {
        $check = "register : failed";
    }
}
else {
  $check = "user_exist";
}
$result->free();
$conn->close();
echo $check;
?>