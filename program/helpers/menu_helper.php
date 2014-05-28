<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
if ( ! function_exists('translate_node')){
	function translate_node($node_name){
		$translation = lang('sub_menu_'.strtolower(str_replace(array(' ', '/'), '',$node_name)));
		$string = '';
		if(!$translation)
			$string = $node_name;
		else
			$string = $translation;
		return $string;
	}
	
}

if ( ! function_exists('translate_module')){
	function translate_module($module_name){
		$translation = strtoupper( lang('menu_'.strtolower(str_replace(array(' ', '/'), '',$module_name))) );
		$string = '';
		if(!$translation)
			$string = $module_name;
		else
			$string = $translation;
		return $string;
	}
}

if ( ! function_exists('translate_statusdesc')){

	function translate_statusdesc($status){
		$translation = lang('status_'.strtolower(str_replace(array(' ', '/'), '',$status)));
		$string = '';
		if(!$translation)
			$string = $status;
		else
			$string = $translation;
		return $string;
	}
}

if ( ! function_exists('translate_flash_message')){

	function translate_flash_message($message){
		if( preg_match("/success/i", $message) ){
			return lang('success_success');
		}
		elseif( preg_match("/duplicate entry/i", $message) ){
			return lang('error_duplicateentry');
		}
		elseif( preg_match("/already used/i", $message) ){
			return lang('error_emailused');
		}
		elseif( preg_match("/invalid email/i", $message) ){
			return lang('error_invalidemail');
		}
		else{
			return $message;
		}
	}
}











/* End of file menu_helper.php */
/* Location: ./application/helpers/menu_helper.php */
