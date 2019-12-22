<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class telegram extends MX_Controller {
	public $table;
	public $module;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		
		$this->table = "telegram_accounts";
		$this->module = get_class($this);
		$this->module_name = lang("telegram_accounts");
		$this->module_icon = "fa fa-telegram";
		$this->load->model($this->module.'_model', 'model');

	}

	public function index(){

	}

	public function block_list_account(){
		$data = array(
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'module_icon'  => $this->module_icon,
			'list_account' => $this->model->fetch("id, ids, type, pid, username, url, avatar, status", $this->table, "uid = '".session("uid")."'")
		);
		$this->load->view("account/index", $data);
	}

	public function popup_add_account(){
		$data = array(
			'module'       => $this->module,
			'module_name'  => $this->module_name,
			'module_icon'  => $this->module_icon
		);
		$this->load->view('account/popup_add_account', $data);
	}

	public function ajax_get_access(){
		$code = post("code");
		set_session("telegram_access_token", $code);

		ms(array(
			"status"  => "success",
			"message" => lang("successfully")
		));
	}
	
	public function add_account(){
		$access_token = session("telegram_access_token");
		$telegram = new Telegram_API($access_token);
		$result = $telegram->get_groups();

		$data = array(
			"result" => $result,
		);

		$this->template->build('account/add_account', $data);
	}

	public function ajax_add_account(){
		$accounts = $this->input->post("accounts");
		$access_token = session("telegram_access_token");

		if(empty($accounts)){
			ms(array(
	        	"status"  => "error",
	        	"message" => lang('please_select_at_least_one_item')
	        ));
		}

		if($access_token){
			$access_token = session("telegram_access_token");
			$telegram = new Telegram_API($access_token);
			

			foreach ($accounts as $account) {

				$item = $this->model->get("*", $this->table, "pid = '{$account}' and uid = '".session("uid")."' ");
				if(empty($item)){
					if(!check_number_account($this->table)){
						ms(array(
							"status" => "error",
							"message" => lang("limit_social_accounts")
						));
					}
				}

				$response = $telegram->get_chat($account);
				if($response){
					$data = array(
						"uid"          => session("uid"),
						"pid"          => $response->id,
						"type"         => ($response->type == "channel")?"channel":"group",
						"username"     => $response->title,
						"url"          => "https://web.telegram.org/#/im?p=@".$response->username,
						"avatar"       => "https://ui-avatars.com/api?name=".$response->title."&size=128&background=0088cc&color=fff",
						"access_token" => $access_token,
						"status"       => 1,
						"changed"      => NOW
					);

					if(empty($item)){
						$data["created"] = NOW;
						$data["ids"] = ids();
						$this->db->insert($this->table, $data);
					}else{
						$this->db->update($this->table, $data, array("id" => $item->id));
					}
				}
			}

			ms(array(
				"status" => "success",
				"message" => lang('add_account_successfully')
			));
		}else{
			ms(array(
	        	"status"  => "error",
	        	"message" => lang('an_error_occurred_during_processing_please_try_again')
	        ));
		}
	}

	public function ajax_delete_item(){
		$board = $this->model->get("*", $this->table, "ids = '".post("id")."'");
		$this->model->delete($this->table, post("id"), false);
	}
}