<?php
$secure1psid = "bQjy83uPp2Cl2eeMrsVmHzm-Q4KEeNyQXhkFk0_98vHcmiLc1U73ovvQ-_FLeH6Mp5VCIg";
$secure1psidts = "sidts-CjEB3e41hdDTvHpbKlwCs2qysDzZ-NGKu-k0RSe5BSObW4pE7Hi_Pta9WjKrG_HVkJ-bEAA";

// Gửi gợi ý và nhận câu trả lời từ Bard
$apiUrl = 'https://bard.googleapis.com/v1/chat:poll';
$accessToken = 'Your Access Token';

$payload = [
    'prompt' => 'Hello',
    'access_token' => $accessToken,
];

$headers = [
    'Cookie: __Secure-1PSID=' . $secure1psid . '; __Secure-1PSIDTS=' . $secure1psidts,
];

$curl = curl_init($apiUrl);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

if ($response !== false) {
    $result = json_decode($response, true);
    echo $result['content'] . "\n";
    foreach ($result['images'] as $image) {
        echo "Image link: " . $image . "\n";
    }
} else {
    echo "Failed to communicate with Bard API.\n";
}
?>