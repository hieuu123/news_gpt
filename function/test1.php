<!DOCTYPE html>
<html>

<head>
    <title>Tìm kiếm bằng Google CSE</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        [id^="btn-sum-form"] {
            display: none;
            margin: 0 auto;
        }
        [id^="input-sum-form"]
        {
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

            //$googleApiKey = 'AIzaSyCDXqgZigJoUY7u7Bq56Y2RqvcB-eDV8XM'; // 1st project
            $googleApiKey = 'AIzaSyA3Eti-y6OZJKeOqg-P2Uy4wHNnk7ox1Vg'; // 2nd project
            $customSearchEngineId = '373366471dba54c47';

            // Mã hoá từ khóa trước khi sử dụng trong URL
            $encodedQuery = urlencode($query);

            $url = "https://www.googleapis.com/customsearch/v1?q=$encodedQuery&key=$googleApiKey&cx=$customSearchEngineId";

            $response = file_get_contents($url);

            $data = json_decode($response);
            echo '<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Trang nguồn</th>
            <th scope="col">Status</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Action</th>
            <th scope="col">ND tóm tắt</th>
          </tr>
        </thead>
        <tbody>';
            if (isset($data->items) && !empty($data->items)) {
                $results = $data->items;

                // Lấy ra 3 kết quả đầu tiên
                $firstThreeResults = array_slice($results, 0, 20);
                if (!empty($firstThreeResults)) {

                    $buttonCount = 1; // Biến đếm cho ID của button
                    foreach ($firstThreeResults as $result) {
                        echo '<tr>';
                        echo '<td>';
                        echo "<a href='$result->link' target='_blank'>$result->link</a>";

                        // Thêm form và input với ID động
                        echo "<form method='post' action='' id='test-form-$buttonCount'>";
                        echo '<input type="hidden" name="url" value=" '. $result->link .' ">';
                        echo '<input type="submit" value="Submit" class="btn btn-primary btn-show-form" data-form-id="' . $buttonCount . '" id="btn-' . $buttonCount . '">';
                        echo '</form>';

                        echo '</td>';
                        echo '<td><div id="result-' . $buttonCount . '"></div></td>';
                        echo '<td><form action="" id="sum-form-' . $buttonCount . '" class="sum-form">
                    <input type="text" name="content" id="input-sum-form-' . $buttonCount . '" value=""></td>';
                        echo '<td><input type="submit" value="Tóm tắt" class="btn btn-primary btn-sum-form" id="btn-sum-form-' . $buttonCount . '" sum-form-id="' . $buttonCount . '"></form></td>';
                        echo '<td><div id="loading-spinner-' . $buttonCount . '" class="loading-spinner"></div><div id="result-sum-' . $buttonCount . '"></div></td>';
                        echo '</tr>';
                        $buttonCount++; // Tăng biến đếm cho ID của button
                    }
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
                fetch('get_cont.php', {
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
        if (count === 4) {
            alert('Chỉ được chọn tối đa 3 nguồn khác nhau.');
        }
        s_buttons.forEach((s_button) => {
            s_button.addEventListener('click', (event) => {
                event.preventDefault();

                const formId = event.target.getAttribute('sum-form-id');
                const sumForm = document.getElementById(`sum-form-${formId}`);
                const resultDiv = document.getElementById(`result-sum-${formId}`);
                const loadingSpinner = document.getElementById(`loading-spinner-${formId}`);

                loadingSpinner.style.display = 'block';

                const formData = new FormData(sumForm);

                fetch('sum_content.php', {
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
                        if (count === 4) {
                            alert('Chỉ được chọn tối đa 3 nguồn khác nhau.');
                            loadingSpinner.style.display = 'none';
                        }
                        else
                        {
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


            fetch('sum_content.php', {
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
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById('loading-spinner-rw').style.display = 'none';
                });

        })
    </script>
</body>

</html>