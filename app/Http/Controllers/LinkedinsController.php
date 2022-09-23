<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class LinkedinsController extends Controller
{
    public function callback (Request $request){
        try {
            $client = new Client(['base_uri' => 'https://www.linkedin.com']);
            $response = $client->request('POST', '/oauth/v2/accessToken', [
                'form_params' => [
                        "grant_type" => "authorization_code",
                        "code" => $_GET($REQUEST)['code'],
                        "redirect_uri" => env('REDIRECT_URL'),
                        "client_id" => env('CLIENT_ID'),
                        "client_secret" => env('CLIENT_SECRET'),
                ],
            ]);
            $data = json_decode($response->getBody()->getContents(), true);
            $access_token = $data['access_token']; // store this token somewhere
            echo $access_token;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    //     if (isset($_REQUEST['code'])) {
    //         $code = $_REQUEST['code'];
    //         $url = "https://www.linkedin.com/oauth/v2/accessToken";
    //         $params = [
    //             "code" => $_GET($REQUEST)['code'],
    //             "redirect_uri" => env('REDIRECT_URL'),
    //             "client_id" => env('CLIENT_ID'),
    //             "client_secret" => env('CLIENT_SECRET'),
    //             'code' => $code,
    //             "grant_type" => "authorization_code",
    //         ];
    //         $accessToken = curl($url, http_build_query($params), "application/x-www-form-urlencoded");
    //         $accessToken = json_encode($accessToken)->access_token;

    //         $parameter = [
    //             'comment' => $_SESSION['post'],
    //             'visibility' => ['code' => $_SESSION['privacy']]
    //         ];

    //         $post_url = "https://api.linkedin.com/v1/people/~/shares?format&oauth2_access_token=" . $accessToken;
    //         $post = curl($post_url, json_encode($parameter), "application/json");
    //         $post = json_encode($post);
    //         if (isset($post->updateUrl)) {
    //             $_SESSION['success_message'] = "Post sent successfully. Finf it <a href='{post->updateUrl}'>here</a>"
    //             } else {
    //                 $_SESSION['error_message'] = "Error while sending your post: {$post->message}";
    //             }
    //         }
    //     }
    // }
    
}
