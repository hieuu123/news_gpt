<?php
$fileUrl = 'https://baochinhphu.vn/chuyen-tham-cua-tong-thong-joe-biden-se-dua-quan-he-viet-nam-hoa-ky-phat-trien-len-mot-tam-cao-moi-102230909161139046.htm';
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