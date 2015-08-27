<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author : Cenaxis
 *	date	: 27 May, 2015
 *	School Management system
 */

class Student extends CI_Controller
{
    
    
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
    
    /***default functin, redirects to login page if no student logged in yet***/
    public function index()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
//    function dashboard()
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//        $page_data['page_name']  = 'dashboard';
//        $page_data['page_title'] = get_phrase('student_dashboard');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    /****MANAGE TEACHERS*****/
//    function teacher_list($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//        if ($param1 == 'personal_profile') {
//            $page_data['personal_profile']   = true;
//            $page_data['current_teacher_id'] = $param2;
//        }
//        $page_data['teachers']   = $this->db->get('teacher')->result_array();
//        $page_data['page_name']  = 'teacher';
//        $page_data['page_title'] = get_phrase('manage_teacher');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    /***********************************************************************************************************/
//    
//    
//    
//    /****MANAGE SUBJECTS*****/
//    function subject($param1 = '', $param2 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//        
//        $student_profile         = $this->db->get_where('student', array(
//            'student_id' => $this->session->userdata('student_id')
//        ))->row();
//        $student_class_id        = $student_profile->class_id;
//        $page_data['subjects']   = $this->db->get_where('subject', array(
//            'class_id' => $student_class_id
//        ))->result_array();
//        $page_data['page_name']  = 'subject';
//        $page_data['page_title'] = get_phrase('manage_subject');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    
//    /****MANAGE EXAM MARKS*****/
//    function marks($exam_id = '', $class_id = '', $subject_id = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//        
//        $student_profile       = $this->db->get_where('student', array(
//            'student_id' => $this->session->userdata('student_id')
//        ))->row();
//        $page_data['class_id'] = $student_profile->class_id;
//		 $page_data['student_id'] = $this->db->get_where('student', array( 'student_id' => $this->session->userdata('student_id') 
//							))->row()->student_id;
//        
//        if ($this->input->post('operation') == 'selection') {
//            $page_data['exam_id']    = $this->input->post('exam_id');
//            //$page_data['class_id']	=	$this->input->post('class_id');
//            $page_data['subject_id'] = $this->input->post('subject_id');
//            
//            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
//                redirect(base_url() . 'index.php?student/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
//            } else {
//                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
//                redirect(base_url() . 'index.php?student/marks/', 'refresh');
//            }
//        }
//        $page_data['exam_id']    = $exam_id;
//        //$page_data['class_id']	=	$class_id;
//        $page_data['subject_id'] = $subject_id;
//        
//        $page_data['page_info'] = 'Exam marks';
//        
//        $page_data['page_name']  = 'marks';
//        $page_data['page_title'] = get_phrase('manage_exam_marks');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    /**********MANAGING CLASS ROUTINE******************/
//    function class_routine($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//        
//        $student_profile         = $this->db->get_where('student', array(
//            'student_id' => $this->session->userdata('student_id')
//        ))->row();
//        $page_data['class_id']   = $student_profile->class_id;
//        $page_data['page_name']  = 'class_routine';
//        $page_data['page_title'] = get_phrase('manage_class_routine');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    /******MANAGE BILLING / INVOICES WITH STATUS*****/
//    function invoice($param1 = '', $param2 = '', $param3 = '')
//    {
//        //if($this->session->userdata('student_login')!=1)redirect(base_url() , 'refresh');
//        if ($param1 == 'make_payment') {
//            $invoice_id      = $this->input->post('invoice_id');
//            $system_settings = $this->db->get_where('settings', array(
//                'type' => 'paypal_email'
//            ))->row();
//            $invoice_details = $this->db->get_where('invoice', array(
//                'invoice_id' => $invoice_id
//            ))->row();
//            
//            /****TRANSFERRING USER TO PAYPAL TERMINAL****/
//            $this->paypal->add_field('rm', 2);
//            $this->paypal->add_field('no_note', 0);
//            $this->paypal->add_field('item_name', $invoice_details->title);
//            $this->paypal->add_field('amount', $invoice_details->amount);
//            $this->paypal->add_field('custom', $invoice_details->invoice_id);
//            $this->paypal->add_field('business', $system_settings->description);
//            $this->paypal->add_field('notify_url', base_url() . 'index.php?student/invoice/paypal_ipn');
//            $this->paypal->add_field('cancel_return', base_url() . 'index.php?student/invoice/paypal_cancel');
//            $this->paypal->add_field('return', base_url() . 'index.php?student/invoice/paypal_success');
//            
//            $this->paypal->submit_paypal_post();
//            // submit the fields to paypal
//        }
//        if ($param1 == 'paypal_ipn') {
//            if ($this->paypal->validate_ipn() == true) {
//                $ipn_response = '';
//                foreach ($_POST as $key => $value) {
//                    $value = urlencode(stripslashes($value));
//                    $ipn_response .= "\n$key=$value";
//                }
//                $data['payment_details']   = $ipn_response;
//                $data['payment_timestamp'] = strtotime(date("m/d/Y"));
//                $data['payment_method']    = 'paypal';
//                $data['status']            = 'paid';
//                $invoice_id                = $_POST['custom'];
//                $this->db->where('invoice_id', $invoice_id);
//                $this->db->update('invoice', $data);
//            }
//        }
//        if ($param1 == 'paypal_cancel') {
//            $this->session->set_flashdata('flash_message', get_phrase('payment_cancelled'));
//            redirect(base_url() . 'index.php?student/invoice/', 'refresh');
//        }
//        if ($param1 == 'paypal_success') {
//            $this->session->set_flashdata('flash_message', get_phrase('payment_successfull'));
//            redirect(base_url() . 'index.php?student/invoice/', 'refresh');
//        }
//        $student_profile         = $this->db->get_where('student', array(
//            'student_id' => $this->session->userdata('student_id')
//        ))->row();
//        $student_id              = $student_profile->student_id;
//        $page_data['invoices']   = $this->db->get_where('invoice', array(
//            'student_id' => $student_id
//        ))->result_array();
//        $page_data['page_name']  = 'invoice';
//        $page_data['page_title'] = get_phrase('manage_invoice/payment');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    /**********MANAGE LIBRARY / BOOKS********************/
//    function book($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect('login', 'refresh');
//        
//        $page_data['books']      = $this->db->get('book')->result_array();
//        $page_data['page_name']  = 'book';
//        $page_data['page_title'] = get_phrase('manage_library_books');
//        $this->load->view('backend/index', $page_data);
//        
//    }
//    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
//    function transport($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect('login', 'refresh');
//        
//        $page_data['transports'] = $this->db->get('transport')->result_array();
//        $page_data['page_name']  = 'transport';
//        $page_data['page_title'] = get_phrase('manage_transport');
//        $this->load->view('backend/index', $page_data);
//        
//    }
//    /**********MANAGE DORMITORY / HOSTELS / ROOMS ********************/
//    function dormitory($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect('login', 'refresh');
//        
//        $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
//        $page_data['page_name']   = 'dormitory';
//        $page_data['page_title']  = get_phrase('manage_dormitory');
//        $this->load->view('backend/index', $page_data);
//        
//    }
//    
//    /**********WATCH NOTICEBOARD AND EVENT ********************/
//    function noticeboard($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect('login', 'refresh');
//        
//        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
//        $page_data['page_name']  = 'noticeboard';
//        $page_data['page_title'] = get_phrase('noticeboard');
//        $this->load->view('backend/index', $page_data);
//        
//    }
//    
//    /**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
//    function document($do = '', $document_id = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect('login', 'refresh');
//        
//        $page_data['page_name']  = 'manage_document';
//        $page_data['page_title'] = get_phrase('manage_documents');
//        $page_data['documents']  = $this->db->get('document')->result_array();
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    
//    
//      function message($param1 = 'message_home', $param2 = '', $param3 = '') {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url(), 'refresh');
//
//        if ($param1 == 'send_new') {
//            $message_thread_code = $this->crud_model->send_new_private_message();
//            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
//            redirect(base_url() . 'index.php?student/message/message_read/' . $message_thread_code, 'refresh');
//        }
//
//        if ($param1 == 'send_reply') {
//            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
//            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
//            redirect(base_url() . 'index.php?student/message/message_read/' . $param2, 'refresh');
//        }
//
//        if ($param1 == 'message_read') {
//            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
//            $this->crud_model->mark_thread_messages_read($param2);
//        }
//
//        $page_data['message_inner_page_name']   = $param1;
//        $page_data['page_name']                 = 'message';
//        $page_data['page_title']                = get_phrase('private_messaging');
//        $this->load->view('backend/index', $page_data);
//    }
//    
//    
//    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
//    function manage_profile($param1 = '', $param2 = '', $param3 = '')
//    {
//        if ($this->session->userdata('student_login') != 1)
//            redirect(base_url() . 'index.php?login', 'refresh');
//        if ($param1 == 'update_profile_info') {
//            $data['name']        = $this->input->post('name');
//            $data['birthday']    = $this->input->post('birthday');
//            $data['sex']         = $this->input->post('sex');
//            $data['religion']    = $this->input->post('religion');
//            $data['blood_group'] = $this->input->post('blood_group');
//            $data['address']     = $this->input->post('address');
//            $data['phone']       = $this->input->post('phone');
//            $data['email']       = $this->input->post('email');
//            
//            $this->db->where('student_id', $this->session->userdata('student_id'));
//            $this->db->update('student', $data);
//            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
//            redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');
//        }
//        if ($param1 == 'change_password') {
//            $data['password']             = $this->input->post('password');
//            $data['new_password']         = $this->input->post('new_password');
//            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
//            
//            $current_password = $this->db->get_where('student', array(
//                'student_id' => $this->session->userdata('student_id')
//            ))->row()->password;
//            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
//                $this->db->where('student_id', $this->session->userdata('student_id'));
//                $this->db->update('student', array(
//                    'password' => $data['new_password']
//                ));
//                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
//            } else {
//                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
//            }
//            redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');
//        }
//        $page_data['page_name']  = 'manage_profile';
//        $page_data['page_title'] = get_phrase('manage_profile');
//        $page_data['edit_data']  = $this->db->get_where('student', array(
//            'student_id' => $this->session->userdata('student_id')
//        ))->result_array();
//        $this->load->view('backend/index', $page_data);
//    }
    
    function dashboard()
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['total_students']=$this->crud_model->get_total_students();
        $page_data['total_teachers']=$this->crud_model->get_total_teachers();
        $page_data['total_parents']=$this->crud_model->get_total_parents();
//        echo $this->crud_model->get_total_students();
        
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('student_dashboard');
        
//        echo $this->session->userdata('current_language');
        
        $this->load->view('backend/index', $page_data);
//        $this->load->view("backend/sidebar.php");
    }
    
    function email_validate($email)
    {
        $email=$this->input->post('email');
        
//        echo $email;
        $query_student = $this->db->get_where('student' , array(	'email' => $email ));
         if ($query_student->num_rows() > 0) {
             
             echo "0";
             exit();
        
        }
        $query_student = $this->db->get_where('student' , array(	'email' => $email ));
        if ($query_student->num_rows() > 0) {
             
             echo "0";
             exit();
        
        }
        $query_teacher = $this->db->get_where('teacher' , array(	'email' => $email ));
        if ($query_teacher->num_rows() > 0) {
             
             echo "0";
             exit();
        
        }
        $query_parent = $this->db->get_where('parent' , array(	'email' => $email ));
        if ($query_parent->num_rows() > 0) {
             
             echo "0";
             exit();
        
        }

        
        echo "1";
        
    }
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
	function student_add()
	{
		if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'student_add';
		$page_data['page_title'] = get_phrase('add_student');
		$this->load->view('backend/index', $page_data);
	}
	
        
	function student_information($class_id = '',$group_id='',$sec_id='')
	{
		if ($this->session->userdata('student_login') != 1)
                redirect('login', 'refresh');
	           
                
                
                
                
                $page_data['page_name']  	= 'modal_student_profile';
                
               // $group=array("No Group","Science","Commerce","Arts");
		$page_data['page_title'] 	= get_phrase('profile'). " - ".

                $this->crud_model->get_class_name($page_data['class_id']). " <span class='glyphicon glyphicon-circle-arrow-right'></span> ".

                $group[$page_data['group_id']]. " <span class='glyphicon glyphicon-arrow-right sm'></span> ".

                //$this->crud_model->get_sec_name($page_data['sec_id']);
											
                
//                echo $page_data['sec_id'];
               // $this->session->set_userdata('session_set','0');
                
		$this->load->view('backend/index', $page_data);
	}
	
	function student_marksheet($class_id = '')
	{
		if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
			
		$page_data['page_name']  = 'student_marksheet';
		$page_data['page_title'] 	= get_phrase('student_marksheet'). " - ".get_phrase('class')." : ".
											$this->crud_model->get_class_name($class_id);
//		$page_data['class_id'] 	= $class_id;
                
                $page_data['student_id'] = $this->session->userdata('student_id');
                 $page_data['class_id'] = $this->session->userdata('class_id');
                $page_data['group_id'] 	= $this->session->userdata('dep_id');
                $page_data['sec_id'] 	= $this->session->userdata('sec_id');
                
//                 $page_data['students']=$this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,'sec_id'=>$sec_id))->result_array();
               
                
		$this->load->view('backend/index', $page_data);
	}
	
        function student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $data['status']    = $this->input->post('status');
            $data['class_id']    = $this->input->post('class_id');
            $data['sec_id']    = $this->input->post('sec_id');
            $data['dep_id']    = $this->input->post('dep_id');
            $data['roll']        = $this->input->post('roll');
            $data['optional_sub_id']        = $this->input->post('optional_sub_id');
            //echo $data['sec_id'];
            $this->db->insert('student', $data);
            $student_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');
            $this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            
            redirect(base_url() . 'index.php?student/student_add/' . $data['class_id'], 'refresh');
        }
        if ($param2 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
//            $data['class_id']    = $this->input->post('class_id');
            $data['roll']        = $this->input->post('roll');
            $data['optional_sub_id']        = $this->input->post('optional_sub_id');
            $data['status']        = $this->input->post('status');
            
            $this->db->where('student_id', $param3);
            $this->db->update('student', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
            $this->crud_model->clear_cache();
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updeted'));
            
            redirect(base_url() . 'index.php?student/student_information/' , 'refresh');
        } 
		
        if ($param2 == 'delete') {
            $this->db->where('student_id', $param3);
            $this->db->delete('student');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/student_information/' , 'refresh');
        }
    }
    function get_student_list($class_id='',$group_id='',$sec_id='')
    {
         //$page_data['page_name']  = 'get_student_list';
        $page_data['students'] = $this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,"sec_id"=>$sec_id))->result_array();
        
         $this->load->view('backend/student/get_student_list', $page_data);
//        echo "yes";
    }
    
    
    
    
    
    
    
    
    
    
     /****MANAGE PARENTS CLASSWISE*****/
    function parent($param1 = '', $param2 = '', $param3 = '',$dep_id='',$sec_id='')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        			= $this->input->post('name');
            $data['email']       			= $this->input->post('email');
            $data['password']    			= $this->input->post('password');
            $data['student_id']  			= $param2;
            $data['relation_with_student']              = $this->input->post('relation_with_student');
            $data['phone']       			= $this->input->post('phone');
            $data['mobile']       			= $this->input->post('mobile');
            $data['address']     			= $this->input->post('address');
            $data['profession']  			= $this->input->post('profession');
            $this->db->insert('parent', $data);
            $this->email_model->account_opening_email('parent', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
			
			 $class_id	=	$this->db->get_where('student', array('student_id'=>$data['student_id']))->row()->class_id;
                         
                         
                         $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/parent/' . $class_id , 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        			= $this->input->post('name');
            $data['email']       			= $this->input->post('email');
			
			 if ($this->input->post('password') != "")
            		$data['password']    		=  $this->input->post('password');
            $data['relation_with_student']  = $this->input->post('relation_with_student');
            $data['phone']       			= $this->input->post('phone');
            $data['mobile']       			= $this->input->post('mobile');
            $data['address']     			= $this->input->post('address');
            $data['profession']  			= $this->input->post('profession');
            
            $this->db->where('parent_id', $param2);
            $this->db->update('parent', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            
            redirect(base_url() . 'index.php?student/parent/' . $param3, 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('parent', array(
                'parent_id' => $param3
            ))->result_array();
        } 
        if ($param1 == 'delete') {
            $this->db->where('parent_id', $param2);
            $this->db->delete('parent');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            
            redirect(base_url() . 'index.php?student/parent/' . $param3, 'refresh');
        }

    }
    function get_parent_info($class_id = '',$group_id='',$sec_id='')
    {
//         $page_data['class_id']   = $class_id;
//         $page_data['group_id']   = $group_id;
//         $page_data['sec_id']   = $sec_id;
        
         $page_data['class_id'] = $this->input->post('class_id');
         $page_data['group_id'] = $this->input->post('dep_id');
         $page_data['sec_id']  = $this->input->post('sec_id');
                
        $page_data['students']   = $this->db->get_where('student', array('class_id' => $page_data['class_id'],'dep_id'=>$page_data['group_id'],'sec_id'=>$page_data['sec_id']))->result_array();
											
//        $page_data['page_title'] 	= get_phrase('parent_information'). " - ".get_phrase('class')." : ".$this->crud_model->get_class_name($param1);
											
        $page_data['page_name']  = 'parent';
        
        
        $this->session->set_userdata('class_id',$page_data['class_id']);
        $this->session->set_userdata('dep_id',$page_data['group_id']);
        $this->session->set_userdata('sec_id',$page_data['sec_id']);
        
        
        $group=array("No Group","Science","Commerce","Arts");
        $page_data['page_title'] 	= get_phrase('parent_information'). " - ".
//                                                  get_phrase('class')." : ".
                        $this->crud_model->get_class_name($page_data['class_id']). " <span class='glyphicon glyphicon-circle-arrow-right'></span> ".
//                                                  get_phrase('group')." : ".
                        $group[$page_data['group_id']]. " <span class='glyphicon glyphicon-arrow-right sm'></span> ".
//                                                  get_phrase('section')." : ".
                        $this->crud_model->get_sec_name($page_data['sec_id']);
        
        $this->load->view('backend/index', $page_data);
    }
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /****MANAGE TEACHERS*****/
    function teacher($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['join_date']    = $this->input->post('join_date');
            $data['sex']         = $this->input->post('sex');
            $data['blood_group']         = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['nationality'] = $this->input->post('nationality');
            $data['designation'] = $this->input->post('designation');
            $data['prev_ex'] = $this->input->post('prev_ex');
            $data['qualification'] = $this->input->post('qualification');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['t_status']       = $this->input->post('t_status');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $this->db->insert('teacher', $data);
            $teacher_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
            $this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            
            redirect(base_url() . 'index.php?student/teacher/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['join_date']    = $this->input->post('join_date');
            $data['sex']         = $this->input->post('sex');
            $data['blood_group']         = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['nationality'] = $this->input->post('nationality');
            $data['designation'] = $this->input->post('designation');
            $data['prev_ex'] = $this->input->post('prev_ex');
            $data['qualification'] = $this->input->post('qualification');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['t_status']       = $this->input->post('t_status');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            
            $this->db->where('teacher_id', $param2);
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            
            redirect(base_url() . 'index.php?student/teacher/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('teacher', array(
                'teacher_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('teacher_id', $param2);
            $this->db->delete('teacher');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            
            redirect(base_url() . 'index.php?student/teacher/', 'refresh');
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('manage_teacher');
        $this->load->view('backend/index', $page_data);
    }
    
    function navigation($page_name='',$param1='',$param2='',$param3='') //$param1=user_id , $param2=role
    {
        $page_data['page_name']  = $page_name;
        $page_data['page_title'] = get_phrase($page_name);
        $page_data['param1']=$param1;
        $page_data['param2']=$param2;
        $this->load->view('backend/index', $page_data);
    }
    function invoice_print($param1='')
    {
//        $page_data['page_name']  = $page_name;
//        $page_data['page_title'] = get_phrase($page_name);
        $page_data['param1']=$param1;
//        $page_data['param2']=$param2;
        $this->load->view('modal_view_invoice', $page_data);
    }
    
    
    
    
    
    function staff($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['birthday']   = $this->input->post('birthday');
            $data['joindate']   = $this->input->post('joindate');
            $data['position']   = $this->input->post('position');
            $data['gender']   = $this->input->post('gender');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['salary'] = $this->input->post('salary');
            $data['status'] = $this->input->post('status');
            $this->db->insert('staff', $data);
            
            $staff_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $staff_id . '.jpg');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            
            redirect(base_url() . 'index.php?student/staff/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['birthday']   = $this->input->post('birthday');
            $data['joindate']   = $this->input->post('joindate');
            $data['position']   = $this->input->post('position');
            $data['gender']   = $this->input->post('gender');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['salary'] = $this->input->post('salary');
            $data['status'] = $this->input->post('status');
            
            $this->db->where('staff_id', $param2);
            $this->db->update('staff', $data);
            
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $staff_id . '.jpg');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/staff/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('staff_id', $param2);
            $this->db->delete('staff');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/staff/', 'refresh');
        }
        $page_data['class_id']   = $param1;
        //$page_data['staff']   = $this->db->get('staff' )->result_array();
        $page_data['page_name']  = 'staff';
        $page_data['page_title'] = get_phrase('staff');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['sec_id']   = $this->input->post('sec_id');
            $data['dep_id']   = $this->input->post('dep_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $this->db->insert('subject', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/subject/'.$data['class_id'], 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['sec_id']   = $this->input->post('sec_id');
            $data['dep_id']   = $this->input->post('dep_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $this->db->where('subject_id', $param2);
            $this->db->update('subject', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/subject/'.$data['class_id'], 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('subject_id', $param2);
            $this->db->delete('subject');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/subject/'.$param3, 'refresh');
        }
        $page_data['class_id']   = $param1;
        $page_data['subjects']   = $this->db->order_by('dep_id','Asc')->get_where('subject' , array('class_id' => $param1))->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('backend/index', $page_data);
    }
    function subject_add()
	{
		if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'subject_add';
		$page_data['page_title'] = get_phrase('add_subject');
		$this->load->view('backend/index', $page_data);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /****MANAGE CLASSES*****/
    function classes($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
//            $data['teacher_id']   = $this->input->post('teacher_id');
            $this->db->insert('class', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/classes/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
//            $data['teacher_id']   = $this->input->post('teacher_id');
            
            $this->db->where('class_id', $param2);
            $this->db->update('class', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/classes/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class', array(
                'class_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_id', $param2);
            $this->db->delete('class');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/classes/', 'refresh');
        }
        $page_data['classes']    = $this->db->get('class')->result_array();
        $page_data['page_name']  = 'class';
        $page_data['page_title'] = get_phrase('manage_class');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     /****MANAGE Sections Classwise*****/
    
    function add_section()
    {
        
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'section_add';
		$page_data['page_title'] = get_phrase('add_section');
		$this->load->view('backend/index', $page_data);
        
    }
    function section_information($class_id = '',$function_name='')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
			
		$page_data['page_name']  	= 'section_information';
		$page_data['page_title'] 	= get_phrase('section_information'). " - ".get_phrase('class')." : ".$this->crud_model->get_class_name($class_id);
											
                
                $page_data['function_name']=$function_name; //this function will be called after clicking information list
		$page_data['class_id'] 	= $class_id;
                
		$this->load->view('backend/index', $page_data);
    }
    function section($param1 = '',$param2='',$param3='')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        

        
        if($param1=='add')
        {
            $data['class_id']    = $this->input->post('class_id');
            $data['dep_id']      = $this->input->post('dep_id');
            $data['sec_name']    = $this->input->post('name');
            $data['teacher_id']   = $this->input->post('teacher_id');
            
            $this->db->insert('section', $data);
      
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/add_section/' . $data['class_id'], 'refresh');
        }
        if($param1 == 'edit')
        {
            $class_id=$param3;
            $data['sec_name']        = $this->input->post('name');
            
            
            $this->db->where('sec_id', $param2);
            $this->db->update('section', $data);
            
            $this->crud_model->clear_cache();
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/section_information/' . $class_id, 'refresh');
        }
        if ($param1 == 'delete') {
            $class_id=$param3;
            $this->db->where('sec_id', $param2);
            $this->db->delete('section');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/section_information/' . $class_id, 'refresh');
        }
        
    }
    function get_sec_name($param1='',$param2='')
    {
        $data['class_id']=$param1;
        $data['dep_id']=$param2;
        $data1=  $this->load->view("backend/student/get_sec_name",$data);
        echo $data1;
    }
    function get_sub_name($class_id='',$dep_id='',$sec_id='')
    {

        
        $data['class_id']=$class_id;
        $data['dep_id']=$dep_id;
        $data['sec_id']=$sec_id;
        
//        echo $data['class_id'].' '.$data['dep_id'].' '.$data['sec_id'];
        $data1=  $this->load->view("backend/student/get_sub_name",$data);
//        echo $data['class_id'];
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /****MANAGE EXAMS*****/
    function exam($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert('exam', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/exam/', 'refresh');
        }
        if ($param1 == 'edit' && $param2 == 'do_update') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            
            $this->db->where('exam_id', $param3);
            $this->db->update('exam', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/exam/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam', array(
                'exam_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('exam_id', $param2);
            $this->db->delete('exam');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/exam/', 'refresh');
        }
        $page_data['exams']      = $this->db->get('exam')->result_array();
        $page_data['page_name']  = 'exam';
        $page_data['page_title'] = get_phrase('manage_exam');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /****MANAGE EXAM MARKS*****/
    function marks($exam_id = '', $class_id = '', $dep_id = '', $sec_id = '', $subject_id = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['dep_id']   = $this->input->post('dep_id');
            $page_data['sec_id']   = $this->input->post('sec_id');
            $page_data['subject_id'] = $this->input->post('sub_id');
            
            
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
                redirect(base_url() . 'index.php?student/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['dep_id'] . '/' . $page_data['sec_id'] . '/' . $page_data['subject_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'index.php?student/marks/', 'refresh');
            }
        }

        if ($this->input->post('operation') == 'update') {
            
           
            
            $students=$this->db->get_where('student' , array('class_id'=>$this->input->post('class_id'),'dep_id'=>$this->input->post('dep_id'),'sec_id'=>$this->input->post('sec_id')))->result_array();
                    foreach ($students as $row)
                    {
//                        $attendance_status  =   $this->input->post('status_' . $row['student_id']);
                            $student_id= $row['student_id'];
                            $mark_id=$this->input->post('mark_id_'.$student_id);
                        
                            $data['mark_obtained'] = $this->input->post('mark_obtained_'.$student_id);
                            $data['attendance']    = $this->input->post('attendance_'.$student_id);
                            $data['comment']       = $this->input->post('comment_'.$student_id);

                            $this->db->where('mark_id', $mark_id);
                            $this->db->update('mark', $data);
                    }

			$this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            
			 redirect(base_url() . 'index.php?student/marks/' . $this->input->post('exam_id') . '/'. $this->input->post('class_id') . '/'. $this->input->post('dep_id') . '/' . $this->input->post('sec_id') . '/' . $this->input->post('subject_id'), 'refresh');
            
            
            
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['dep_id']   = $dep_id;
        $page_data['sec_id']   = $sec_id;
        $page_data['subject_id'] = $subject_id;
        
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'marks';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    /****MANAGE GRADES*****/
    function grade($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            $this->db->insert('grade', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/grade/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            
            $this->db->where('grade_id', $param2);
            $this->db->update('grade', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/grade/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('grade', array(
                'grade_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('grade_id', $param2);
            $this->db->delete('grade');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/grade/', 'refresh');
        }
        $page_data['grades']     = $this->db->get('grade')->result_array();
        $page_data['page_name']  = 'grade';
        $page_data['page_title'] = get_phrase('manage_grade');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['class_id']   = $this->input->post('class_id');
            $data['dep_id']   = $this->input->post('dep_id');
            $data['sec_id']   = $this->input->post('sec_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['day'] = $this->input->post('day');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['time_start_min'] = $this->input->post('time_start_min');
            
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['time_end_min']   = $this->input->post('time_end_min');
            

            
            
            $this->db->insert('class_routine', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
        redirect(base_url() . 'index.php?student/add_cl', 'refresh');
//            $this->get_routine_info();
        }
        if ($param1 == 'do_update') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
             $data['time_start_min'] = $this->input->post('time_start_min');
             
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['time_end_min']   = $this->input->post('time_end_min');
            
            $data['day']        = $this->input->post('day');
            
            $this->db->where('class_routine_id', $param2);
            $this->db->update('class_routine', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/class_routine/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine', array(
                'class_routine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_routine_id', $param2);
            $this->db->delete('class_routine');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/class_routine/', 'refresh');
        }
        $page_data['page_name']  = 'class_routine';
        $page_data['page_title'] = get_phrase('manage_class_routine');
        $this->load->view('backend/index', $page_data);
        
    }
    function get_routine_info($class_id = '',$group_id='',$sec_id='')
    {

        
         $page_data['class_id'] = $this->session->userdata('class_id');
         $page_data['group_id'] = $this->session->userdata('dep_id');
         $page_data['sec_id']  = $this->session->userdata('sec_id');
         
       $page_data['page_name']  = 'class_routine';
//        $page_data['page_title'] = get_phrase('manage_class_routine');
       
       $group=array("No Group","Science","Commerce","Arts");
       $page_data['page_title'] 	= get_phrase('manage_class_routine'). " - ".
                                          $this->crud_model->get_class_name($page_data['class_id']). " <span class='glyphicon glyphicon-circle-arrow-right'></span> ".
                                          $group[$page_data['group_id']]. " <span class='glyphicon glyphicon-arrow-right sm'></span> ".
                                  
                        $this->crud_model->get_sec_name($page_data['sec_id']);
        $this->load->view('backend/index', $page_data);
    }
    function add_cl()
    {
        $page_data['page_name']  = 'add_class_routine';
        $page_data['page_title'] = get_phrase('add_class_routine');
        $this->load->view('backend/index', $page_data);
    }
    function check_routine()
    {
        echo $this->input->post('class_id');
        //echo "yes";
    }
    
    
    
    
    
    
    
    
    
    
    
    
	
	/****** DAILY ATTENDANCE *****************/
	function manage_attendance($class_id='',$group_id='',$sec_id)
	{
		if($this->session->userdata('student_login')!=1)
                    redirect('login' , 'refresh');
		

                
                $page_data['flag']=0;
                if($_POST['save_attendence'])
		{
			// Loop all the students of $class_id
                    //echo "adfsafafa";
                    $students	=	$this->db->get_where('student' , array('class_id'=>$class_id,'dep_id'=>$group_id,'sec_id'=>$sec_id))->result_array();
                    foreach ($students as $row)
                    {
                        $attendance_status  =   $this->input->post('status_' . $row['student_id']);
                        //echo $attendance_status;
                        //echo $this->input->post('date').' ';

                        $this->db->where('student_id' , $row['student_id']);
                        $this->db->where('date' , $this->input->post('date'));

                        $this->db->update('attendance' , array('status' => $attendance_status));
                    }
                        $page_data['flag']=1;
			$this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
			//redirect(base_url() . 'index.php?student/manage_attendance/'.$date.'/'.$month.'/'.$year.'/'.$class_id .'/'.$group_id.'/'.$sec_id, 'refresh');
		}else if($_POST['get_attendence'])
                {
                    $class_id=$this->input->post('class_id');
                    $group_id=$this->input->post('dep_id');
                    $sec_id=$this->input->post('sec_id');
                    $page_data['flag']=1;
                    
                }
                

                $d=$this->input->post('date');
                $page_data['date']=date("Y-m-d", strtotime($d));
                //echo $d;
		$page_data['class_id']                  =	$class_id;
                $page_data['group_id']                  =	$group_id;
                $page_data['sec_id']                    =	$sec_id;
                
		//echo ' '.$page_data['class_id'].' '.$group_id.' '.$sec_id;
		$page_data['page_name']                 =	'manage_attendance';
		$page_data['page_title']		=	get_phrase('manage_daily_attendance');
		$this->load->view('backend/index', $page_data);
	}
        function get_attendence_info($class_id = '',$group_id='',$sec_id='')
        {
            $page_data['class_id']   = $class_id;
            $page_data['group_id']   = $group_id;
            $page_data['sec_id']   = $sec_id;
         
            $page_data['page_name']  = 'manage_attendance';
            $page_data['page_title'] = get_phrase('manage_class_routine');
            $this->load->view('backend/index', $page_data);
        }
	function attendance_selector()
	{
		redirect(base_url() . 'index.php?student/manage_attendance/'.$this->input->post('class_id').'/'.$this->input->post('dep_id').'/'.$this->input->post('sec_id') , 'refresh');
	}
					
							
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    /******MANAGE BILLING / INVOICES WITH STATUS*****/
     function invoice($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['amount_paid']        = $this->input->post('amount_paid');
            $data['payment_method']        = $this->input->post('method');
            $data['due']                = $data['amount'] - $data['amount_paid'];
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->insert('invoice', $data);
            $invoice_id = $this->db->insert_id();

//            $data2['invoice_id']        =   $invoice_id;
//            $data2['student_id']        =   $this->input->post('student_id');
//            $data2['payment_type']      =  $this->input->post('method');
//            $data2['title']             =   $this->input->post('title');
//            $data2['description']       =   $this->input->post('description');
//            
//            $data2['amount']            =   $this->input->post('amount_paid');
//            $data2['timestamp']         =   strtotime($this->input->post('date'));

            //$this->db->insert('payment' , $data2);

            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            
            redirect(base_url() . 'index.php?student/invoice', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->where('invoice_id', $param2);
            $this->db->update('invoice', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            
            
            redirect(base_url() . 'index.php?student/invoice', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('invoice', array(
                'invoice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'take_payment') {
            $data['invoice_id']   =   $this->input->post('invoice_id');
            $data['student_id']   =   $this->input->post('student_id');
            $data['title']        =   $this->input->post('title');
            $data['description']  =   $this->input->post('description');
            $data['payment_type'] =   'income';
            $data['method']       =   $this->input->post('method');
            $data['amount']       =   $this->input->post('amount');
            $data['timestamp']    =   strtotime($this->input->post('timestamp'));
            $this->db->insert('payment' , $data);

            $data2['amount_paid']   =   $this->input->post('amount');
            $this->db->where('invoice_id' , $param2);
            $this->db->set('amount_paid', 'amount_paid + ' . $data2['amount_paid'], FALSE);
            $this->db->set('due', 'due - ' . $data2['amount_paid'], FALSE);
            $this->db->update('invoice');

            $this->session->set_flashdata('flash_message' , get_phrase('payment_successfull'));
            redirect(base_url() . 'index.php?student/invoice', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('invoice_id', $param2);
            $this->db->delete('invoice');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/invoice', 'refresh');
        }
        
        
        $page_data['page_name']  = 'invoice';
        $page_data['page_title'] = get_phrase('manage_invoice/payment');
        
        
        $this->db->order_by('creation_timestamp', 'asc');
        $page_data['invoices'] = $this->db->get_where('invoice',array('student_id'=>$this->session->userdata('student_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            $this->db->insert('book', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/book', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            
            $this->db->where('book_id', $param2);
            $this->db->update('book', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/book', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('book', array(
                'book_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('book_id', $param2);
            $this->db->delete('book');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/book', 'refresh');
        }
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            $this->db->insert('transport', $data);
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/transport', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            
            $this->db->where('transport_id', $param2);
            $this->db->update('transport', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/transport', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('transport', array(
                'transport_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('transport_id', $param2);
            $this->db->delete('transport');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/transport', 'refresh');
        }
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**********MANAGE DORMITORY / HOSTELS / ROOMS ********************/
    function dormitory($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            $this->db->insert('dormitory', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/dormitory', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            
            $this->db->where('dormitory_id', $param2);
            $this->db->update('dormitory', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/dormitory', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('dormitory', array(
                'dormitory_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('dormitory_id', $param2);
            $this->db->delete('dormitory');
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/dormitory', 'refresh');
        }
        $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
        $page_data['page_name']   = 'dormitory';
        $page_data['page_title']  = get_phrase('manage_dormitory');
        $this->load->view('backend/index', $page_data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['is_event']           = $this->input->post('is_event');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $data['date'] = date("Y/m/d");
            $this->db->insert('noticeboard', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
            redirect(base_url() . 'index.php?student/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['is_event']           = $this->input->post('is_event');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $data['date'] = date("Y/m/d");
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            
            
            redirect(base_url() . 'index.php?student/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('deleted'));
            redirect(base_url() . 'index.php?student/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->order_by('date','asc')->get('noticeboard')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    function notice_show($notice_id='')
    {
        $page_data['page_name']  = 'notice_show';
        $page_data['page_title'] = get_phrase('Notice Details');
        $page_data['notice_id']    = $notice_id;
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?student/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'index.php?student/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param1 == 'do_update') {
			 
			 $data['description'] = $this->input->post('system_name');
			 $this->db->where('type' , 'system_name');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('system_title');
			 $this->db->where('type' , 'system_title');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('address');
			 $this->db->where('type' , 'address');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('phone');
			 $this->db->where('type' , 'phone');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('paypal_email');
			 $this->db->where('type' , 'paypal_email');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('currency');
			 $this->db->where('type' , 'currency');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('system_email');
			 $this->db->where('type' , 'system_email');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('buyer');
			 $this->db->where('type' , 'buyer');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('system_name');
			 $this->db->where('type' , 'system_name');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('purchase_code');
			 $this->db->where('type' , 'purchase_code');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('language');
			 $this->db->where('type' , 'language');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('text_align');
			 $this->db->where('type' , 'text_align');
			 $this->db->update('settings' , $data);
                         
                         $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('successfully_added'));
			 
            redirect(base_url() . 'index.php?student/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?student/system_settings/', 'refresh');
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] 	= $param2;	
		}
		if ($param1 == 'update_phrase') {
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
			}
			redirect(base_url() . 'index.php?student/manage_language/edit_phrase/'.$language, 'refresh');
		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?student/manage_language/', 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?student/manage_language/', 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);
			
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?student/manage_language/', 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			
			redirect(base_url() . 'index.php?student/manage_language/', 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('backend/index', $page_data);	
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'index.php?student/backup_restore/', 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(base_url() . 'index.php?student/backup_restore/', 'refresh');
        }
        
        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('student_id', $this->session->userdata('student_id'));
            $this->db->update('student', $data);
            
            
            $this->session->set_flashdata('class_type', 'alert alert-info');
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('student', array(
                'student_id' => $this->session->userdata('student_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('student_id', $this->session->userdata('student_id'));
                $this->db->update('student', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('class_type', 'alert alert-info');
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('class_type', 'alert alert-danger');
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            
            
            
            redirect(base_url() . 'index.php?student/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('student', array(
            'student_id' => $this->session->userdata('student_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    function class_filter($title,$btn_name,$target_function)
    {
        
        
        if ($this->session->userdata('student_login') != 1)
            redirect('login', 'refresh');
			
        $page_data['page_name']  	= 'class_selector';
//        $page_data['page_title'] 	= get_phrase('section_information'). " - ".get_phrase('class')." : ".$this->crud_model->get_class_name($class_id);
        $page_data['page_title'] 	= get_phrase($title);;

        $page_data['btn_name']=$btn_name; //this function will be called after clicking information list
//        $page_data['class_id'] 	= $class_id;
        $page_data['target_function']=$target_function;

        $this->load->view('backend/index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    function staff_add()
	{
		if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'staff_add';
		$page_data['page_title'] = get_phrase('add_staff');
		$this->load->view('backend/index', $page_data);
	}
        
     function doc_upload($action='',$doc_id='',$user_id='',$role='')//$action : action(edit,delete)---- $param1 : document_id ----- $param2 : user_id
     {
         $acc_type=$this->input->post('acc_type');
         $data['role']=$this->input->post('role');
         $data['doc_type']=$this->input->post('doc_type');
         $data['user_id']=$this->input->post('user_id');
         $data['date']=date("Y/m/d");
         
         
        // echo $acc_type." ".$data['user_id']." ".$type;
         
         if ($action == 'upload') {
         
          $ext = basename(pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION));
          $data['file_name']=date('Y-m-d-H-i-s').'.'.$ext;
          $data['file_location']="uploads/doc/".$acc_type."/".$data['file_name']."";
//          $file_name="adfaf";
          //echo 'uploads/doc/'.$acc_type.'/'.$file_name.'';
            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$data['file_location']))
            {
                //echo "yes";
                $this->db->insert('document', $data);
                
                //echo $acc_type." ".$data['user_id']." ".$type;
            }
            
            redirect(base_url() . 'index.php?student/navigation/modal_document_upload/'.$data['user_id'].'/'.$data['role'], 'refresh');
         }
         if ($action == 'delete') {

             
            // echo $doc_id.' '.$user_id.' '.$role;
             $this->db->where('id', $doc_id);
             $this->db->delete('document');
             redirect(base_url() . 'index.php?student/navigation/modal_document_upload/'.$user_id.'/'.$role, 'refresh');
         }
//          move_uploaded_file($_FILES['userfile']['tmp_name'],'uploads/doc/'.$acc_type.'/ad fa.'.$ext);
     }
}
