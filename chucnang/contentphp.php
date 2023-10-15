<?php
// Khởi tạo một phiên cURL mới
$curl = curl_init();

// Thiết lập các tùy chọn cho phiên cURL
curl_setopt($curl, CURLOPT_URL, 'https://vnexpress.net/ve-tran-han-quoc-viet-nam-duoc-ban-gan-het-4665097.html'); // Đặt URL của trang web bạn muốn truy cập
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Thiết lập CURLOPT_RETURNTRANSFER thành true để nhận nội dung trang web là kết quả của curl_exec() thay vì in ra trực tiếp

// Thực hiện yêu cầu cURL
$response = curl_exec($curl);

// Kiểm tra xem yêu cầu có thành công không
if ($response === false) {
    // Xử lý lỗi nếu yêu cầu thất bại
    $error = curl_error($curl);
    echo 'CURL Error: ' . $error;
} else {
    // Xử lý nội dung trang web ở đây
    echo $response;
}

// Đóng phiên cURL
curl_close($curl);
?>