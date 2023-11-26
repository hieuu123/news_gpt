<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Sau đó, hãy sử dụng các lớp CSS của Bootstrap và tùy chỉnh bằng CSS của riêng bạn -->
<style>
    /* Định dạng phần rating */
    #rating-star-box {
        margin-bottom: 20px;
    }

    /* Định dạng ngôi sao */
    .rating-star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        transition: color 0.3s ease-in-out;
    }

    .rating-star.active,
    .rating-star:hover {
        color: gold;
    }

    /* Định dạng button */
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease-in-out;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>


    <div id="rating-star-box">
        <i class="fas fa-star off-star" onclick="rateStar(0)"></i>
        <i class="fas fa-star off-star" onclick="rateStar(1)"></i>
        <i class="fas fa-star off-star" onclick="rateStar(2)"></i>
        <i class="fas fa-star off-star" onclick="rateStar(3)"></i>
        <i class="fas fa-star off-star" onclick="rateStar(4)"></i>
        <!-- <br>
        <textarea id="reviewText" name="reviewText" placeholder="Viết đánh giá của bạn"></textarea>
        <br> -->
        <form id="ratingForm" action="submit_rating.php" method="post">
            <label for=""></label>
            <input type="hidden" id="post_id" name="post_id" value="<?php if (isset($_GET['post_id'])) {
                echo $_GET['post_id'] ;
            } ?>" required>
            <input type="hidden" name="stars"  id="stars">
            <br>
            <button type="button" onclick="submitRating()">Gửi đánh giá</button>
        </form>
        
    </div>


    <script>
    function submitRating() {
            var post_id = document.getElementById('post_id').value;
            var stars = document.getElementById('stars').value;

            // Gửi dữ liệu bằng Fetch API
            fetch('submit_rating.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'post_id=' + encodeURIComponent(post_id) + '&stars=' + encodeURIComponent(stars),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Xử lý dữ liệu trả về từ server nếu cần
                console.log(data);
                alert(data);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        }
            function rateStar(starNumber) {
            var stars = document.querySelectorAll('.fa-star');
            document.getElementById('stars').value = starNumber+1;
            for (var i = 0; i < stars.length; i++) {
                if (i <= starNumber) {
                    stars[i].classList.remove('fa-regular', 'off-star');
                    stars[i].classList.add('fa-solid');
                    stars[i].style.color = '#ffee00';
                    stars[i].style.fontSize = '30px';
                } else {
                    stars[i].classList.remove('fa-solid');
                    stars[i].classList.add('fa-regular', 'off-star');
                    stars[i].style.color = '#ccc';
                    stars[i].style.fontSize = '30px';
                }
            }
        }
        var totalStars = 0;
        var totalRatings = 0;
        var ratings = {
            1: 4, // Số người đánh giá 1 sao
            2: 1, // Số người đánh giá 2 sao
            3: 2, // Số người đánh giá 3 sao
            4: 3, // Số người đánh giá 4 sao
            5: 5  // Số người đánh giá 5 sao
        };

        // function submitRating() {
        //     // Lấy số sao đánh giá
        //     var stars = document.querySelectorAll('.fa-star.fa-solid').length;

        //     // Lấy nội dung đánh giá
        //     var review = document.getElementById('reviewText').value;

        //     // Lấy tên người đánh giá
        //     var userName = document.getElementById('userName').value;

        //     // Hiển thị thông báo (tạm thời)
        //     alert('Cảm ơn ' + userName + ' đã đánh giá ' + stars + ' sao. Chúc bạn một ngày tốt lành.');

        //     // Cập nhật số người đánh giá cho từng số sao
        //     ratings[stars]++;

        //     // Cập nhật tổng số sao và số lần đánh giá
        //     totalStars += stars;
        //     totalRatings++;

        //     // Tính trung bình số sao
        //     var averageStars = totalStars / totalRatings;

        //     // Hiển thị thông báo (tạm thời)
        //     alert(userName + ' đã đánh giá ' + stars + ' sao. Trung bình số sao: ' + averageStars.toFixed(2) + '. Nội dung đánh giá: ' + review);

        //     // Gửi dữ liệu lên server ở đây
        //     // Bạn cần sử dụng Ajax hoặc một cách nào đó để gửi dữ liệu lên máy chủ và lưu vào CSDL
        // }
    </script>
