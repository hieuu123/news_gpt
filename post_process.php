//<?php // sqltest.php
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
<?php // sqltest.php
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['content'];
            
            $uploadDir = 'luutru/';
            $targetFile = $uploadDir . basename($file['name']);
            
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
              echo 'Tệp tin đã được tải lên thành công.';
            } else {
              echo 'Đã xảy ra lỗi khi tải lên tệp tin.';
            }
          }
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['user_image'];
            
            $uploadDir = 'luutru/';
            $targetFile = $uploadDir . basename($file['name']);
            
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
              echo 'Tệp tin đã được tải lên thành công.';
            } else {
              echo 'Đã xảy ra lỗi khi tải lên tệp tin.';
            }
          }
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
                if (
                  isset($_POST['user_id']) &&
                  isset($_POST['title']) &&
                  isset($_POST['content']) &&
                  isset($_POST['image']) &&
                  isset($_POST['category_id']) &&
                  $_POST['user_id'] != "" &&
                  $_POST['title'] != "" &&
                  $_POST['content'] != "" &&
                  $_POST['image'] != "" &&
                  $_POST['category_id'] != ""
              ) {
                  $user_id = $_POST['user_id'];
                  $title = $_POST['title'];
                  $content = $_POST['content'];
                  $image = $_POST['image'];
                  $category_id = $_POST['category_id'];
              
                  // Prepare the statement
                  $stmt = $conn->prepare("INSERT INTO `posts`(`post_id`, `title`, `content`, `user_id`, `category_id`, `created_at`, `image`) 
                  VALUES (?, ?, ?, ?, ?, now(), ?)");
              
                  // Bind the values to the statement
                  $stmt->bind_param("isssis", $post_id, $title, $content, $user_id, $category_id, $image);
              
                  // Execute the statement
                  $result = $stmt->execute();
              
                  if (!$result) {
                      echo "<h5>INSERT failed: " . $stmt->error . "<br><h5>";
                  } else {
                      echo 'Đăng bài viết lên cơ sở dữ liệu thành công.';
                      ob_flush(); // Xóa bộ nhớ đệm
                      flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
                      sleep(3);
                      echo '<script>
                      setTimeout(function() {
                        window.location.href = document.referrer;
                      }, 0); // Chuyển hướng sau 5 giây (5000 milliseconds)
                    </script';
                  }
              }
?>