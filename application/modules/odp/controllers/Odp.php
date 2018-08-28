<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | https://www.linkedin.com/in/suenawati
 */

class Odp extends MX_Controller
{
    protected $base_redirect = 'odp';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('odp_m');
    }

    public function index()
    {
		$data['result'] = $this->odp_m->getData();

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }


     public function create(){

        $this->template->load('backend_template', 'create', null);

    }

    public function save(){

        //var_dump($_POST);
        //die();

        // $this->form_validation->set_rules('noss_id','Noss ID','required|trim');
        // $this->form_validation->set_rules('odp_index', 'ODP INDEX','required|trim|min_length[3]');
        $this->form_validation->set_rules('odp_name','ODP Name','required|trim');
        $this->form_validation->set_rules('latitude','Latitude','required|trim');
        $this->form_validation->set_rules('longitude','Longitude','required|trim');
        $this->form_validation->set_rules('keterangan','keterangan','required|trim');



        if ($this->form_validation->run()) {
            if ($this->odp_m->save()) {
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




    public function get($id){

    	$result = $this->odp_m->get($id);

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
                    
        $this->form_validation->set_rules('odp_name','ODP Name','required');
        $this->form_validation->set_rules('latitude','Latitude','required|trim|min_length[3]');
        $this->form_validation->set_rules('longitude','longitude','required|trim|min_length[3]');

        if ($this->form_validation->run()) {
            if ($this->odp_m->update($id)) {
                send_success_message();
                redirect($this->base_redirect);
            } else {
                send_error_message();
                $this->get($id);
            }
        } 
        else {
            send_error_message();
            $this->get($id);
            
        }
    }


     public function delete($id){

        if ($this->odp_m->soft_delete($id)) {
            $this->session->set_flashdata('success', 'Success Delete Data');
            redirect($this->base_redirect);
        } else {
            send_error_message();
            $this->session->set_flashdata('error', 'Failed to Delete Data');
        }
    }

}