<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	//constructor
	public function __construct(){
		
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Dashboard_model');
        $this->load->model('api_model', 'api');
        
        $data = $this->session->userdata('teknopol');
        if(!$data){
          redirect('');
        }
        $this->load->view('rekap', $data,true);
       	$this->load->view('template2/header', $data,true);
    }


    function index(){
        
		$user = $this->session->userdata('teknopol');
		
		$id_provinsi = $this->db->where('id', $user['kab_id'])->get('m_regencies')->row('province_id');
		
		$data['provinsi']	= $this->db->where('id', $id_provinsi)->get('m_provinces')->result();
		$data['id_kabupaten'] = $user['kab_id'];
        $data['flashdata'] = 0;

    	$this->load->view('template2/header');	
    	$this->load->view('rekap', $data);	
    	$this->load->view('template2/footer');	
    }   
	
	
	function get_tree_kabupaten($id){
		$data = $this->Dashboard_model->get_tree('kabupaten', $id);
		echo json_encode($data);
	}

	function get_tree_kecamatan($id){
		$data = $this->Dashboard_model->get_tree('kecamatan', $id);
		echo json_encode($data);
	}

	function get_tree_kelurahan($id){
		$data = $this->Dashboard_model->get_tree('kelurahan', $id);
		echo json_encode($data);
	}
    
    function filter_data(){

		$post = $this->input->post();
		
		$token_id = 'bf1cdad49abdbb8ed400c1de3d776f2c';
		$id_kabupaten = $post['id_kabupaten'];
        $id_kecamatan = $post['id_kecamatan'];
		$id_kelurahan = $post['id_kelurahan'];
		

        $url = "https://api.digipol.id/api/get_erekap_paslon?token=".$token_id."&id_kecamatan=".$id_kecamatan."&id_kelurahan=".$id_kelurahan."&id_kabupaten=".$id_kabupaten."";
        $token = "f91b12d9-d5d6-40aa-8d66-d04e70a6c08b";

        $response = $this->api->get_dynamic_data($url, $token);
        //print_r($response);
        if($response->error == "false"){
            
            $data['status'] = 'success';
			$data['result'] = $response->data;
            $data['summary'] = $response->summary;
        }else{
            $data['status'] = 'error';
            $data['message'] = $response->message;
        }
        echo json_encode($data);
	}
	
}
