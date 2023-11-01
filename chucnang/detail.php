<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Trang E-commerce</title>
</head>

<body>
    <?php include 'header.php' ?>
    <?php // sqltest.php
    $conn = new mysqli("localhost", "root", "", "ecommerce");
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT * 
    FROM product 
    JOIN category ON product.id_ctg = category.id_ctg
    ORDER BY id ASC;
    ";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $rows = $result->num_rows;
    if (isset($_GET['id']) && $_GET['id'] != "") {
        for ($i = 0; $i < $rows; $i++) {
            $result->data_seek($i);
            if ($result->fetch_assoc()['id'] == $_GET['id']) {
                $result->data_seek($i);
                echo '<div class="container mt-5 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images p-3">
                                        <div class="text-center p-4"> <img src="' . $result->fetch_assoc()['imagelink'] . '" class="card-img-top" style="aspect-ratio: 1 / 1" /> </div>
                                        </div>
                                    </div>';
                $result->data_seek($i);
                echo '<div class="col-md-6">
                <div class="product p-4">
                    <div class="mt-4 mb-3"><p>ID: ' . $result->fetch_assoc()['id'] . "</p>";
                $result->data_seek($i);
                echo "<p>Category: " . $result->fetch_assoc()['category_name'] . "</p>";
                $result->data_seek($i);
                echo "<p>Name:<b> " . $result->fetch_assoc()['product_name'] . '</b></p>';
                $result->data_seek($i);
                echo '<div class="price d-flex flex-row align-items-center"> <p class="act-price">Price: ' . $result->fetch_assoc()['price'] . "$</p></div>";
                $result->data_seek($i);
                echo "<p>Description: " . $result->fetch_assoc()['description'] . ".</p>";
                $result->data_seek($i);
                echo '<div class="sizes mt-5"> <p>Quantity: ' . $result->fetch_assoc()['quantity'] . '</p>
                </div>
                <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div';
            }
        }
    };
    ?>
    <?php
    include 'footer.php';
    ?>
</body>

</html>