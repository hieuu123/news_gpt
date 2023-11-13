<?php

// <!DOCTYPE html>
// <html>
// <head>
//     <title>Lấy Thẻ HTML từ URL</title>
// </head>
// <body>
//     <form action="" method="post">
//         <input type="text" name="url" placeholder="Nhập URL...">
//         <button type="submit">Lấy Thẻ HTML</button>
//     </form> 

// </body>
// </html>


    // Đã lấy được: vnexpress.net/
    //             vov.vn/
    //             thanhnien.vn/
    //             tienphong.vn/

    // Chưa lấy được: baotintuc.vn/
    //                 baochinhphu.vn/
    //                 qdnd.vn/

    // include('../php/simple_html_dom.php');
    $dnsweb = array();
    $tittle = array();
    $description = array();
    $content = array();
    $conn = new mysqli("localhost", "root", "", "cmsweb");
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT * FROM config";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    for ($j = 0; $j < $rows; ++$j) {
        $variable = $result->data_seek($j);
        $row = $result->fetch_assoc();
        $dnsweb[$j] = $row['dnsweb'];
        $tittle[$j] = $row['tittle'];
        $description[$j] = $row['description'];
        $content[$j] = $row['content'];
    }
    if (isset($_POST['url'])) {
        $url = $_POST['url'];
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    
        $htmlContent = curl_exec($curl);
    
        if ($htmlContent === false) {
            echo 'Failed to fetch the URL: ' . curl_error($curl);
            curl_close($curl);
            return;
        }
    
        curl_close($curl);
    
        // Process the HTML content
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Disable libxml errors and warnings
        $dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();
    
        $xpath = new DOMXPath($dom);
    
        $result = ""; // Tạo một biến để lưu kết quả
        $a = 0;
        while ($a < $rows) {
            if (strpos($url, $dnsweb[$a]) !== false) {
                $result = ""; // Tạo một biến để lưu kết quả
                // Lấy thẻ HTML theo yêu cầu cho vov.vn
                $titleNodes = $xpath->query($tittle[$a]);
                if ($titleNodes->length > 0) {
                    $result .= "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
                }
    
                $summaryNodes = $xpath->query($description[$a]);
                if ($summaryNodes->length > 0) {
                    $result .= $summaryNodes->item(0)->nodeValue . "<br>";
                }
    
                $pNodes = $xpath->query($content[$a]);
                foreach ($pNodes as $pNode) {
                    $result .= $pNode->nodeValue . "<br>";
                }
    
                echo $result;
            }
            $a = $a + 1;
        }
    }
