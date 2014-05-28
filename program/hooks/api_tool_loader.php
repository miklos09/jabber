<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Simple autoload the api tool
| @Author: Miklos Herald
| @Date: 08/06/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiToolLoader{

    public function __construct() {
		require_once('../../api_tools/curl_apit.php');
		require_once('../../api_tools/functions_apit.php');
    }
}
/*----------- end of file -------------*/