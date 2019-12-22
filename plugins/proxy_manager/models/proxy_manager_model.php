<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proxy_manager_model extends MY_Model { 
	public function __construct(){
		parent::__construct();
	}

	public function get_assinged_proxies($proxy_id){

		$directory = APPPATH.'../public/';
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		
		$data = array();
		foreach ($scanned_directory as $key => $directory) {
			$tb_accounts = $directory."_accounts";

			if ( $this->db->table_exists($tb_accounts)){

				if ( $this->db->field_exists('default_proxy', $tb_accounts) )
				{
					$result = $this->model->fetch("*", $tb_accounts, "default_proxy = '{$proxy_id}'");
					if(!empty($result)){
						$data[$directory] = $result;
					}
				}

			}
		}

		return $data;

	}

	public function get_social_tab(){

		$directory_public = APPPATH.'../public/';
		$scanned_directory = array_diff(scandir($directory_public), array('..', '.'));
		
		$data = array();
		foreach ($scanned_directory as $key => $directory) {
			$config_file = $directory_public.$directory."/config.json";
			
			$tb_accounts = $directory."_accounts";
			
			if ( $this->db->table_exists($tb_accounts)){

				if ( $this->db->field_exists('default_proxy', $tb_accounts) )
				{
					if(file_exists($config_file)){
						$config_data = file_get_contents($config_file);
						$config_data = json_decode($config_data);
						$data[$directory] = $config_data->menu;
					}
				}

			}
		}

		return $data;

	}

	function get_social_accounts($tb_social = "", $limit=-1, $page=-1){
		$tb_users = USERS;
		$tb_proxies = PROXIES;

		$columns = array(
			"a.ids"             => "ids",
			"b.email"           => "email",
			"b.fullname"        => "fullname",
			"a.username as account" => "username",
			"c.address"         => "address",
			"b.created"         => "created",
			"b.changed"         => "changed"
		);

		$c = (int)get_secure('c'); //Column key
		$t = get_secure('t'); //Sort type
		$k = trim(get_secure('k')); //Search keywork

		if($limit == -1){
			$this->db->select('count(*) as sum');
			$this->db->from($tb_social." as a");
			$this->db->join($tb_users." as b", 'a.uid = b.id', 'left');
			$this->db->join($tb_proxies." as c", 'a.default_proxy = c.id', 'left');
		}else{
			$this->db->select(implode(", ", array_keys($columns)));
			$this->db->from($tb_social." as a");
			$this->db->join($tb_users." as b", 'a.uid = b.id', 'left');
			$this->db->join($tb_proxies." as c", 'a.default_proxy = c.id', 'left');
		}
		
		if($limit != -1) {
			$this->db->limit($limit, $page);
		}

		$columns = array(
			"b.email"           => "email",
			"b.fullname"        => "fullname",
			"a.username"        => "username",
			"c.address"         => "address",
			"b.created"         => "created",
			"b.changed"         => "changed"
		);

		if($k){
			$i = 0;
			foreach ($columns as $column_name => $column_title) {
				if($i == 0){
					$this->db->like($column_name, $k);
				}else{
					$this->db->or_like($column_name, $k);
				}
				$i++;
			}
		}

		if($limit != -1){
			$i = 0;
			$s = ($t && ($t == "asc" || $t == "desc"))?$t:"desc";
			foreach ($columns as $column_name => $column_title) {
				if($i == $c){
					$this->db->order_by($column_name , $s);
				}
				$i++;
			}
		}else{
			$this->db->order_by('a.created', 'desc');
		}
				
		$query = $this->db->get();
		if($query->result()){
			if($limit == -1){
				return $query->row()->sum;
			}else{
				$result =  $query->result();
				return $result;
			}

		}else{
			return false;
		}
	}
}
