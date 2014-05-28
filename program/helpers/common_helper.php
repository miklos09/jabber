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
if ( ! function_exists('remove_spaces')){
	function remove_spaces($text){
	  return preg_replace("/\s+/", " ", $text);
	}
}
if ( ! function_exists('get_all_player_id')){
	function get_all_player_id($arr){
		
		$allplayeridx = null;

		// extract the result of the array $arrxnew and put it to a variable
		foreach($arr as $rwx){
				$allplayeridx .= $rwx . ",";
		}
			
		// start cleaning the format needed for the variable	
		$allplayeridx .= ")";
		
		$allplayeridx = str_replace(",)","",$allplayeridx);

		return $allplayeridx;
	}
}


if ( ! function_exists('ams_decode')){
	function ams_decode($value){
		$final_value = 0;
		
		$final_value = (int)str_replace("amscentral", "", base64_decode($value));

		return $final_value;
	}
}

if ( ! function_exists('visitor_country')){
	
	function visitor_country(){
		$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
		if($xml)
			return $xml;
		else 
			return FALSE;
	}
	
	function getRealIpAddr(){
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		//return $ip;
		return '116.255.241.111';
	}
}


if ( ! function_exists('get_monday_sunday')){
	function get_monday_sunday(){
		$data = array();

		if(strtolower(date('l')) == 'monday'){
			$monday = date('Y-m-d');
		}else{
			$d = (strtotime("last Monday"));
			$monday = date('Y-m-d', $d);
		}

		if(strtolower(date('l')) == 'sunday'){
			$sunday = date('Y-m-d');
		}else{
			$d = (strtotime("next Sunday"));
			$sunday = date('Y-m-d', $d);
		}

		$data['monday'] = $monday;
		$data['sunday'] = $sunday;

		return $data;
	}
}

if ( ! function_exists('get_monday')){
	function get_monday(){

		$data = array();

		$report = load_config_data('report');
		$cutoff_date = $report->config->config['cutoff_date'];

		if(strtolower(date('l')) == $cutoff_date){
			$monday = date('Y-m-d', strtotime('-7 days'));

			$sunday = date('Y-m-d', strtotime('-1 days'));


			$data['monday'] = $monday;
			$data['sunday'] = $sunday;
		}


		return $data;
	}
}


if ( !function_exists('load_config_data')) {
	function load_config_data($name){
		$data = get_instance(); // CI_Loader instance
		$data->load->config($name);

		return $data;
	}	
}


if ( ! function_exists('get_weekly_final_data')){
	function get_weekly_final_data($xml){

		$final_data = array();

		$report = load_config_data('report');
		$qualified_percentage 	=  (float)$report->config->config['qualified_percentage'];
		$fee_percentage 		=  (float)$report->config->config['fee_percentage'];

		foreach ($xml as $key => $value) {
			if( array_key_exists((int)$value->attributes()->accountId, $final_data) ){
				$final_data[(int)$value->attributes()->accountId]['turnOver'] = $final_data[(int)$value->attributes()->accountId]['turnOver'] + (float)$value->attributes()->turnOver;
				$final_data[(int)$value->attributes()->accountId]['bets'] = $final_data[(int)$value->attributes()->accountId]['bets'] + (float)$value->attributes()->bets;
				$final_data[(int)$value->attributes()->accountId]['total_bets'] = $final_data[(int)$value->attributes()->accountId]['total_bets'] + (float)$value->attributes()->turnOver + (float)$value->attributes()->bets;
				$final_data[(int)$value->attributes()->accountId]['wins'] = $final_data[(int)$value->attributes()->accountId]['wins'] + (float)$value->attributes()->wins;
				$final_data[(int)$value->attributes()->accountId]['rake'] = $final_data[(int)$value->attributes()->accountId]['rake'] + (float)$value->attributes()->rake;
				$final_data[(int)$value->attributes()->accountId]['fees'] = $final_data[(int)$value->attributes()->accountId]['fees'] + (float)$value->attributes()->fees;
				$final_data[(int)$value->attributes()->accountId]['netRevenue'] = $final_data[(int)$value->attributes()->accountId]['netRevenue'] + (float)$value->attributes()->netRevenue;
				$final_data[(int)$value->attributes()->accountId]['grossRevenue'] = $final_data[(int)$value->attributes()->accountId]['grossRevenue'] + (float)$value->attributes()->grossRevenue;
				$final_data[(int)$value->attributes()->accountId]['b0nus'] = $final_data[(int)$value->attributes()->accountId]['b0nus'] + (float)$value->attributes()->b0nus;
				$final_data[(int)$value->attributes()->accountId]['adjustments'] = $final_data[(int)$value->attributes()->accountId]['adjustments'] + (float)$value->attributes()->adjustment;

				$final_data[(int)$value->attributes()->accountId]['deposits'] = $final_data[(int)$value->attributes()->accountId]['deposits'] + (float)$value->attributes()->deposit;
				$final_data[(int)$value->attributes()->accountId]['withdrawals'] = $final_data[(int)$value->attributes()->accountId]['withdrawals'] + (float)$value->attributes()->withdrawal;
				//$final_data[(int)$value->attributes()->accountId]['activityDate'][] = (string)$value->attributes()->activityDate;
			}else{
				$final_data[(int)$value->attributes()->accountId]['accountId'] = (int)$value->attributes()->accountId;
				//$final_data[(int)$value->attributes()->accountId]['parentId'] = (int)$value->attributes()->parentId;
				//$final_data[(int)$value->attributes()->accountId]['ancestorId'] = (int)$value->attributes()->ancestorId;

				$final_data[(int)$value->attributes()->accountId]['turnOver'] = (float)$value->attributes()->turnOver;
				$final_data[(int)$value->attributes()->accountId]['bets'] = (float)$value->attributes()->bets;
				$final_data[(int)$value->attributes()->accountId]['total_bets'] = (float)$value->attributes()->turnOver + (float)$value->attributes()->bets;
				$final_data[(int)$value->attributes()->accountId]['wins'] = (float)$value->attributes()->wins;
				$final_data[(int)$value->attributes()->accountId]['rake'] = (float)$value->attributes()->rake;
				$final_data[(int)$value->attributes()->accountId]['fees'] = (float)$value->attributes()->fees;
				$final_data[(int)$value->attributes()->accountId]['netRevenue'] = (float)$value->attributes()->netRevenue;
				$final_data[(int)$value->attributes()->accountId]['grossRevenue'] = (float)$value->attributes()->grossRevenue;
				$final_data[(int)$value->attributes()->accountId]['b0nus'] = (float)$value->attributes()->b0nus;
				$final_data[(int)$value->attributes()->accountId]['adjustments'] = (float)$value->attributes()->adjustment;

				$final_data[(int)$value->attributes()->accountId]['deposits'] = (float)$value->attributes()->deposit;
				$final_data[(int)$value->attributes()->accountId]['withdrawals'] = (float)$value->attributes()->withdrawal;
				$final_data[(int)$value->attributes()->accountId]['operatorCode'] = (int)$value->attributes()->operatorCode;
				//$final_data[(int)$value->attributes()->accountId]['activityDate'][] = (string)$value->attributes()->activityDate;
			}
		}
	
		foreach ($final_data as $key => $value) {
			if($value['deposits'] * $qualified_percentage <= $value['total_bets']){
				$final_data[$key]['quilified'] = 'YES';
			}else{
				$final_data[$key]['quilified'] = 'NO';
			}
			$w = $value['withdrawals'] * $fee_percentage;
			$d = $value['deposits'] * $fee_percentage;
			$final_data[$key]['paymentFee'] = (float)$w + (float)$d;

			$final_data[$key]['paymentStatus'] = 'UNPAID';
		}

		return $final_data;
	}
}


if ( ! function_exists('get_running_final_data')){
	function get_running_final_data($array, $xml){

		$final_data = array();
		foreach ($xml as $key => $value) {
			$final_data[(int)$value->attributes()->accountId]['accountId'] = (int)$value->attributes()->accountId;
			$final_data[(int)$value->attributes()->accountId]['runningturnOver'] = (float)$array[(int)$value->attributes()->accountId]['turnOver'] + (float)$value->attributes()->running_turnOver;
			$final_data[(int)$value->attributes()->accountId]['runningbets'] = (float)$array[(int)$value->attributes()->accountId]['bets'] + (float)$value->attributes()->running_bets;
			$final_data[(int)$value->attributes()->accountId]['runningdeposits'] = (float)$array[(int)$value->attributes()->accountId]['deposits'] + (float)$value->attributes()->turnOver + (float)$value->attributes()->running_deposits;
			$final_data[(int)$value->attributes()->accountId]['runningwithdrawals'] = (float)$array[(int)$value->attributes()->accountId]['withdrawals'] + (float)$value->attributes()->running_withdrawals;
		}

		return $final_data;
	}
}


if ( ! function_exists('get_current_week')){
	function get_current_week($all_data=false){

		$date_arr = get_monday(); 

		if( empty($date_arr) ){
			$date_arr = get_monday_sunday();
		}

		$cut_label_final = '';
		$arr = array();

    	$data = get_instance();
		$data->load->library('api');

		$report = load_config_data('report');
		$cutoff_label_tag 	=  $report->config->config['cutoff_label_tag'];

		$week = $data->api->AmscProcessRequest('GETLASTCUTOFF', $arr);	
		$week = $week->RECONLIST->RECONLISTDATA;

		if(empty($week)){
			$cutOffLabel = $cutoff_label_tag." 1";
			$cutOffStart = $date_arr['monday'];
			$cutOffEnd = $date_arr['sunday'];
		}else{
			$cutOffLabel = (string)$week->attributes()->cutOffLabel;
			$cutOffStart = (string)$week->attributes()->cutOffStart;
			$cutOffEnd = (string)$week->attributes()->cutOffEnd;
		}

		if(($cutOffStart == $date_arr['monday']) && ($cutOffEnd == $date_arr['sunday'])){
			if(!empty($all_data)){
				$cut_arr = explode(' ', $cutOffLabel);
				$cut_label_final['cutoff_num'] = $cut_arr[1];
				$cut_label_final['cutoff_lbl'] = $cutOffLabel;
				$cut_label_final['cutoff_str'] = $cutOffStart;
				$cut_label_final['cutoff_end'] = $cutOffEnd;
			}else{
				$cut_label_final = $cutOffLabel;
			}
		}else{
			$cut_arr = explode(' ', $cutOffLabel);
			$cut_arr[1] = $cut_arr[1] + 1;
			if(!empty($all_data)){
				$cut_label_final['cutoff_num'] = $cut_arr[1];
				$cut_label_final['cutoff_lbl'] = implode(' ', $cut_arr);
				$cut_label_final['cutoff_str'] = $cutOffStart;
				$cut_label_final['cutoff_end'] = $cutOffEnd;
			}else{
				$cut_label_final = implode(' ', $cut_arr);
			}
		}

		return $cut_label_final;
	}
}



/*=========================================================================================
|           Function to get the parent
|==========================================================================================*/
if ( ! function_exists('get_myfieldtest')){
	function get_myfieldtest($field = null, $arr){
	    foreach($arr as $newfield){
	        if($field == (int)$newfield['accountId']){
	            return array($newfield['accountId'],$newfield['accountName'],$newfield['parentId'],$newfield['percentage']);
	        }else{ 
	            //do nothing
	        }
	    }
	}
}


/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */
