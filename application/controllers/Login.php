<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model', 'api');
    }

    public function _remap($method, $param = array())
    {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $param);
        } else {
            display_404();
        }
    }

    public function index()
    {
        $data = "";
        $this->load->view('login', $data);
    }

    public function send_data()
    {
        $post = $this->input->post();
        $data = array(
            'username' => $post['username'],
            'password' => $post['password'],
        );

        $url = "https://api.digipol.id/api/login_paslon";
        $token = "0e9340e1-5d01-49f9-bff7-18812771f9d5";

        $response = $this->api->post_dynamic_data($data, $url, $token);
        

        if($response->error == "false"){
            
            $data['status'] = 'success';
            $user = $response->data;
            $sess_data['username']		= $user->username;
            $sess_data['role']			= 'admin';
            $sess_data['role_detail']	= '0';
            $sess_data['is_active']		= '1';
            $sess_data['profile_pic']	= 'avatar1.jpg';
            $sess_data['userlevel']		= 'Paslon';
            $sess_data['kab_id'] = $user->id_kabupaten;
            
            $this->session->set_userdata('teknopol', $sess_data);
            // redirect(base_url('main'));
        }else{
            $data['status'] = 'error';
            $data['message'] = $response->message;
        }
        echo json_encode($data);

    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
