<?php
$fileUrl = 'https://xaydungchinhsach.chinhphu.vn/chuyen-tham-viet-nam-cua-tong-thong-hoa-ky-joe-biden-se-lam-sau-sac-them-tinh-huu-nghi-giua-hai-nuoc-119230908141751289.htm';
$destination = 'chucnang/file.php';

// Initialize cURL
$ch = curl_init($fileUrl);

// Open destination file for writing
$file = fopen($destination, 'w');

// Set cURL options
curl_setopt($ch, CURLOPT_FILE, $file);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Execute cURL request
curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'Error occurred while downloading file: ' . curl_error($ch);
}

// Close cURL and file resources
curl_close($ch);
fclose($file);

echo 'File downloaded successfully.';
?>