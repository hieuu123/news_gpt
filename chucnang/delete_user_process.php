<?php // sqltest.php
          $conn = new mysqli("localhost", "root", "", "cmsweb");
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_GET['user_id']) &&
            $_GET['user_id'] != ""
          ) {
            $user_id = $_GET['user_id'];
            $query = "DELETE FROM `users` WHERE user_id = $user_id";
            $result = $conn->query($query);
            if (!$result) echo "<h5>Delete failed: $query<br><h5>" .
              $conn->error . "<br><br>";
            echo '<h1 style="text-align: center;">Update record successful.</h1>';
            ob_flush(); // Xóa bộ nhớ đệm
            flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
            sleep(1);
            echo '<script>
                  setTimeout(function() {
                    window.history.back();
                  }, 2000); // Chuyển hướng sau 5 giây
                  </script>';
          }
?>
