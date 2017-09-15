<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_department extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());
		}		
		$this->load->model(array('Common_model'));
		date_default_timezone_set('Asia/Kolkata'); 
	}

	################################################################

	function index()
	{
		$table['name'] = 'td_department';
		$data['rows'] = $this->Common_model->find_data($table,'array');

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage-department-list-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################	

	function add()
	{	

		$data['action'] = 'Add';
		
		$data['row'] = array();

		if($this->input->post('mode')=='tab')
		{
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$fields = array(
				'department_name' => $this->input->post('department_name'),
				'published' => 1
				);
				//print_r($fields);die;
				$table['name'] = 'td_department';
				$data = $this->Common_model->save_data($table,$fields,'','department_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Department successfully inserted');	
				redirect('masteradmin/manage_department');
				}
			}
		}

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add-edit-department-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################	

	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('department_id'=>$id);
		$table['name'] = 'td_department';
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
				'department_name' => $this->input->post('department_name'),
				'published' => 1
				);
				$table['name'] = 'td_department';
				$data = $this->Common_model->save_data($table,$fields,$id,'department_id');
				if($data) {
				$this->session->set_flashdata('success_message','Department successfully updated');	
				redirect('masteradmin/manage_department');
				}
				else {
				redirect('masteradmin/manage_department');	
				}
			}
		}	

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add-edit-department-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################	

	function confirmDelete($id)
	{
		$table['name'] = 'td_department';
		if($this->Common_model->delete_data($table,$id,'department_id'))
		{
			$this->session->set_flashdata('success_message','Department has been Deleted successfully.');
			redirect('masteradmin/manage_department');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('masteradmin/manage_department');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_department';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'department_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Department successfully deactivated');
				redirect(base_url().'masteradmin/manage_department');
			}
		else
			{
				redirect(base_url().'masteradmin/manage_department');
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_department';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'department_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Department successfully activated');
				redirect(base_url().'masteradmin/manage_department');
			}
		else
			{
				redirect(base_url().'masteradmin/manage_department');
			}
	}
	
	##############################################################################################

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('department_name', 'Department Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}	

	##################################################################################################	

}