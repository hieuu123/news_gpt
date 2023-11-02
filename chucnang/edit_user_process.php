<?php // sqltest.php
          $conn = new mysqli("localhost", "root", "", "cmsweb");
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_POST['user_id']) &&
            isset($_POST['username']) &&
            isset($_POST['password']) &&
            isset($_POST['email']) &&
            $_POST['user_id'] != "" &&
            $_POST['username'] != "" &&
            $_POST['password'] != "" &&
            $_POST['email'] != ""
          ) {
            
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if (isset($_POST['roles']) && $_POST['roles'] != "") {
              $roles = $_POST['roles'];
              $query = "UPDATE `users` SET `password`='$password',`email`='$email',`role_id`='$roles' WHERE `user_id` = $user_id and `username`='$username'";
            }
            else {
              $query = "UPDATE `users` SET `password`='$password',`email`='$email' WHERE `user_id` = $user_id and `username`='$username'" ;
            }
            $result = $conn->query($query);
            if (!$result) echo "<h5>UPDATE failed: $query<br><h5>" .
              $conn->error . "<br><br>";
            
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