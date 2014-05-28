<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Not found Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Not_found extends My_Controller{
	
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->output->set_status_header('404');
		$data['errorMessage'] = ' Ooops! Page not found';
		$this->tmpl = array(
			'common/footer',
			'common/header',
			'errors/error_404',
		);
		$this->data['text'] = 'TEMP (page 404)';
		$this->render();
	}
}

/* End of file not_found.php */
/* Location: ./application/config/not_found.php */