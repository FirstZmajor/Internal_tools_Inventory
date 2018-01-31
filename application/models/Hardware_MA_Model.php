<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hardware_MA_Model extends CI_Model {
	private $name_table = 'IE_Hardware_MA';

	public function __construct()
	{
		$this->db_conn = $this->load->database('default', TRUE);
		$this->db_conn->trans_strict(FALSE);
	}

	public function select_by_id($selector)
  	{
  		$this->db_conn->where('MA_ID',$selector);
		$result = $this->db_conn->get($this->name_table)->row_object();
		return $result;
	  }
	
	public function select_list()
  	{
		$result = $this->db_conn->get($this->name_table)->result_array();
		return $result;
	}

	public function select_count_device ()
	{
		$this->db_conn->select('Device_Type, COUNT(MA_ID) as total');
		$this->db_conn->group_by('Device_Type'); 
		$result = $this->db_conn->get($this->name_table)->result_array();
		return $result;
	}

	public function select_count_location ()
	{
		$this->db_conn->select('Location, COUNT(MA_ID) as total');
		$this->db_conn->group_by('Location'); 
		$result = $this->db_conn->get($this->name_table)->result_array();
		return $result;
	}
	
	

}
?>
