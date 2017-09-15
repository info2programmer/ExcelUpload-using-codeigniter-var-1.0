<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Point extends CI_Controller {
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

	public function index()
	{
		
		$data['rows'] = $this->Common_model->getpoints();

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_point_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);		
	}

	//This function To insert points and load add_point_view
	//This Function To Load create agent from view
	public function create()
	{
		$data['action'] = 'Add';

		//This Is For Post value
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate($pass=true) == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'group_id' => $this->input->post('ddlGroup'),
				'assigmnet_id' => $this->input->post('ddlAsigment'),
				'point' => $this->input->post('txtPoints'),
				'publist_on' => date('Y/m/d h:i:sa')
				);
				//print_r($fields);die;
				$table['name'] = 'tbl_group_point';
				$data = $this->Common_model->save_data($table,$fields,'','point_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Points Added Successfully');	
				redirect('masteradmin/point');
				}
			}
		}

		$data['row'] = array();
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['assigmentlist'] = $this->Common_model->getAssigmet();
		$data['agentlist'] = $this->Common_model->getAgent();
		$data['grouplist'] = $this->Common_model->getgroup();
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_point_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}


	//This Function For Form Validation
	function form_validate($pass)
	{
		// 'group_id' => $this->input->post('ddlGroup'),
		// 		'agent_name' => $this->input->post('txtAgentName'),
		// 		'agent_dob' => $this->input->post('txtDateOfBirth'),
		// 		'agent_email' => $this->input->post('txtAgentEmail'),
		// 		'agent_phone' => $this->input->post('txtAgentPhoneNumber'),
		// 		'agent_username' => $this->input->post('txtUserName'),
		// 		'agent_password' => $this->input->post('txtPassword'),

		$this->load->library('form_validation');
		$this->form_validation->set_rules('ddlAsigment', 'Assigment', 'required|trim');
		$this->form_validation->set_rules('ddlGroup', 'Group', 'required|trim');
		$this->form_validation->set_rules('txtPoints', 'Points', 'required|trim');
		
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}

}

/* End of file Point.php */
/* Location: ./application/controllers/masteradmin/Point.php */