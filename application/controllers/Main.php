<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
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
        $this->load->view('main', $data);
    }
}

/* End of file Main.php */
/* Location: ./application/controllers/main.php */
