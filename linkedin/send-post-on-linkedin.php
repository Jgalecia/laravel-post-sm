<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
  
$link = 'https://artisansweb.net/share-post-on-linkedin-using-linkedin-api-and-php/';
$access_token = 'AQUeU3x1VU7i9q_chPHX2temQBaPjHcPT55KWr817HEL0_OLeun4oiMcmT_8S-yYAsF7itM6bZq2RvwcCSNxuwinXw8cdnQMt832HvWeuesdnHJpOQ68bSDjfOIj-twtZZkvr_VS9W77lbX9zPwSs_iIN--_ZeawW6WAfxsMAy7ldKpNeUcvpYC56NpsiJ-HpRgzO_h2tOg4RsyHy6i9ANCAAv3G7cLPmHXwHQLsECCmmSOqZb8PUZnDpTGkWNmXRm3mk5PbNuo8WwJm4aZZzBJ4RuhNV4qx0_2hwj67EXSIzeVXLz3ktdffVhQSWhLsi6Th2znZmutAuS0VFWmqOjmpcfiONg';
$linkedin_id = '8pPoeBAbpP';
$body = new \stdClass();
$body->content = new \stdClass();
$body->content->contentEntities[0] = new \stdClass();
$body->text = new \stdClass();
$body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
$body->content->contentEntities[0]->entityLocation = $link;
$body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = "https://scontent.fmnl8-2.fna.fbcdn.net/v/t39.30808-6/298959565_467827105350180_2324237145095271256_n.png?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=4Svj_ktDrXAAX8qkU2t&tn=cdeOu0O-pQJ5LZeT&_nc_ht=scontent.fmnl8-2.fna&oh=00_AT8p0lQ2cpbzFjUb2SSVPvu1EWm78uJf3WiEC5HBz1JtTA&oe=6331173F";
$body->content->title = 'Shared post using php API';
$body->owner = 'urn:li:person:'.$linkedin_id;
$body->text->text = 'Third Test';
$body_json = json_encode($body, true);
  
try {
    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
    $response = $client->request('POST', '/v2/shares', [
        'headers' => [
            "Authorization" => "Bearer " . $access_token,
            "Content-Type"  => "application/json",
            "x-li-format"   => "json"
        ],
        'body' => $body_json,
    ]);
  
    if ($response->getStatusCode() !== 201) {
        echo 'Error: '. $response->getLastBody()->errors[0]->message;
    }
  
    echo 'Post is shared on LinkedIn successfully.';
} catch(Exception $e) {
    echo $e->getMessage(). ' for link '. $link;
}