<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->uri->segment('3')=='login')
		{ }
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}
		
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['footer']= $this->load->view('masteradmin/elements/footer',$data,true);
		$data['left_sidebar']=$this->load->view('masteradmin/elements/left-sidebar',$data,true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/home',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	######################################################################################

	public function login()
	{
		if($this->input->post('mode')=='login')
		{
			
			if($this->form_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
						$conditions = array(
									'username'=>$this->input->post('username'),
									'password'=>md5($this->input->post('password')),								
									'published'=>1
									);

						$table['name'] = 'td_users';
						$record = $this->Common_model->find_data($table,'row','',$conditions);
						if($record)
						{
							$sessiondata = array(
												'user_id' => $record->id,
												'username' => $record->username,
												'is_admin_logged_in' => true
												);
							$this->session->set_userdata($sessiondata);
							if($this->session->userdata('is_admin_logged_in') == 1)
							{	
								$fields = array(
												'ip_address'=> $this->input->ip_address(),
												'last_login' => date('Y-m-d g:i:s a'),
												'last_browser_used'=> $this->input->user_agent()
											   );
								$user_id = $record->id;
								$table['name'] = 'td_users';
								$record = $this->Common_model->save_data($table,$fields,$user_id,'id');
								redirect(base_url().'masteradmin/user');
							}
						}
						else
						{	
							$this->session->set_flashdata('error_message','Invalid username or password');
							redirect(current_url());
						}
			}
		}
		$this->load->view('masteradmin/layout-before-login');
	}

	#####################################################################################

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."masteradmin/");
	}	

	#####################################################################################

	function form_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}

	#####################################################################################
	
	function change_password()
	{
		if($this->input->post('mode')=='change_pass')
		{
			if($this->password_validate() == FALSE)
			{
				$data['error_message']=validation_errors();
			}
			else
			{
				$postdata_ch_pass = array(
										'password'=>md5($this->input->post('new_password')),
										'password_original'=>$this->input->post('new_password')
										);

				if($this->session->userdata('user_id'))
				{
					$user_id = $this->session->userdata('user_id');
				}
				$table['name'] = 'td_users';
				$success = $this->Common_model->save_data($table,$postdata_ch_pass,$user_id,'id');
				if($success)
				{
					$this->session->set_flashdata('success_message','Password changed successfully');
					redirect(base_url()."masteradmin/user/logout");
				}
				else
				{	
					$this->session->set_flashdata('error_message','Invalid username or password! Please try again.');
					redirect(current_url());
				}
			}
		}

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['left_sidebar']=$this->load->view('masteradmin/elements/left-sidebar',$data,true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/add-edit-password-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}
	function password_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_existing_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|callback_old_password_same');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}
	function existing_password($str)
	{
		$old_password =  md5($str);	
		if($this->session->userdata('user_id'))
		{
		$user_id1 = $this->session->userdata('user_id');
		}
		$table['name'] = 'td_users';
		$conditions = array('id'=>$user_id1);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		$existing_password = $data['row']->password;
		if ($existing_password != $old_password)
		{
			$this->form_validation->set_message('existing_password', 'Old Password is incorrect');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	
	function old_password_same($str)
	{
		$new_password =  md5($str);
		if($this->session->userdata('user_id'))
		{
		$user_id1 = $this->session->userdata('user_id');
		}	

		$table['name'] = 'td_users';
		$conditions = array('id'=>$user_id1);
		$data['row'] = $this->Common_model->find_data($table,'row','',$conditions);
		$existing_password = $data['row']->password;
		if ($existing_password == $new_password)
		{
			$this->form_validation->set_message('old_password_same', 'Please choose other from existing password');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	######################################################################################
	public function company_setting()
	{
		$data['row'] = $this->db->query("select * from td_company_setting")->row();
		
		if($this->input->post('mode')=='tab')
		{
			$field = array(
							'company_name'=>$this->input->post('company_name'),
							'company_address'=>$this->input->post('company_address'),
							'state_ut'=>$this->input->post('state_ut'),
							'pin_code'=>$this->input->post('pin_code'),							
							'email_id'=>$this->input->post('email_id'),
							'phn_number'=>$this->input->post('phn_number'),
							'gst_no'=>$this->input->post('gst_no'),
							'state_code'=>$this->input->post('state_code'),
							'pan_no'=>$this->input->post('pan_no'),
							);
			$table['name'] = 'td_company_setting';	
			$data['row'] = $this->Common_model->save_data($table,$field,1,'company_setting_id');
			$this->session->set_flashdata('success_message','Company setting successfully updated');	
			redirect('masteradmin/user/company_setting');	
		}
		
		
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['left_sidebar']=$this->load->view('masteradmin/elements/left-sidebar',$data,true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/company-setting-view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}
	######################################################################################

	
	
}