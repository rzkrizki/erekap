<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{

	function contruct()
	{
		parent::__construct();
    }
    
    public function get_dynamic_data($url, $token){

        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url, // end here jne
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: ".$token.""
            ),
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($result);
        
           return $response;

        }

    }

    public function post_dynamic_data($data, $url, $token){

        $ch = curl_init();

        $postData = json_encode($data);

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url, // end here jne
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 3600,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: ".$token.""
            ),
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($result);
        
           return $response;

        }
    }
	
}
