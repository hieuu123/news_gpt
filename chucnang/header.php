<style>
  
  .modal1 {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content1 {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 300px;
    border-radius: 5%;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  #nhan {
    text-decoration: none;
    color: black;
    border: black;
  }
</style>
<header>
  <div class="p-3  bg-white border-bottom">
    <div class="container" id="head">
      <div class="row gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="index.php" target="_blank" class="float-start">
            <img src="img/4.jpg" height="60" />
          </a>
        </div>
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-end">
            <button id="loginBtn" class="btn btn-outline-dark">Login</button>

            <div id="modal" class="modal1">
              <div class="modal-content1">
                <span class="close">&times;</span>
                <h2>Login</h2>
                <form id="login">
                  <label for="username">Username:</label>
                  <input type="text" id="username" required>
                  <label for="password">Password:</label>
                  <input type="password" id="password" required><br><br>
                  <button type="submit" class="btn btn-outline-dark">Login</button>
                </form>
              </div>
            </div>
            <!-- Button trigger modal -->
            <button id="nut1" type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Sign up
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                          <form id="formsignup" class="mx-1 mx-md-4">
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example3c">Your Username</label>
                                <input type="text" id="username_signup" class="form-control" />
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example3c">Your Email</label>
                                <input type="email" id="email_signup" class="form-control" />
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4c">Password</label>
                                <input type="password" id="password_signup" class="form-control" />
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                              <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                <input type="password" id="password_signup_verify" class="form-control" />
                              </div>
                            </div>

                            <div class="form-check d-flex justify-content-center mb-5">
                              <input class="form-check-input me-2" type="checkbox" value="" required id="form2Example3c" />
                              <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                              </label>
                            </div>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" class="btn btn-secondary btn-lg">Register</button>
                            </div>

                          </form>

                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button id="account" type="button" class="btn btn-outline-dark">Account Edit</button>
            <button id="nut1" type="button" class="btn btn-outline-dark">My cart</button>
          </div>
        </div>
        <div class="col-lg-5 col-md-12 col-12">
          <div class="input-group float-center">
            <div class="d-flex">
              <form id="search1" class="d-flex" role="search" method="post" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button type="submit" form="search1" class="btn btn-outline-secondary">
                  <i><svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></i>
                </button>
              </form>
            </div>
          </div>
          <!-- Right elements -->
        </div>
      </div>
    </div>
  </div>
  <nav class="container navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Hot offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Gift boxes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listcontent.php">Product list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Menu item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Menu name</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Other
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script>
    dieukien();
    var role = localStorage.getItem('role');
    document.getElementById('loginBtn').value = role;
    console.log(role);
    if (role !== null && role !== undefined) {
      loginBtn.textContent = role;
    }
    document.getElementById('loginBtn').addEventListener('click', function() {
      document.getElementById('modal').style.display = 'block';
    });

    document.getElementsByClassName('close')[0].addEventListener('click', function() {
      document.getElementById('modal').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
      if (event.target == document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
      }
    });

    // Lấy tham chiếu đến form và các trường dữ liệu
    const form = document.getElementById('login');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    // Gắn sự kiện submit cho form
    const xhr = new XMLHttpRequest();
    const url = 'login_process.php';
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Ngăn chặn hành vi submit mặc định của form
      // Lấy giá trị từ các trường dữ liệu
      const username = usernameInput.value;
      const password = passwordInput.value;

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          // In kết quả trả về từ file PHP
          if (xhr.responseText.trim() !== "login : false") {
            let role = xhr.responseText;
            console.log(xhr.responseText);
            alert('Đăng nhập thành công!');
            localStorage.setItem('username', username);
            localStorage.setItem('password', password);
            localStorage.setItem('role', role);
            location.reload()
          } else {
            alert('Đăng nhập thất bại!');
          }
        }
      };
      const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
      xhr.send(data);

      // Reset các trường dữ liệu trong form
      usernameInput.value = '';
      passwordInput.value = '';
      // Lấy giá trị của 'role' từ localStorage
    });
    ////

    const form_signup = document.getElementById('formsignup');
    let username_signup = document.getElementById('username_signup');
    let email_signup = document.getElementById('email_signup');
    let password_signup = document.getElementById('password_signup');
    let password_signup1 = document.getElementById('password_signup_verify');
    // Gắn sự kiện submit cho form
    const xhr_2 = new XMLHttpRequest();
    const url_2 = 'register_process.php';
    form_signup.addEventListener('submit', function(event) {
      event.preventDefault(); // Ngăn chặn hành vi submit mặc định của form
      // Lấy giá trị từ các trường dữ liệu
      let username_1 = username_signup.value;
      let email_1 = email_signup.value;
      let password_1 = password_signup.value;
      let password_2 = password_signup1.value;
      if (password_1 != password_2) {
        alert('Mật khẩu và mật khẩu verify không trùng nhau');
      }
      xhr_2.open('POST', url_2, true);
      xhr_2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr_2.onreadystatechange = function() {
        if (xhr_2.readyState === XMLHttpRequest.DONE && xhr_2.status === 200) {
          let role = xhr_2.responseText;
          if (xhr_2.responseText.trim() !== "register : failed" && xhr_2.responseText.trim() !== "user_exist") {
            let role = xhr_2.responseText;
            console.log(xhr_2.responseText);
            alert('Đăng nhập thành công!');
            localStorage.setItem('username', username_1);
            localStorage.setItem('password', password_1);
            localStorage.setItem('email', email_1);
            localStorage.setItem('role', "Reader");
            location.reload()
          } else if (role == "user_exist") {
            alert('Username đã có người đăng ký.');
          } else {
            alert('Đăng nhập thất bại!');
          }
        }
      };
      const data2 = 'username=' + encodeURIComponent(username_1) + '&password=' + encodeURIComponent(password_1) + '&email=' + encodeURIComponent(email_1);
      xhr_2.send(data2);

      // Reset các trường dữ liệu trong form
      username_signup.value = '';
      email_signup.value = '';
      password_signup.value = '';
      password_signup1.value = '';
      // Lấy giá trị của 'role' từ localStorage
    });
    ////////// account
    // Ẩn phần tử 'account' ban đầu
    function dieukien() {
      // Lấy giá trị từ localStorage
      var role = localStorage.getItem('role');

      if (role == "Administrator" || role === 'Reader'  ) {
        // Hiển thị phần tử 'account' nếu vai trò là "Admin"
        document.getElementById('account').style.display = 'block';
      } else {
        document.getElementById('account').style.display = 'none';
      }
    }
    let click = document.getElementById('account');
    click.addEventListener('click', edit_form);

    function edit_form() {
      // Lấy giá trị từ localStorage
      var role3 = localStorage.getItem('role');

      if (role3 === 'Administrator' || role3 === 'Reader'  ) {
        var username3 = localStorage.getItem('username');
        var password3 = localStorage.getItem('password');

        // Tạo một form ẩn
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'edit_user.php';

        // Tạo các input ẩn để chứa dữ liệu
        var inputUsername = document.createElement('input');
        inputUsername.type = 'hidden';
        inputUsername.name = 'username';
        inputUsername.value = username3;
        form.appendChild(inputUsername);

        var inputPassword = document.createElement('input');
        inputPassword.type = 'hidden';
        inputPassword.name = 'password';
        inputPassword.value = password3;
        form.appendChild(inputPassword);

        var inputRoles = document.createElement('input');
        inputRoles.type = 'hidden';
        inputRoles.name = 'roles';
        inputRoles.value = role3;
        form.appendChild(inputRoles);

        // Gắn form vào body và submit
        document.body.appendChild(form);
        form.submit();
      }
    }
  </script>
  </div>
</header>