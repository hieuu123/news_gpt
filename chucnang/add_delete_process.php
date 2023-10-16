<?php // sqltest.php
          $conn = new mysqli("localhost", "root", "", "cmsweb");
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_GET['category_id']) &&
            $_GET['category_id'] != ""
          ) {
            $category_id = $_GET['category_id'];
            $query = "DELETE FROM `categories` WHERE category_id = $category_id";
            $result = $conn->query($query);
            if (!$result) echo "<h5>UPDATE failed: $query<br><h5>" .
              $conn->error . "<br><br>";
            echo '<h1 style="text-align: center;">Update record successful.</h1>';
            ob_flush(); // Xóa bộ nhớ đệm
            flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
            sleep(1);
            echo '<script>
                  setTimeout(function() {
                  window.location.href = "index.php";
                  }, 0); // Chuyển hướng sau 5 giây
                  </script>';
          }
?>
