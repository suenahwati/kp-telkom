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
        $results = $this->maps_m->getData();
		$data['results'] = $results;
        $data['json'] = json_encode($results);

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }

    public function getGeoJson(){

        $data['data'] = $this->maps_m->getData();

        echo json_encode($data);

    }



}
