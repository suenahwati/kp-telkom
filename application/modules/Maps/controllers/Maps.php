<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Maps extends MX_Controller
{
    protected $base_redirect = 'odp';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('maps_m');
    }

    public function index()
    {
		$data['result'] = $this->maps_m->getData();

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }

    public function create(){

        $this->template->load('backend_template', 'create', null);

    }


    public function get($id){

    	$result = $this->maps_m->get($id);

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

        $this->form_validation->set_rules('new_co','New/CO','required|trim');
        $this->form_validation->set_rules('docc','DoCC','required|trim');
        $this->form_validation->set_rules('witel','WITEL','required|trim');
        $this->form_validation->set_rules('packet','PACKET','required|trim');
        $this->form_validation->set_rules('wbs_element','WBS','required|trim');
        $this->form_validation->set_rules('ref_document_number','Ref>document Number','required|trim');
        $this->form_validation->set_rules('item','Item','required|trim');
        $this->form_validation->set_rules('cost_element','Cost Element','required|trim');
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('vendor','Vendor','required|trim');
        $this->form_validation->set_rules('user_name','User Name','required|trim');
        $this->form_validation->set_rules('document_date','Document Date','required|trim');
        $this->form_validation->set_rules('value_trancurr','Value TranCurr','required|trim');
        $this->form_validation->set_rules('debit_date','Debit Date','required|trim');
        $this->form_validation->set_rules('vendor2','Vendor2','required|trim');

        if ($this->form_validation->run()) {
            if ($this->maps_m->save()) {
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
                    
        $this->form_validation->set_rules('new_co','New/CO','required|trim');
        $this->form_validation->set_rules('docc','DoCC','required|trim');
        $this->form_validation->set_rules('witel','WITEL','required|trim');
        $this->form_validation->set_rules('packet','PACKET','required|trim');
        $this->form_validation->set_rules('wbs_element','WBS','required|trim');
        $this->form_validation->set_rules('ref_document_number','Ref>document Number','required|trim');
        $this->form_validation->set_rules('item','Item','required|trim');
        $this->form_validation->set_rules('cost_element','Cost Element','required|trim');
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('vendor','Vendor','required|trim');
        $this->form_validation->set_rules('user_name','User Name','required|trim');
        $this->form_validation->set_rules('document_date','Document Date','required|trim');
        $this->form_validation->set_rules('value_trancurr','Value TranCurr','required|trim');
        $this->form_validation->set_rules('debit_date','Debit Date','required|trim');
        $this->form_validation->set_rules('vendor2','Vendor2','required|trim');

        if ($this->form_validation->run()) {
            if ($this->maps_m->update($id)) {
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

        if ($this->maps_m->soft_delete($id)) {
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
                if ($this->maps_m->login()) {
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
        $this->maps_m->logout();
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
                if ($this->maps_m->signup()) {
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
