<?php

// Kết nối đến cơ sở dữ liệu
require_once "connectSql.php";
session_start(); // Bắt đầu phiên session

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $postId = $_POST["post_id"];
    $comment = $_POST["masage"];

    // Lấy user_id từ session (đã lưu khi đăng nhập)
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Kiểm tra xem user_id có tồn tại không
    if ($user_id) {
        // Thực hiện thao tác lưu comment vào cơ sở dữ liệu
        $insertCommentSql = "INSERT INTO comments (post_id, user_id, content) VALUES ('$postId', '$user_id', '$comment')";
        if ($conn->query($insertCommentSql) === TRUE) {
            // Điều hướng người dùng trở lại trang hiển thị bài viết hoặc làm gì đó phù hợp
            header("Location: detail_M.php");
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
