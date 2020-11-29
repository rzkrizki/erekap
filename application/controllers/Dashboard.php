<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//constructor
	public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Legislator_model');
        $this->load->model('Survei_model');
        $this->load->model('Simulasi_model');
        $this->load->library('datatables');
        // $this->load->library('datatables');

        $data = $this->session->userdata('teknopol');
        if(!$data){
          redirect('');
        }
       	$this->load->view('new/header', $data,true);
    }


    function index(){
		$data = $this->Dashboard_model->get_data_dashboard();

		$sess_data['username']		= 'pow3rsubuh';
		$sess_data['role']			= 'admin';
		$sess_data['role_detail']	= 'All';
		$sess_data['is_active']		= '1';
		$sess_data['profile_pic']	= 'avatar1.jpg';
		$sess_data['userlevel']		= 'Administrator';
		
		$this->session->set_userdata('teknopol', $sess_data);
		$user = $this->session->userdata('teknopol');
		// var_dump($user);
		// die;
		$data['jum_tangible'] 	= $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted = '0' and type='tangible'")->row('jml');
		$data['jum_intangible'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted = '0' and type='intangible'")->row('jml'); 

		$data['jum_dpt'] 		= $this->db->query("SELECT COUNT(*) as jml FROM dpt_sumatera_selatan")->row('jml');
		$data['jum_influencer'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted = '0'")->row('jml');  
		
		if($user['role'] == 'provinsi'){
			$data['kabupaten'] 	= $this->db->from('m_regencies')->where(array('province_id' => $user['role_detail']))->get()->result();
			$data['provinsi'] 	= $this->db->from('m_provinces')->where(array('id' => $user['role_detail']))->get()->row();
		
		} else if($user['role'] == 'kabupaten'){
			$data['kabupaten'] 	= $this->db->from('m_regencies')->where(array('id' => $user['role_detail']))->order_by('name asc')->get()->result();
			$data['kabupatenx']	= $this->db->from('m_regencies')->where(array('id' => $user['role_detail']))->order_by('name asc')->get()->row();

		} else {
			$data['provinsi']	= $this->db->get('m_provinces')->result();	
		}
		 	
		if($this->session->flashdata('item')){
			$data['flashdata'] = $this->session->flashdata('item');
		
		} else {
			$data['flashdata'] = 0;
		}

    	$this->load->view('new/header');	
    	$this->load->view('new/dashboard', $data);	
    	$this->load->view('new/footer');	
    }   
	
	function load_tab(){
		$user = $this->session->userdata('teknopol');
		if(!$user){
			echo 'N';

		} else {
			$tab_name 	= $this->input->post('tab_name');
			$id 		= $this->input->post('id');
			$nama 		= $this->input->post('nama');
			$tipe 		= $this->input->post('tipe');
			$logo 		= $this->input->post('logo');
			
			if($tab_name == 'tab_profile'){
				$data = $this->Dashboard_model->get_data_tab_profile($id, $nama, $tipe, $logo);
			
			} else if($tab_name == 'tab_survei'){
				$data = $this->Survei_model->get_data($id, $nama, $tipe, $logo);
			
			} else if($tab_name == "tab_ketokohan"){
				$modal_name="modal_ketokohan";
				$data = $this->Dashboard_model->get_modalprofile($modal_name, $id, $nama, $tipe);
			
			} else if($tab_name == "tab_simulasi"){
				// $data = $this->Dashboard_model->get_data_tab_simulasi($id, $nama, $tipe);
				$data = $this->Simulasi_model->get_data($id, $nama, $tipe);
			
			} else if($tab_name =="tab_legislator"){
				$data = $this->Legislator_model->get_data($id, $nama, $tipe);
			}
					
			// $data['id'] = $this->input->post('id');
			// $data['nama'] = $this->input->post('nama');
			// $data['tipe'] = $this->input->post('tipe');
			// $data['logo'] = $this->input->post('logo');
			// $data['tab_name'] = $tab_name;
			$response = $this->load->view('new/'.$tab_name, $data);
			
			return $response;	
		}
		
		// echo json_encode($data);
	}
	
	function load_modal_profile(){ 
		$modal_name = $this->input->post('modal_name');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$user = $this->session->userdata('teknopol');
		if($user['role'] == 'provinsi'){
			if($this->Auth_model->role_restriction($id, $tipe)){
				$data = $this->Dashboard_model->get_modalprofile($modal_name, $id, $nama, $tipe);
				// var_dump($data);  
				$response = $this->load->view('new/'.$modal_name, $data);
				return $response;
			}else{
				$this->load->view('new/no_data');
			}
		}else{
			$data = $this->Dashboard_model->get_modalprofile($modal_name, $id, $nama, $tipe);
			// var_dump($data);  
			$response = $this->load->view('new/'.$modal_name, $data);
			return $response;
		}
		
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

	function get_information(){
		$tab_active = $this->input->post('tab_active');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$logo = $this->input->post('logo');
		if($tab_active == 'tab_profile'){
			$data = $this->Dashboard_model->get_data_tab_profile($id, $nama, $tipe, $logo);
		}else if($tab_active == 'tab_survei'){
			$data = $this->Survei_model->get_data($id, $nama, $tipe, $logo);
		};
		echo json_encode($data);
	}
	
	function about(){
		$this->load->view('new/header');
		$this->load->view('new/about');
		$this->load->view('new/footer');
	}

	function random_color_part() {
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
	    return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

	function get_pertokohan($type){
		$data = $this->db->get_where('m_pertokohan', array('type' => $type))->result();
		$string = '<option value="ALL">ALL</option>';
		$string .= '<option value="SEMUA">Kecondongan Politik Nasional</option>';
		foreach ($data as $key => $value) {
			$string .= '<option value="'.$value->id_pertokohan.'">'.$value->nama.'</option>';
		}
		echo $string;
	}

	function get_chart(){
		$id_pertokohan = $this->input->post('id_influencer');
		$type = $this->input->post('tipe_influencer');
		$id_wilayah = $this->input->post('id_wilayah');
		$tipe_wilayah = $this->input->post('tipe_wilayah');
		$where = '';
		if($id_wilayah != 0){
			if($tipe_wilayah == 'provinsi'){
				$where = "and id_provinces=$id_wilayah";
			}else if($tipe_wilayah == 'kabupaten'){
				$where = "and id_city=$id_wilayah";
			}else if($tipe_wilayah == 'kecamatan'){
				$where = "and id_districts=$id_wilayah";
			}else if($tipe_wilayah == 'kelurahan'){
				$where = "and id_village=$id_wilayah";
			}	
		}
		
		if($type == 1){
			$type = 'tangible';
		}else{
			$type = 'intangible';
		}
		$data['jum_netral']=0;
		$data['jum_pilih']=0;
		$chart[0]['name'] = '';
		$chart[0]['points'] = '';
		$chart[0]['color'] = '';
		$chart[0]['bullet'] = '';
		if($id_pertokohan == 'ALL'){
			$result = $this->db->query("SELECT b.alias,b.color,b.picture, a.inclination, count(*) as jml from intangible a inner join m_parpol b on a.inclination=b.id_parpol  where a.is_deleted='0' and a.inclination <> 0 and a.type='$type' $where group by inclination order by jml desc limit 10")->result();
			
			$data['jum_netral'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination=0 and type='$type' $where")->row('jml');
			$data['jum_pilih'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination!=0 and type='$type' $where")->row('jml');
		}else{
			$result = $this->db->query("SELECT b.alias,b.color,b.picture, a.inclination, count(*) as jml from intangible a inner join m_parpol b on a.inclination=b.id_parpol  where id_pertokohan =$id_pertokohan and a.is_deleted='0' and a.inclination <> 0 and a.type='$type' $where group by inclination order by jml desc limit 10")->result();
			$data['jum_netral'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination=0 and id_pertokohan =$id_pertokohan and type='$type' $where")->row('jml');
			$data['jum_pilih'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination!=0 and id_pertokohan =$id_pertokohan and type='$type' $where")->row('jml');
		}
		
		$i=0;
		$total = 0;
		foreach ($result as $key => $value) {
			$total += $value->jml;
		}
		$total_semua = $data['jum_netral']+$data['jum_pilih'];
		foreach ($result as $key => $value) {
			$chart[$i]['name'] = $value->alias;
			$chart[$i]['points'] = (float)round(($value->jml/$total)*100,2);
			$chart[$i]['color'] = $value->color;
			$chart[$i]['bullet'] = site_url('img/logo_parpol/').$value->picture;
			$i++;
		}
		// if($total_semua > 0){
		// 	$data['jum_netral'] = round(($data['jum_netral']/$total_semua)*100,2);
		// 	$data['jum_pilih'] = round(($data['jum_pilih']/$total_semua)*100,2);	
		// }
		
		$data['chart'] = $chart;
		$data['total'] = $total_semua;
		echo json_encode($data);
	}

	function detail_influencer($partai, $ketokohan, $tipe_ketokohan, $tipe_wilayah, $id_wilayah ){
		$partai = urldecode($partai);
		$ketokohan = urldecode($ketokohan);
		$tipe_ketokohan = urldecode($tipe_ketokohan);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		if($tipe_ketokohan == 1){
			$tipe_ketokohan = 'tangible';
		}else{
			$tipe_ketokohan = 'intangible';
		}

		$where = '';
		if($id_wilayah != 0){
			if($tipe_wilayah == 'provinsi'){
				$where = "and id_provinces=$id_wilayah";
			}else if($tipe_wilayah == 'kabupaten'){
				$where = "and id_city=$id_wilayah";
			}else if($tipe_wilayah == 'kecamatan'){
				$where = "and id_districts=$id_wilayah";
			}else if($tipe_wilayah == 'kelurahan'){
				$where = "and id_village=$id_wilayah";
			}	
		}
		
		$where_partai="";
		if($partai <> "ALL"){
			$where_partai=" and b.alias='$partai' ";
		}

		if($ketokohan != 'ALL'){
			$where .=" and a.id_pertokohan=$ketokohan";
		}

		$data['data'] = $this->db->query("SELECT a.name, a.phone, g.nama as pertokohan, c.alias as prov, d.name as kab, e.name as kec, f.name as kel, a.informasi_tambahan,b.alias as partai
						from intangible a 
						inner join m_parpol b on a.inclination=b.id_parpol 
						left join m_provinces c on a.id_provinces=c.id 
						left join m_regencies d on a.id_city=d.id
						left join m_districts e on a.id_districts=e.id
						left join m_villages f on a.id_village=f.id 
						left join m_pertokohan g on a.id_pertokohan=g.id_pertokohan 
						where a.type='$tipe_ketokohan' $where_partai and a.is_deleted = '0' $where")->result();
		echo json_encode($data);
	}

	function detail_survey($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);
		if($nama_survey != 'NULL'){
			$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama' => $nama_survey))->row('id'); 
		}
		$tipe_survey_ = 'a.'.$tipe_survey;
		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_pilih b ', $tipe_survey_.' = b.id', 'left');
        
		if($nama_survey <> "ALL"){
			if($nama_survey != 'NULL'){
				$this->datatables->where($tipe_survey, $id_survey);
			}else{
				$this->datatables->where($tipe_survey, 0);
			}
			
        }
		if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}

	function detail_survey_alias($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama_alias' => $nama_survey))->row('id');
		if(!$id_survey){
			$id_survey = 0;
		}
		$tipe_survey_ = 'a.'.$tipe_survey;

		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_pilih b ', $tipe_survey_.' = b.id', 'left');
      
		if($nama_survey <> "ALL"){
			$this->datatables->where($tipe_survey, $id_survey);
        }
		if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}

	function detail_survey_pengeluaran($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);
		
		if($nama_survey <> "ALL"){
			$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama_alias' => $nama_survey))->result(); 
		}else{
			$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey))->result(); 
		}
		if(!$id_survey){
			$id_survey = 0;
		}
		$tipe_survey_ = 'a.'.$tipe_survey;
		// $tipe_survey__ = 'b.'.$tipe_survey;
		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_pilih b ', $tipe_survey_.' = b.id', 'left'); 
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		}
		if($nama_survey <> 'ALL'){
			if($id_survey == 0){
				$this->datatables->where($tipe_survey_, $id_survey);
			}else{
				$i=0;
		        $where = '';
		        $length = count($id_survey);
		        foreach ($id_survey as $key => $value) {
		        	if($length == 1){
		        			$where .= "$tipe_survey=$value->id";	
		        	}else{
		        		if($i == 0){
		        			$where .= "( $tipe_survey=$value->id OR ";	
		        		}
		        		if($length == $i+1){
		        			$where .= "$tipe_survey=$value->id)";
		        		}else{
		        			$where .= "$tipe_survey=$value->id OR ";
		        		}	
		        	}        	
		        $i++;
		        } 
		        $this->datatables->where($where);
			}
		}
		

		echo $this->datatables->generate();
		// echo $length;
	}

	function detail_survey_gubernur($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		$id_paslon = $this->db->get_where('m_paslon', array('kepala_alias' => $nama_survey))->row('id_paslon');

		$tipe_survey_ = 'a.'.$tipe_survey;

		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama_kepala as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_paslon b ', 'a.p7_id = b.id_paslon', 'left');
        if($nama_survey <> "ALL"){
			$this->datatables->where('a.p7_id', $id_paslon);
        }
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}

	function detail_survey_organisasi($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		if($nama_survey == 'Tidak Tahu Tidak Menjawab'){
			$nama_survey = 'Tidak tahu/Tidak Menjawab';
		}

		$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama' => $nama_survey))->row('id'); 
		$tipe_survey_ = 'a.'.$tipe_survey;
		// $tipe_survey__ = 'b.'.$tipe_survey;
		if($nama_survey != 'Lainnya'){
			$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama as informasi");
		}else{
			$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, a.p16Catatan as informasi");
		}
		
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_pilih b ', $tipe_survey_.' = b.id', 'left');
        if($nama_survey <> "ALL"){
			$this->datatables->where($tipe_survey, $id_survey);
        }
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}
	
	function detail_survey_change($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);
		
		$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama' => $nama_survey))->row('id');
		// $tipe_survey__ = 'b.'.$tipe_survey;
		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, b.nama as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->join('m_pilih b ', 'a.p4 = b.id', 'left');
        $this->datatables->where('a.p3', 31);
        $this->datatables->where('a.p4 !=', 48);
		if($nama_survey <> "ALL"){
			$this->datatables->where($tipe_survey, $id_survey);
        }
		if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}

	function detail_survey_sosmed($nama_survey, $tipe_survey, $tipe_wilayah, $nama_wilayah, $id_wilayah){
		$nama_survey = urldecode($nama_survey);
		$tipe_survey = urldecode($tipe_survey);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$nama_wilayah = urldecode($nama_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		$id_survey = $this->db->get_where('m_pilih', array('jenis' => $tipe_survey,'nama' => $nama_survey))->row('id'); 
		$tipe_survey_ = 'a.'.$tipe_survey;
		// $tipe_survey__ = 'b.'.$tipe_survey;
		$this->datatables->select("a.transId as id,a.nama,a.telpRumah,a.hp,a.jabatan,a.alamat,a.provinsi,a.kotaKabupaten,a.kecamatan,a.desaKelurahan, $tipe_survey_ as informasi");
        $this->datatables->from('trans_survey_clean a');
        $this->datatables->where($tipe_survey_.' !=', '');
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('a.id_provinsi', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('a.id_kabupaten', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('a.id_kecamatan', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('a.id_kelurahan', $id_wilayah);
        	}
		} 
		echo $this->datatables->generate();
	}
	
	function detail_influencer_new($partai, $ketokohan, $tipe_ketokohan, $tipe_wilayah, $id_wilayah ){
		$partai = urldecode($partai);
		$ketokohan = urldecode($ketokohan);
		$tipe_ketokohan = urldecode($tipe_ketokohan);
		$tipe_wilayah = urldecode($tipe_wilayah);
		$id_wilayah = urldecode($id_wilayah);

		if($tipe_ketokohan == 1){
			$tipe_ketokohan = 'tangible';
		}else{
			$tipe_ketokohan = 'intangible';
		}

		$where = '';
		if($id_wilayah != 0){
			if($tipe_wilayah == 'provinsi'){
				$where = "and id_provinces=$id_wilayah";
			}else if($tipe_wilayah == 'kabupaten'){
				$where = "and id_city=$id_wilayah";
			}else if($tipe_wilayah == 'kecamatan'){
				$where = "and id_districts=$id_wilayah";
			}else if($tipe_wilayah == 'kelurahan'){
				$where = "and id_village=$id_wilayah";
			}	
		}

		$this->datatables->select("a.id_intangible as id,a.name, a.phone, g.nama as pertokohan, c.alias as prov, d.name as kab, e.name as kec, f.name as kel, a.informasi_tambahan,b.alias as partai");
        $this->datatables->from('intangible a');
        $this->datatables->join('m_parpol b ', 'a.inclination=b.id_parpol', 'inner');
        $this->datatables->join('m_provinces c ', 'a.id_provinces=c.id', 'left');
        $this->datatables->join('m_regencies d ', 'a.id_city=d.id', 'left');
        $this->datatables->join('m_districts e ', 'a.id_districts=e.id', 'left');
        $this->datatables->join('m_villages f ','a.id_village=f.id', 'left');
        $this->datatables->join('m_pertokohan g ', 'a.id_pertokohan=g.id_pertokohan', 'left');
        $this->datatables->where('a.type', $tipe_ketokohan);
        if($partai == 'Netral'){

        }else if($partai == 'Afiliasi Politik'){

        }else{
        	// $this->datatables->where('a.type', $tipe_ketokohan);
        }
        
        $this->datatables->where('a.is_deleted', '0');
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('id_provinces', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('id_city', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('id_districts', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('id_village', $id_wilayah);
        	}
		}

		if($partai <> "ALL"){
			if($partai == 'Netral'){
				$this->datatables->where('a.inclination', 0);
	        }else if($partai == 'Afiliasi Politik'){
	        	$this->datatables->where('a.inclination !=', 0);
	        }else{
	        	$this->datatables->where('b.alias', $partai);
	        }
		}

		if($ketokohan != 'ALL'){
			$this->datatables->where('a.id_pertokohan', $ketokohan);
		}

		echo $this->datatables->generate();
	}

	function detail_influencer_all($tipe_wilayah, $id_wilayah, $ketokohan, $tipe_ketokohan){
		$tipe_wilayah = urldecode($tipe_wilayah);
		$id_wilayah = urldecode($id_wilayah);
		$this->datatables->select("a.id_intangible as id,a.name, a.phone, g.nama as pertokohan, c.alias as prov, d.name as kab, e.name as kec, f.name as kel, a.informasi_tambahan,b.alias as partai");
		// $this->datatables->select("a.id_intangible as id,a.name, a.phone, a.id_pertokohan as pertokohan, a.id_provinces as prov, a.id_city as kab, a.id_districts as kec, a.id_village as kel, a.informasi_tambahan,a.inclination as partai");
        $this->datatables->from('intangible a');
        $this->datatables->join('m_parpol b ', 'a.inclination=b.id_parpol', 'inner');
        $this->datatables->join('m_provinces c ', 'a.id_provinces=c.id', 'left');
        $this->datatables->join('m_regencies d ', 'a.id_city=d.id', 'left');
        $this->datatables->join('m_districts e ', 'a.id_districts=e.id', 'left');
        $this->datatables->join('m_villages f ','a.id_village=f.id', 'left');
        $this->datatables->join('m_pertokohan g ', 'a.id_pertokohan=g.id_pertokohan', 'left');
        // $this->datatables->where('a.type', $tipe_ketokohan);
        $this->datatables->where('a.is_deleted', '0');
        if($id_wilayah != 0){
        	if($tipe_wilayah == 'provinsi'){
        		$this->datatables->where('id_provinces', $id_wilayah);
        	}else if($tipe_wilayah == 'kabupaten'){
        		$this->datatables->where('id_city', $id_wilayah);
        	}else if($tipe_wilayah == 'kecamatan'){
        		$this->datatables->where('id_districts', $id_wilayah);
        	}else if($tipe_wilayah == 'kelurahan'){
        		$this->datatables->where('id_village', $id_wilayah);
        	}
		}
		if($ketokohan != 'ALL'){
			$this->datatables->where('a.id_pertokohan', $ketokohan);
		}
		
		
		
		if($tipe_ketokohan != 'ALL'){
			
			if($tipe_ketokohan == 1){
				$tipe_ketokohan = 'tangible';
			}else{
				$tipe_ketokohan = 'intangible';
			}
			
			$this->datatables->where('a.type', $tipe_ketokohan);
		}

		echo $this->datatables->generate();
	}

	function detail_influencer_modal($id, $tipe, $tipe_ketokohan){
		$tipe_ketokohan = urldecode($tipe_ketokohan);
		$where_wilayah = '';

		if($tipe_ketokohan != 'all'){
			$id_ketokohan = $this->db->get_where("m_pertokohan", array('nama' => $tipe_ketokohan))->row('id_pertokohan');
			$where_wilayah .="and id_pertokohan='$id_ketokohan'";
		}

		if($id!=0){
			if($tipe=="provinsi"){
				$where_wilayah .= " and id_provinces=".$id;
			}else if($tipe =="kabupaten"){
				$where_wilayah .= " and id_city=".$id;
			}else if($tipe =="kecamatan"){
				$where_wilayah .= " and id_districts=".$id;
			}else if($tipe =="kelurahan"){
				$where_wilayah .= " and id_village=".$id;
			}
		}

		$chart[0]['name'] = '';
		$chart[0]['points'] = 0;
		$chart[0]['color'] = '';
		$result = $this->db->query("SELECT ROUND(( count(1)/(SELECT count(1) FROM intangible where is_deleted='0' and inclination != 0 $where_wilayah ) * 100 ),2) AS percentage, count(1) as jumlah,a.inclination,b.alias,b.color from intangible a
				left join m_parpol b on a.inclination = b.id_parpol
				where a.is_deleted='0' and inclination != 0 $where_wilayah
				group by inclination order by jumlah desc limit 10")->result();
		$data['netral'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination=0 $where_wilayah")->row('jml');
		$data['pilih'] = $this->db->query("SELECT COUNT(*) as jml FROM intangible where is_deleted='0' and inclination!=0 $where_wilayah")->row('jml');

		$i=0;
		foreach ($result as $key => $value) {
			$chart[$i]['name'] = $value->alias;
			$chart[$i]['points'] = $value->percentage;
			$chart[$i]['color'] = $value->color;
			// $chart[$i]['bullet'] = site_url('img/logo_parpol/').$value->picture;
			$i++;
		}
		$data['partai'] = $chart;
		// echo ($string);
		echo json_encode($data);
	}
	function save_to_excel_simulasi($id, $nama, $tipe){
		
		/* $id=0;
		$nama='Nasional';
		$tipe='Nasional'; */
		
		$data = $this->Dashboard_model->get_data_simulasi($id, $nama, $tipe);
		
		
		
		include APPPATH.'third_party/fs_export_to_excel.php';
		
		//pengaturan nama file
		$namaFile = "Simulasi.xls";
		//pengaturan judul data
		$judul = "Data Simulasi";
		//baris berapa header tabel di tulis
		$tablehead = 3;
		//baris berapa data mulai di tulis
		$tablebody = 4;
		//no urut data
		$nourut = 1;
		 
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=".$namaFile."");
		header("Content-Transfer-Encoding: binary ");
		 
		 
		xlsBOF();
		 
		xlsWriteLabel(0,0,'Simulasi');  
		//xlsWriteLabel(1,0,"Date: ");  
		//xlsWriteLabel(2,0,"Keyword: Keyword");  
		 
		//header
		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++,"Pasangan Calon");               
		xlsWriteLabel($tablehead, $kolomhead++,"Wilayah");              
		xlsWriteLabel($tablehead, $kolomhead++,"Jumlah TPS");              
		xlsWriteLabel($tablehead, $kolomhead++,"Jumlah DPT");              
		xlsWriteLabel($tablehead, $kolomhead++,"Asumsi Suara Sah (".ASUMSI_SAH."%)");              
		xlsWriteLabel($tablehead, $kolomhead++,"Target Menang (5%)");              
		xlsWriteLabel($tablehead, $kolomhead++,"Target Perolehan Suara");              

		//body
		foreach ($data as $key => $value) { 
			$kolombody = 0;
			xlsWriteLabel($tablebody, $kolombody++, $value['pasangan_alias']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['area']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['jml_tps']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['jml_dpt']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['asumsi_suara_75']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['target_menang']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['target_perolehan_suara']);          
			
			$tablebody++;
			$nourut++;
		}
		xlsEOF();
		exit();
	
	}

	function save_note(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$text = $this->input->post('vtext');
		$method = $this->input->post('method');

		
		$data = $this->Survei_model->save_note($id, $nama, $tipe, $text, $method);
		return $data;
		
	}
	function test(){
		$id_survey = $this->db->get_where('m_pilih', array('jenis' => 'p16','nama' => 'NU'))->row('id');
		var_dump($id_survey);
	}

	function spinner(){
		$this->load->view('new/header');
		$this->load->view('new/spinner');
		$this->load->view('new/footer');
	}

	function detail_paslon($id_paslon){
		$data['paslon'] = $this->db->query("SELECT * from m_paslon where id_paslon=$id_paslon")->row();
		$pengusung = $this->db->query("SELECT * from m_pengusung a 
								left join m_parpol b on a.id_parpol=b.id_parpol
								where id_paslon=$id_paslon")->result();
		$data['pengusung'] = '';
		foreach ($pengusung as $key => $value) {
			$data['pengusung'] .= '<span><img height="20" width="20" src="'.base_url().'img/logo_parpol/'.$value->picture.'"> '.$value->alias.'</span>&nbsp;&nbsp;&nbsp;';
		}
		echo json_encode($data);
	}
	
	function test_simulasi(){
		$data = $this->Dashboard_model->get_test_simulasi();
		
		
		//echo json_encode($data);  
	}
	
	function save_to_excel_influencer($vpartai, $vketokohan, $vtipe_ketokohan, $vtipe, $vtipex){
		
		$hasil  = $this->detail_influencer_new($vpartai, $vketokohan, $vtipe_ketokohan, $vtipe, $vtipex );
		var_dump($hasil);
		 /* foreach ($hasil['data'] as $key => $value) { 
			//echo $value->name;
		}  */
		return;
		
		
		include APPPATH.'third_party/fs_export_to_excel.php';
		
		//pengaturan nama file
		$namaFile = "Influencer.xls";
		//pengaturan judul data
		$judul = "Data Influencer";
		//baris berapa header tabel di tulis
		$tablehead = 3;
		//baris berapa data mulai di tulis
		$tablebody = 4;
		//no urut data
		$nourut = 1;
		 
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=".$namaFile."");
		header("Content-Transfer-Encoding: binary ");
		 
		 
		xlsBOF();
		 
		xlsWriteLabel(0,0,'Simulasi');  
		//xlsWriteLabel(1,0,"Date: ");  
		//xlsWriteLabel(2,0,"Keyword: Keyword");  
		 
		//header
		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++,"Pasangan Calon");               
		xlsWriteLabel($tablehead, $kolomhead++,"Wilayah");              
		xlsWriteLabel($tablehead, $kolomhead++,"Jumlah TPS");              
		xlsWriteLabel($tablehead, $kolomhead++,"Jumlah DPT");              
		xlsWriteLabel($tablehead, $kolomhead++,"Asumsi Suara Sah (".ASUMSI_SAH."%)");              
		xlsWriteLabel($tablehead, $kolomhead++,"Target Menang (5%)");              
		xlsWriteLabel($tablehead, $kolomhead++,"Target Perolehan Suara");              

		//body
		foreach ($data as $key => $value) { 
			$kolombody = 0;
			xlsWriteLabel($tablebody, $kolombody++, $value['pasangan_alias']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['area']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['jml_tps']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['jml_dpt']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['asumsi_suara_75']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['target_menang']);              
			xlsWriteLabel($tablebody, $kolombody++, $value['target_perolehan_suara']);          
			
			$tablebody++;
			$nourut++;
		}
		xlsEOF();
		exit();
		
		
	}

	function get_detail_dpt($kelurahan, $tps){
		if($kelurahan == 0 ){
			$this->datatables->set_database('dpt');
			$this->datatables->select("id, nik, nama, tanggal_lahir, alamat");
			$this->datatables->from('dpt_null');
			echo $this->datatables->generate();
		
		} else {
			$query		= $this->db->select('c.province_id')
				->from('m_villages a')
				->join('m_districts b', 'a.district_id=b.id', 'left')
				->join('m_regencies c', 'c.id=b.regency_id', 'left')
				->where('a.id='.$kelurahan);
			$id_prov 	= $query->get()->row('province_id');
			$tabel 		= $this->db->get_where('m_dpt', array('idProv' => $id_prov))->row('tabel');
			$this->datatables->set_database('dpt');
			$this->datatables->select("id,nik,nama,tanggal_lahir,alamat");
			$this->datatables->from($tabel);
			$this->datatables->where("idProv", $id_prov);
			$this->datatables->where("idKel", $kelurahan);
			$this->datatables->where("tps", $tps);
			echo $this->datatables->generate();
		}
	}

	function get_detail_dpt2($kelurahan, $tps){
		if($kelurahan == 0 ){
			$this->datatables->set_database('dpt');
			$this->datatables->select("id, nik, nama, tanggal_lahir, alamat");
			$this->datatables->from('dpt_null');
			echo $this->datatables->generate();
		
		} else {
			$query 	= $this->db->select('c.id')
				->from('m_villages a')
				->join('m_districts b', 'a.district_id=b.id', 'left')
				->join('m_regencies c', 'c.id=b.regency_id', 'left')
				->where('a.id='.$kelurahan);
			$id_kab = $query->get()->row('id');
			$tabel 	= 'kab_'.$id_kab;
			
			$this->datatables->set_database('dpt_kab');
			$this->datatables->select("id,tps,jns_kelamin,CONCAT (SUBSTRING(nik, 1, 12),'****') as nik,nama,REPLACE(tanggal_lahir, '|', '-') as tanggal_lahir,alamat");
			$this->datatables->from($tabel);
			$this->datatables->where("idKab", $id_kab);
			$this->datatables->where("idKel", $kelurahan);
			$this->datatables->where("tps", $tps);
			echo $this->datatables->generate();
			// var_dump($id_kab);
		}
	}

	function get_detail_dpt_is_checked($kelurahan, $check){
		if($kelurahan == 0 ){
			$this->datatables->set_database('dpt');
			$this->datatables->select("id,nik,nama,tanggal_lahir,alamat");
			$this->datatables->from('dpt_null');
			echo $this->datatables->generate();
		}else{
			$id_kab = substr($kelurahan, 0, 4);
			/*$this->db->query("SELECT c.id from m_villages a left join m_districts b on a.district_id=b.id 
											LEFT JOIN m_regencies c on c.id=b.regency_id
											WHERE a.id=$kelurahan")->row('id');*/
			$tabel = 'kab_'.$id_kab;
			$this->datatables->set_database('dpt_kab');
			$this->datatables->select("id,tps,jns_kelamin,CONCAT (SUBSTRING(nik, 1, 12),'****') as nik,nama,REPLACE(tanggal_lahir, '|', '-') as tanggal_lahir,alamat");
			$this->datatables->from($tabel);
			//$this->datatables->where("idKab", $id_kab);
			$this->datatables->where("idKel", $kelurahan);
			// $this->datatables->where("tps", $tps);
			$this->datatables->where("checked", $check);
			echo $this->datatables->generate();
			// var_dump($id_kab);
		}
	}

	function save_excel_dpt($kelurahan, $tps){
		
		$id_kab = $this->db->query("SELECT c.id from m_villages a left join m_districts b on a.district_id=b.id 
											LEFT JOIN m_regencies c on c.id=b.regency_id
											WHERE a.id=$kelurahan")->row('id');
		$tabel = 'kab_'.$id_kab;
		$other = $this->load->database('dpt_kab', TRUE);
		// $other->set_database('dpt_kab');
		$other->select("id,tps,jns_kelamin,CONCAT (SUBSTRING(nik, 1, 12),'****') as nik,nama,tanggal_lahir,alamat");
		$other->from($tabel);
		$other->where("idKab", $id_kab);
		$other->where("idKel", $kelurahan);
		$other->where("tps", $tps);
		$data = $other->get()->result();
		
		
		include APPPATH.'third_party/fs_export_to_excel.php';
		
		//pengaturan nama file
		$namaFile = "dpt.xls";
		//pengaturan judul data
		$judul = "Data DPT";
		//baris berapa header tabel di tulis
		$tablehead = 3;
		//baris berapa data mulai di tulis
		$tablebody = 4;
		//no urut data
		$nourut = 1;
		 
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=".$namaFile."");
		header("Content-Transfer-Encoding: binary ");
		 
		 
		xlsBOF();
		 
		xlsWriteLabel(0,0,'DATA DPT');  
		//xlsWriteLabel(1,0,"Date: ");  
		//xlsWriteLabel(2,0,"Keyword: Keyword");  
		 
		//header
		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++,"NIK");               
		xlsWriteLabel($tablehead, $kolomhead++,"Nama");              
		xlsWriteLabel($tablehead, $kolomhead++,"Tanggal Lahir");              
		xlsWriteLabel($tablehead, $kolomhead++,"Alamat");     
		xlsWriteLabel($tablehead, $kolomhead++,"Jenis Kelamin");     
		xlsWriteLabel($tablehead, $kolomhead++,"TPS");     

		//body
		foreach ($data as $key => $value) { 
			$kolombody = 0;
			xlsWriteLabel($tablebody, $kolombody++, $value->nik);              
			xlsWriteLabel($tablebody, $kolombody++, $value->nama);              
			xlsWriteLabel($tablebody, $kolombody++, $value->tanggal_lahir);              
			xlsWriteLabel($tablebody, $kolombody++, $value->alamat);        
			xlsWriteLabel($tablebody, $kolombody++, $value->jns_kelamin);        
			xlsWriteLabel($tablebody, $kolombody++, $value->tps);        
			
			$tablebody++;
			$nourut++;
		}
		xlsEOF();
		exit();
		
		
	}

	function save_excel_dpt_checked($kelurahan, $check){
		
		$id_kab = $this->db->query("SELECT c.id from m_villages a left join m_districts b on a.district_id=b.id 
											LEFT JOIN m_regencies c on c.id=b.regency_id
											WHERE a.id=$kelurahan")->row('id');
		$tabel = 'kab_'.$id_kab;
		$other = $this->load->database('dpt_kab', TRUE);
		// $other->set_database('dpt_kab');
		$other->select("id,tps,jns_kelamin,CONCAT (SUBSTRING(nik, 1, 12),'****') as nik,nama,tanggal_lahir,alamat");
		$other->from($tabel);
		$other->where("idKab", $id_kab);
		$other->where("idKel", $kelurahan);
		$other->where("checked", $check);
		$data = $other->get()->result();
		
		
		include APPPATH.'third_party/fs_export_to_excel.php';
		
		//pengaturan nama file
		$namaFile = "sisa_potensi_suara.xls";
		//pengaturan judul data
		$judul = "SISA POTENSI SUARA";
		//baris berapa header tabel di tulis
		$tablehead = 3;
		//baris berapa data mulai di tulis
		$tablebody = 4;
		//no urut data
		$nourut = 1;
		 
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=".$namaFile."");
		header("Content-Transfer-Encoding: binary ");
		 
		 
		xlsBOF();
		 
		xlsWriteLabel(0,0,'DATA DPT');  
		//xlsWriteLabel(1,0,"Date: ");  
		//xlsWriteLabel(2,0,"Keyword: Keyword");  
		 
		//header
		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++,"NIK");               
		xlsWriteLabel($tablehead, $kolomhead++,"Nama");              
		xlsWriteLabel($tablehead, $kolomhead++,"Tanggal Lahir");              
		xlsWriteLabel($tablehead, $kolomhead++,"Alamat");     
		xlsWriteLabel($tablehead, $kolomhead++,"Jenis Kelamin");     
		xlsWriteLabel($tablehead, $kolomhead++,"TPS");     

		//body
		foreach ($data as $key => $value) { 
			$kolombody = 0;
			xlsWriteLabel($tablebody, $kolombody++, $value->nik);              
			xlsWriteLabel($tablebody, $kolombody++, $value->nama);              
			xlsWriteLabel($tablebody, $kolombody++, $value->tanggal_lahir);              
			xlsWriteLabel($tablebody, $kolombody++, $value->alamat);        
			xlsWriteLabel($tablebody, $kolombody++, $value->jns_kelamin);        
			xlsWriteLabel($tablebody, $kolombody++, $value->tps);        
			
			$tablebody++;
			$nourut++;
		}
		xlsEOF();
		exit();
		
		
	}

	 /*
    * Function for get detail guraklih data (Hari Hendryan)
    */
    function get_detail_guraklih($id, $tipe_wilayah, $tipe){
        $data['data'] = $this->Simulasi_model->get_detail_guraklih($id, $tipe_wilayah, $tipe);
        echo json_encode($data);

    }

    function edit_rekomendasi(){
    	$user = $this->session->userdata('teknopol');
    	$data = $this->input->post();
    	$cek = $this->db->get_where('rekomendasi', array('id_area' => $data['id_area']))->row();
    	if($cek){
    		$this->db->where('id_area', $data['id_area']);
    		if($this->db->update('rekomendasi', $data)){
    			set_status_header(204);
    		}else{
    			set_status_header(422);
    			echo json_encode('Database Error');
    			return;
    		}
    	}else{
    		if($this->db->insert('rekomendasi', $data)){
    			set_status_header(204);
    		}else{
    			set_status_header(422);
    			echo json_encode('Database Error');
    			return;
    		}
    	}
    }

    function get_rekomendasi($id_area){
    	$cek = $this->db->get_where('rekomendasi', array('id_area' => $id_area))->row();
    	if($cek){
    		echo json_encode($cek);
    	}else{
    		echo json_encode('N');
    	}
    }
	
}
