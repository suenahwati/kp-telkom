<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | 
 */

class User extends MX_Controller
{
    protected $base_redirect = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		$data['result'] = $this->user_m->getData();

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }


    public function get($id){

    	$result = $this->user_m->get($id);

    	if($result){

			$data['result'] = $result;
			// var_dump($data);
			// die();
			$this->template->load('backend_template', 'update', $data);

        }else{

            redirect('redirect/not_found');

        }

    }

    public function update($id){
                    
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('first_name','First Name','required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            send_error_message();
            $this->get($id);
        } else {
            if ($this->user_m->update($id) == false) {
                send_error_message();
                $this->get($id);
            } else {
                send_success_message();

                redirect($this->base_redirect);
            }
        }
    }

    public function login()
    {
        //$this->load->model('config/config_m','group/group_m');
        if($this->session->userdata('logged_in')){
            //$landing_page = $this->group_m->landing_page();
            redirect('home');
            //var_dump($_POST);
        }else{
        	$this->form_validation->set_rules('username','Username','required');
        	$this->form_validation->set_rules('password','Password','required');
            if ($this->form_validation->run() == FALSE) {
                //$data['data'] = $this->config_m->getConfig();
                $this->load->view('user/login',null);
            } else {
                if ($this->user_m->login()) {
                    //$landing_page = $this->group_m->landing_page();
                    redirect($landing_page);
                }
                send_error_message('Wrong username or Password');
                //$data['data'] = $this->config_m->getConfig();
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->user_m->logout();
        redirect('login');
    }

    public function signup()
    {
        //$this->load->model('config/config_m','group/group_m');
        if($this->session->userdata('logged_in')){
            //$landing_page = $this->group_m->landing_page();
            redirect('home');
            //var_dump($_POST);
        }else{
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if ($this->form_validation->run() == FALSE) {
                //$data['data'] = $this->config_m->getConfig();
                $this->load->view('user/signup',null);
            } else {
                if ($this->user_m->signup()) {
                    //$landing_page = $this->group_m->landing_page();
                    redirect($landing_page);
                }
                send_error_message('Wrong username or Password');
                //$data['data'] = $this->config_m->getConfig();
                redirect('signup');
            }
        }
    }
    
}

