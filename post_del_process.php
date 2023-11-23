<?php // sqltest.php
    /*
          $conn = new mysqli("localhost", "root", "", "cmsweb");
          $query = "SELECT * FROM posts
          ORDER BY post_id ASC;";
                $result = $conn->query($query);
                $rows = $result->num_rows;
                $post_id = 1;
                for ($j = 0; $j < $rows; ++$j) {
                    $variable = $result->data_seek($j);
                    $row = $result->fetch_assoc();
                    if ($post_id < $row['post_id']) {
                        $post_id = $row['post_id'];
                    }
                }
                $post_id = $post_id + 1;
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_POST['user_id']) &&
            isset($_POST['title']) &&
            isset($_POST['content']) &&
            isset($_POST['image']) &&
            isset($_POST['category_id']) &&
            $_POST['user_id'] != "" &&
            $_POST['title'] != "" &&
            $_POST['content'] != "" &&
            $_POST['category_id'] != ""
          ) {
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            $query = "INSERT INTO `posts`(`post_id`, `title`, `content`, `user_id`, `category_id`, `created_at`, `image`) VALUES ('$post_id','$title','$content','$user_id','$category_id',now(),'$image')";
            $result = $conn->query($query);
            if (!$result) echo "<h5>UPDATE failed: $query<br><h5>" .
            $conn->error . "<br><br>";
            else
            {
              echo "Đăng bài viết mới thành công.";
            }
            if ($CHECK1 == 1) {
              echo 'UPLOAD ảnh thành công.';
            }
            else {
              echo 'UPLOAD ảnh thất bại.';
            }
            ob_flush(); // Xóa bộ nhớ đệm
            flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
            sleep(5);
            echo '<script>
                  setTimeout(function() {
                    window.history.back();
                  }, 0); // Chuyển hướng sau 5 giây
                  </script>';
          }*/
    ?>
<?php 
// sqltest.php
$conn = new mysqli("localhost", "root", "", "cmsweb");
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM users
JOIN roles ON users.role_id = roles.role_id
ORDER BY user_id ASC;";
$result = $conn->query($query);
$rows = $result->num_rows;
if (
    isset($_GET['roles']) &&
    isset($_GET['username']) &&
    isset($_GET['password']) &&
    isset($_GET['post_id'])
) {
    $role_get = $_GET['roles'];
    $username_get = $_GET['username'];
    $password_get = $_GET['password'];
    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM users
JOIN roles ON users.role_id = roles.role_id
ORDER BY user_id ASC;";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    $check = "";
    $conf = "";
    $user_id = "";
    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_assoc();
        $role = $row['role_name'];
        $email = $row['username'];
        $password = $row['password'];
        if ($role_get === $role && $username_get === $email && $password_get === $password) {
            $check = "user";
            $conf = "1";
            $user_id = $row['user_id'];
        }
    }
    $query = "SELECT * FROM posts WHERE user_id = $user_id AND post_id = $post_id";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if ($role_get == "Administrator" || $check == "user") {
      $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    }
    if ($rows > 0) {
        $deleteQuery = "DELETE FROM posts WHERE user_id = $user_id AND post_id = $post_id";
        if ($role_get == "Administrator" || $check == "user") {
          $deleteQuery = "DELETE FROM posts WHERE post_id = $post_id";
        }
        $deleteResult = $conn->query($deleteQuery);

        if ($deleteResult) {
            echo "Xóa dữ liệu thành công<br>";
            echo 'Đăng bài viết lên cơ sở dữ liệu thàenh công.';
        ob_flush(); // Xóa bộ nhớ đệm
        flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
        sleep(3);
        echo '<script>
        setTimeout(function() {
          window.location.href = document.referrer;
        }, 0); // Chuyển hướng sau 5 giây (5000 milliseconds)
      </script>';
        } else {
            echo "Lỗi khi xóa dữ liệu";
        }}}
?>