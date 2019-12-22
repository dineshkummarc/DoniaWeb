<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class coupon extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
	}

	public function index($page = "empty", $ids = ""){
		
		$coupons = $this->model->fetch("*", "general_coupons", "", "created", "DESC");

		$coupon = array();
		if($ids != ""){
			$coupon = $this->model->get("*", "general_coupons", "ids = '{$ids}'");
		}

		$data = array(
			"coupon" => $coupon,
			"packages" => $this->model->fetch("*", PACKAGES, "type = 2", "id", "DESC")
		);

		if (!$this->input->is_ajax_request()) {
			$view = $this->load->view($page, $data, true);
			$this->template->build('index', array("view" => $view, "coupons" => $coupons));
		}else{
			$this->load->view($page, $data);
		}
	}

	public function menu(){
		$this->load->view("menu");
	}

	public function view($coupon_code = ""){
		$this->load->view("view", array("coupon_code" => $coupon_code));
	}

	public function update(){
		$data = array(
			"packages"    => $this->model->fetch("name, id, ids", PACKAGES),
			"result"      => $this->model->get("*", "general_coupons", "ids = '".segment(3)."'"),       
			"module"      => get_class($this),
			"module_name" => $this->module_name,
			"module_icon" => $this->module_icon
		);
		$this->template->build('update', $data);
	}

	public function ajax_update(){
		$ids				= post("ids");
		$name 				= post("name");
		$code    			= post("code");
		$type 				= post("type");
		$price				= post("price");
		$packages  			= post("packages");
		$expiration_date  	= post("expiration_date");
		
		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Name is required")
			));
		}

		if($code == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Code is required")
			));
		}

		if($ids == ""){
			$item = $this->model->get("*", "general_coupons", "code = '{$code}'");
		}else{
			$item = $this->model->get("*", "general_coupons", "code = '{$code}' AND ids != '{$ids}'");
		}

		if(!empty($item)){
			ms(array(
				"status"  => "error",
				"message" => lang("This code already exists")
			));
		}

		if($price == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Price is required")
			));
		}

		if($expiration_date == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Please enter date expiration")
			));
		}

		$data = array(
			"name"            => $name,
			"type"            => $type,
			"code"            => $code,
			"price"           => (float)$price,
			"expiration_date" => date("Y-m-d", strtotime($expiration_date)),
			"packages"        => json_encode($packages),
			"changed"         => NOW
		);
		
		$item = $this->model->get("ids", "general_coupons", "ids = '{$ids}'");
		if(empty($item)){
			$data['ids'] = ids();
			$data['created'] = NOW;
			$this->db->insert("general_coupons", $data);
		}
		else{
			$this->db->update("general_coupons", $data, array("ids" => $item->ids));
		}

		ms(array(
			"status"  => "success",
			"message" => lang("successfully")
		));
	}

	public function ajax_remove(){
		unset_session("coupon");
		ms(array(
			"status" => "success",
			"message" => lang("successfully")
		));
	}

	public function ajax_verify(){
		$code = post("code");
		$package = post("package");

		if($code == ""){
			ms(array(
				"status" => "error",
				"message" => lang("Please enter coupon code")
			));
		}

		$package = $this->model->get("*", PACKAGES, "ids = '{$package}'");
		if(empty($package)){
			ms(array(
				"status" => "error",
				"message" => lang("Package does not exist")
			));
		}

		$coupon = $this->model->get("*", "general_coupons", "code = '{$code}'");
		if(empty($coupon)){
			ms(array(
				"status" => "error",
				"message" => lang("Coupon code is not valid")
			));
		}

		$expiration_date = strtotime($coupon->expiration_date);
		$now = strtotime(NOW);
		if($expiration_date < $now){
			ms(array(
				"status" => "error",
				"message" => lang("Coupon code has expired")
			));
		}

		$coupon_package = json_decode($coupon->packages);
		if(!in_array($package->id, $coupon_package)){
			ms(array(
				"status" => "error",
				"message" => lang("Discount code does not apply to this package")
			));
		}

		set_session("coupon", array(
			"code" => $coupon->code,
			"type" => $coupon->type,
			"price" => $coupon->price,
			"package" => $coupon_package,
		));

		ms(array(
			"status" => "success",
			"message" => lang("successfully")
		));
		
	}

	public function ajax_update_status(){
		$this->model->update_status("general_coupons", post("id"), false);
	}
	
	public function ajax_delete_item(){
		$this->model->delete("general_coupons", post("id"), false);
	}
}