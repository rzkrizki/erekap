<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Screen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        $this->load->view('screen', $data);
    }
}

/* End of file Screen.php */
/* Location: ./application/controllers/Screen.php */
