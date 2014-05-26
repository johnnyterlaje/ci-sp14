<?php
//mailing_list_model.php


class Mailing_list_model extends CI_Model
{
	public function __construct()
	{//creates an active connecion to db
		$this->load->database();
	}//end constuctor()	

	public function get_mailing_list()
	{//will show all data in table named mail list
		// $query = $this->db->get('mailing_list');
		// return $query->result_array();
		return $this->db->get('mailing_list');
	}//end get_mailing_list()

public function get_id($id)
	{//will show all data in table named mail list
		// $this->db->select('userid,first_name,last_name');
		$this->db->where('userid',$id);
		return $this->db->get('mailing_list');
	}//end get_id()

	public function insert($row)
	{
		$this->db->insert('userid',$row);	
		return $this->db->insert_id();
	}//end insert()

}

?>