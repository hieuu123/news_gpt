<?php // sqltest.php
          $conn = new mysqli("localhost", "root", "", "ecommerce");
          if ($conn->connect_error) die($conn->connect_error);
          if (
            isset($_POST['product_name']) &&
            isset($_POST['description']) &&
            isset($_POST['price']) &&
            isset($_POST['quantity']) &&
            isset($_POST['imagelink']) &&
            $_POST['product_name'] != "" &&
            $_POST['description'] != "" &&
            $_POST['price'] != "" &&
            $_POST['quantity'] != "" &&
            $_POST['imagelink'] != ""
          ) {
            $query = "SELECT * 
        FROM product 
        JOIN category ON product.id_ctg = category.id_ctg
        ORDER BY id ASC;";
            $result = $conn->query($query);
            if (!$result) die($conn->error);
            $id = get_post($conn, 'id');
            $product_name = get_post($conn, 'product_name');
            $description = get_post($conn, 'description');
            $price = get_post($conn, 'price');
            $quantity = get_post($conn, 'quantity');
            $imagelink = get_post($conn, 'imagelink');
            $category_name = $_POST['category'];
            $query = "UPDATE `product` SET `product_name`='$product_name',`description`='$description',`price`='$price',`imagelink`='$imagelink',`quantity`='$quantity',`id_ctg`='$category_name' WHERE `id` = $id";
            $result = $conn->query($query);
            if (!$result) echo "<h5>UPDATE failed: $query<br><h5>" .
              $conn->error . "<br><br>";
            echo '<h1 style="text-align: center;">Update record successful.</h1>';
            
            ob_flush(); // Xóa bộ nhớ đệm
            flush(); // Đẩy dữ liệu đến trình duyệt ngay lập tức
            sleep(2);
            echo '<script>
    setTimeout(function() {
        window.location.href = "listcontent.php";
    }, 0); // Chuyển hướng sau 5 giây
</script>';
          }
          function get_post($conn, $var)
          {
            return $conn->real_escape_string($_POST[$var]);
          }
?>