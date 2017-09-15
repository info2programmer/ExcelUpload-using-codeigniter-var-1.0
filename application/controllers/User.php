<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Common_model'));
		
	}

	public function index()
	{

		$obj=$this->Common_model->getmaxidfromtblfilldata();

		// echo $this->db->last_query();
		// die;

		foreach ($obj as $key ) {
			$value=$key->data_id;
		}

		// echo $value;
		// die;

		if($value){
			$value=$value+1;
			$data['datacontent'] = $this->Common_model->loadentrydata($value);
		}		
		else{

			$fileiddata=$this->Common_model->getmindataid();
			// echo $fileiddata;die;
			$data['datacontent'] = $this->Common_model->loadentrydata($fileiddata);
		}

		$data['todayfillup'] =$this->Common_model->counttodaystotalentrybyagent(date('Y-m-d'));
		$data['overallfillup'] =$this->Common_model->counttodaystotalentrybyagent('');
		$this->load->view('layout-after-login',$data);
		
	}
	
	public function login()
	{
		$curr_time = date('H:i:s');
		if($this->input->post('mode')=='login')
		{
			$conditions = array(
				'agent_username'=>$this->input->post('username'),
				'agent_password'=>md5($this->input->post('password')),								
				'status'=>1,
				'login_time<='=>$curr_time,
				'logout_time>'=>$curr_time,
				'islogin' => 0
				);

			$table['name'] = 'tbl_agent';
			$record = $this->Common_model->find_data($table,'row','',$conditions);

			
			//This Section For Success Login
			if($record)
			{
				$sessiondata = array(
					'user_id' => $record->agent_id,
					'username' => $record->agent_username,
					'is_user_logged_in' => true
					);
				$this->session->set_userdata($sessiondata);
				if($this->session->userdata('is_user_logged_in') == 1)
				{	

					$fields = array(
						'ip_address'=> $this->input->ip_address(),
						'last_login' => date('Y-m-d g:i:s a'),
						'last_browser_used'=> $this->input->user_agent(),
						'islogin' => 1
						);
					$user_id = $record->agent_id;
					$table['name'] = 'tbl_agent';
					$record = $this->Common_model->save_data($table,$fields,$user_id,'agent_id');
					redirect(base_url().'user');
				}
			}
			else
			{	
				$username=$this->input->post('username');
				$singlerow=$this->db->query("SELECT * FROM tbl_agent WHERE agent_username='$username'")->row();
				
				if($singlerow->islogin==1)
				{
					$this->session->set_flashdata('error_message','User already logged in');
				}
				else{
					$this->session->set_flashdata('error_message','Invalid username or password or login time');
				}
				
				redirect(current_url());
			}
			
		}

		$this->load->view('layout-before-login');
	}
	
	function logout()
	{
		$fields = array(
			'islogin' => 0
			);
		$user_id = $this->session->userdata('user_id');
		$table['name'] = 'tbl_agent';
		$record = $this->Common_model->save_data($table,$fields,$user_id,'agent_id');
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function savedata()
	{
		$txtLoginId=$this->input->post('txtLoginId');
		$txtgivenname=$this->input->post('txtgivenname');
		$txtsurname=$this->input->post('txtsurname');
		$txtgender=$this->input->post('txtgender');
		$txtaddress=$this->input->post('txtaddress');
		$txtcity=$this->input->post('txtcity');
		$txtstate=$this->input->post('txtstate');
		$txtcountry=$this->input->post('txtcountry');
		$txtzip=$this->input->post('txtzip');
		$txtage=$this->input->post('txtage');
		$txtdob=$this->input->post('txtdob');
		$txtphn=$this->input->post('txtphn');
		$txtemail=$this->input->post('txtemail');
		$txtusername=$this->input->post('txtusername');
		$txtpassword=$this->input->post('txtpassword');
		$txtuseragent=$this->input->post('txtuseragent');
		$txtdomain=$this->input->post('txtdomain');
		$txtnatid=$this->input->post('txtnatid');
		$txtcctype=$this->input->post('txtcctype');
		$txtccnumber=$this->input->post('txtccnumber');
		$txtcvv2=$this->input->post('txtcvv2');
		$txtccexpire=$this->input->post('txtccexpire');
		$txtoccupation=$this->input->post('txtoccupation');
		$txtcompany=$this->input->post('txtcompany');
		$txtwumtcn=$this->input->post('txtwumtcn');
		$txtmgmtcn=$this->input->post('txtmgmtcn');
		$txtups=$this->input->post('txtups');
		$txtDataId=$this->input->post('txtDataId');
		$txtAssigmentId=$this->input->post('txtAssigmentId');
		$txtGroupId=$this->input->post('txtGroupId');


		$array_ans=array(
			'login_id' => $txtLoginId,
			'given_name' => $txtgivenname,
			'surname' => $txtsurname,
			'surname' => $txtgender,
			'street_address' => $txtaddress,
			'city' => $txtcity,
			'state' => $txtstate,
			'country' => $txtcountry,
			'zip_code' => $txtzip,
			'age' => $txtage,
			'birthday' => $txtdob,
			'telephone_number' => $txtphn,
			'email' => $txtemail,
			'username' => $txtusername,
			'password' => $txtpassword,
			'user_agent' => $txtuseragent,
			'domain' => $txtdomain,
			'national_id' => $txtnatid,
			'cc_type' => $txtcctype,
			'ccv2' => $txtcvv2,
			'ccexpires' => $txtccexpire,
			'cc_number' => $txtccnumber,
			'occupation' => $txtoccupation,
			'company' => $txtcompany,
			'western_union_mtcn' => $txtwumtcn,
			'money_gram_mtcn' => $txtmgmtcn,
			'ups' => $txtups
		);

		$array_qus=$this->Common_model->getexceldatabydataid($txtDataId);

		// $result=;
		$error_count=0;
		$error_count=count(array_diff_assoc($array_ans,$array_qus));
		// // foreach (array_diff_assoc($array_ans,$array_qus) as $key) {
		// // 	++$error_count;
		// // }
		// // echo "<pre>";
		// // print_r(array_diff_assoc($array_ans,$array_qus));
		// // echo $error_count;
		// die;

		$object = array(
			'data_id' => $txtDataId, 
			'assigment_id' => $txtAssigmentId,
			'agent_id' =>  $this->session->userdata('user_id'),
			'gropu_id' => $txtGroupId,
			'login_id' => $txtLoginId,
			'given_name' => $txtgivenname,
			'surname' => $txtsurname,
			'surname' => $txtgender,
			'street_address' => $txtaddress,
			'city' => $txtcity,
			'state' => $txtstate,
			'country' => $txtcountry,
			'zip_code' => $txtzip,
			'age' => $txtage,
			'birthday' => $txtdob,
			'telephone_number' => $txtphn,
			'email' => $txtemail,
			'username' => $txtusername,
			'password' => $txtpassword,
			'user_agent' => $txtuseragent,
			'domain' => $txtdomain,
			'national_id' => $txtnatid,
			'cc_type' => $txtcctype,
			'ccv2' => $txtcvv2,
			'ccexpires' => $txtccexpire,
			'cc_number' => $txtccnumber,
			'occupation' => $txtoccupation,
			'company' => $txtcompany,
			'western_union_mtcn' => $txtwumtcn,
			'money_gram_mtcn' => $txtmgmtcn,
			'ups' => $txtups,
			'status' => 1,
			'save_date' => date('Y-m-d'),
			'save_time' => date('h:i:sa'),
			'error_count' => $error_count
		);
		
		$table['name'] ='tbl_filldata';
		$data=$this->Common_model->save_data($table,$object,'','record_id');

		// $arrayans




		//This Section For change status in  data For Entry table

		$field=array('status' => 1);
		$table1['name'] ='tbl_dataforentry';
		$data1=$this->Common_model->save_data($table1,$field,$txtDataId,'data_id');

		$this->session->set_flashdata('success_log', 'Data Added Successfully');
		redirect('user','refresh');
	}

}

