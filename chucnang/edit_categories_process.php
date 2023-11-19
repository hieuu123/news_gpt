<?php // sqltest.php
          $conn = new mysqli("localhost", "root", "", "cmsweb");
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_POST['category_id']) &&
            isset($_POST['category_name']) &&
            isset($_POST['description']) &&
            isset($_POST['groupcategory_id']) &&
            $_POST['category_id'] != "" &&
            $_POST['category_name'] != "" &&
            $_POST['description'] != "" &&
            $_POST['groupcategory_id'] != ""
          ) {
            $category_id = $_POST['category_id'];
            $category_name = $_POST['category_name'];
            $description = $_POST['description'];
            $groupcategory_id = $_POST['groupcategory_id'];
            $query = "UPDATE `categories` SET `category_id`='$category_id',`category_name`='$category_name',`description`='$description',`groupcategory_id`='$groupcategory_id' WHERE `category_id`='$category_id'";
            $result = $conn->query($query);
            if (!$result) echo "<h5>UPDATE failed: $query<br><h5>" .
              $conn->error . "<br><br>";
            echo '<h1 style="text-align: center;">Update record successful.</h1>';
            ob_flush(); // Xóa bộ nhớ đệm
            flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
            sleep(2);
            echo '<script>
                  setTimeout(function() {
                    window.history.back();
                  }, 0); // Chuyển hướng sau 5 giây
                  </script>';
          }
?>
