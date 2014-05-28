<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timezone{
	
	public $timezone_csv = "public/files/timezone.csv";
	
	public function __construct(){
		$timezone_csv = $this->timezone_csv;
		if(!is_file($timezone_csv)){
			echo $timezone_csv.' does not exists';
			exit();
		}
	}
	public function timezones(){
		### get timezones
		$file = fopen($this->timezone_csv,"r");
		$timezones = array();
		while(! feof($file)) {
			$temp = (array)fgetcsv($file);
			foreach($temp as $key => $val){
				$index = (string)$key+1;
				$tdata[$index] = $val;
			}
			$timezones[] = $tdata;
			$timezones_iso2[] = $tdata[2];
		}
		fclose($file);
		return $timezones;
	}
	public function search_utc_offset($timezone_iso2 = ''){
		### get timezone based from user country
		$timezones = $this->timezones();
		foreach($timezones as $time){
			$butt = $time[2];
			$utc_offset = $time[4];
			if($butt == $timezone_iso2)
				return $utc_offset;
		}
		return false;
	}
	public function search_timezone($timezone_iso2 = ''){
		### get timezone based from user country
		$timezones = $this->timezones();
		foreach($timezones as $timezone){
			$butt = $timezone[2];
			$utc_offset = $timezone[4];
			if($butt == $timezone_iso2)
				return $timezone;
		}
		return false;
	}
}

/* End of file timezone.php */
/* Location: ./application/libraries/timezone.php */