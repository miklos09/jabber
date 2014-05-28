<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Login Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends My_Controller{
	
	function __construct(){
		parent::__construct();

	}
	public function index(){
		$this->template = array(
			'common/footer',
			'common/header',
			'error/error_404',
		);
		$this->data['title'] = 'Login';
		$this->render();
	}
	
	public function tag_test(){
		$this->template = array(
			'common/footer',
			'common/header',
			'common/tag_test',
		);
		$this->data['title'] = 'Login';
		$this->render();
	}
}	

/* End of file login.php */
/* Location: ./application/config/login.php */