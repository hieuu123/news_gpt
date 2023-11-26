<?php
// Kết nối đến cơ sở dữ liệu
require_once "connectSql.php";
session_start(); // Bắt đầu phiên session
$user_id = 0;
if (isset($_POST['post_id']) && isset($_POST['stars']) ) {
    $post_id = $_POST['post_id'];
    $score = $_POST['stars'];
}
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $score = $_POST["stars"];
    $score_db = 0;
    // Kiểm tra xem user_id có tồn tại không
    if (isset($_SESSION['roles']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {
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
        ///
        $query = "SELECT * FROM rating
        Where user_id = '$user_id' and post_id = '$post_id'
        ORDER BY user_id ASC";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        $result->data_seek($rows);
        $row = $result->fetch_assoc();
        if($rows > 0)
        $score_db = $row['score']; 
        $insertRatingSql = 0;
        $update_RatingSql = 0;
        if($score_db === 0)
        {
            $insertRatingSql = "INSERT INTO rating (user_id, post_id, score) VALUES ('$user_id' ,'$post_id', '$score')";
        }
        else{
            $update_RatingSql = "UPDATE `rating` SET `user_id`='$user_id',`post_id`='$post_id',`score`='$score' 
            where `user_id`='$user_id'and `post_id`='$post_id'";
        }
        //
        // Thực hiện thao tác lưu đánh giá vào cơ sở dữ liệu
        if($insertRatingSql !== 0)
        {
        if ($conn->query($insertRatingSql) === TRUE) {
            echo "Đánh giá thành công \nCảm ơn vì sự đóng góp của bạn";
            exit();
        } else {
            echo "Lỗi: " . $insertRatingSql . "<br>" . $conn->error;
        }}
        if($update_RatingSql !== 0)
        {
        if ($conn->query($update_RatingSql) === TRUE) {
            echo "Đánh giá lần thứ 2 thành công \nCảm ơn vì sự đóng góp của bạn";
            exit();
        } else {
            echo "Lỗi: " . $update_RatingSql . "<br>" . $conn->error;
        }
    }
    } else {
        echo "Người dùng chưa đăng nhập.";
    }
}

// Đóng kết nối
$conn->close();
?>
