<?php
	class Requests{
		
		
		
		public function get($url, $data){
			$req = curl_init($url);
			/*
			 * Using the cURL extension to send it off,  first creating a custom header block
			 */
			$headers = array(
				'Content-Type: text/xml',
				'Content-Length: '.strlen($data),
				'\r\n',
			);

			/*
			 * Setting options for a secure SSL based xmlrpc server
			 */
			 
			curl_setopt($req, CURLOPT_URL, $url);
			curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($req, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($req, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($req, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($req, CURLOPT_HTTPHEADER, $headers );
			curl_setopt($req, CURLOPT_POSTFIELDS, $data );

			$response = curl_exec($req);
			curl_close($req);
			
			return $response;
		}
	}
?>