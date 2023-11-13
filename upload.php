<?php
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
?>