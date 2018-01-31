<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Hardware_MA_Model');
		$this->load->library('hardware_ma');
		$this->_init();
		
	}

	private function _init()
	{
		$this->output->set_template('default');
		$this->load->section('_navbar', 'themes/_navbar');
		$this->load->section('_sidebar', 'themes/_sidebar');
		$this->load->section('_footer', 'themes/_footer');
		$this->load->js('assets/themes/node_modules/jquery/dist/jquery.js');
		$this->load->js('assets/themes/node_modules/popper.js/dist/umd/popper.min.js');
		$this->load->js('assets/themes/node_modules/bootstrap/dist/js/bootstrap.min.js');
		$this->load->js('assets/themes/node_modules/chart.js/dist/Chart.min.js');
		$this->load->js('assets/themes/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.js');
		$this->load->js('assets/themes/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js');
		$this->load->js('assets/themes/js/off-canvas.js');
		$this->load->js('assets/themes/js/hoverable-collapse.js');
		$this->load->js('assets/themes/js/misc.js');
		$this->load->js('assets/themes/js/chart.js');
		$this->load->js('assets/themes/js/maps.js');

	}
	
	public function index()
	{
		$data['count'] = $this->counting_expire($this->hardware_ma->get_list_hardware());
		$data['devices'] = $this->Hardware_MA_Model->select_count_device();
		$data['location'] = $this->Hardware_MA_Model->select_count_location();
		
		$this->load->view('pages/dashboard',$data);
	}
	
	public function main()
	{
		$data['HW_list'] = $this->hardware_ma->get_list_hardware();
		$this->load->view('pages/mainpage',$data);
	}

	public function view_content($id=null)
	{
		$this->output->unset_template();
		$data['obj_MA'] = $this->Hardware_MA_Model->select_by_id($id);
		$this->load->view('pages/content_item',$data);
	}
	
	public function edit_content($id)
	{
		$data['id'] = $id;
		$data['obj_MA'] = $this->Hardware_MA_Model->select_by_id($id);

		$this->load->view('pages/update_item',$data);
	}
	
	public function create_content()
	{
		$this->load->view('pages/create_item');
	}

	public function counting_expire ($list_item)
	{
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

	public function test()
	{
		$this->output->unset_template();
		
		
		$data['location'] = $this->Hardware_MA_Model->select_count_location();


		echo "<pre>";
		
		print_r($data['location']);
		echo "</pre>";
	}





}
