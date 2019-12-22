<?php
if(!class_exists("tumblrapi")){
    require "tumblroauth/tumblroauth.php";
    require "autoload.php";
    class tumblrapi{
        private $ClientID;
        private $ClientSecret;
        private $token;
        private $tokenSecret;
        private $client;

        public function __construct($client_id = null, $client_secret = null, $token = null, $tokenSecret = null){
            $this->ClientID = $client_id;
            $this->ClientSecret = $client_secret;
            $this->client = new Tumblr\API\Client($client_id, $client_secret);
            $this->client->setToken($token, $tokenSecret);
        }

        function login_url(){
            if($this->ClientID == "" || $this->ClientSecret == "") redirect(cn("settings/general/social"));

            $connection    = new TumblrOAuth($this->ClientID, $this->ClientSecret);
            $request_token = $connection->getRequestToken(cn("tumblr/add_account"));
            $token = $request_token['oauth_token'];
            $oauth_token_secret = $request_token['oauth_token_secret'];
            set_session("tumblr_oauth_token", $token);
            set_session("tumblr_oauth_token_secret", $oauth_token_secret);
            return $connection->getAuthorizeURL($token);
        }

        function get_access_token(){
            try {
                if(get("oauth_verifier")){
                    $connection = new TumblrOAuth($this->ClientID, $this->ClientSecret, session("tumblr_oauth_token"), session("tumblr_oauth_token_secret"));
                    $access_token = $connection->getAccessToken(get("oauth_verifier"));

                    unset_session("tumblr_oauth_token");
                    unset_session("tumblr_oauth_token_secret");

                    $this->client->setToken($access_token['oauth_token'], $access_token['oauth_token_secret']);

                    return $access_token;
                }else{
                    redirect(cn("tumblr/oauth"));
                }
            } catch (Exception $e) {
                redirect(cn("tumblr/oauth"));
            }
        }

        function set_access_token($access_token){
            $access_token = json_decode($access_token);
            $this->client->setToken($access_token->oauth_token, $access_token->oauth_token_secret);
        }

        function get_user_info(){
            try {
                return $this->client->getUserInfo();
            } catch (Exception $e) {
                return false;
            }
        }

        function post($data, $blogname){
            $data       = (object)$data;
            $response   = array();
            $data->data = (object)json_decode($data->data);
            $medias     = @$data->data->media;
            $title      = @$data->data->title;
            $caption    = @$data->data->caption;
            $description= @$data->data->description;
            $url        = @$data->data->url;
            $blogname   = $blogname.'.tumblr.com';
            $content    = array();

            try {

                switch ($data->type) {
                    case 'link':

                        $content = array(
                            "type" => "link", 
                            "url" => $url,
                            "description" => $caption
                        );

                        $link_info = get_info_link($url);

                        if($link_info['title'] != ""){
                            $content['title'] = $link_info['title'];
                        }

                        if($link_info['description'] != ""){
                            $content['excerpt'] = $link_info['description'];
                        }

                        if($link_info['image'] != ""){
                            $content['thumbnail'] = $link_info['image'];
                        }

                        break;

                    case 'media':

                        if(is_image($medias[0])){

                            $images = array();
                            foreach ($medias as $key => $media){
                                if(is_image($media)){

                                    //Auto Resize
                                    if(permission("watermark", $data->uid)){
                                        $new_image_path = get_tmp_path(ids().".jpg");
                                        $new_image_path = Watermark($media, $new_image_path, $data->uid);
                                        $media = $new_image_path;
                                    }

                                    $images[] = $media;
                                }
                            }

                            if(empty($images)){
                                return array(
                                    "status"  => "error",
                                    "message" => lang("Images is required")
                                );
                            }

                            $content = array(
                                "type" => "photo", 
                                "caption" => $caption,
                                "data" => $images,
                            );

                        }else{

                            $content = array(
                                "type" => "video", 
                                "caption" => $caption,
                                "data" => $medias[0],
                            );

                        }
                        break;

                    default:

                        $content = array(
                            "type" => "text", 
                            "title" => $title,
                            "body" => $caption
                        );
                        break;
                }

                $response = $this->client->createPost($blogname, $content);
                return $response->id;

            } catch (Exception $e) {
                return array(
                    "status"  => "error",
                    "message" => $e->getMessage()
                );
            }

        }
    }
}