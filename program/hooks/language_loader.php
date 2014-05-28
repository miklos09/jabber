<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - LanguageLoader Controller (Switch language)
| @Author: Miklos Herald
| @Date: 08/06/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LanguageLoader{

    function initialize() {
        $CI =& get_instance();
		$lang = $CI->config->item('language');
		### set language depends on user country
		//$CI->lang->load('menu', $lang);
	}
	
}
/*----------- end of file -------------*/