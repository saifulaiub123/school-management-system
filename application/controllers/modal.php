<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	
 *	@author : Cenaxis
 *	date	: 27 May, 2015
 *	School Management system
 */

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' ,$param1 = '', $param2 = '' , $param3 = '',$param4='')
	{
            
//                $class_id=$this->input->post('class_id');
//                $dep_id=$this->input->post('dep_id');
//                $sec_id=$this->input->post('sec_id');
//            
//                $this->session->set_userdata('class_id', $class_id);
//            
//                echo $class_id;
            
		$account_type		=	$this->session->userdata('login_type');
                $page_data['param1']		=	$param1;
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
                $page_data['param4']		=	$param4;
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);
		
		//echo '<script src="assets/js/neon-custom-ajax.js"></script>';
	}
}

