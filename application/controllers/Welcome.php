<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->output->set_title('Home');
		// $this->_init();
		$this->load->view('login');
	}

	public function _login($errorMsg = NULL)
	{
			$this->_init_blank();
	    if(!$this->auth_ldap->is_authenticated())
			{
	      // Set up rules for form validation
	      $rules = $this->form_validation;
	      $rules->set_rules('username', 'Username', 'required'); //alpha_dash
	      $rules->set_rules('password', 'Password', 'required');
	      // Do the login...
	      if($rules->run() && $this->auth_ldap->login($rules->set_value('username'), $rules->set_value('password')))
				{
	        if($this->session->flashdata('tried_to'))
					{
	          redirect($this->session->flashdata('tried_to'));
	        }
					else
					{
	          redirect('Site');
	        }
	      }
				else
				{
	        // Login FAIL
		      $this->session->keep_flashdata('tried_to');
					$this->load->view('login');
	        // $this->load->view('themes/login', array('login_fail_msg'
	        //                         => 'Error with LDAP authentication.'));
	      }
	    }
			else
			{
	        // Already logged in...
	        redirect('Site');
	    }
	}

}
