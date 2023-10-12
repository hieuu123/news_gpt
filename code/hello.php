<?php

$ch = curl_init();
$API_KEY = '7ed4c161-bb62-4a56-b864-795a271122e0';
curl_setopt($ch, CURLOPT_URL, 'https://deepai.org/chat');
// curl_setopt($ch, CURLOPT_URL, 'https://api.baizhi.ai/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer '.$API_KEY.'',
    'Content-Type: application/json'
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{
    "model": "gpt-3.5-turbo",
    "messages": [
        {
            "role": "user",
            "content": "Hello, World!"
        }
    ],
    "stream": false
}');

$response = curl_exec($ch);

if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);

?>