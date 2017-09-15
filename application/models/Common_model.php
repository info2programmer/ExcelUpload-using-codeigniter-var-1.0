<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	var $table;
	
    function  __construct(){
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata'); 
    }
################################ FETCH DATA ########################################
    
	function find_data($table,$return_type='array',$list=NULL,$conditions='',$select='*',$join='',$group_by='',$order_by='',$limit=0,$offset=0,$or_where_in='',$or_like='')
	{
		
		$result = array();		
		
		$this->db->select($select);		
		
		if(!empty($table['alias_name']))
		{
			$table_name = $table['name'].' as '.$table['alias_name'];
		}
		else
		{
			$table_name = $table['name'];
		}
		$this->db->from($table_name);
		
		if(is_array($join))
		{
			for($j=0;$j<count($join);$j++)
			{
				if($join[$j]['table'])
				{
					/*$table_join = $join[$j]['table'].' as '.$join[$j]['table_alias']*/;
					//$table_join_name = $join[$j]['table_alias'];
					$table_join = $join[$j]['table'];
					$table_join_name = $join[$j]['table'];
				}
				else
				{
					/*$table_join = $join[$j]['table'];
					$table_join_name = $join[$j]['table'];*/
				}
				if(!empty($join[$j]['table_master_alias']))
				{
					$table_master_join = $join[$j]['table_master_alias'];
				}
				else
				{
					$table_master_join = $join[$j]['table_master'];
				}
				$this->db->join($table_join,$table_join_name.'.'.$join[$j]['field'].'='.$table_master_join.'.'.$join[$j]['field_table_master']/*.$join[$j]['and']*/,$join[$j]['type']);
			}
		}
		
		if($conditions != '')$this->db->where($conditions);	
		if($or_where_in != '')$this->db->or_where_in($or_where_in);
		
		if($or_like != '')$this->db->or_like($or_like);		
		
		if(is_array($group_by))
		{
			for($g=0;$g<count($group_by);$g++)
			{
				$this->db->group_by($group_by[$g]);
			}
		}
		
		if(is_array($order_by))
		{
			for($o=0;$o<count($order_by);$o++)
			{
				$this->db->order_by($order_by[$o]['field'],$order_by[$o]['type']);
			}
		}
		
		if($limit != 0)$this->db->limit($limit,$offset);
		
		
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		switch ($return_type) 
		{
			case 'array':
			case '':
				if($query->num_rows() > 0){$result = $query->result();}
				break;
				
			case 'row':
				if($query->num_rows() > 0){$result = $query->row();}
				break;
			
			case 'row-array':
				if($query->num_rows() > 0){$result = $query->row_array();}
				break;
				
			case 'list':
			
				$list_arr[''] = 'Choose'. $list['empty_name'];

				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row)
					{
						$list_arr[$row->$list['key']] = $row->$list['value'];
					}

				} else {
					$list_arr[] = 'No City Found';
				}
				$result = $list_arr;
				break;
				
			case 'count':
				$result = $query->num_rows();
				break;
		}
		//echo $this->db->last_query();die;
        return $result;
    }
	
############################## INSERT/UPDATE DATA ##################################
	
	function save_data($table,$postdata = array(),$id,$field)
	{
		if($id == 0)
		{
			$this->db->insert($table['name'],$postdata);
		}
		else
		{
			$this->db->where($field, $id);
			$this->db->update($table['name'],$postdata);
			//echo $this->db->last_query();die;
		}
        return $this->db->affected_rows();
	}
################################# DELETE DATA ######################################	
	
	function delete_data($table,$id,$field)
	{
	 	$this->db->where($field,$id);
		$this->db->delete($table['name']);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }
#####################################################################################	

	function student_file_upload($img,$tmp)
	   {
		   $image_path = 'uploads/header_panel/';
		   //echo $image_path;die;
		   if(move_uploaded_file($tmp,$image_path.$img))
		   return true;
	   }
	   
	
	function image_file_upload($img,$tmp)
   	{
       $image_path = 'uploads/multiple/';
		if(move_uploaded_file($tmp,$image_path.$img))
		return true;
   	}
	function form_post($table,$fields)
    {
        if($this->db->insert($table,$fields)){
		return true;
		}		
    }    
    //This Function To Get All Group
    public function getgroup()
    {
    	$query=$this->db->get('tbl_group');
    	return $query->result();
    }
    //This Function For Get All Assigment
    public function getAssigmet()
    {
    	$query=$this->db->get('tbl_assigment');
    	return $query->result();
    }
    //This Function For Get All Agent
    public function getAgent()
    {
    	$query=$this->db->get('tbl_agent');
    	return $query->result();
    }
    //This Function To Get Agent By Id
    public function getagentbyid($id)
    {
    	$this->db->where('group_id', $id);
    	$query=$this->db->get('tbl_agent');
    	return $query->result();
    }
    //This Function To get Assigment Data Group bY assigment Id
    public function getjobassigment()
    {

    	$this->db->select('excel_file_name,group_name,agent_name,assigment_name,min(data_id) as maxid,max(data_id) as minid');
    	$this->db->from('tbl_dataforentry');
    	$this->db->join('tbl_agent', 'tbl_agent.agent_id = tbl_dataforentry.agent_id', 'inner');
    	$this->db->join('tbl_group', 'tbl_group.group_id = tbl_dataforentry.gropu_id', 'inner');
    	$this->db->join('tbl_assigment', 'tbl_assigment.assigment_id = tbl_dataforentry.assigment_id', 'inner');
    	$this->db->group_by('excel_file_name');
    	$query=$this->db->get();
    	return $query->result();
    }
    //This Function to Get Points List 
    public function getpoints()
    {
    	$this->db->select('group_name,assigment_name,point,publist_on');
    	$this->db->from('tbl_group_point');
    	$this->db->join('tbl_group', 'tbl_group.group_id = tbl_group_point.group_id', 'inner');
    	$this->db->join('tbl_assigment', 'tbl_assigment.assigment_id = tbl_group_point.assigmnet_id', 'inner');
    	$query=$this->db->get();
    	return $query->result();
    }

    //This Function To Check Max Data id From `tbl_filldata` By User Id
    public function getmaxidfromtblfilldata()
    {
    	$this->db->where('agent_id', $this->session->userdata('user_id'));
    	$this->db->select_max('data_id');
    	$query = $this->db->get('tbl_filldata');
    	// echo $this->db->last_query();
    	// die;
    	return $query->result();
    }

    //This Function To Load Data From `tbl_dataforentry` By Agent Id And Status
    public function loadentrydata($dataid)
    {
    	$this->db->where('status', 0);
    	$this->db->where('agent_id', $this->session->userdata('user_id'));
    	$this->db->where('data_id', $dataid);
    	$query=$this->db->get('tbl_dataforentry');
    	return  $query->result();
    }

    //Thid Function To Count To Day Record
    public function counttodaystotalentrybyagent($date)
    {
    	if(!empty($date))
    	{
    		// $this->db->where('save_date', date('Y-m-d'));
    		$this->db->where('save_date',$date);
    	}
    	$this->db->where('agent_id', $this->session->userdata('user_id'));
    	$result=$this->db->get('tbl_filldata')->num_rows();
    	return $result;
    }


    //This function for get point by assign id
    public function getpointsbyassignid($assignId,$groupid)
    {
    	$this->db->where('assigmnet_id', $assignId);
    	$this->db->where('group_id', $groupid);
    	$query=$this->db->get('tbl_group_point');
    	return $query->result();
    }

    //Active Agent Credentials
    public function activecredential($agentId)
    {
    	$object= array('islogin' => 0 );
    	$this->db->where('agent_id', $agentId);
    	$this->db->update('tbl_agent', $object);
    }

    //Get Min Id Of Perticular User By User Id
    public function getmindataid()
    {
    	$this->db->where('agent_id', $this->session->userdata('user_id'));
    	$this->db->where('status', 0);
    	$this->db->select_min('data_id');
    	$value= $this->db->get('tbl_dataforentry')->result_array();
    	return $value[0]['data_id'];    	
    }


    //This Function For Get Uplod excel darta by data id
    public function getexceldatabydataid($dataid)
    {
    	$this->db->where('data_id', $dataid);
    	$this->db->select('login_id, given_name,surname,gender,street_address,city,state,country,zip_code,age,birthday,telephone_number,email,username,password,user_agent,domain,national_id,cc_type,ccv2,ccexpires,cc_number,occupation,company,western_union_mtcn,money_gram_mtcn,ups');
    	$query=$this->db->get('tbl_dataforentry');
    	return $query->result();
    }


    



}