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

    if (isset($_POST['url'])) {
        $url = $_POST['url'];
        
        $htmlContent = file_get_contents($url);

        $dom = new DOMDocument();

        // Tải nội dung HTML vào DOMDocument
        @$dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

        $xpath = new DOMXPath($dom);

        $result = ""; // Tạo một biến để lưu kết quả

        if (strpos($url, "vnexpress.net") !== false) {
            // $result = ""; // Tạo một biến để lưu kết quả
            // Lấy thẻ HTML theo cách ban đầu cho vnexpress.net
            $titleNodes = $xpath->query('//h1[@class="title-detail"]');
            if ($titleNodes->length > 0) {
                // echo "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
                $result .= "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }

            $descriptionNodes = $xpath->query('//p[@class="description"]');
            if ($descriptionNodes->length > 0) {
                // echo $descriptionNodes->item(0)->nodeValue . "<br>";
                $result .= $descriptionNodes->item(0)->nodeValue . "<br>";
            }

            $normalNodes = $xpath->query('//p[@class="Normal"]');
            for ($i = 0; $i < $normalNodes->length; $i++) {
                // echo $normalNodes->item($i)->nodeValue . "<br>";
                $result .= $normalNodes->item($i)->nodeValue . "<br>";
            }

             // Đưa kết quả vào một JSON để gửi về trang test.php
            // $response = array("result" => $result);
            // echo json_encode($response);

                // Hiển thị kết quả trong form
            // echo '<div class="row">';
            // echo '<div class="col-4">';
            // echo '<form action="" method="post">';
            // echo '<input type="text" name="url" value="' . $result . '">';
            // echo '<button type="submit">Lấy Thẻ HTML</button>';
            // echo '</form></div></div>';

            // Hiển thị kết quả ở dưới form
            echo $result;
        } 
        elseif (strpos($url, "vov.vn") !== false) {
            $result = ""; // Tạo một biến để lưu kết quả
            // Lấy thẻ HTML theo yêu cầu cho vov.vn
            $titleNodes = $xpath->query('//div[@class="row article-title"]//span');
            if ($titleNodes->length > 0) {
                $result .= "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }

            $summaryNodes = $xpath->query('//div[@class="row article-summary"]//div');
            if ($summaryNodes->length > 0) {
                $result .= $summaryNodes->item(0)->nodeValue . "<br>";
            }

            $pNodes = $xpath->query('//div[@class="text-long"]//p');
            foreach ($pNodes as $pNode) {
                $result .= $pNode->nodeValue . "<br>";
            }

            echo $result;
        } 
        elseif (strpos($url, "baotintuc.vn") !== false) {
            $result = ""; // Tạo một biến để lưu kết quả
            // Lấy thêm nội dung cho baotintuc.vn
            $titleNodes = $xpath->query('//h1[@class="detail-title"]');
            if ($titleNodes->length > 0) {
                echo "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }

            $sapoNodes = $xpath->query('//h2[@class="sapo"]');
            if ($sapoNodes->length > 0) {
                echo "<h2>" . $sapoNodes->item(0)->nodeValue . "</h2><br>";
            }

            $contentsNodes = $xpath->query('//div[@class="detail-content"]//p');
            foreach ($contentsNodes as $contentNode) {
                echo $contentNode->nodeValue . "<br>";
            }
        } 
        elseif (strpos($url, "baochinhphu.vn") !== false) {
            $result = ""; // Tạo một biến để lưu kết quả
            // Lấy tiêu đề
            $titleNodes = $xpath->query('//h1[@class="detail-title"]');
            if ($titleNodes->length > 0) {
                echo "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }
        
            // Lấy mô tả
            $sapoNodes = $xpath->query('//h2[@class="detail-sapo"]');
            if ($sapoNodes->length > 0) {
                echo "<h2>" . $sapoNodes->item(0)->nodeValue . "</h2><br>";
            }
        
            // Lấy nội dung của tất cả các thẻ <p>
            $pNodes = $xpath->query('//div[@class="detail-content"]//p');
            foreach ($pNodes as $pNode) {
                echo $pNode->nodeValue . "<br>";
            }
        } 
        elseif (strpos($url, "thanhnien.vn") !== false) {
            $result = ""; // Tạo một biến để lưu kết quả
            // Lấy tiêu đề
            $titleNodes = $xpath->query('//h1[@class="detail-title"]');
            if ($titleNodes->length > 0) {
                echo "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }
        
            // Lấy mô tả
            $sapoNodes = $xpath->query('//h2[@class="detail-sapo"]');
            if ($sapoNodes->length > 0) {
                echo "<h2>" . $sapoNodes->item(0)->nodeValue . "</h2><br>";
            }
        
            // Lấy nội dung của tất cả các thẻ <p> con trực tiếp của thẻ div với class "detail-cmain"
            $pNodes = $xpath->query('//div[@class="detail-content afcbc-body"]/p');
            foreach ($pNodes as $pNode) {
                echo $pNode->nodeValue . "<br>";
            }
        }
        elseif (strpos($url, "qdnd.vn") !== false) {
            // $result = ""; // Tạo một biến để lưu kết quả
        
            // Lấy tiêu đề
            $titleNodes = $xpath->query('//h1[@class="post-title"]');
            if ($titleNodes->length > 0) {
                $result .= "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }
        
            // Lấy mô tả
            $summaryNodes = $xpath->query('//div[@class="post-summary"]');
            if ($summaryNodes->length > 0) {
                $result .= $summaryNodes->item(0)->nodeValue . "<br>";
            }
        
            // Lấy nội dung của tất cả các thẻ <p> nằm trong div với class "post-content"
            $pNodes = $xpath->query('//div[@class="post-content"]//p');
            foreach ($pNodes as $pNode) {
                $result .= $pNode->nodeValue . "<br>";
            }
        
            echo $result;
        }
        elseif (strpos($url, "tienphong.vn") !== false) {
            // $result = ""; // Tạo một biến để lưu kết quả
        
            // Lấy tiêu đề
            $titleNodes = $xpath->query('//h1[@class="article__title cms-title"]');
            if ($titleNodes->length > 0) {
                $result .= "<h1>" . $titleNodes->item(0)->nodeValue . "</h1><br>";
            }
        
            // Lấy mô tả
            $summaryNodes = $xpath->query('//div[@class="article__sapo cms-desc"]');
            if ($summaryNodes->length > 0) {
                $result .= $summaryNodes->item(0)->nodeValue . "<br>";
            }
        
            // Lấy nội dung của tất cả các thẻ <p> con trực tiếp của div với class "article__body cms-body"
            $pNodes = $xpath->query('//div[@class="article__body cms-body"]/p');
            foreach ($pNodes as $pNode) {
                $result .= $pNode->nodeValue . "<br>";
            }
        
            echo $result;
        }        
         else {
            echo "";
        }
    }
?>

