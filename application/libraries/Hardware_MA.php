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
    
    public function calculation_expire ($date)
	{
        if ($date != '1900-01-01') {
            $enddate = strtotime($date);
            $now = time();

            $date_diff = ($enddate-$now) / 86400;
            $d = round($date_diff, 0);
            $d = $d+1;
            
            if ($d < 0 && $d != null) {
                $output['key_status'] = "Expired";
                $output['value_status'] = $date.' <span class="badge badge-danger">Expired</span>';
                return $output;
            }
            if ($d > 0 && $d < 91) {
                $output['key_status'] = "Expire_Soon";
                $output['value_status'] = $date.' <span class="badge badge-warning">Expire soon</span>';
                return $output;
            }
            if ($d > 0 && $d > 90 ) {
                $output['key_status'] = "Active";
                $output['value_status'] = $date;
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

    
}