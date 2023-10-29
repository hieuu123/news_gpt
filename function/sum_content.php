<?php

$api_key = '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';
$endpoint = 'https://api.openai.com/v1/chat/completions';
$output = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['content'])) {
    $original_content = $_POST['content'];
    // $language = $_POST['language'];

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    ];

    $data = [
        'model' => 'gpt-3.5-turbo-16k',
        'messages' => [
            [
                'role' => 'system',
                'content' => "You are a tool that assists in crafting articles based on the provided content. 
                The generated articles need to maintain the accuracy of the information while being engaging 
                for readers without being overly repetitive in terms of wording and sentence structure."
            ],
            [
                'role' => 'user',
                'content' => "Summarize my article in Vietnamese. Be sure to retain important 
                information such as data, time, quotes from characters...
                Article:" . $original_content
            ]
        ],
        'temperature' => 1,
        'max_tokens' => 4000,
        'top_p' => 1,
        'frequency_penalty' => 0,
        'presence_penalty' => 0
    ];

    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = 'Error:' . curl_error($ch);
    } else {
        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['choices'][0]['message']['content'])) {
            $output = $decodedResponse['choices'][0]['message']['content'];
        } else {
            $output = "Error with API response: " . json_encode($decodedResponse);
        }
    }

    curl_close($ch);

    echo $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['input-rw-1']) or isset($_POST['input-rw-2'])
or isset($_POST['input-rw-3']))) {
    $content1 = $_POST['input-rw-1'];
    $content2 = $_POST['input-rw-2'];
    $content3 = $_POST['input-rw-3'];

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    ];

    $data = [
        'model' => 'gpt-3.5-turbo-16k',
        'messages' => [
            [
                'role' => 'system',
                'content' => "You are a tool that assists in crafting articles based on the provided content. 
                The generated articles need to maintain the accuracy of the information while being engaging 
                for readers without being overly repetitive in terms of wording and sentence structure."
            ],
            [
                'role' => 'user',
                'content' => "You are a content writing assistant. You must write a blog post in 
                Vietnamese using three pieces of content on the same topic provided. Ensure you retain 
                essential details such as data, times, and quotes from characters.
                Content 1: . $content1;
                Content 2: . $content2;
                Content 3: . $content3."
            ]
        ],
        'temperature' => 1,
        'max_tokens' => 7000,
        'top_p' => 1,
        'frequency_penalty' => 0,
        'presence_penalty' => 0
    ];

    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = 'Error:' . curl_error($ch);
    } else {
        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['choices'][0]['message']['content'])) {
            $output = $decodedResponse['choices'][0]['message']['content'];
        } else {
            $output = "Error with API response: " . json_encode($decodedResponse);
        }
    }

    curl_close($ch);

    echo $output;
}

?>