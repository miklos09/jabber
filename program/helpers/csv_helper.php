<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('array_to_csv_file'))
{
    function array_to_csv_file($array, $download = ""){
		$fp = fopen($download, 'w');
		foreach($array as $fields) {
			fputcsv($fp, $fields);
		}
		fclose($fp);
    }
}

if ( ! function_exists('download_trigger'))
{
    function download_trigger($download = "", $filename){
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".$filename.".csv\"");
		header('Content-type: text/html; charset=shift-js');
		readfile($download);
    }
}

if ( ! function_exists('query_to_csv'))
{
    function query_to_csv($query, $headers = TRUE, $download = "")
    {
        if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
        {
            show_error('invalid query');
        }
        
        $array = array();
        
        if ($headers)
        {
            $line = array();
            foreach ($query->list_fields() as $name)
            {
                $line[] = $name;
            }
            $array[] = $line;
        }
        
        foreach ($query->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        echo array_to_csv($array, $download);
    }
}

/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */