<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

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
		$table['name'] = 'tbl_agent';
		$order_by[0] = array('field'=>'agent_id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_agent_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);	
	}


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
				'agent_name' => $this->input->post('txtAgentName'),
				'agent_dob' => $this->input->post('txtDateOfBirth'),
				'agent_email' => $this->input->post('txtAgentEmail'),
				'agent_phone' => $this->input->post('txtAgentPhoneNumber'),
				'agent_username' => $this->input->post('txtUserName'),
				'agent_password' => md5($this->input->post('txtPassword')),
				'login_time' => $this->input->post('txtLoginTime'),
				'logout_time' => $this->input->post('txtLogoutTime'),
				'status' => 1
				);
				//print_r($fields);die;
				$table['name'] = 'tbl_agent';
				$data = $this->Common_model->save_data($table,$fields,'','staff_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Agent successfully inserted');	
				redirect('masteradmin/agent');
				}
			}
		}

		$data['row'] = array();
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['grouplist'] = $this->Common_model->getgroup();
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_agent_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	//This Function to store agent data
	// public function add_agent()
	// {
	// 	//Get All data

	// 	$txtagentName = $this->input->post('txtagentName');
	// 	$txtagentName = $this->input->post('txtagentName');
	// 	$txtagentName = $this->input->post('txtagentName');
	// }


	//This function for form validation
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
		$this->form_validation->set_rules('ddlGroup', 'Group Id', 'required|trim');
		$this->form_validation->set_rules('txtAgentName', 'Agent Name', 'required|trim');
		$this->form_validation->set_rules('txtDateOfBirth', 'Date Of Birth', 'required|trim');
		$this->form_validation->set_rules('txtAgentEmail', 'Agent Email', 'required|trim');
		$this->form_validation->set_rules('txtAgentPhoneNumber', 'Agent Phone Number', 'required|trim');
		if($pass)
		{
			$this->form_validation->set_rules('txtUserName', 'Agent UserName', 'required|trim|is_unique[tbl_agent.agent_username]');
			$this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
		}
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}


	//This function For Edit agent
	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('agent_id'=>$id);
		$table['name'] = 'tbl_agent';
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate($pass=false) == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{	if(!empty($this->input->post('txtPassword'))){
					$fields = array(
					'group_id' => $this->input->post('ddlGroup'),
					'agent_name' => $this->input->post('txtAgentName'),
					'agent_dob' => $this->input->post('txtDateOfBirth'),
					'agent_email' => $this->input->post('txtAgentEmail'),
					'agent_phone' => $this->input->post('txtAgentPhoneNumber'),
					'agent_password' => md5($this->input->post('txtPassword')),
					'login_time' => $this->input->post('txtLoginTime'),
					'logout_time' => $this->input->post('txtLogoutTime'),
					'status' => 1
					);
				}
				else{
					$fields = array(
					'group_id' => $this->input->post('ddlGroup'),
					'agent_name' => $this->input->post('txtAgentName'),
					'agent_dob' => $this->input->post('txtDateOfBirth'),
					'agent_email' => $this->input->post('txtAgentEmail'),
					'agent_phone' => $this->input->post('txtAgentPhoneNumber'),
					'login_time' => $this->input->post('txtLoginTime'),
					'logout_time' => $this->input->post('txtLogoutTime'),
					'status' => 1
					);
				}
				$table['name'] = 'tbl_agent';
				$data = $this->Common_model->save_data($table,$fields,$id,'agent_id');
				if($data) {
				$this->session->set_flashdata('success_message','Agent successfully updated');	
				redirect('masteradmin/agent');
				}
				else {
				redirect('masteradmin/agent');	
				}
			}
		}
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['grouplist'] = $this->Common_model->getgroup();
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_agent_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}


	//This Function To Change agent Status
	public function changestatus($agent_id,$status)
	{
		$postdata = array(
							'status' => $status
						);
		$table['name'] = 'tbl_agent';
		$status = $this->Common_model->save_data($table,$postdata,$agent_id,'agent_id');	

		if($status)
			{	
				switch ($status) {
					case 0:
						$msg="Agent successfully deactivated.";
						break;

					case 1:
						$msg="Agent successfully activated.";
						break;
					
					default:
						# code...
						break;
				}
				$this->session->set_flashdata('success_message',$msg);
				redirect(base_url().'masteradmin/agent');
			}
		else
			{
				redirect(base_url().'masteradmin/agent');
		}
	}

	//This Function to Active Credential user
	public function loginactive($agentId)
	{
		$this->Common_model->activecredential($agentId);
		$this->session->set_flashdata('success_message', 'Credential active successfully');
		redirect('masteradmin/agent');
	}

}

/* End of file Agent.php */
/* Location: ./application/controllers/masteradmin/Agent.php */