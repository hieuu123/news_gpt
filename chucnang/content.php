<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>New products</h3>
        </header>
        <div class="row">
            <?php
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
            for ($i = 0; $i < $rows; $i++) {
                $result->data_seek($i);
                $product_name = $result->fetch_assoc()['product_name'];
                $result->data_seek($i);
                $price = $result->fetch_assoc()['price'];
                $result->data_seek($i);
                $id = $result->fetch_assoc()['id'];
                $result->data_seek($i);
                $imagelink = $result->fetch_assoc()['imagelink'];
                echo '
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <a id="nhan" href="detail.php?id=' . $id . '">
                    <div class="card w-100 my-2 shadow-2-strong">
                        <img src="' . $imagelink . '" class="card-img-top" style="aspect-ratio: 1 / 1" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><b>' . $product_name . '</b></h5>
                            <p class="card-text">$' . $price . '</p>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="#!" class="btn btn-secondary shadow-0 me-1">Add to cart</a>
                                <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                        </svg></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
            }
            ?>
        </div>
    </div>
</section>
<!-- Products -->