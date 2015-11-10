<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_controller extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    function index(){
        $this->load->view('upload_form', array('error' => ''));
    }

    function do_upload(){

        if(!$this->upload->do_upload()){

            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);

        } else {

			$data = array('upload_data' => $this->upload->data());

		}
    }

}