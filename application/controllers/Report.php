<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $this->load->view('report', $data,true);
       	$this->load->view('template2/header', $data,true);
    }


    function index(){
        
		
		$user = $this->session->userdata('teknopol');
		$id_provinsi = $this->db->where('id', $user['kab_id'])->get('m_regencies')->row('province_id');
		
		$data['provinsi']	= $this->db->where('id', $id_provinsi)->get('m_provinces')->result();	
		
        $data['flashdata'] = 0;

    	$this->load->view('template2/header');	
    	$this->load->view('report', $data);	
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
		$id_kecamatan = $post['id_kecamatan'];
		$id_kelurahan = $post['id_kelurahan'];
		$flag = $post['flag'];
        

        $url = "https://api.digipol.id/api/get_lapor_paslon?token=".$token_id."&id_kecamatan=".$id_kecamatan."&id_kelurahan=".$id_kelurahan."&flag=".$flag."";
        $token = "f91b12d9-d5d6-40aa-8d66-d04e70a6c08b";

        $response = $this->api->get_dynamic_data($url, $token);
        
        if($response->error == "false"){
            
            $data['status'] = 'success';
			$data['result'] = $response->data;
        }else{
            $data['status'] = 'error';
            $data['message'] = $response->message;
        }
        echo json_encode($data);
	}

	public function detail_pelanggaran()
	{
		$post = $this->input->post();
		
		$token_id = 'bf1cdad49abdbb8ed400c1de3d776f2c';
		$id_pelanggaran = $post['id_pelanggaran'];
        

        $url = "https://api.digipol.id/api/get_pelanggaran_by_id?token=".$token_id."&id_pelanggaran=".$id_pelanggaran."";
        $token = "600124f6-bf8d-4d22-8a73-95d17dfbafbd";

        $response = $this->api->get_dynamic_data($url, $token);
        

        if($response->error == "false"){
            
            $data['status'] = 'success';
			$data['result'] = $response->data;
        }else{
            $data['status'] = 'error';
            $data['message'] = $response->message;
        }
        echo json_encode($data);
	}
	
}
