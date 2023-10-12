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
    $id = $result->num_rows + 1;
    $product_name = get_post($conn, 'product_name');
    $description = get_post($conn, 'description');
    $price = get_post($conn, 'price');
    $quantity = get_post($conn, 'quantity');
    $imagelink = get_post($conn, 'imagelink');
    $category_name = $_POST['category'];
    $query = "INSERT INTO `product`(`id`, `product_name`, `description`, `price`, `imagelink`, `quantity`, `id_ctg`) VALUES ('$id','$product_name','$description','$price','$imagelink','$quantity','$category_name')";
    $result = $conn->query($query);
    if (!$result) echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>