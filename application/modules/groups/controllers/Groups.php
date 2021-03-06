<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | 
 */

class Groups extends MX_Controller
{
    protected $base_redirect = 'groups';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('groups_m');
    }

    public function index()
    {
		$data['result'] = $this->groups_m->getData();

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }

    public function create(){

        $this->template->load('backend_template', 'create', null);

    }


    public function get($id){

    	$result = $this->groups_m->get($id);

    	if($result){

			$data['result'] = $result;
			// var_dump($data);
			// die();
			$this->template->load('backend_template', 'update', $data);

        }else{

            redirect('redirect/not_found');

        }

    }

    public function save(){

        $this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('repeat_password','Repeat Password','trim|required|matches[password]');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('first_name','First Name','required|trim|min_length[3]');

        if ($this->form_validation->run()) {
            if ($this->groups_m->save()) {
                send_success_message();
                redirect($this->base_redirect);
            } else {
                send_error_message('Failed Saving Data to Database');
                $this->create();              
            }
        } 
        else {
            send_error_message();
            $this->create();
        }
    }

    public function update($id){
                    
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('first_name','First Name','required|trim|min_length[3]');

        if ($this->form_validation->run()) {
            if ($this->groups_m->update($id)) {
                send_success_message();
                redirect($this->base_redirect);
            } else {
                send_error_message();
                $this->get($id);
            }
        } else {
            send_error_message();
            $this->get($id);
        }
    }

    public function delete($id){

        if ($this->groups_m->soft_delete($id)) {
            $this->session->set_flashdata('success', 'Success Delete Data');
            redirect($this->base_redirect);
        } else {
            send_error_message();
            $this->session->set_flashdata('error', 'Failed to Delete Data');
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
                if ($this->groups_m->login()) {
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
        $this->groups_m->logout();
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

