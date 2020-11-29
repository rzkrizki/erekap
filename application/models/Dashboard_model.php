<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//model for admin user
class Dashboard_model extends CI_Model {
	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // $this->load->model('Auth_model');
        // $this->load->model('Survei_model');
        // $this->load->library('datatables');

        // $data = $this->session->userdata('teknopol');
        // if(!$data){
        //   redirect('');
        // }
       	// $this->load->view('template/menu', $data,true);
    }
	function get_table($tipe){
		if($tipe == 'provinsi'){
			$table = 'm_provinces';
		
		} else if($tipe == 'kabupaten'){
			$table = 'm_regencies';
		
		} else if($tipe == 'kecamatan'){
			$table = 'm_districts';
		
		} else if($tipe == 'kelurahan'){
			$table = 'm_villages';
		
		} else {
			$table = 'Sasdasd';
		}

		return $table;
	}

	function thousandsCurrencyFormat($num) {
      $x 				= round($num);
      $x_number_format 	= number_format($x);
      $x_array 			= explode(',', $x_number_format);
      $x_parts 			= array('K', 'M', 'B', 'T');
      $x_count_parts 	= count($x_array) - 1;
      $x_display 		= $x;
      $x_display 		= $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
      $x_display .= $x_parts[$x_count_parts - 1];
      return $x_display;
    }

	function get_parent_table($tipe){
		if($tipe == 'provinsi'){
			$table = '';
		}else if($tipe == 'kabupaten'){
			$table = 'province_id';
		}else if($tipe == 'kecamatan'){
			$table = 'regency_id';
		}else if($tipe == 'kelurahan'){
			$table = 'district_id';
		}else{
			$table = 'Sasdasd';
		}
		return $table;
	}

	function get_data_dashboard(){
		$data['provinsi'] = $this->db->get('m_provinces')->result();
		return $data;
	}

	function detail_area($data){
		extract($data,EXTR_OVERWRITE);
		$table= $this->get_table($tipe);
		
		// $data = $this->db->query("SELECT * from $table where id=$id")->row();
		$data = $this->db->get_where($table, array('id' => $id))->row();
		return $data;
	}

	function get_tree($tipe, $id){
		$table 			= $this->get_table($tipe);
		$parent_table 	= $this->get_parent_table($tipe);
		$user = $this->session->userdata('teknopol');
		if($tipe == 'kabupaten'){
			$result 		= $this->db->order_by('name', 'ASC')->get_where($table, array($parent_table => $id, 'id' => $user['kab_id']))->result();
		}else if($tipe == 'kecamatan'){
			$result 		= $this->db->order_by('name', 'ASC')->get_where($table, array($parent_table => $user['kab_id']))->result();
		}else{
			$result 		= $this->db->order_by('name', 'ASC')->get_where($table, array($parent_table => $id))->result();
		}
		$data 			= array();
		$i=0;
		
		foreach ($result as $key => $value) {
			$data[$i]['title'] 	= $value->name;
			$data[$i]['nama'] 	= $value->name;
			$data[$i]['lazy'] 	= TRUE;
			$data[$i]['id'] 	= $value->id;
			$data[$i]['tipe'] 	= $tipe;
			$data[$i]['logo'] 	= $value->logo;
			$i++;
		}

		return $data;
	}

	function get_tree_dapil($tipe, $id){

		if ($tipe=='dapil') {
			$logo = $this->db->get_where('m_provinces', array('id' => $id))->row('logo');

			$result = $this->db->query("SELECT a.id_dapil, a.nama_dapil, b.`id_provinces` FROM m_dapil a 
				INNER JOIN dapil_has_area b ON a.id_dapil=b.id_dapil 
				where a.periode='2019' and a.type='1' and b.id_provinces=".$id."  
				GROUP BY a.id_dapil")->result();

			$i=0;
			foreach ($result as $key => $value) {
				$data[$i]['title'] = "$value->nama_dapil";
				$data[$i]['nama'] = "$value->nama_dapil";
				$data[$i]['lazy'] = TRUE;
				$data[$i]['id'] = "$value->id_dapil";
				$data[$i]['tipe'] = $tipe;
				$data[$i]['logo'] = $logo;
				$i++;
			}
			
		} else if ($tipe == 'kabupaten') {
			$result = $this->db->query("SELECT a.`id_regency`, b.name, b.id, b.logo FROM dapil_has_area a 
				INNER JOIN m_regencies b ON a.`id_regency` = b.id WHERE a.id_dapil=".$id." 
				GROUP BY a.id_regency")->result();

			$i=0;
			foreach ($result as $key => $value) {
				$data[$i]['title'] = "$value->name";
				$data[$i]['nama'] = "$value->name";
				$data[$i]['lazy'] = TRUE;
				$data[$i]['id'] = "$value->id";
				$data[$i]['tipe'] = $tipe;
				$data[$i]['logo'] = "$value->logo";
				$i++;
			}
		}

		return $data;
	}

	
}