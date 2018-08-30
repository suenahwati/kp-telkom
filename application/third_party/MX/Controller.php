<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}

	/*TARKIMAN CUSTOM*/

	public function checking()
    {
        $no_redirect = array(
            'login',
            'user/login',
            ''
        );
        if ($this->session->userdata('logged_in') == false && !in_array(uri_string(), $no_redirect)) {
            redirect('login', 'refresh');
        }
    }

    public function _auth()
    {
        
       
        if($this->session->userdata('logged_in')['group']=='admin'){
			$authorize_uri = array(
				'odp',
				'odp/create',
				'odp/get',
				'odp/save',
				'odp/update',
				'odp/delete',
				'odp/import',
				'odp/import_action',
				'odp/datatables',
				'capex',
				'capex/create',
				'capex/get',
				'capex/save',
				'capex/update',
				'capex/delete',
				'capex/import',
				'capex/import_action',
				'capex/datatables',
				'maps',
				'maps/datatables',
				'user',
				'user/create',
				'user/get',
				'user/save',
				'user/update',
				'user/delete',
				'user/import',
				'user/import_action',
				'user/datatables');
		}
		elseif($this->session->userdata('logged_in')['group']=='user'){
			$authorize_uri = array(
				'odp',
				'odp/create',
				'odp/get',
				'odp/save',
				'odp/update',
				'odp/delete',
				'odp/import',
				'odp/import_action',
				'odp/datatables',
				'capex',
				'capex/create',
				'capex/get',
				'capex/save',
				'capex/update',
				'capex/delete',
				'capex/import',
				'capex/import_action',
				'capex/datatables',
				'maps',
				'maps/datatables');
		}
		else{
			$authorize_uri = array();
		}

		//$authorize_uri = $this->group_m->get_authorize_pages($this->session->userdata('logged_in')['id']);

		return $authorize_uri;
		
    }

    public function uri_check()
    {
        $uri = $this->uri->segment(1);
        //$action = array('create','save','edit','remove','view','update');

        $action = array();
        if($this->uri->segment(2) != null && !in_array($this->uri->segment(2), $action)){
            $uri.= '/'.$this->uri->segment(2);
        }
        return $uri;
    }

    public function authorize()
    {
        if ($this->uri_check() != 'login' && $this->uri_check() != 'user/login' && $this->uri_check() != 'user/logout' && $this->uri_check() != 'logout' && $this->uri_check() != '' && $this->uri->segment(1) != 'redirect' && $this->uri_check() != 'lockscreen' && $this->uri_check() != 'user/change_language') {
            if (in_array($this->uri_check(), $this->_auth()) == false) {
                //redirect('access_denied');
                redirect('not-found');
            }
        }
    }

    /*TARKIMAN CUSTOM*/
}