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

    public function datatables(){
        $table = 
            "
            (
            SELECT
             id,
             noss_id,
             odp_index,
             odp_name,
             latitude,
             longitude,
             clusname,
             clusterstatus,
             avai,
             used,
             rsk,
             rsv,
             is_total,
             regional,
             witel,
             datel,
             sto,
             sto_desc,
             odp_info,
             update_date,
             keterangan,
             date_created,
             date_modified,
             created_by,
             modified_by,
             deleted
            FROM odp 
            WHERE deleted='0'
            ) temp
            ";  

        $columns = array(
            array('db' => 'id', 'dt' => 0 ),
            array('db' => 'odp_name', 'dt' => 1 ),
            array('db' => 'latitude', 'dt' => 2 ),
            array('db' => 'longitude', 'dt' => 3 ),
            array('db' => 'keterangan', 'dt' => 4 )
        );

        $primaryKey = 'id';

        $condition = null;

        tarkiman_datatable($table,$columns,$condition,$primaryKey);


    }



}
