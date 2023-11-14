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

    //Khởi tạo các mảng rỗng để lấy dữ liệu từ csdl
    $dnsweb = array();
    $tittle = array();
    $description = array();
    $content = array();

    // Tạo kết nối
    $conn = new mysqli("localhost", "root", "", "cmsweb");
    if ($conn->connect_error) die($conn->connect_error);

    //Tạo truy vấn SQL lấy tất cả dữ liệu từ bảng config
    $query = "SELECT * FROM config";
    $result = $conn->query($query);
    $rows = $result->num_rows;

    // Tạo vòng lặp lấy dữ liệu từ csdl vào mảng đã tạo
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

        //Lấy nội dung HTML của $url
        $htmlContent = file_get_contents($url);

        //Tạo đối tượng DOMDocument mới
        $dom = new DOMDocument();

        // Tải nội dung HTML vào DOMDocument
        @$dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

        //Tạo đối tượng DOMXPath mới thực hiện các truy vấn XPath trên tài liệu DOM
        $xpath = new DOMXPath($dom);

        $result = ""; // Tạo một biến để lưu kết quả
        $a = 0;
        while ($a < $rows) {
            if (strpos($url, $dnsweb[$a]) !== false) {
                $result = ""; // Tạo một biến để lưu kết quả
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
