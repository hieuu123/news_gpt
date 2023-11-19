<?php
session_start();

// Hủy phiên làm việc và chuyển hướng đến trang đăng nhập
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>