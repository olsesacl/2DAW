<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_controller extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url'));
    }

    function index(){
        $this->load->view('upload_form');
    }

}