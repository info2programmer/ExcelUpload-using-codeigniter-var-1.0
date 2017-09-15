<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_verification extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_admin_logged_in')!=1)
		{
			redirect(base_url());	
		}		
		$this->load->model(array('Common_model'));
	}
	################################################################
	function general()
	{
		$data['rows'] = $this->db->query("select * from admission where pay_status=1 and stream=1")->result();
		//echo $data['rows']->num_rows();
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-general-verification-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	######################################################################################	
	function general_add()
	{	
		$data['action'] = 'Add';
		if($this->input->post('mode')=='tab')
		{
			$imge = $_FILES["slider_image"]["name"];
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
					$temp = $_FILES["slider_image"]["tmp_name"];
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
				$form_no = $dta['A'];
				//echo $form_no;die;			
					$fields = array(
						'verify' => 1
						);
							
					$table['name'] = 'arts_general';
					//$data = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");
					
					$data = $this->db->query("update admission set verify=1 where form_no='$form_no'");
					$data1 = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");
					
			}
			if($data)
			{					
				$this->session->set_flashdata('success_message','Candidates successfully verified');	
				redirect('admin/manage_verification/general');					
			}
			else
			{
				redirect('admin/manage_verification/general');
			}			
		}
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-general-verification-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	##############################################################################################	
	function general_deactive($id)
	{
		$postdata = array(
							'verify' => 0
						);
							
		$data = $this->db->query("update admission set verify=1 where id='$id'");
		$admission_detail = $this->db->query("select * from admission where id='$id'")->row();
		$form_no = $admission_detail->form_no;
		$deactive = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");	
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Candidate successfully deactivated');
				redirect(base_url().'index.php/admin/manage_verification/general');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_verification/general');
		}
	}
	function general_active($id)
	{
		$postdata = array(
							'verify' => 1
						);
		$data = $this->db->query("update admission set verify=1 where id='$id'");
		$admission_detail = $this->db->query("select * from admission where id='$id'")->row();
		$form_no = $admission_detail->form_no;
		$deactive = $this->db->query("update arts_general set verify=1 where form_no='$form_no'");
		
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Candidate successfully activated');
				redirect(base_url().'index.php/admin/manage_verification/general');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_verification/general');
			}
	}
	##############################################################################################
	
	function honours()
	{
		$data['rows'] = $this->db->query("select * from admission where pay_status=1 and stream=2")->result();
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/manage-honours-verification-list-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	######################################################################################	
	function honours_add()
	{	
		$data['action'] = 'Add';
		if($this->input->post('mode')=='tab')
		{
			$imge = $_FILES["slider_image"]["name"];
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
					$temp = $_FILES["slider_image"]["tmp_name"];
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
				$form_no = $dta['A'];
				//echo $form_no;die;				
					$fields = array(
						'verify' => 1
						);	
					
					$data = $this->db->query("update admission set verify=1 where form_no='$form_no'");
					$data1 = $this->db->query("update arts_honours set verify=1 where form_no='$form_no'");
			}
			if($data)
			{					
				$this->session->set_flashdata('success_message','Candidates successfully verified');	
				redirect('admin/manage_verification/honours');					
			}
			else
			{
				redirect('admin/manage_verification/honours');
			}			
		}
		$data['head'] = $this->load->view('admin/elements/head','',true);
		$data['header'] = $this->load->view('admin/elements/header','',true);
		$data['left_sidebar'] = $this->load->view('admin/elements/left-sidebar','',true);
		$data['maincontent']=$this->load->view('admin/maincontents/add-edit-honours-verification-view',$data,true);
		$this->load->view('admin/layout-after-login',$data);
	}
	#########################################################################################
	function honours_deactive($id)
	{
		$postdata = array(
							'verify' => 0
						);
		$data = $this->db->query("update admission set verify=1 where id='$id'");
		$admission_detail = $this->db->query("select * from admission where id='$id'")->row();
		$form_no = $admission_detail->form_no;
		$deactive = $this->db->query("update arts_honours set verify=1 where form_no='$form_no'");
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Candidate successfully deactivated');
				redirect(base_url().'index.php/admin/manage_verification/honours');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_verification/honours');
		}
	}
	function honours_active($id)
	{
		$postdata = array(
							'verify' => 1
						);
		$data = $this->db->query("update admission set verify=1 where id='$id'");
		$admission_detail = $this->db->query("select * from admission where id='$id'")->row();
		$form_no = $admission_detail->form_no;
		$deactive = $this->db->query("update arts_honours set verify=1 where form_no='$form_no'");
		
		if($deactive)
			{	
				$this->session->set_flashdata('success_message','Candidate successfully activated');
				redirect(base_url().'index.php/admin/manage_verification/honours');
			}
		else
			{
				redirect(base_url().'index.php/admin/manage_verification/honours');
			}
	}
}
