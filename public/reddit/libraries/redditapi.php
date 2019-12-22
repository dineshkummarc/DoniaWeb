<?php

if(!class_exists("redditapi")){
    require "redditoauth/redditoauth.php";

    class redditapi{
        private $ClientID;
        private $ClientSecret;
        private $client;
        private $access_token;

        public function __construct(){
            $this->ClientID = get_option("reddit_client_id", "");
            $this->ClientSecret = get_option("reddit_client_secret", "");
            $this->client = new redditoauth();
        }

        function login_url(){
            if($this->ClientID == "" || $this->ClientSecret == ""){
                echo "Go to website: <a href='https://www.reddit.com/prefs/apps/' target='_blank'>https://www.reddit.com/prefs/apps/</a> to create reddit app with callback url: <span style='color:red; font-weight:bold;'>".cn("reddit/add_account")."</span> and then config reddit at here: <a href='".cn("settings/general/social")."'>".cn("settings/general/social")."</a>";
                exit(0);
            }

            return $this->client->getAuthorizeURL();
        }

        function get_access_token(){
            $token = $this->client->getAccessToken(get("code"));
            return $token;
        }

        function set_access_token($access_token){
            $token = $this->client->setAccessToken($access_token);
            $this->access_token = json_decode($access_token);
            return $token;
        }

        function get_user_info(){
            $userinfo = $this->client->getUser();
            if(isset($userinfo->name)){
                return $userinfo;
            }

            return false;
        }

        function renew_access_token(){
            $curl = curl_init('https://www.reddit.com/api/v1/access_token');
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_USERPWD, $this->ClientID . ':' . $this->ClientSecret);
            curl_setopt(
                $curl, CURLOPT_POSTFIELDS, [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $this->access_token->refresh_token,
                ]
            );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl);
            curl_close($curl);

            $access_token = json_decode($response);
            if(isset($access_token->access_token)){
                $this->set_access_token($response);
            }

            return $response;
        }

        function post($data, $subreddit){
            $this->renew_access_token();

            $data       = (object)$data;
            $response   = array();
            $data->data = (object)json_decode($data->data);
            $medias     = @$data->data->media;
            $title      = @$data->data->title;
            $caption    = @$data->data->caption;
            $url        = @$data->data->url;
            $content    = array();

            switch ($data->type) {
                case 'link':
                    $response = $this->client->createStory($title, $url, $subreddit, $caption, "link");
                    break;

                case 'media':

                    if(is_image($medias[0])){

                        //Auto Resize
                        if(permission("watermark", $data->uid)){
                            $new_image_path = get_tmp_path(ids().".jpg");
                            $new_image_path = Watermark($medias[0], $new_image_path, $data->uid);
                            $medias[0] = $new_image_path;
                        }

                        $response = $this->client->createStory($title, $medias[0], $subreddit, $caption, "image");

                    }else{

                    }
                    
                    break;

                default:
                    $response = $this->client->createStory($title, null, $subreddit, $caption, "self");
                    break;
            }

            if($response->success == 1){
                switch ($data->type) {
                    case 'link':
                        return array(
                            "status" => "success",
                            "url" => substr($response->jquery[12][3][0], 0, -1)
                        );
                        break;

                    case 'text':
                        return array(
                            "status" => "success",
                            "url" => substr($response->jquery[10][3][0], 0, -1)
                        );
                        break;
                    
                    default:
                        return array(
                            "status" => "success",
                            "url" => substr($response->jquery[16][3][0], 0, -1)
                        );
                        break;
                }
            }else{
                if(isset($response->jquery[14][3][0])){
                    return array(
                        "status" => "error",
                        "message" => $response->jquery[14][3][0]
                    );
                }

                if(isset($response->jquery[22][3][0])){
                    return array(
                        "status" => "error",
                        "message" => $response->jquery[22][3][0]
                    );
                }
            }
        }
    }
}