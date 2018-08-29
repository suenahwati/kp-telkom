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

    public function import(){

        $this->template->load('backend_template', 'import', null);

    }

    public function import_action() {

        // load librarynya terlebih dahulu
        // jika digunakan terus menerus lebih baik load ini ditaruh di auto load
        $this->load->library ( array (
                'PHPExcel/PHPExcel'
        ) );
        
        $fileName = time () .'_'.$_FILES ['file'] ['name'];
        
        $config ['upload_path'] = './uploads/'; // buat folder dengan nama assets di root folder
        $config ['file_name'] = $fileName;
        $config ['allowed_types'] = 'xls';
        $config ['max_size'] = 10000;
        $config ['overwrite'] = true;
        
        $this->load->library ( 'upload' );
        $this->upload->initialize ( $config );
        
        if (! $this->upload->do_upload ( 'file' ))
            $this->upload->display_errors ();
            
            $media = $this->upload->data ();
            
            $this->load->helper ( 'file' );
            $inputFileName = './uploads/' . $media ['file_name'];
            
            try {
                $inputFileType = PHPExcel_IOFactory::identify ( $inputFileName );
                $objReader = PHPExcel_IOFactory::createReader ( $inputFileType );
                $objPHPExcel = $objReader->load ( $inputFileName );
                
            } catch ( Exception $e ) {
                
                die ( 'Error loading file "' . pathinfo ( $inputFileName, PATHINFO_BASENAME ) . '": ' . $e->getMessage () );
            }
            
            $sheet = $objPHPExcel->getSheet ( 0 );
            $highestRow = $sheet->getHighestRow ();
            $highestColumn = $sheet->getHighestColumn ();
            
            // get current period and version
            
            for($row = 2; $row <= $highestRow; $row ++) { // Read a row of data into an array
                $rowData = $sheet->rangeToArray ( 'B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE );
                if ($rowData [0] [0] != null && $rowData [0] [0] != "" && trim ( $rowData [0] [0] ) != "LOCATION CODE") {
                    // Area id kalau tidak ada, tidak diinput based on request ci siska on 17 July 2017
                    //$location_id = $rowData [0] [0];


                            // $data = array(
                            //     'id' => get_uuid(),
                            //     'noss_id' => $this->input->post('noss_id'),
                            //     'odp_index' => $this->input->post('odp_index'),
                            //     'odp_name' => $this->input->post('odp_name'),
                            //     'latitude' => $this->input->post('latitude'),
                            //     'longitude' => $this->input->post('longitude'),
                            //     'clusname' => $this->input->post('clusname'),
                            //     'clusterstatus' => $this->input->post('clusterstatus'),
                            //     'avai' => $this->input->post('avai'),
                            //     'used' => $this->input->post('used'),
                            //     'rsk' => $this->input->post('rsk'),
                            //     'rsv' => $this->input->post('rsv'),
                            //     'is_total' => $this->input->post('istotal'),
                            //     'regional' => $this->input->post('regional'),
                            //     'witel' => $this->input->post('witel'),
                            //     'datel' => $this->input->post('datel'),
                            //     'sto' => $this->input->post('sto'),
                            //     'sto_desc' => $this->input->post('sto_desc'),
                            //     'odp_info' => $this->input->post('odp_info'),
                            //     'update_date' => $this->input->post('update_date'),
                            //     'keterangan' => $this->input->post('keterangan'),
                            //     'created_by' => $this->session->userdata('logged_in')['id'],
                            //     'date_created' => date("Y-m-d H:i:s", time())
                            // );





                    var_dump($rowData);
                    
                }
            }

            die();
            
            $this->session->set_flashdata ( 'success', 'Success Import Data' );
            unlink ( './uploads/' . $media ['file_name'] );
            redirect ('odp');
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
            array('db' => 'keterangan', 'dt' => 4 ),                        
            array(
                'db'        => 'id',
                'dt'        => 5,
                'formatter' => function( $i, $row ) {
                    $html = '
                    <center>
                        <a href="'.base_url('odp/get/'.$i).'" title="Edit Data" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left"><i class="fa fa-pencil"></i>Edit</a>
                        <a href="'.base_url('odp/delete/'.$i).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Sure to remove data?\');" title="Delete"><i class="fa fa-trash-o"></i>Delete</a>
                    </center>';
                    return $html;
                }
            ),
        );

        $primaryKey = 'id';

        $condition = null;

        tarkiman_datatable($table,$columns,$condition,$primaryKey);

    }

}