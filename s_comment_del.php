<?php

// Kết nối đến cơ sở dữ liệu
require_once "connectSql.php";
session_start(); // Bắt đầu phiên session
$user_id = 0;
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy dữ liệu từ form
    $comment_id = $_GET["comment_id"];
    if (
        isset($_SESSION['roles']) &&
        isset($_SESSION['username']) &&
        isset($_SESSION['password']) &&
        isset($_GET['comment_id'])
    ) {
        $role_get = $_SESSION['roles'];
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
        $query = "SELECT * FROM comments";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        $comment_id = 0;
        for ($j = 0; $j < $rows; ++$j) {
            $result->data_seek($j);
            $row = $result->fetch_assoc();
            $comment_id1 = $row['comment_id'];
            if ($comment_id < $comment_id1) {
                $comment_id = $comment_id1;
            }}
            $comment_id = $comment_id + 1;

}

    // Kiểm tra xem user_id có tồn tại không
    if ($user_id !== 0) {
        $comment_id = $comment_id - 1;
        // Thực hiện thao tác lưu comment vào cơ sở dữ liệu
        $insertCommentSql = "DELETE FROM `comments` WHERE comment_id = $comment_id";
        if ($conn->query($insertCommentSql) === TRUE) {
            // Điều hướng người dùng trở lại trang hiển thị bài viết hoặc làm gì đó phù hợp
            echo('<script>
            setTimeout(function() {
              window.location.href = document.referrer;
            }, 0); // Chuyển hướng sau 5 giây (5000 milliseconds)
          </script>');
            exit();
        } else {
            echo "Lỗi: " . $insertCommentSql . "<br>" . $conn->error;
        }
    } else {
        echo "Người dùng chưa đăng nhập.";
    }
}

// Đóng kết nối
$conn->close();

// // Kết nối đến cơ sở dữ liệu
// require_once "connectSql.php";

// // Kiểm tra xem có dữ liệu được gửi từ form không
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Lấy dữ liệu từ form
//     $postId = $_POST["post_id"];
//     $comment = $_POST["comment"];

//     // Thực hiện thao tác lưu comment vào cơ sở dữ liệu
//     $insertCommentSql = "INSERT INTO comments (post_id, user_id, content) VALUES ('$postId', 'user_id_here', '$comment')"; // Thay 'user_id_here' bằng user_id thực tế của người đăng nhập
//     if ($conn->query($insertCommentSql) === TRUE) {
//         // Điều hướng người dùng trở lại trang hiển thị bài viết hoặc làm gì đó phù hợp
//         header("Location: post_detail.php?category_id=$postId");
//         exit();
//     } else {
//         echo "Lỗi: " . $insertCommentSql . "<br>" . $conn->error;
//     }
// }

// // Đóng kết nối
// $conn->close();
?>
