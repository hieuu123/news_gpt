<?php
session_start();
include_once("connectSql.php");
if (isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    if (isset($_SESSION['roles']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $get = $_SESSION['roles'];
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
        $insertViewSql = "INSERT INTO favorite (user_id, post_id) VALUES ('$user_id' ,'$post_id')";
        if ($conn->query($insertViewSql) === TRUE) {
            echo "Đã thêm bài báo ưu thích.";
        } else {
            echo "Lỗi: " . $insertViewSql . "<br>" . $conn->error;
        }
    }
    else {
        echo "Bạn chưa đăng nhập";
    }
}
?>