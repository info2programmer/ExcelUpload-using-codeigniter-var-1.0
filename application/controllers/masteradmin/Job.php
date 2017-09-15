<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

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
		$data['postjob_data'] = $this->Common_model->getjobassigment();

		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_post_job_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);	
	}

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
				$ddlAsigment=$this->input->post('ddlAsigment');
				$ddlGroup=$this->input->post('ddlGroup');
				$ddlAgent=$this->input->post('ddlAgent');

				
				$imge = $_FILES["fileImage"]["name"];
				if($imge == '')
				{
					$this->session->set_flashdata('error_message','Please upload an excel sheet');	
					redirect(current_url());
				}
				else
				{
					$imageFileType = pathinfo($imge, PATHINFO_EXTENSION);			
					if($imageFileType != "xls")
					{					
						$this->session->set_flashdata('error_message', 'Sorry, only xls files are allowed');
						redirect(current_url());
					}
					$image =time().$imge;
					$temp = $_FILES["fileImage"]["tmp_name"];
					$image_path = 'uploads/excel/';
					move_uploaded_file($temp,$image_path.$image);
				}
				ini_set('memory_limit','1200M');
				$file = 'uploads/excel/'.$image;
			//load the excel library
				$this->load->library('export');
			//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
			//get only the Cell Collection
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
				foreach ($cell_collection as $cell) 
				{
					$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
					$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
					if ($row == 1) {
						$header[$row][$column] = $data_value;
					} else {
						$arr_data[$row][$column] = $data_value;
					}
				}
			//send the data in an array format
				$data['header'] = $header;
				$data1 = $arr_data;
			//echo '<pre>';print_r($data1);die;
				foreach($data1 as $dta)
				{		
					$gender = $dta['A'];
					$name = $dta['B'];
					$surname = $dta['C'];
					$streetaddress = $dta['D'];
					$city = $dta['E'];
					$statefull = $dta['F'];
					$zipcode = $dta['G'];
					$countryfull = $dta['H'];
					$emailaddress = $dta['I'];
					$username = $dta['J'];
					$password = $dta['K'];
					$useragent = $dta['L'];
					$phonenumber = $dta['M'];
					$birthday = $dta['N'];
					$age = $dta['O'];
					$cctype = $dta['P'];
					$ccnumber = $dta['Q'];
					$cvv2 = $dta['R'];
					$ccexpire = $dta['S'];
					$nationalid = $dta['T'];
					$ups = $dta['U'];
					$westernunionMTCN = $dta['V'];
					$moneygramMTCN = $dta['W'];
					$occupation = $dta['X'];
					$company = $dta['Y'];
					$domain = $dta['Z'];
					$loginid = $dta['AA'];

					$fields=array(
						'assigment_id' => $ddlAsigment,
						'agent_id' => $ddlAgent,
						'gropu_id' => $ddlGroup,
						'login_id' => $loginid,
						'given_name' => $name,
						'surname' => $surname,
						'gender' => $gender,
						'street_address' => $streetaddress,
						'city' => $city,
						'state' => $statefull,
						'country' => $countryfull,
						'zip_code' => $zipcode,
						'age' => $age,
						'birthday' => $birthday,
						'telephone_number' => $phonenumber,
						'email' => $emailaddress,
						'username' => $username,
						'password' => $password,
						'user_agent' => $useragent,
						'domain' => $domain,
						'national_id' => $nationalid,
						'cc_type' => $cctype,
						'ccv2' => $cvv2,
						'ccexpires' => $ccexpire,
						'cc_number' => $ccnumber,
						'occupation' => $occupation,
						'company' => $company,
						'western_union_mtcn' => $westernunionMTCN,
						'money_gram_mtcn' => $moneygramMTCN,
						'ups' => $ups,
						'status' => 0,
						'excel_file_name' => $image
					);
					$table['name'] ='tbl_dataforentry';
					$data=$this->Common_model->save_data($table,$fields,'','data_id');

					
					// $this->Common_model->save_data()

				// //echo $form_no;die;			
				// 	$fields = array(
				// 		'verify' => 1
				// 		);

				// 	$table['name'] = 'arts_general';
				// 	//$data = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");
					
				// 	$data = $this->db->query("update admission set verify=1 where form_no='$form_no'");
				// 	$data1 = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");
					
				}
				$url=base_url()."masteradmin/job";
				$this->session->set_flashdata('success_message', 'Job Post Successfully');
				redirect($url,'refresh');	

			}
		}

		$data['row'] = array();
		$data['head'] = $this->load->view('masteradmin/elements/head','',true);
		$data['header'] = $this->load->view('masteradmin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
		$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
		// $data['grouplist'] = $this->Common_model->getgroup();
		$data['assigmentlist'] = $this->Common_model->getAssigmet();
		$data['agentlist'] = $this->Common_model->getAgent();
		$data['grouplist'] = $this->Common_model->getgroup();
		$data['maincontent']=$this->load->view('masteradmin/maincontents/job_assign_view',$data,true);
		$this->load->view('masteradmin/layout-after-login',$data);
	}

	// This function To get agent by group id
	public function getagentbygroupid($id)
	{
		$results=$this->Common_model->getagentbyid($id);
		echo "<option value='' selected='selected' hidden> Select Agent</option>";
		foreach ($results as $result) {
			echo "<option value='".$result->agent_id."'>".$result->agent_name."</option>";
		}
	}

	function form_validate($pass)
	{
		//      'group_id' => $this->input->post('ddlGroup'),
		// 		'agent_name' => $this->input->post('txtAgentName'),
		// 		'agent_dob' => $this->input->post('txtDateOfBirth'),
		// 		'agent_email' => $this->input->post('txtAgentEmail'),
		// 		'agent_phone' => $this->input->post('txtAgentPhoneNumber'),
		// 		'agent_username' => $this->input->post('txtUserName'),
		// 		'agent_password' => $this->input->post('txtPassword'),

		$this->load->library('form_validation');
		$this->form_validation->set_rules('ddlAsigment', 'Assigment', 'required|trim');
		$this->form_validation->set_rules('ddlGroup', 'Group', 'required|trim');
		$this->form_validation->set_rules('ddlAgent', 'Agent', 'required|trim');
		
		if ($this->form_validation->run() == FALSE)
		{
			return FALSE;
		}
		else
		{
			return true;
		}
	}


	//This Function For Error Checking
	


}

/* End of file Job.php */
/* Location: ./application/controllers/masteradmin/Job.php */