<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Table
define('TUMBLR_ACCOUNTS', "tumblr_accounts");
define('TUMBLR_POSTS', "tumblr_posts");

$tumblr_app_id = get_setting("tumblr_app_id", "");
$tumblr_app_secret = get_setting("tumblr_app_secret", "");

if($tumblr_app_id != "" && $tumblr_app_secret != ""){
	define('tumblr_CLIENT_ID', $tumblr_app_id);
	define('tumblr_CLIENT_SERECT', $tumblr_app_secret);
}else{
	define('tumblr_CLIENT_ID', get_option("tumblr_app_id", ""));
	define('tumblr_CLIENT_SERECT', get_option("tumblr_app_secret", ""));
}