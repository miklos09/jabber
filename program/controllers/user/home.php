<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Home Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends My_Controller{
	
	function __construct(){
		parent::__construct();
	}
	public function index(){
	
		$this->tmpl = array(
			'common/footer',
			'common/navi',
			'common/header',
			'account/home',
			
		);
		$this->data['title'] = 'Home';
		$this->render();
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/user/home.php */