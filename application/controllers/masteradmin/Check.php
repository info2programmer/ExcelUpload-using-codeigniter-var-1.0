<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {

	public function index()
	{
		if($this->input->post('mode')=='post')
		{
			$ddlAsigment=$this->input->post('ddlAsigment');
			$ddlGroup=$this->input->post('ddlGroup');
			$ddlAgent=$this->input->post('ddlAgent');

			$table['name'] = 'tbl_filldata';
			$select = 'tbl_filldata.*,tbl_assigment.assigment_name,tbl_group.group_name,tbl_agent.agent_name';
			$join[0] = array('table'=>'tbl_assigment','field'=>'assigment_id','table_master'=>'tbl_filldata','field_table_master'=>'assigment_id','type'=>'inner');
			$join[1] = array('table'=>'tbl_group','field'=>'group_id','table_master'=>'tbl_filldata','field_table_master'=>'gropu_id','type'=>'inner');
			$join[2] = array('table'=>'tbl_agent','field'=>'agent_id','table_master'=>'tbl_filldata','field_table_master'=>'agent_id','type'=>'inner');
			$conditions = array('tbl_filldata.assigment_id'=>$ddlAsigment,'tbl_filldata.gropu_id'=>$ddlGroup,'tbl_filldata.agent_id'=>$ddlAgent);

			$data['rows']=$this->Common_model->find_data($table,'array','',$conditions,$select,$join);


			$data['head'] = $this->load->view('masteradmin/elements/head','',true);
			$data['header'] = $this->load->view('masteradmin/elements/header','',true);
			$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
			$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
			// $data['grouplist'] = $this->Common_model->getgroup();
			$data['assigmentlist'] = $this->Common_model->getAssigmet();
			$data['agentlist'] = $this->Common_model->getAgent();
			$data['grouplist'] = $this->Common_model->getgroup();
			
			$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_error_view',$data,true);
			$this->load->view('masteradmin/layout-after-login',$data);
			//echo '<pre>';print_r($data['rows']);die;
		}
		else
		{
			$data['rows'] = array();

			$data['head'] = $this->load->view('masteradmin/elements/head','',true);
			$data['header'] = $this->load->view('masteradmin/elements/header','',true);
			$data['left_sidebar'] = $this->load->view('masteradmin/elements/left-sidebar','',true);
			$data['footer'] = $this->load->view('masteradmin/elements/footer','',true);
			// $data['grouplist'] = $this->Common_model->getgroup();
			$data['assigmentlist'] = $this->Common_model->getAssigmet();
			$data['agentlist'] = $this->Common_model->getAgent();
			$data['grouplist'] = $this->Common_model->getgroup();
			$data['maincontent']=$this->load->view('masteradmin/maincontents/manage_error_view',$data,true);
			$this->load->view('masteradmin/layout-after-login',$data);
		}	
	}
	
	public function error_detail($record_id)
	{
		$data['row1'] = $this->db->query("select * from tbl_filldata where record_id='$record_id'")->row();
		$data_id = $data['row1']->data_id;
		$data['row2'] = $this->db->query("select * from tbl_dataforentry where data_id='$data_id'")->row();
		
		$this->load->view('masteradmin/maincontents/error-detail-view',$data);
	}
}

/* End of file Check.php */
/* Location: ./application/controllers/masteradmin/Check.php */