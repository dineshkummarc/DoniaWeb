<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
defined('BASEPATH') OR exit('No direct script access allowed');
 
class proxy_manager extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->tb_proxies = PROXIES;
		$this->module = get_class($this);
		$this->load->model($this->module.'_model', 'model');
		$this->proxies = $this->model->fetch("*", $this->tb_proxies);

		//Check Plugins Permission
		if(!check_permission_plugins("proxy_manager")){
			redirect(cn("dashboard"));
		}
	}

	public function index(){
		$data = array(
			
		);

		$view = $this->load->view("ajax/empty", $data, true);
		$this->template->build('index', array("view" => $view, "proxies" => $this->proxies));
	}

	public function add(){
		$data = array(
			"packages" => $this->model->fetch("*", PACKAGES)
		);

		$view = $this->load->view("ajax/add", $data, true);
		$this->template->build('index', array("view" => $view, "proxies" => $this->proxies));
	}

	public function ping(){
		$this->load->view("ping");
	}

	public function edit($ids = ""){

		$proxy = $this->model->get("*", $this->tb_proxies, "ids = '{$ids}'");
		if(empty($proxy)){
			redirect(cn("proxy_manager"));
		}

		$data = array(
			"proxy" => $proxy,
			"assigned" => $this->model->get_assinged_proxies($proxy->id),
			"packages" => $this->model->fetch("*", PACKAGES)
		);

		if (!$this->input->is_ajax_request()) {
			$view = $this->load->view("ajax/edit", $data, true);
		$this->template->build('index', array("view" => $view, "proxies" => $this->proxies));
		}else{
			$this->load->view("ajax/edit", $data);
		}
		
	}

	public function assign(){
		
		$socials = $this->model->get_social_tab();
		$socials_tmp = $socials;
		reset($socials_tmp);
		$first_key = key($socials_tmp);

		if(segment(3) == "" || !$this->db->table_exists(segment(3)."_accounts") ){
			redirect( cn( "proxy_manager/assign/".$first_key ) );
		}

		$columns = array(
			"email"           => lang("email"),
			"fullname"        => lang("fullname"),
			"account"         => sprintf(lang("%s account"), str_replace("_", " ", ucfirst(segment(3)) ) ),
			"address"         => lang("address")
		);

		$page        = (int)get("p");
		$limit       = 50;
		$result      = $this->model->get_social_accounts(segment(3)."_accounts", $limit, $page);
		$total       = $this->model->get_social_accounts(segment(3)."_accounts", -1, -1);
		$total_final = $total;

		$query = array();
		$query_string = "";
		if(get("c")) $query["c"] = get("c");
		if(get("t")) $query["t"] = get("t");
		if(get("k")) $query["k"] = get("k");

		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}

		$configs = array(
			"base_url"   => cn(get_class($this)."/assign/".segment(3)."/".$query_string), 
			"total_rows" => $total_final, 
			"per_page"   => $limit
		);

		$this->pagination->initialize($configs);

		$data = array(
			"columns" => $columns,
			"result"  => $result,
			"total"   => $total_final,
			"page"    => $page,
			"limit"   => $limit,
			"module"  => get_class($this),
			"socials" => $socials
		);

		$view = $this->load->view("ajax/assign", $data, true);
		$this->template->build('index', array("view" => $view, "proxies" => $this->proxies));
	}

	public function import(){
		$data = array(

		);

		$view = $this->load->view("ajax/import", $data, true);
		$this->template->build('index', array("view" => $view, "proxies" => $this->proxies));
	}


	/*
	* Ajax Functions
	*/
	public function detect_proxy($ip){
		print_r(file_get_contents("https://api.ip.sb/geoip/".$ip));
	}

	public function ajax_add(){
		$ids = post("ids");
		$address = post("address");
		$location = post("location");
		$limit = (int)post("limit");
		$package = post("packages[]");

		if($address == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Address is required")
			));
		}

		if(empty($package)){
			ms(array(
				"status"  => "error",
				"message" => lang("Select at least one package")
			));
		}

		if(!$ids){
			$proxy = $this->model->get("*", $this->tb_proxies, "address = '{$address}'");
			if(!empty($proxy)){
				ms(array(
					"status"  => "error",
					"message" => lang("This proxy already exists")
				));
			}

			$this->check_proxy($address);
		}else{
			$proxy = $this->model->get("*", $this->tb_proxies, "address = '{$address}' AND ids != '{$ids}'");
			if(!empty($proxy)){
				ms(array(
					"status"  => "error",
					"message" => lang("This proxy already exists")
				));
			}
		}

		$data = array(
			'address'   => $address,
			'location'  => $location,
			'limit'  => $limit,
			'package' => json_encode($package),
			'changed'   => NOW,
		);

		$proxy = $this->model->get("*", $this->tb_proxies, "ids = '{$ids}'");
		if(empty($proxy)){
			$data['ids'] = ids();
			$data['active'] = 1;
			$data['status'] = 1;
			$data['created'] = NOW;
			$this->db->insert($this->tb_proxies, $data);
		}else{
			$this->db->update($this->tb_proxies, $data, array("ids" => $ids));
		}

		ms(array(
			"status" => "success",
			"message" => lang("successfully")
		));
	}

	public function popup_assign($table="", $ids=""){
		$data = array(
			"social" => $table,
			"ids" => $ids,
			"proxies" => $this->model->fetch("*", PROXIES, "status = 1")
		);

		$this->load->view("ajax/popup_assign", $data);
	}

	public function ajax_assign_proxy($table="", $ids=""){
		$table = $table."_accounts";
		$proxy_ids = post("proxy");

		$proxy = $this->model->get("*", PROXIES, "ids = '{$proxy_ids}'");
		if($this->db->table_exists($table)){
			$account = $this->model->get("*", $table, "ids = '{$ids}'");
			if(!empty($account)  && !empty($proxy)){
				$this->db->update($table, array(
					"default_proxy" => $proxy->id
				), array("ids" => $ids));

				ms(array(
					"status" => "success",
					"message" => lang("successfully")
				));
			}

			ms(array(
				"status" => "error",
				"message" => lang("unsuccessfully")
			));
		}else{
			ms(array(
				"status" => "error",
				"message" => lang("unsuccessfully")
			));
		}

		$data = array(
			"social" => $table,
			"ids" => $ids
		);

		$this->load->view("ajax/popup_assign", $data);
	}

	public function ajax_remove_assign($table){

		$ids = post("id");

		$tb_accounts = $table."_accounts";

		if ( $this->db->table_exists($tb_accounts)){

			if ( $this->db->field_exists('default_proxy', $tb_accounts) )
			{
				$this->db->update($tb_accounts, array(
					"default_proxy" => 0
				), array("ids" => $ids) );
			}

		}

		ms(array(
			"status" => "success",
			"message" => lang("successfully")
		));
	}

	public function ajax_import(){
		require APPPATH."../plugins/proxy_manager/libraries/php-csv/autoload.php";
		$config['upload_path']          = './assets/tmp';
        $config['allowed_types']        = 'csv';
        $config['encrypt_name']         = FALSE;

        $this->load->library('upload', $config);
        
        if(!empty($_FILES)){
	        $files = $_FILES;
		    for($i=0; $i< count($_FILES['files']['name']); $i++){  
		        $_FILES['files']['name']= $files['files']['name'][$i];
		        $_FILES['files']['type']= $files['files']['type'][$i];
		        $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
		        $_FILES['files']['error']= $files['files']['error'][$i];
		        $_FILES['files']['size']= $files['files']['size'][$i];
		        
		        $this->model->get_storage("file", $_FILES['files']['size']/1024);
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload("files"))
		        {
	                ms(array(
	                	"status"  => "error",
	                	"message" => $this->upload->display_errors()
	                ));
		        }
		        else
		        {
		        	$info = (object)$this->upload->data();

		        	$csvFile = new Keboola\Csv\CsvReader($info->full_path);
		        	if(!empty($csvFile)){
						foreach($csvFile as $proxy_info) {


						 	if(strripos($proxy_info[0], ":") !== false){
								if(strripos($proxy_info[0], ",") !== false){
									$proxy_info = explode(",", $proxy_info[0]);
								}

								if(strripos($proxy_info[0], ";") !== false){
									$proxy_info = explode(";", $proxy_info[0]);
								}

						 		//Check location
						 		$proxies_tmp = explode("@", $proxy_info[0]);
						 		$proxies_ip = "";
						 		switch (count($proxies_tmp)) {
						 			case 1:
						 				$proxies_ip = explode(":", $proxies_tmp[0]);
						 				$proxies_ip = $proxies_ip[0];
						 				break;

						 			case 2:
						 				$proxies_ip = explode(":", $proxies_tmp[1]);
						 				$proxies_ip = $proxies_ip[0];
						 				break;
						 		}
								$result = file_get_contents("https://api.ip.sb/geoip/".$proxies_ip);
								$result = json_decode($result);

					            $data = array(
					            	"ids" => ids(),
					            	"address" => $proxy_info[0],
					            	"location" => ($result != "")?$result->country_code:$proxy_info[1],
					            	"package" => $proxy_info[2]!=0?json_encode(explode("|", $proxy_info[2])):0,
					            	"limit" => (int)$proxy_info[3],
					            	"active" => 1,
					            	"status" => 1,
					            	"changed" => NOW,
					            	"created" => NOW
					            );

					            $this->db->insert(PROXIES, $data);
					        }
						}
					}

		        	@unlink($info->full_path);

	                ms(array(
	                	"status"  => "success",
	                	"message" => lang("Import successfully")
	                ));
		        }
		    }
        }else{
        	load_404();
        }
	}

	public function ajax_delete_item(){
		$this->model->delete(PROXIES, post("id"), false);
	}

	public function check_proxy($proxy){
		$client = new Client();
		$promises = array();

		try {
		    $promises[] = $client->requestAsync(
		    	'GET',
		      	'https://proxymakers.com/check_proxy.php',
		      	['proxy' => $proxy],
		      	['timeout' => 1]
		    );
	  	} catch (\GuzzleHttp\Exception\ClientException $e) {
    		ms(array(
	  			"status" => "error",
	  			"message" => $e->getMessage()
	  		));
	  	}

	  	try {
		  	$results = GuzzleHttp\Promise\unwrap($promises);
			$results = GuzzleHttp\Promise\settle($promises)->wait();
			
			return true;

	  	} catch (Exception $e) {
	  		if($e->getResponse()){
	  			ms(array(
		  			"status" => "error",
		  			"message" => $e->getResponse()->getStatusCode().": ".$e->getResponse()->getReasonPhrase()
		  		));
	  		}else{
	  			ms(array(
	  				"status" => "error",
		  			"message" => $e->getMessage()
		  		));
	  		}
	  		
	  	}
	}

	public function ajax_check_proxy(){
		$client = new Client();
		$promises = array();

		try {
		    $promises[] = $client->requestAsync(
		    	'GET',
		      	'https://proxymakers.com/check_proxy.php',
		      	['proxy' => post("id")],
		      	['timeout' => 1]
		    );
	  	} catch (\GuzzleHttp\Exception\ClientException $e) {
    		ms(array(
	  			"status" => "error",
	  			"message" => $e->getMessage()
	  		));
	  	}

	  	try {
		  	$results = GuzzleHttp\Promise\unwrap($promises);
			$results = GuzzleHttp\Promise\settle($promises)->wait();
			
			ms(array(
	  			"status" => "success",
	  			"message" => lang("Proxy is live")
	  		));

	  	} catch (Exception $e) {
	  		if($e->getResponse()){
	  			ms(array(
		  			"status" => "error",
		  			"message" => $e->getResponse()->getStatusCode().": ".$e->getResponse()->getReasonPhrase()
		  		));
	  		}else{
	  			ms(array(
	  				"status" => "error",
		  			"message" => $e->getMessage()
		  		));
	  		}
	  		
	  	}
		
	}
}