<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//model for admin user
class Auth_model extends CI_Model {

	private $admin;

	//login using username & password
	function login($input){
		$password = md5($input['password']);
			//get admin. return false if not found
			$this->admin = $this->db->get_where('m_login', array('username' => $input['username'], 'is_deleted' => '0'))->row();
			
			if (!$this->admin){
				$data['message']	= 'Akun dengan username ini tidak ada';
				$data['status']		= 0;
			}

			//match password. return false if fail
			else if ($password !== $this->admin->password){
				$data['message']	= 'Password Yang anda masukkan salah';
				$data['status']		= 0;
			}

			else if($this->admin->is_active === '0'){
				$data['message']	= 'Akun anda sudah tidak aktif';
				$data['status']		= 0;
			
			} else {
				$this->history_login($this->admin->username,'login');
				//store username in session
				$sess_data['username']		= $this->admin->username;
				$sess_data['role']			= $this->admin->role;
				$sess_data['role_detail']	= $this->admin->role_detail;
				$sess_data['is_active']		= $this->admin->is_active;
				$sess_data['profile_pic']	= $this->admin->profile_pic;
				$sess_data['userlevel']		= $this->admin->userlevel;
				
				$this->session->set_userdata('teknopol', $sess_data);
				$data['message'] 	= 'Berhasil';
				$data['status']		= 1;
			}
		//return admin data
		return $data;	
	}

	function captcha($response_form,$ip){
		$url 	= 'https://www.google.com/recaptcha/api/siteverify';
		$body 	= 'secret=6LcHrVQUAAAAAE-n_b-eYcNAvAh3QsyMHhAxB4oM&response='.$response_form.'&remoteip='.$ip;

		$ch 	= curl_init( $url );
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );
		return $response;
	}

	function ipCheck() {
	    if (getenv('HTTP_CLIENT_IP')) {
	        $ip = getenv('HTTP_CLIENT_IP');
	    }
	    elseif (getenv('HTTP_X_FORWARDED_FOR')) {
	        $ip = getenv('HTTP_X_FORWARDED_FOR');
	    }
	    elseif (getenv('HTTP_X_FORWARDED')) {
	        $ip = getenv('HTTP_X_FORWARDED');
	    }
	    elseif (getenv('HTTP_FORWARDED_FOR')) {
	        $ip = getenv('HTTP_FORWARDED_FOR');
	    }
	    elseif (getenv('HTTP_FORWARDED')) {
	        $ip = getenv('HTTP_FORWARDED');
	    }
	    else {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	function logout(){
		$user = $this->session->userdata('teknopol');
		$this->history_login($user['username'],'logout');
		$this->session->unset_userdata('teknopol');
		redirect('');
	}

	function is_login(){
		//get current admin data
		$admin =  $this->session->userdata('teknopol');

		if(!$admin){
			return false;
		}else{
			if ($admin['role_detail']=='000') {
				redirect('reportnew');
			} else {
				redirect('dashboard');
			}
			// redirect('home');
		}
	}

	function can_access_by_role($role){
		$user = $this->session->userdata('teknopol');
		if($user['role'] !== $role){
			redirect('auth/logout');
		}
	}
	
	function history_login($username,$action){
		if($action === 'login'){
			$data['username'] = $username;
			$data['login_time'] = date('y-m-d h:i:s');
			$this->db->insert('hist_login',$data);
		
		} else if($action === 'logout'){
			$id = $this->db->query("SELECT id from hist_login where username = '$username' order by login_time desc limit 1")->row('id');
			$data['logout_time'] = date('y-m-d h:i:s');
			$this->db->where('id', $id);
			$this->db->update('hist_login', $data);
		}
	}

	function role_restriction($id, $tipe){
		$user 	= $this->session->userdata('teknopol');
		$id 	= $this->get_province_id($id, $tipe);
		
		if($user['role_detail'] != $id){
			return false;
		
		} else {
			return true;
		}
	}

	function get_province_id($id, $tipe){
		if($tipe == 'provinsi'){
			$id = $id;
		
		} else if($tipe == 'kabupaten'){
			$id = $this->db->get_where('m_regencies', array('id' => $id))->row('province_id');
		
		} else if($tipe == 'kecamatan'){
			$id = $this->db->select('b.province_id')->from('m_districts a')->join('m_regencies b', 'a.regency_id=b.id', 'left')->where("a.id=".$id)->row('province_id');
		
		} else if($tipe == 'kelurahan'){
			$id = $this->db->select('c.province_id')->from('m_villages a')->join('m_districts b', 'a.district_id=b.id', 'left')->join('m_regencies c', 'c.id=b.regency_id', 'left')->where("a.id=".$id)->row('province_id');
		
		} else if($tipe == 'client'){
			if(count($id) == 2){
				$this->get_province_id($id, 'provinsi');
				
			} else if(count($id == 4)){
				$this->get_province_id($id, 'kabupaten');
			}
		}

		return $id;
	}

}