<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
if ( ! function_exists('compute_utf_offset')){
	function compute_timezone_offset($date_time, $utf_offset){
		if(isset($utf_offset)){
			$operator = (string)mb_substr($utf_offset, 0, 1);
			$hour_min = (string)mb_substr($utf_offset, 1);
			$temp = explode(':', $hour_min);
			$hours = $temp[0];
			$minutes = $temp[1];

			if($operator != '+')
				$op = '-';
			else
				$op = '+';

			$new_datetime = date('Y-m-d H:i:s', strtotime("{$op}{$hours} hours {$minutes} minutes ", strtotime($date_time)));
			return $new_datetime; # Will output '2010-02-16 15:30:00'
		}
	}
}


/* End of file timezone_helper.php */
/* Location: ./application/helpers/timezone_helper.php */
