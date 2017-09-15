<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_staff extends CI_Controller {
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
		$table['name'] = 'td_staff';
		$order_by[0] = array('field'=>'staff_id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage-staff-list-view',$data,true);
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
				'staff_name' => $this->input->post('staff_name'),
				'staff_phone' => $this->input->post('staff_phone'),
				'staff_email' => $this->input->post('staff_email'),
				'staff_address' => $this->input->post('staff_address'),
				'published' => 1
				);
				//print_r($fields);die;
				$table['name'] = 'td_staff';
				$data = $this->Common_model->save_data($table,$fields,'','staff_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','Staff successfully inserted');	
				redirect('masteradmin/manage_staff');
				}
			}
		}

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add-edit-staff-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################	

	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('staff_id'=>$id);
		$table['name'] = 'td_staff';
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
				'staff_name' => $this->input->post('staff_name'),
				'staff_phone' => $this->input->post('staff_phone'),
				'staff_email' => $this->input->post('staff_email'),
				'staff_address' => $this->input->post('staff_address')
				);
				$table['name'] = 'td_staff';
				$data = $this->Common_model->save_data($table,$fields,$id,'staff_id');
				if($data) {
				$this->session->set_flashdata('success_message','Staff successfully updated');	
				redirect('masteradmin/manage_staff');
				}
				else {
				redirect('masteradmin/manage_staff');	
				}
			}
		}	

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add-edit-staff-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################	

	function confirmDelete($id)
	{
		$table['name'] = 'td_staff';
		if($this->Common_model->delete_data($table,$id,'staff_id'))
		{
			$this->session->set_flashdata('success_message','Staff has been Deleted successfully.');
			redirect('masteradmin/manage_staff');
		}
		else
		{
			$this->session->set_flashdata('error_message','Some error occurred during delete! Please try again.');
			redirect('masteradmin/manage_staff');
		}
	}	

	##############################################################################################	

	function deactive($id)
	{
		$postdata = array(
							'published' => 0
						);
		$table['name'] = 'td_staff';
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'staff_id');	

		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Staff successfully deactivated');
				redirect(base_url().'masteradmin/manage_staff');
			}
		else
			{
				redirect(base_url().'masteradmin/manage_staff');
		}
	}


	function active($id)
	{
		$postdata = array(
							'published' => 1
						);
		$table['name'] = 'td_staff';	
		$deactive = $this->Common_model->save_data($table,$postdata,$id,'staff_id');
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Staff successfully activated');
				redirect(base_url().'masteradmin/manage_staff');
			}
		else
			{
				redirect(base_url().'masteradmin/manage_staff');
			}
	}
	
	##############################################################################################

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
		$this->form_validation->set_rules('staff_phone', 'Staff Phone', 'required');
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