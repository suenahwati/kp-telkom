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
                    
        $this->form_validation->set_rules('Odp','Odp','required');
        $this->form_validation->set_rules('Odp-Odp','Odp','required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            send_error_message();
            $this->get($id);
        } else {
            if ($this->Odp_m->update($id) == false) {
                send_error_message();
                $this->get($id);
            } else {
                send_success_message();

                redirect($this->base_redirect);
            }
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