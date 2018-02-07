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
		$this->db_conn->join('Hardware_Type', 'Hardware.Hardware_type_id = Hardware_Type.Hardware_type_id', 'left');
		$this->db_conn->select('Hardware_Type, COUNT(Hardware_id) as total');
		$this->db_conn->group_by('Hardware_Type'); 
		$result = $this->db_conn->get('Hardware')->result_array();
		return $result;
	}

	public function select_count_location ()
	{
		$this->db_conn->join('Hardware_MA_Location', 'Hardware_MA.Location_id = Hardware_MA_Location.Location_id', 'left');
		$this->db_conn->select('Location, COUNT(MA_id) as total');
		$this->db_conn->group_by('Location'); 
		$result = $this->db_conn->get('Hardware_MA')->result_array();
		return $result;
	}

	// ============ New Table ===========

		
	public function select_list_hardware_ma ()
	{
		$this->db_conn->join('Hardware', 'Hardware_MA.Hardware_id = Hardware.Hardware_id', 'left');
		$this->db_conn->join('Hardware_MA_Type', 'Hardware_MA.MA_type_id = Hardware_MA_Type.MA_type_id', 'left');
		$this->db_conn->join('Hardware_MA_Location', 'Hardware_MA.Location_id = Hardware_MA_Location.Location_id', 'left');
		$this->db_conn->join('Hardware_MA_Vendor', 'Hardware_MA.Vendor_id = Hardware_MA_Vendor.Vendor_id', 'left');
		$result = $this->db_conn->get('Hardware_MA')->result_array();
		return $result;
	}

	public function select_hardware_by_id($selector)
  	{
		$this->db_conn->join('Hardware_Brand', 'Hardware.Brand_id = Hardware_Brand.Brand_id', 'left');
		$this->db_conn->join('Hardware_Type', 'Hardware.Hardware_type_id = Hardware_Type.Hardware_type_id', 'left');
		$this->db_conn->where('Hardware_id',$selector);
		$result = $this->db_conn->get('Hardware')->row_object();
		return $result;
	}	
	
	public function select_hardware_ma_by_id($selector)
  	{
		// $this->db_conn->join('Hardware', 'Hardware_MA.Hardware_id = Hardware.Hardware_id', 'left');
		$this->db_conn->join('Hardware_MA_Type', 'Hardware_MA.MA_type_id = Hardware_MA_Type.MA_type_id', 'left');
		$this->db_conn->join('Hardware_MA_Location', 'Hardware_MA.Location_id = Hardware_MA_Location.Location_id', 'left');
		$this->db_conn->join('Hardware_MA_Vendor', 'Hardware_MA.Vendor_id = Hardware_MA_Vendor.Vendor_id', 'left');
		$this->db_conn->where('MA_id',$selector);
		$result = $this->db_conn->get('Hardware_MA')->row_object();
		return $result;
	}



	
	

}
?>
