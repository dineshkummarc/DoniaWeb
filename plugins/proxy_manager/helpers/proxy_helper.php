<?php
function check_proxy($address)
{


    $url = "https://www.instagram.com/";
    $ip = "";
    $port = "";
    $auth = "";
    $check = true;

    $address = str_replace("https://", "", $address);
    $address = str_replace("http://", "", $address);
    $address = str_replace("socks5://", "", $address);
    $address = str_replace("socks4://", "", $address);

    $address = explode("@", $address);
    if(count($address) == 2){
        
        $auth = $address[0];
        $proxy = explode(":", $address[1]);
        if(count($proxy) == 2){
            $ip = $proxy[0];
            $port = $proxy[1];
        }else{
            return false;
        }

    }else if(count($address) == 1){

        $proxy = explode(":", $address[0]);
        if(count($proxy) == 2){
            $ip = $proxy[0];
            $port = $proxy[1];
        }else{
            return false;
        }

    }else{

        return false;

    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, $port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    curl_setopt($ch, CURLOPT_PROXY, $ip);
    curl_setopt($ch,CURLOPT_TIMEOUT, 3000);
    if($auth != ""){
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $auth);
    }
    $data = curl_exec($ch);
    curl_close($ch);

    if(empty($data)){
        return false;
    }

    return $data;
}