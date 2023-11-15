<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/hqn.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d3b4b6d594.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <title>Tìm kiếm bằng Google CSE</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        [id^="btn-sum-form"] {
            display: none;
            margin: 0 auto;
        }

        [id^="input-sum-form"] {
            border: none;
        }

        .loading-spinner {
            display: none;
            width: 40px;
            height: 40px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 2s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #btn-rw {
            display: none;
            margin: 0 auto;
        }

        .a_tool {
            color: black;
        }

        .a_tool:hover {
            color: #0069d9;
        }

        .btn_tool {
            color: #ff656a;
            cursor: pointer;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <h1>Tìm kiếm kết quả</h1>

            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Nhập từ khóa...">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>

            <?php
            if (isset($_POST['query'])) {
                $query = $_POST['query'];

                echo "<br><p>Kết quả tìm kiếm cho: $query</p>";
                $conn = new mysqli("localhost", "root", "", "cmsweb");
                if ($conn->connect_error) die($conn->connect_error);

                if (isset($data->items) && !empty($data->items)) {
                    $results = $data->items;
                    // Lấy ra 3 kết quả đầu tiên
                    echo '<table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Trang nguồn</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Action</th>
                    <th scope="col">ND</th>
                  </tr>
                </thead>
                <tbody>';
                    $firstThreeResults = array_slice($results, 0, 10);
                    if (!empty($firstThreeResults)) {

                        $buttonCount = 1; // Biến đếm cho ID của button
                        foreach ($firstThreeResults as $result) {
                            echo '<tr>';
                            echo '<td>';
                            echo "<a href='$result->link' class='a_tool' target='_blank'>$result->link</a>";

                            // Thêm form và input với ID động
                            echo "<form method='post' action='' id='test-form-$buttonCount'>";
                            echo '<input type="hidden" name="url" value="' . $result->link . '">';
                            echo '<input type="submit" value="Submit" class="btn_tool btn-danger btn-show-form" data-form-id="' . $buttonCount . '" id="btn-' . $buttonCount . '">';
                            echo '</form>';

                            echo '</td>';
                            echo '<td><div id="result-' . $buttonCount . '"></div></td>';
                            echo '<td><form action="" id="sum-form-' . $buttonCount . '" class="sum-form">
                    <input type="text" name="content" id="input-sum-form-' . $buttonCount . '" value=""></td>';
                            echo '<td><input type="submit" value="Tóm tắt" class="btn_tool btn-danger btn-sum-form" id="btn-sum-form-' . $buttonCount . '" sum-form-id="' . $buttonCount . '"></form></td>';
                            echo '<td><div id="loading-spinner-' . $buttonCount . '" class="loading-spinner"></div><div id="result-sum-' . $buttonCount . '"></div></td>';
                            echo '</tr>';
                            $buttonCount++; // Tăng biến đếm cho ID của button
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "Không tìm thấy kết quả nào cho từ khóa '$query'.";
                    }
                } else {
                    echo "Không tìm thấy kết quả cho từ khóa '$query'.";
                }
            }
            // include('get_content.php');

            ?>


            <div class="container text-center">
                <form action="" id="rw-form">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" value="" id="input-rw-1" name="input-rw-1">
                        </div>
                        <div class="col">
                            <input type="hidden" value="" id="input-rw-2" name="input-rw-2">
                        </div>
                        <div class="col">
                            <input type="hidden" value="" id="input-rw-3" name="input-rw-3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Submit" class="btn btn-primary" id="btn-rw">
                        </div>
                    </div>
                </form>
                <br>
                <div class="col" id="rw-result"></div>
                <div class="col">
                    <div id="loading-spinner-rw" class="loading-spinner"></div>
                    <form action="post_gpt_post.php">
                        <input type="hidden" name="gpt" id="gpt">
                        <button style="display:none;" id="btn_gpt"></button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script>
            const buttons = document.querySelectorAll('.btn-show-form');

            buttons.forEach((button) => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();

                    const formId = event.target.getAttribute('data-form-id');
                    // console.log(formId);
                    const form = document.getElementById(`test-form-${formId}`);
                    const resultDiv = document.getElementById(`result-${formId}`);
                    const resultButton = document.getElementById(`btn-sum-form-${formId}`); //New

                    // if (form.style.display === 'none' || form.style.display === '') {
                    //     form.style.display = 'block';
                    // } else {
                    //     form.style.display = 'none';
                    // }

                    // Lấy dữ liệu từ form
                    const formData = new FormData(form);

                    // Gửi yêu cầu POST tới get_content.php
                    fetch('function/get_cont.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.text();
                            } else {
                                throw new Error('Lỗi khi gửi POST yêu cầu');
                            }
                        })
                        .then(data => {
                            // console.log(data);
                            // Xử lý dữ liệu trả về nếu cần
                            const inputSumForm = document.getElementById(`input-sum-form-${formId}`);
                            inputSumForm.value = data;
                            // document.getElementById(`result-${formId}`).innerHTML = data;

                            if (data.trim() === "") {
                                resultDiv.innerHTML = "Chưa lấy được nội dung!";
                            } else {
                                resultDiv.innerHTML = "Đã lấy được nội dung!";
                                checkAndDisplayButton(resultDiv, resultButton); //New
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });

            // Hàm kiểm tra và hiển thị button
            function checkAndDisplayButton(resultDiv, button) {
                if (resultDiv.innerHTML === 'Đã lấy được nội dung!') {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            }
        </script>

        <script>
            const s_buttons = document.querySelectorAll('.btn-sum-form');
            let count = 0;
            s_buttons.forEach((s_button) => {
                s_button.addEventListener('click', (event) => {
                    event.preventDefault();

                    const formId = event.target.getAttribute('sum-form-id');
                    const sumForm = document.getElementById(`sum-form-${formId}`);
                    const resultDiv = document.getElementById(`result-sum-${formId}`);
                    const loadingSpinner = document.getElementById(`loading-spinner-${formId}`);

                    loadingSpinner.style.display = 'block';

                    const formData = new FormData(sumForm);

                    fetch('function/sum_content.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.text();
                            } else {
                                throw new Error('Lỗi khi gửi POST yêu cầu');
                            }
                        })
                        .then(data => {
                            count++;
                            if (count >= 4) {
                                alert('Chỉ được chọn tối đa 3 nguồn khác nhau.');
                                loadingSpinner.style.display = 'none';
                            } else {
                                loadingSpinner.style.display = 'none';
                                resultDiv.innerHTML = data;
                                document.getElementById('btn-rw').style.display = 'block';
                                const inputSumForm = document.getElementById(`input-sum-form-${formId}`);
                                const inputRw = document.getElementById(`input-rw-${count}`);
                                inputRw.value = inputSumForm.value;
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            loadingSpinner.style.display = 'none';
                        });
                })
            })
        </script>

        <script>
            const RwBtn = document.getElementById('btn-rw');

            RwBtn.addEventListener('click', (event) => {
                event.preventDefault();

                document.getElementById('loading-spinner-rw').style.display = 'block';

                const RwForm = document.getElementById('rw-form');
                const formData = new FormData(RwForm);


                fetch('function/sum_content.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.text();
                        } else {
                            throw new Error('Lỗi khi gửi POST yêu cầu');
                        }
                    })
                    .then(data => {
                        // Xử lý dữ liệu trả về nếu cần
                        document.getElementById('loading-spinner-rw').style.display = 'none';

                        document.getElementById('rw-result').innerHTML = data;
                        const gpt_form = document.getElementById(`gpt`);
                        gpt_form.value = data;
                        const btn_gpt = document.getElementById(`btn_gpt`);
                        btn_gpt.click();
                    })
                    .catch(error => {
                        console.error(error);
                        document.getElementById('loading-spinner-rw').style.display = 'none';
                    });

            })
        </script>
    </body>
    <?php
    include_once("footer.php");
    ?>

</html>