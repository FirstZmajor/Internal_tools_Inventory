<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hardware_ma {

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
		$this->CI->load->model('Hardware_MA_Model');
    }

    public function get_list_hardware ()
    {
        $arr_HW = $this->CI->Hardware_MA_Model->select_list();
        // return $arr_HW;
        $list_item = array();
        foreach ($arr_HW as $key => $obj_hardware) {
            $obj_hardware['tag_expire'] = $this->calculation_expire($obj_hardware['Expire_Date']);
            array_push($list_item,$obj_hardware);
        }
    
        return $list_item;
    }

    public function get_list_hardware_ma ()
    {
        $arr_HW = $this->CI->Hardware_MA_Model->select_list_hardware_ma();
        // $list_item = array();
        // foreach ($arr_HW as $key => $object_MA) {
        //     $object_MA['hardware_detail'] = $this->CI->Hardware_MA_Model->select_hardware_by_id($object_MA['Hardware_id']);
        //     $object_MA['tag_expire'] = $this->calculation_expire($object_MA['Expire_Date']);
        //     array_push($list_item,$object_MA);
        // }
    
        return $arr_HW;
    }

    public function get_hardware_ma ($MA_id)
    {
        $object_MA['detail_ma'] = $this->CI->Hardware_MA_Model->select_hardware_ma_by_id($MA_id);
        $object_MA['detail_hardware'] = $this->CI->Hardware_MA_Model->select_hardware_by_id($object_MA['detail_ma']->Hardware_id);
        return $object_MA;
    }


    
    public function calculation_expire ($date)
	{
        if ($date != '') {
			$enddate = strtotime($date);
            $expiring = $enddate-strtotime('today midnight');
			$soon = $enddate-strtotime("+90 day");
			
            if ($expiring < 0 ) {
                $output['key_status'] = "Expired";
                $output['value_status'] = $date.' <span class="badge badge-danger">Expired</span>';
                return $output;
			}
			else
			{
                $output['key_status'] = "Active";
                $output['value_status'] = $date.' <span class="badge badge-success">Active</span>';
                

				if ($soon < 0 ) {
                $output['key_status'] = "Expire_Soon";
                $output['value_status'] = $date.' <span class="badge badge-warning">Expire soon</span>';
                
                }
                return $output;
			}
        }
        else
        {
            $output['key_status'] = "Unknown";
            $output['value_status'] = "Not found";
            return $output;
        }

    }

    public function counting_expire ()
	{
        $list_item = $this->get_list_hardware_ma();
		$expired = 1;
		$expire_soon = 1;
		$active = 1;
		$unknown = 1;
		foreach ($list_item as $key => $value) {
			$status = $value['tag_expire']['key_status'];
			switch ($status) {
				case 'Expired':
					$output['Expired'] = $expired++;
					break;
				case 'Expire_Soon':
					$output['Expire_Soon']= $expire_soon++;
					break;
				case 'Active':
					$output['Active'] = $active++;
					break;
				case 'Unknown':
					$output['unknown'] = $unknown++;
					break;
			}
		}
		return $output;
	}


    
}