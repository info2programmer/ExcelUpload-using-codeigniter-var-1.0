<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

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
		$table['name'] = 'tbl_group';
		$order_by[0] = array('field'=>'group_id','type'=>'desc');
		$data['rows'] = $this->Common_model->find_data($table,'array','','','','','',$order_by);

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_group_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);	
	}

	//This Function To Load create group from view
	public function create()
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
				'group_name' => $this->input->post('txtGroupName'),
				'status' => 1,
				'create_at' => date('Y/m/d h:i:sa'),
				'modify_at' => null
				);
				//print_r($fields);die;
				$table['name'] = 'tbl_group';
				$data = $this->Common_model->save_data($table,$fields,'','group_id');
				if($data)
				{
				$this->session->set_flashdata('success_message','GROUP successfully inserted');	
				redirect('masteradmin/group');
				}
			}
		}

		$data['row'] = array();
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_group_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	//This Function to store group data
	// public function add_group()
	// {
	// 	//Get All data

	// 	$txtgroupName = $this->input->post('txtgroupName');
	// 	$txtgroupName = $this->input->post('txtgroupName');
	// 	$txtgroupName = $this->input->post('txtgroupName');
	// }


	//This function for form validation
	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtGroupName', 'Group Name', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}


	//This function For Edit group
	function edit($id)
	{
		$data['action'] = 'Edit';		

		$conditions=array('group_id'=>$id);
		$table['name'] = 'tbl_group';
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
				'group_name' => $this->input->post('txtGroupName'),
				'modify_at' => date('Y/m/d h:i:sa')
				);
				$table['name'] = 'tbl_group';
				$data = $this->Common_model->save_data($table,$fields,$id,'group_id');
				if($data) {
				$this->session->set_flashdata('success_message','Group successfully updated');	
				redirect('masteradmin/group');
				}
				else {
				redirect('masteradmin/group');	
				}
			}
		}
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add_edit_group_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}


	//This Function To Change Group Status
	public function changestatus($group_id,$status)
	{
		$postdata = array(
							'status' => $status
						);
		$table['name'] = 'tbl_group';
		$status = $this->Common_model->save_data($table,$postdata,$group_id,'group_id');	

		if($status)
			{	
				switch ($status) {
					case 0:
						$msg="Group successfully deactivated.";
						break;

					case 1:
						$msg="Group successfully activated.";
						break;
					
					default:
						# code...
						break;
				}
				$this->session->set_flashdata('success_message',$msg);
				redirect(base_url().'masteradmin/group');
			}
		else
			{
				redirect(base_url().'masteradmin/group');
		}
	}


}

/* End of file Group.php */
/* Location: ./application/controllers/masteradmin/Group.php */