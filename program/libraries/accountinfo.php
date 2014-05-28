<?php 
/*
|--------------------------------------------------------------------------
| AMSCentral 2.0 - API Library
| @Author: Miklos Herald
| @Date: 02/11/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountinfo extends Curl{
	
	protected static $method ="ACCOUNTINFO";
	public $accountId;
	public $response_xml;

	public function send_request(){
		$RES = $this->curl_dgt(AMSC_DGT_SERVER, self::$method, $this->xml_request());
		$this->response_xml = $RES;
		return simplexml_load_string($RES);
	}
	public function instantiate($record = array()){
		$object = new self;
		$object_vars = get_object_vars($object);

		foreach($record as $attribute => $value){		
			if(array_key_exists($attribute, $object_vars) ){
				$this->$attribute = $value;
			}
		}
	}
	public function xml_request(){
		$xml_request = '<Parameters>
							<API_username>'.AMSC_API_USERNAME.'</API_username>
							<API_password>'.AMSC_API_PASSWORD.'</API_password>
							<API_key>'.AMSC_API_KEY.'</API_key>
							<accountId>'.$this->accountId.'</accountId>
						</Parameters>';
		return $xml_request;
	}
}

/* End of file accountlogin.php */
/* Location: .amsc/libraries/accountlogin.php */