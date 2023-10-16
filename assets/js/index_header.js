dangnhap_auto();
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
      } else {
      }
    }
  };

  const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
  xhr.send(data);
}