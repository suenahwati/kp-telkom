<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Maps extends MX_Controller {

	public function index()
	{
		$data = array();
		//$this->load->view('welcome_message');
		$this->template->load('backend_template', 'datalist', $data);
	}
}
