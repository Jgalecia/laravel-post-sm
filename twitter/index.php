<?php
require_once "vendor/autoload.php";
  
use Abraham\TwitterOAuth\TwitterOAuth;
  
define('CONSUMER_KEY', 'hyOdDZtrXfqkKfY4vyLGOPXV2');
define('CONSUMER_SECRET', 'PUdSxqTS80LjJpHN6eYvaCPPNuEnqyW4Wcoi8vA5vFPZd8zKVy');
define('ACCESS_TOKEN', '1573358341044129793-a95rK6bLnccdy7l3WoeCqNYQSQpUZ5');
define('ACCESS_TOKEN_SECRET', 'dQaYOoCFfZdVwu8H9CPb0NezGNOU4d5apivVH1DdkttEV');
  
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  
$status = 'This is a test tweet. https://artisansweb.net';
$result = $connection->post("statuses/update", ["status" => $status]);
if ($connection->getLastHttpCode() == 200) {
    echo "Your Tweet posted successfully.";
} else {
    echo 'error: ' . $result->errors[0]->message;
}

$media1 = $connection->upload('media/upload', ['media' => getcwd(). '/1.jpg']);
$media2 = $connection->upload('media/upload', ['media' => getcwd(). '/2.jpg']);
$parameters = [
    'status' => 'Testing Media Upload via API',
    'media_ids' => implode(',', [$media1->media_id_string, $media2->media_id_string])
];