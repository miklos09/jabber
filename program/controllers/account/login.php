<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Dashboard Controller
| @Author: Miklos Herald
| @Date: 02/11/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends My_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('accountlogin');
		$this->load->library('accountinfo');
	}
	public function index(){
		$this->tmpl = array(
			'common/header',
			'account/login',
			'common/footer',
		);
		$this->data['title'] = 'Login';
		$this->data['userinfo'] = array(
			'accountName' => 'SHkoreaplayer',
			'accoundId' => '1',
		);
		
		$accountinfo = new Accountinfo;
		$accountinfo->accountId = 1;
		//$RES = $accountinfo->send_request();
		
		
		//$this->accountinfo->accountid = 822;
		//$RES = $this->accountinfo->send_request();
		//$this->accountlogin->accountname = 'operator';
		//$this->accountlogin->password = 'password';
		//$this->accountlogin->instantiate(array('accountname' => 'operator', 'password' => 'x'));
		//$this->accountlogin->password = 'password';
		
		//$RES = $this->accountlogin->send_request();
		//print_r($RES);
		$this->render();
	}
}


/*--------------  end of file ---------------*/