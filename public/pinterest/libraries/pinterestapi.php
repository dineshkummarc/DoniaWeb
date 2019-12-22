<?php
require "pinterestapi/autoload.php";
require "vendor/autoload.php";
use DirkGroenen\Pinterest\Pinterest;
use seregazhuk\PinterestBot\Factories\PinterestBot;
if(!class_exists("pinterestapi")){

    if(file_exists(APPPATH."../public/pinterest/libraries/pinterest_activity.php")){
        require "pinterest_activity.php";
    }

    class pinterestapi{
        public $ClientID;
        public $ClientSecret;
        public $pin;
        public $username;
        public $password;
        public $bot;

        public function __construct($client_id = null, $client_secret = null){

            $this->ClientID = $client_id;
            $this->ClientSecret = $client_secret;
            $this->pin = new Pinterest($client_id, $client_secret);
            $this->bot = PinterestBot::create();
            
            if(file_exists(APPPATH."../public/pinterest/libraries/pinterest_activity.php")){
                $this->activity = new pinterest_activity($this);
            }
        }

        function login_url(){
            if($this->ClientID == "" || $this->ClientSecret == ""){
                redirect(cn("settings/general/social"));
            }
            return $this->pin->auth->getLoginUrl(cn("pinterest/add_account"), array('read_public,write_public,read_relationships,write_relationships'));
        }

        function get_access_token(){
            try {
                if(get("code")){
                    $token = $this->pin->auth->getOAuthToken(get("code"));
                    $this->pin->auth->setOAuthToken($token->access_token);
                    return $token->access_token;
                }else{
                    redirect(cn("pinterest/oauth"));
                }
                
            } catch (Exception $e) {
                redirect(cn("pinterest/oauth"));
            }
        } 

        function set_access_token($access_token = ""){
            $this->pin->auth->setOAuthToken($access_token);
        }

        function set_unofficial($username, $password, $proxy = ""){
            $this->username = $username;
            $this->password = encrypt_decode($password);

            if($proxy != "" && $proxy != 0){
                $proxy = str_replace("https://", "", $proxy);
                $proxy = str_replace("http://", "", $proxy);
                $ip = "";
                $port = "";
                $auth = "";
                
                if(strripos($proxy, "@") !== false){

                    $proxy_arr = explode("@", $proxy);
                    $auth = $proxy_arr[0];
                    $proxy_none = explode(":", $proxy_arr[1]);
                    $ip = $proxy_none[0];
                    $port = $proxy_none[1];
                    $this->bot->getHttpClient()->useProxy($ip, $port, $auth);
                    
                }else{

                    $proxy_none = explode(":", $proxy);
                    $ip = $proxy_none[0];
                    $port = $proxy_none[1];
                    $this->bot->getHttpClient()->useProxy($ip, $port);

                }
            }else{
                $this->bot->getHttpClient()->dontUseProxy();
            }

            $this->bot->auth->login($this->username, $this->password);
            if (!$this->bot->auth->isLoggedIn()) {
                return array(
                    "status" => "error",
                    "message" => $this->bot->getLastError()
                );
            }
        }

        function unofficial_get_boards(){
            $boards = $this->bot->boards->forUser($this->username);

            if(!empty($boards)){
                $data = array();
                foreach ($boards as $board) {
                    $data[] = (object)array(
                        "id" => $board['id'],
                        "name" => $board['name'],
                        "url" => "https://www.pinterest.com".$board['url']
                    );
                }

                return $data;
            }

            return false;
        }

        function unofficial_get_user_info(){
             $profile = $this->bot->user->profile();
            if(!empty($profile)){
                return (object)$profile;
            }
            return false;
        
            try {
                $profile = $this->bot->user->profile();
                if(!empty($profile)){
                    return (object)$profile;
                }
                return false;
            } catch (Exception $e) {
                return false;
            }
        }

        function get_state(){
            try {
                return $this->pin->auth->getState();
            } catch (Exception $e) {
                return false;
            }
        }

        function get_user_info($access_token){
            try {
                $this->pin->auth->setOAuthToken($access_token);
                return $this->pin->users->me(array('access_token' => $access_token, "fields" => 'id, first_name, last_name, username, bio, image, account_type, url, counts, created_at'));
            } catch (Exception $e) {
                echo $e->getMessage();
                if(strpos($e->getMessage(), "401")){
                    echo "<br/><strong style='color: red;'>This pinterest app has not been reviewed by pinterst so it is only for developers.</strong>";
                }
                exit(0);
            }
        }

        function get_boards(){
                $boards = $this->pin->users->getMeBoards();  

                if(!empty($boards)){
                    $data = array();
                    foreach ($boards as $board) {
                        $data[] = (object)array(
                            "id" => get_board_from_url($board->url),
                            "name" => $board->name,
                            "url" => $board->url
                        );
                    }

                    return $data;
                }

        }

        function post($data){
            $data     = (object)$data;
            $response = array();
            $data->data = (object)json_decode($data->data);
            
            try {
                $media      = $data->data->media;
                $caption    = $data->data->caption;
                $link       = $data->data->url;
                $board      = $data->board;

                //Auto Resize
                if(permission("watermark", $data->uid)){
                    $new_image_path = get_tmp_path(ids().".jpg");
                    $new_image_path = Watermark($media[0], $new_image_path, $data->uid);
                    $media[0] = $new_image_path;
                }

                $response = $this->pin->pins->create(array(
                    "image_url"  => $media[0],
                    "note"       => $caption,
                    "board"      => $board,
                    "link"       => $link
                ));
                return $response->id;
            } catch (Exception $e) {
                return array(
                    "status"  => "error",
                    "message" => $e->getMessage()
                );
            }
        }

        function unofficial_post($data){
            $data     = (object)$data;
            $response = array();
            $data->data = (object)json_decode($data->data);
            
            try {
                $media      = $data->data->media;
                $caption    = $data->data->caption;
                $link       = $data->data->url;
                $board      = $data->board;

                //Auto Resize
                if(permission("watermark", $data->uid)){
                    $new_image_path = get_tmp_path(ids().".jpg");
                    $new_image_path = Watermark($media[0], $new_image_path, $data->uid);
                    $media[0] = $new_image_path;
                }

                $response = $this->bot->pins->create(
                    $media[0],
                    $board,
                    $caption,
                    $link
                );

                if(!empty($response)){
                    $response = (object)$response;
                    return $response->id;
                }

                return array(
                    "status"  => "error",
                    "message" => lang("Image does not exist")
                );
                
            } catch (Exception $e) {
                return array(
                    "status"  => "error",
                    "message" => $e->getMessage()
                );
            }
        }

        function get_search($keyword){
            try {
                return $this->pin->users->searchMePins($keyword);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        function search_pin_by_keyword($q)
        {
            $url = "https://pinterest.com/search/pins/?q=$q";

            $html = file_get_contents($url);

            $domd = new \DOMDocument();
            libxml_use_internal_errors(true);
            $domd->loadHTML($html);
            libxml_use_internal_errors(false);

            $items = $domd->getElementsByTagName('script');
            $data = array();

            foreach ($items as $item) {
                $data[] = [
                    'src' => $item->getAttribute('src'),
                    'outerHTML' => $domd->saveHTML($item),
                    'innerHTML' => $domd->saveHTML($item->firstChild),
                ];
            }

            foreach ($data as $key => $value) {
                $response = json_decode($value['innerHTML']);
                if (!$response) {
                    continue;
                }
                if (isset($response->tree->data->results)) {
                    foreach ($response->tree->data->results as $obj) {
                        pr($obj,1);
                        pr($obj->like_count);
                        $images = (Array) $obj->images;
                        pr($images['736x']->url);

                    }
                }
            }
        }

    }

}