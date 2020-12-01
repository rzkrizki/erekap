<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	//constructor
	public function __construct(){
		
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Dashboard_model');
        
        // $this->load->library('datatables');

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
	
}
