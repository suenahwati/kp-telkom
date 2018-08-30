<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Suenawati | suenahwati@gmail.com | 085315646257 | 
 */

class Capex extends MX_Controller
{
    protected $base_redirect = 'capex';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('capex_m');
        $this->checking();
        $this->authorize();
    }

    public function index()
    {
		$data['result'] = $this->capex_m->getData();

		// var_dump($data);
		// die();
        $this->template->load('backend_template', 'datalist', $data);
    }

    public function create(){

        $this->template->load('backend_template', 'create', null);

    }


    public function get($id){

    	$result = $this->capex_m->get($id);

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
            if ($this->capex_m->save()) {
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
        $this->form_validation->set_rules('ref_document_number','Ref.document Number','required|trim');
        $this->form_validation->set_rules('cost_element','Cost Element','required|trim');
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('vendor','Vendor','required|trim');
        $this->form_validation->set_rules('user_name','User Name','required|trim');
        $this->form_validation->set_rules('document_date','Document Date','required|trim');
        $this->form_validation->set_rules('value_trancurr','Value TranCurr','required|trim');
        $this->form_validation->set_rules('debit_date','Debit Date','required|trim');
        $this->form_validation->set_rules('vendor2','Vendor2','required|trim');

        if ($this->form_validation->run()) {
            if ($this->capex_m->update($id)) {
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

        if ($this->capex_m->soft_delete($id)) {
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
        $config ['allowed_types'] = 'xls|xlsx';
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
                $rowData = $sheet->rangeToArray ( 'A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE );
                if ($rowData [0] [0] != null && $rowData [0] [0] != "") {

                            $data = array(
                                'id' => get_uuid(),
                                'new_co' => $rowData[0][0],
                                'docc' => $rowData[0][1],
                                'witel' => $rowData[0][2],
                                'packet' => $rowData[0][3],
                                'wbs_element' => $rowData[0][4],
                                'ref_document_number' => $rowData[0][5],
                                'item' => $rowData[0][6],
                                'cost_element' => $rowData[0][7],
                                'name' => $rowData[0][8],
                                'vendor' => $rowData[0][9],
                                'user_name' => $rowData[0][10],
                                'document_date' => $rowData[0][11],
                                'value_trancurr' => $rowData[0][12],
                                'debit_date' => $rowData[0][13],
                                'document_header_text' => $rowData[0][14],
                                'purchasing_document' => $rowData[0][15],
                                'vendor2' => $rowData[0][16],
                                'created_by' => $this->session->userdata('logged_in')['id'],
                                'date_created' => date("Y-m-d H:i:s", time())
                            );

                            $this->capex_m->save_import($data);

                    //var_dump($rowData);
                    
                }
            }
            
            $this->session->set_flashdata ( 'success', 'Success Import Data' );
            unlink ( './uploads/' . $media ['file_name'] );
            redirect ('capex');
    }

        public function datatables(){
        $table = 
            "
            (
            SELECT
            id,
            new_co,
            docc,
            witel,
            packet,
            wbs_element,
            ref_document_number,
            item,
            cost_element,
            name,
            vendor,
            user_name,
            document_date,
            value_trancurr,
            debit_date,
            document_header_text,
            purchasing_document,
            vendor2,
            date_created,
            date_modified,
            created_by,
            modified_by,
            deleted
            FROM capex 
            WHERE deleted='0'
            ) temp
            ";  

        $columns = array(
            array('db' => 'id', 'dt' => 0 ),
            array('db' => 'new_co', 'dt' => 1 ),
            array('db' => 'docc', 'dt' => 2 ),
            array('db' => 'witel', 'dt' => 3 ),
            array('db' => 'packet', 'dt' => 4 ),
            array('db' => 'wbs_element', 'dt' => 5 ),
            array('db' => 'ref_document_number', 'dt' => 6 ),
            array('db' => 'item', 'dt' => 7 ),
            array('db' => 'name', 'dt' => 8 ),
            array('db' => 'vendor', 'dt' => 9 ),
            array('db' => 'user_name', 'dt' => 10 ),
            array('db' => 'document_date', 'dt' => 11 ),
            array('db' => 'value_trancurr', 'dt' => 12 ),
            array('db' => 'debit_date', 'dt' => 13 ),
            array('db' => 'document_header_text', 'dt' => 14 ),
            array('db' => 'purchasing_document', 'dt' => 15 ),
            array('db' => 'vendor2', 'dt' => 16 ),                        
            array(
                'db'        => 'id',
                'dt'        => 17,
                'formatter' => function( $i, $row ) {
                    $html = '
                    <center>
                        <a href="'.base_url('capex/get/'.$i).'" title="Edit Data" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left"><i class="fa fa-pencil"></i>Edit</a>
                        <a href="'.base_url('capex/delete/'.$i).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Sure to remove data?\');" title="Delete"><i class="fa fa-trash-o"></i>Delete</a>
                    </center>';
                    return $html;
                }
            ),
        );

        $primaryKey = 'id';

        $condition = null;

        tarkiman_datatable($table,$columns,$condition,$primaryKey);

    }

    // public function login()
    // {
    //     //$this->load->model('config/config_m','group/group_m');
    //     if($this->session->userdata('logged_in')){
    //         //$landing_page = $this->group_m->landing_page();
    //         redirect('home');
    //         //var_dump($_POST);
    //     }else{
    //     	$this->form_validation->set_rules('username','Username','required');
    //     	$this->form_validation->set_rules('password','Password','required');
    //         if ($this->form_validation->run() == FALSE) {
    //             //$data['data'] = $this->config_m->getConfig();
    //             $this->load->view('user/login',null);
    //         } else {
    //             if ($this->capex_m->login()) {
    //                 //$landing_page = $this->group_m->landing_page();
    //                 redirect($landing_page);
    //             }
    //             send_error_message('Wrong username or Password');
    //             //$data['data'] = $this->config_m->getConfig();
    //             redirect('login');
    //         }
    //     }
    // }

    // public function logout()
    // {
    //     $this->capex_m->logout();
    //     redirect('login');
    // }

    // public function signup()
    // {
    //     //$this->load->model('config/config_m','group/group_m');
    //     if($this->session->userdata('logged_in')){
    //         //$landing_page = $this->group_m->landing_page();
    //         redirect('home');
    //         //var_dump($_POST);
    //     }else{
    //         $this->form_validation->set_rules('username','Username','required');
    //         $this->form_validation->set_rules('password','Password','required');
    //         if ($this->form_validation->run() == FALSE) {
    //             //$data['data'] = $this->config_m->getConfig();
    //             $this->load->view('user/signup',null);
    //         } else {
    //             if ($this->capex_m->signup()) {
    //                 //$landing_page = $this->group_m->landing_page();
    //                 redirect($landing_page);
    //             }
    //             send_error_message('Wrong username or Password');
    //             //$data['data'] = $this->config_m->getConfig();
    //             redirect('signup');
    //         }
    //     }
    // }
    
}