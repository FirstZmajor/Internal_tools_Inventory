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

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('default');
		$this->load->section('_navbar', 'themes/_navbar');
		$this->load->section('_sidebar', 'themes/_sidebar');
		$this->load->section('_footer', 'themes/_footer');
		$this->load->js('assets/themes/node_modules/jquery/dist/jquery.js');
		// $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		// $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}
	
	public function index()
	{
		// $this->load->view('welcome_message');

		$this->load->view('mainpage');
	}
}
