<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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

    /* CSS để tùy chỉnh giao diện modal */
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: none;
    }

    .modal-title {
        color: #343a40;
        font-size: 24px;
        font-weight: bold;
    }

    .modal-body {
        padding: 30px;
    }

    /* CSS để tùy chỉnh giao diện form đăng ký */
    .form-label {
        color: #343a40;
        font-weight: bold;
    }

    .form-control {
        border-radius: 20px;
        padding: 12px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        border-radius: 20px;
        padding: 10px 30px;
        font-weight: bold;
    }

    .modal {
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

    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 20px;
        width: 30%;
        border: 1px solid #888;
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

    .dropdown-menu1 {
        display: none;
        position: absolute;
        background-color: black;
        z-index: 999;
    }

    .dropdown-menu1.active {
        display: block;
    }
    .content1 {
        width: 30%;
        margin: 20px auto;
    }
    .modal-content2 {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 30%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
    margin: 20px  auto;
    background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        border-radius: 5%;
  }
</style>
<body>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div class="header-top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <i class="fa-regular fa-calendar-days fa-beat-fade" style="color: #fc3f00;"></i>
                                        <li>
                                            <?php
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $current_date = date("D d - m - Y");
                                            echo $current_date;
                                            ?>
                                        </li>

                                        <i class="fa-regular fa-clock fa-beat-fade" style="color: #fc3f00;"></i>
                                        <li>
                                            <?php
                                            $current_time = date("h : i A");
                                            echo $current_time;
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li>
                                            <a id="nut2" href="add_edit_categories.php">Thêm Phụ Lục</a>
                                        </li>
                                        <li>
                                            <a id="nut3" href="post.php">Viết Bài</a>
                                        </li>
                                        <li>
                                            <a id="nut4" href="post_gpt.php">Viết Bài GPT</a>
                                        </li>
                                        <li>
                                            <a id="nut5" href="post_table.php">Chỉnh Sửa Bài Đăng</a>
                                        </li>
                                        <li>
                                            <a id="loginBtn">Đăng Nhập</a>
                                            <ul class="dropdown-menu1">
                                                <li id="account"><a href="#">Chỉnh sửa thông tin</a></li>
                                                <li><a href="add_edit_categories.php">Quản lý danh mục</a></li>
                                                <li id="logout" onclick="logout()"><a href="#">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                        <div id="modal" class="modal1">
                                            <div class="modal-content1">
                                                <span class="close">&times;</span>
                                                <h2>Login</h2>
                                                <form id="login">
                                                    <label class="form-label" for="username">Username:</label>
                                                    <input class="form-control" type="text" id="username" required>
                                                    <label class="form-label" for="password">Password:</label>
                                                    <input class="form-control" type="password" id="password" required><br><br>
                                                    <button type="submit" class="btn btn-outline-dark">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <li><a id="nut1" href="#" onclick="openModal()">Đăng Ký</a></li>
                                        <!-- Modal -->
                                        <!-- Modal -->
                                        <div id="myModal" class="modal">
                                            <div class="modal-content2">
                                                <span class="close" onclick="closeModal()">&times;</span>
                                                <h2>Đăng ký</h2>
                                                <form id="formsignup">
                                                    <label class="form-label" for="username">Tên người dùng:</label><br>
                                                    <input class="form-control" type="text" id="username_signup" name="username"><br><br>

                                                    <label class="form-label" for="email">Email:</label><br>
                                                    <input class="form-control" type="email" id="email_signup" name="email"><br><br>

                                                    <label class="form-label" for="password">Mật khẩu:</label><br>
                                                    <input class="form-control" type="password" id="password_signup" name="password"><br><br>

                                                    <label class="form-label" for="password_signup1">Nhập lại mật khẩu:</label><br>
                                                    <input class="form-control" type="password" id="password_signup_verify" name="repeat-password"><br><br>

                                                    <input class="btn btn-danger" type="submit" value="Đăng ký">
                                                </form>
                                            </div>
                                        </div>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/img/logo/hqn_logo/logo_slogan.jpg" alt="" width="100%"></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-10 header-flex">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <?php
                                        require_once "connectSql.php";
                                        $sql = "SELECT categories.*
                                                        From categories where  category_id <= '7'";
                                        $result = $conn->query($sql);
                                        ?>

                                        <ul id="navigation">
                                            <?php
                                            while (($row = $result->fetch_assoc())) {
                                                echo "    <li><a href='content_cate.php?category_id={$row['category_id']}'>{$row['category_name']}</a></li> ";
                                            }
                                            // $show = "SELECT posts.*, categories.category_name
                                            // FROM posts
                                            // INNER JOIN categories ON posts.category_id = categories.category_id";
                                            // $result_Show = $conn->query($show);
                                            // if($result_Show->num_rows > 0){
                                            //     while($rowS=$result_Show->fetch_assoc()){
                                            //         echo"
                                            //         <a target='blank' href='content_cate.php?cat_id={$rowS['category_id']}'>
                                            //         {$rowS['category_name']}
                                            //         </a> ";
                                            //     }
                                            // }        
                                            ?>
                                            <li><a href='bangxephang.php'>Bảng xếp hạng</a></li>
                                            <li>
                                                <i class="fa-solid fa-bars" style="color: #fc3f00;"></i>
                                                <ul class="submenu">
                                                    <div class="container">
                                                        <div class="row">
                                                            <?php
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where  category_id <= '4'";
                                                            $result = $conn->query($sql);
                                                            while (($row = $result->fetch_assoc())) {
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                                {$row['category_name']}
                                                            </a></span>
                                                        ";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="row">
                                                            <?php
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '4' and category_id <= '8'";
                                                            $result = $conn->query($sql);
                                                            while (($row = $result->fetch_assoc())) {
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>
                                                        ";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="row">
                                                            <?php
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '8' and category_id <= '12'";
                                                            $result = $conn->query($sql);
                                                            while (($row = $result->fetch_assoc())) {
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>                                                        
                                                        ";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="row">
                                                            <?php
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '12' and category_id <= '16'";
                                                            $result = $conn->query($sql);
                                                            while (($row = $result->fetch_assoc())) {
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>                                                        
                                                        ";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="row">
                                                            <?php
                                                            require_once "connectSql.php";
                                                            $sql = "SELECT categories.*
                                                                    From categories where category_id > '16' and category_id <= '20'";
                                                            $result = $conn->query($sql);
                                                            while (($row = $result->fetch_assoc())) {
                                                                echo "
                                                            <span class='col sub-menu-category'><a href='content_cate.php?category_id={$row['category_id']}'>
                                                            {$row['category_name']}</a></span>
                                                            ";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="search.php" method="post">
                                            <input type="text" name="tukhoa" placeholder="Search" >
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
        <script>
        dangnhap_auto();
        dieukien();
        document.getElementById('loginBtn').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'block';
        });
        var role = localStorage.getItem('role');
        document.getElementById('loginBtn').value = role;
        if (role !== null && role !== undefined && role.length <= 255) {
            loginBtn.textContent = role;
        }
        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('modal')) {
                document.getElementById('modal').style.display = 'none';
            }
        });
        document.getElementById("nut1").addEventListener("click", function() {
            var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
            modal.show();
        });
        var modal = document.getElementById("myModal");

        function openModal() {
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        };
        // Lấy tham chiếu đến form và các trường dữ liệu
        const form = document.getElementById('login');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        // Gắn sự kiện submit cho form
        const xhr = new XMLHttpRequest();
        const url = 'chucnang/login_process.php';
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
        const url_2 = 'chucnang/register_process.php';
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
        const loginBtn1 = document.getElementById('loginBtn');
        const dropdownMenu = document.querySelector('.dropdown-menu1');

        loginBtn.addEventListener('mouseover', function() {
            if (role !== null && role !== 'Đăng Nhập') {
                dropdownMenu.classList.toggle('active');
            }
        });
        ////////// account
        // Ẩn phần tử 'account' ban đầu
        function dieukien() {
            // Lấy giá trị từ localStorage
            var role = localStorage.getItem('role');

            if (role === 'Administrator' || role === 'Reader' || role === 'Editor' || role === 'Author' || role === 'Contributor') {
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

            if (role3 === 'Administrator' || role3 === 'Reader' || role3 === 'Editor' || role3 === 'Author' || role3 === 'Contributor') {
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
        let check_dangnhap = 0;

        function dangnhap_auto() {
            const xhr = new XMLHttpRequest();
            var username = localStorage.getItem('username');
            var password = localStorage.getItem('password');
            const url = 'login_process.php';
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // In kết quả trả về từ file PHP
                    if (xhr.responseText.trim() !== "login : false") {
                        let role = xhr.responseText;
                        console.log(xhr.responseText);
                        localStorage.setItem('username', username);
                        localStorage.setItem('password', password);
                        localStorage.setItem('role', role);
                    } else {}
                }
            };

            const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
            xhr.send(data);
        }
        function logout() {
            localStorage.setItem('username', '');
            localStorage.setItem('password', '');
            localStorage.removeItem('role');
            fetch('logout_process.php')
            .then(function(response) {
            })
            .catch(function(error) {
            });
            location.reload();
        }
        if (role !== null && role !== 'Đăng Nhập') {
            document.getElementById('nut1').style.display = 'none';
        }
        else
        {
            document.getElementById('nut2').style.display = 'none';
            document.getElementById('nut3').style.display = 'none';
            document.getElementById('nut4').style.display = 'none';
            document.getElementById('nut5').style.display = 'none';
        }
    </script>
    </header>