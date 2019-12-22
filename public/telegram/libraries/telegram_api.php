<?php
if(!class_exists("Telegram_api")){
    require APPPATH."../public/telegram/libraries/TelegramBotPHP/TelegramAPI.php";
    class Telegram_api{
        public $telegram;
        public function __construct($api_key){
            if($api_key != ""){
                $this->telegram = new TelegramApi($api_key);
            }
        }

        function get_groups(){
            try {
                $update = $this->telegram->getUpdates();
                if(isset($update['ok']) && $update['ok'] == 1 && !empty($update['result'])){
                    return json_decode(json_encode($update['result']));
                }else{
                    return false;
                }

            } catch (Exception $e) {
                return false;
            }

        }

        function get_chat($chat_id){
            try {

                $response = $this->telegram->getChat(array('chat_id' => $chat_id));
                if(isset($response['ok']) && $response['ok'] == 1 && !empty($response['result'])){
                    return json_decode(json_encode($response['result']));
                }else{
                    return false;
                }

            } catch (Exception $e) {
                return false;
            }

        }

        function relogin($e, $account){
            if(isset($e['error_code']) && $e['error_code'] == 401){
                $CI = &get_instance();
                $CI->db->update("telegram_accounts", array("status" => 0), "id = '{$account}'");
            }
        }

        function post($data, $chat_id = ""){
            $data     = (object)$data;
            $response = array();
            $data->data = (object)json_decode($data->data);
            
            try {
                $media      = $data->data->media;
                $caption    = $data->data->caption;
                $url        = $data->data->url;

                switch ($data->type) {
                    case 'link':
                        $content = array('chat_id' => $chat_id, 'text' => $caption." \n\r".$url);
                        $response = $this->telegram->sendMessage($content);
                        break;

                    case 'media':

                        if(is_image($media[0]))
                        {
                            //Auto Resize
                            if(permission("watermark", $data->uid)){
                                $new_image_path = get_tmp_path(ids().".jpg");
                                $new_image_path = Watermark($media[0], $new_image_path, $data->uid);
                                $media[0] = $new_image_path;
                            }

                            $content = array('chat_id' => $chat_id, 'photo' => $media[0]);
                            $response = $this->telegram->sendPhoto($content);

                            if(!empty($caption)){
                                $this->telegram->sendMessage(array('chat_id' => $chat_id, 'text' => $caption));
                            }
                        }else{
                            $content = array('chat_id' => $chat_id, 'video' => $media[0]);
                            $response = $this->telegram->sendVideo($content);
                            if(!empty($caption)){
                                $this->telegram->sendMessage(array('chat_id' => $chat_id, 'text' => $caption));
                            }
                        }

                        break;
                    
                    default:
                        $content = array('chat_id' => $chat_id, 'text' => $caption);
                        $response = $this->telegram->sendMessage($content);
                        break;
                }


                if(isset($response['ok']) && $response['ok'] == 1){
                    $response = json_decode(json_encode($response['result']));
                    return $response;

                }else{
                    $this->relogin($response, $data->account);
                    return array(
                        "status"  => "error",
                        "message" => $response['description']
                    );

                }

                return array(
                    "status"  => "error",
                    "message" => lang("Unknow error")
                );
            } catch (Exception $e) {

                return array(
                    "status"  => "error",
                    "message" => $e->getMessage()
                );

            }
        }
    }
}