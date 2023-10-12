<section>
  <h1>List of product</h1>
  <a><button type="button" id="addproduct" class="btn btn-success">Add Product</button></a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th scope="col">Decription</th>
        <th scope="col">Quantity</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
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
        $id = $result->fetch_assoc()['id'];
        $result->data_seek($i);
        $category = $result->fetch_assoc()['category_name'];
        $result->data_seek($i);
        $product_name = $result->fetch_assoc()['product_name'];
        $result->data_seek($i);
        $price = $result->fetch_assoc()['price'];
        $result->data_seek($i);
        $quantity = $result->fetch_assoc()['quantity'];
        $result->data_seek($i);
        $description = $result->fetch_assoc()['description'];
        echo '<tr>
      <td>' . $id . '</td>
      <td>' . $category . '</td>
      <td>' . $product_name . '</td>
      <td>' . $price . '$</td>
      <td>' . $description . '</td>
      <td>' . $quantity . '</td>
      <td><a id="update'.$id.'" href="formupdate.php?id=' . $id . '"><button type="button" class="btn btn-primary">Edit</button></a><a href="formdelete.php?id=' . $id . '"><button type="button" class="btn btn-warning">Delete</button></td></a>
      ';
      }
      ?>
    </tbody>
  </table>
</section>
<!-- Products -->
<script>
  /////
  //Phần hiển thị account
  // Lấy giá trị của 'role' từ localStorage
  var role = localStorage.getItem('role');

  // Kiểm tra nếu role là 'admin', hiển thị nút 'Add Product'
  if (role === 'Admin') {
    document.getElementById('addproduct').style.display = 'block';
  } else {
    document.getElementById('addproduct').style.display = 'none';
  }
  /////
  //Phần xử lý login
  // Xử lý sự kiện khi nhấp vào phần tử <a> của mỗi sản phẩm
  <?php
  for ($i = 0; $i < $rows; $i++) {
    $result->data_seek($i);
    $id = $result->fetch_assoc()['id'];
    echo "
    document.getElementById('update$id').addEventListener('click', function(event) {
      // Ngăn chặn hành vi mặc định của phần tử <a> (ngăn chặn chuyển hướng)
      event.preventDefault();

      // Lấy giá trị của biến d từ PHP (trong trường hợp này, giả sử đã được khai báo)
      let id = $id;
      let role = localStorage.getItem('role');
      let username = localStorage.getItem('username');
      let password = localStorage.getItem('password');

      // Tạo đường dẫn đích với các tham số truyền theo URL
      const destinationURL = 'formupdate.php?id=' + id + '&role=' + role + '&username=' + username + '&password=' + password;

      // Chuyển hướng (thay đổi href) đến đường dẫn đích
      window.location.href = destinationURL;
    });
    ";
  }
  ?>
</script>