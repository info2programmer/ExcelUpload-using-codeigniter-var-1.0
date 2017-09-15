<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assigment extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());
		}		
		$this->load->model(array('Common_model'));
		date_default_timezone_set('Asia/Kolkata'); 
	}

	//This Funcation To Load Assigment View
	public function index()
	{
		$table['name'] = 'tbl_assigment';
		$order_by[0] = array('field'=>'assigment_id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/assigment_main_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);	
	}


	//This Function To Load create Assigment from view
	public function createassigment()
	{
		$data['action'] = 'Add';

		//This Is For Post value
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'assigment_name' => $this->input->post('txtAssigmentName'),
				'from_date' => $this->input->post('txtFromDate'),
				'to_date' => $this->input->post('txtTodate'),
				'status' => 1,
				'date_of_create' => date('Y/m/d')
				);
				//print_r($fields);die;
				$table['name'] = 'tbl_assigment';
				$data = $this->Common_model->save_data($table,$fields,'','staff_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Assigment successfully inserted');	
				redirect('masteradmin/assigment');
				}
			}
		}

		$data['row'] = array();
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_assigmet_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	//This Function to store assigment data
	// public function add_assigment()
	// {
	// 	//Get All data

	// 	$txtAssigmentName = $this->input->post('txtAssigmentName');
	// 	$txtAssigmentName = $this->input->post('txtAssigmentName');
	// 	$txtAssigmentName = $this->input->post('txtAssigmentName');
	// }


	//This function for form validation
	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtAssigmentName', 'Assigment Name', 'required|trim');
		$this->form_validation->set_rules('txtFromDate', 'From Date', 'required|trim');
		$this->form_validation->set_rules('txtTodate', 'To Date', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}


	//This function For Edit Assigment
	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('assigment_id'=>$id);
		$table['name'] = 'tbl_assigment';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{			
				$fields = array(
				'assigment_name' => $this->input->post('txtAssigmentName'),
				'from_date' => $this->input->post('txtFromDate'),
				'to_date' => $this->input->post('txtTodate'),
				'status' => 1,
				'date_of_create' => date('Y/m/d')
				);
				$table['name'] = 'tbl_assigment';
				$data = $this->Common_model->save_data($table,$fields,$id,'assigment_id');
				if($data) {
				$this->session->set_flashdata('success_message','Assigment successfully updated');	
				redirect('masteradmin/assigment');
				}
				else {
				redirect('masteradmin/assigment');	
				}
			}
		}
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_assigmet_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}


	//This Function To Change Assigment Status
	public function changestatus($assigment_id,$status)
	{
		$postdata = array(
							'status' => $status
						);
		$table['name'] = 'tbl_assigment';
		$status = $this->Common_model->save_data($table,$postdata,$assigment_id,'assigment_id');	

		if($status)
			{	
				switch ($status) {
					case 0:
						$msg="Assigment successfully deactivated.";
						break;

					case 1:
						$msg="Assigment successfully activated.";
						break;
					
					default:
						# code...
						break;
				}
				$this->session->set_flashdata('success_message',$msg);
				redirect(base_url().'masteradmin/assigment');
			}
		else
			{
				redirect(base_url().'masteradmin/assigment');
		}
	}

}

/* End of file Assigment.php */
/* Location: ./application/controllers/masteradmin/Assigment.php */