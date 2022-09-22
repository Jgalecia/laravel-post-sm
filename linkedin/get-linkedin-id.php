<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
  
$access_token = 'AQUeU3x1VU7i9q_chPHX2temQBaPjHcPT55KWr817HEL0_OLeun4oiMcmT_8S-yYAsF7itM6bZq2RvwcCSNxuwinXw8cdnQMt832HvWeuesdnHJpOQ68bSDjfOIj-twtZZkvr_VS9W77lbX9zPwSs_iIN--_ZeawW6WAfxsMAy7ldKpNeUcvpYC56NpsiJ-HpRgzO_h2tOg4RsyHy6i9ANCAAv3G7cLPmHXwHQLsECCmmSOqZb8PUZnDpTGkWNmXRm3mk5PbNuo8WwJm4aZZzBJ4RuhNV4qx0_2hwj67EXSIzeVXLz3ktdffVhQSWhLsi6Th2znZmutAuS0VFWmqOjmpcfiONg';
try {
    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
    $response = $client->request('GET', '/v2/me', [
        'headers' => [
            "Authorization" => "Bearer " . $access_token,
        ],
    ]);
    $data = json_decode($response->getBody()->getContents(), true);
    $linkedin_profile_id = $data['id']; // store this id somewhere
    echo $linkedin_profile_id;
} catch(Exception $e) {
    echo $e->getMessage();
}