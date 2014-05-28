<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
	$hook['post_controller_constructor'] = array(
		'class' => 'LanguageLoader',
		'function' => 'initialize',
		'filename' => 'language_loader.php',
		'filepath' => 'hooks'
	);
	
	// Defined variables for AMSC api config
	$hook['pre_system'] = array(
		'class' => '',
		'function' => 'init',
		'filename' => 'config_apit.php',
		'filepath' => '../api_tools/'
	);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */