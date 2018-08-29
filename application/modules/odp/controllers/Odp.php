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
                    // Area id kalau tidak ada, tidak diinput based on request ci siska on 17 July 2017
                    //$location_id = $rowData [0] [0];


                            $data = array(
                                'id' => get_uuid(),
                                // 'noss_id' => $this->input->post('noss_id'),
                                // 'odp_index' => $this->input->post('odp_index'),
                                'odp_name' => $rowData[0][0],
                                'latitude' => $rowData[0][1],
                                'longitude' => $rowData[0][2],
                                // 'clusname' => $this->input->post('clusname'),
                                // 'clusterstatus' => $this->input->post('clusterstatus'),
                                // 'avai' => $this->input->post('avai'),
                                // 'used' => $this->input->post('used'),
                                // 'rsk' => $this->input->post('rsk'),
                                // 'rsv' => $this->input->post('rsv'),
                                // 'is_total' => $this->input->post('istotal'),
                                // 'regional' => $this->input->post('regional'),
                                // 'witel' => $this->input->post('witel'),
                                // 'datel' => $this->input->post('datel'),
                                // 'sto' => $this->input->post('sto'),
                                // 'sto_desc' => $this->input->post('sto_desc'),
                                // 'odp_info' => $this->input->post('odp_info'),
                                // 'update_date' => $this->input->post('update_date'),
                                'keterangan' => $rowData[0][3],
                                'created_by' => $this->session->userdata('logged_in')['id'],
                                'date_created' => date("Y-m-d H:i:s", time())
                            );

                            $this->odp_m->save_import($data);

                    //var_dump($rowData);
                    
                }
            }
            
            $this->session->set_flashdata ( 'success', 'Success Import Data' );
            unlink ( './uploads/' . $media ['file_name'] );
            redirect ('odp');
    }

        public function download_excel($supplier){

            //load librarynya terlebih dahulu
            //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
            $this->load->library("PHPExcel/PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();
 
            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
                    //Hello merupakan isinya                                                                 

                                        ->setCellValue('A1', 'ps_category_list_id')
                                        ->setCellValue('B1', 'ps_product_name')
                                        ->setCellValue('C1', 'ps_product_description')
                                        ->setCellValue('D1', 'ps_price')
                                        ->setCellValue('E1', 'ps_stock')
                                        ->setCellValue('F1', 'ps_product_weight')
                                        ->setCellValue('G1', 'ps_days_to_ship')
                                        ->setCellValue('H1', 'ps_sku_ref_no_parent')
                                        ->setCellValue('I1', 'ps_mass_upload_variation_help')
                                        ->setCellValue('J1', 'ps_variation 1 ps_variation_sku')
                                        ->setCellValue('K1', 'ps_variation 1 ps_variation_name')
                                        ->setCellValue('L1', 'ps_variation 1 ps_variation_price')
                                        ->setCellValue('M1', 'ps_variation 1 ps_variation_stock')
                                        ->setCellValue('N1', 'ps_variation 2 ps_variation_sku')
                                        ->setCellValue('O1', 'ps_variation 2 ps_variation_name')
                                        ->setCellValue('P1', 'ps_variation 2 ps_variation_price')
                                        ->setCellValue('Q1', 'ps_variation 2 ps_variation_stock')
                                        ->setCellValue('R1', 'ps_variation 3 ps_variation_sku')
                                        ->setCellValue('S1', 'ps_variation 3 ps_variation_name')
                                        ->setCellValue('T1', 'ps_variation 3 ps_variation_price')
                                        ->setCellValue('U1', 'ps_variation 3 ps_variation_stock')
                                        ->setCellValue('V1', 'ps_variation 4 ps_variation_sku')
                                        ->setCellValue('W1', 'ps_variation 4 ps_variation_name')
                                        ->setCellValue('X1', 'ps_variation 4 ps_variation_price')
                                        ->setCellValue('Y1', 'ps_variation 4 ps_variation_stock')
                                        ->setCellValue('Z1', 'ps_variation 5 ps_variation_sku')
                                        ->setCellValue('AA1', 'ps_variation 5 ps_variation_name')
                                        ->setCellValue('AB1', 'ps_variation 5 ps_variation_price')
                                        ->setCellValue('AC1', 'ps_variation 5 ps_variation_stock')
                                        ->setCellValue('AD1', 'ps_variation 6 ps_variation_sku')
                                        ->setCellValue('AE1', 'ps_variation 6 ps_variation_name')
                                        ->setCellValue('AF1', 'ps_variation 6 ps_variation_price')
                                        ->setCellValue('AG1', 'ps_variation 6 ps_variation_stock')
                                        ->setCellValue('AH1', 'ps_variation 7 ps_variation_sku')
                                        ->setCellValue('AI1', 'ps_variation 7 ps_variation_name')
                                        ->setCellValue('AJ1', 'ps_variation 7 ps_variation_price')
                                        ->setCellValue('AK1', 'ps_variation 7 ps_variation_stock')
                                        ->setCellValue('AL1', 'ps_variation 8 ps_variation_sku')
                                        ->setCellValue('AM1', 'ps_variation 8 ps_variation_name')
                                        ->setCellValue('AN1', 'ps_variation 8 ps_variation_price')
                                        ->setCellValue('AO1', 'ps_variation 8 ps_variation_stock')
                                        ->setCellValue('AP1', 'ps_variation 9 ps_variation_sku')
                                        ->setCellValue('AQ1', 'ps_variation 9 ps_variation_name')
                                        ->setCellValue('AR1', 'ps_variation 9 ps_variation_price')
                                        ->setCellValue('AS1', 'ps_variation 9 ps_variation_stock')
                                        ->setCellValue('AT1', 'ps_variation 10 ps_variation_sku')
                                        ->setCellValue('AU1', 'ps_variation 10 ps_variation_name')
                                        ->setCellValue('AV1', 'ps_variation 10 ps_variation_price')
                                        ->setCellValue('AW1', 'ps_variation 10 ps_variation_stock')
                                        ->setCellValue('AX1', 'ps_variation 11 ps_variation_sku')
                                        ->setCellValue('AY1', 'ps_variation 11 ps_variation_name')
                                        ->setCellValue('AZ1', 'ps_variation 11 ps_variation_price')
                                        ->setCellValue('BA1', 'ps_variation 11 ps_variation_stock')
                                        ->setCellValue('BB1', 'ps_variation 12 ps_variation_sku')
                                        ->setCellValue('BC1', 'ps_variation 12 ps_variation_name')
                                        ->setCellValue('BD1', 'ps_variation 12 ps_variation_price')
                                        ->setCellValue('BE1', 'ps_variation 12 ps_variation_stock')
                                        ->setCellValue('BF1', 'ps_variation 13 ps_variation_sku')
                                        ->setCellValue('BG1', 'ps_variation 13 ps_variation_name')
                                        ->setCellValue('BH1', 'ps_variation 13 ps_variation_price')
                                        ->setCellValue('BI1', 'ps_variation 13 ps_variation_stock')
                                        ->setCellValue('BJ1', 'ps_variation 14 ps_variation_sku')
                                        ->setCellValue('BK1', 'ps_variation 14 ps_variation_name')
                                        ->setCellValue('BL1', 'ps_variation 14 ps_variation_price')
                                        ->setCellValue('BM1', 'ps_variation 14 ps_variation_stock')
                                        ->setCellValue('BN1', 'ps_variation 15 ps_variation_sku')
                                        ->setCellValue('BO1', 'ps_variation 15 ps_variation_name')
                                        ->setCellValue('BP1', 'ps_variation 15 ps_variation_price')
                                        ->setCellValue('BQ1', 'ps_variation 15 ps_variation_stock')
                                        ->setCellValue('BR1', 'ps_img_1')
                                        ->setCellValue('BS1', 'ps_img_2')
                                        ->setCellValue('BT1', 'ps_img_3')
                                        ->setCellValue('BU1', 'ps_img_4')
                                        ->setCellValue('BV1', 'ps_img_5')
                                        ->setCellValue('BW1', 'ps_img_6')
                                        ->setCellValue('BX1', 'ps_img_7')
                                        ->setCellValue('BY1', 'ps_img_8')
                                        ->setCellValue('BZ1', 'ps_img_9')
                                        ->setCellValue('CA1', 'ps_mass_upload_shipment_help')
                                        ->setCellValue('CB1', 'channel 80003 switch')
                                        ->setCellValue('CC1', 'channel 80004 switch')
                                        ->setCellValue('CD1', 'channel 80011 switch')
                                        ->setCellValue('CE1', 'channel 80014 switch')
                                        ->setCellValue('CF1', 'channel 80012 switch')
                                        ->setCellValue('CG1', 'channel 80013 switch');

            $data = $this->scrape_m->getAllProductBySupplierFormTableProductTMP($supplier);
            $i=2;
            foreach ($data as $r) {              

                            $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $r->category)
                            ->setCellValue('B'.$i, $r->product_name)
                            ->setCellValue('C'.$i, $r->description)
                            ->setCellValue('D'.$i, $r->sell_price)
                            ->setCellValue('E'.$i, $r->stock)
                            ->setCellValue('F'.$i, $r->weight)
                            ->setCellValue('G'.$i, '3')
                            ->setCellValue('H'.$i, $r->product_code)
                            ->setCellValue('I'.$i, '')
                            ->setCellValue('J'.$i, '')
                            ->setCellValue('K'.$i, '')
                            ->setCellValue('L'.$i, '')
                            ->setCellValue('M'.$i, '')
                            ->setCellValue('N'.$i, '')
                            ->setCellValue('O'.$i, '')
                            ->setCellValue('P'.$i, '')
                            ->setCellValue('Q'.$i, '')
                            ->setCellValue('R'.$i, '')
                            ->setCellValue('S'.$i, '')
                            ->setCellValue('T'.$i, '')
                            ->setCellValue('U'.$i, '')
                            ->setCellValue('V'.$i, '')
                            ->setCellValue('W'.$i, '')
                            ->setCellValue('X'.$i, '')
                            ->setCellValue('Y'.$i, '')
                            ->setCellValue('Z'.$i, '')
                            ->setCellValue('AA'.$i, '')
                            ->setCellValue('AB'.$i, '')
                            ->setCellValue('AC'.$i, '')
                            ->setCellValue('AD'.$i, '')
                            ->setCellValue('AE'.$i, '')
                            ->setCellValue('AF'.$i, '')
                            ->setCellValue('AG'.$i, '')
                            ->setCellValue('AH'.$i, '')
                            ->setCellValue('AI'.$i, '')
                            ->setCellValue('AJ'.$i, '')
                            ->setCellValue('AK'.$i, '')
                            ->setCellValue('AL'.$i, '')
                            ->setCellValue('AM'.$i, '')
                            ->setCellValue('AN'.$i, '')
                            ->setCellValue('AO'.$i, '')
                            ->setCellValue('AP'.$i, '')
                            ->setCellValue('AQ'.$i, '')
                            ->setCellValue('AR'.$i, '')
                            ->setCellValue('AS'.$i, '')
                            ->setCellValue('AT'.$i, '')
                            ->setCellValue('AU'.$i, '')
                            ->setCellValue('AV'.$i, '')
                            ->setCellValue('AW'.$i, '')
                            ->setCellValue('AX'.$i, '')
                            ->setCellValue('AY'.$i, '')
                            ->setCellValue('AZ'.$i, '')
                            ->setCellValue('BA'.$i, '')
                            ->setCellValue('BB'.$i, '')
                            ->setCellValue('BC'.$i, '')
                            ->setCellValue('BD'.$i, '')
                            ->setCellValue('BE'.$i, '')
                            ->setCellValue('BF'.$i, '')
                            ->setCellValue('BG'.$i, '')
                            ->setCellValue('BH'.$i, '')
                            ->setCellValue('BI'.$i, '')
                            ->setCellValue('BJ'.$i, '')
                            ->setCellValue('BK'.$i, '')
                            ->setCellValue('BL'.$i, '')
                            ->setCellValue('BM'.$i, '')
                            ->setCellValue('BN'.$i, '')
                            ->setCellValue('BO'.$i, '')
                            ->setCellValue('BP'.$i, '')
                            ->setCellValue('BQ'.$i, '')
                            ->setCellValue('BR'.$i, $r->image1)
                            ->setCellValue('BS'.$i, $r->image2)
                            ->setCellValue('BT'.$i, $r->image3)
                            ->setCellValue('BU'.$i, $r->image4)
                            ->setCellValue('BV'.$i, $r->image5)
                            ->setCellValue('BW'.$i, '')
                            ->setCellValue('BX'.$i, '')
                            ->setCellValue('BY'.$i, '')
                            ->setCellValue('BZ'.$i, '')
                            ->setCellValue('CA'.$i, '')
                            ->setCellValue('CB'.$i, 'Aktif')
                            ->setCellValue('CC'.$i, '')
                            ->setCellValue('CD'.$i, '')
                            ->setCellValue('CE'.$i, '')
                            ->setCellValue('CF'.$i, '')
                            ->setCellValue('CG'.$i, '');
                            $i++;
                } //end foreach


                //set title pada sheet (me rename nama sheet)
                $objPHPExcel->getActiveSheet()->setTitle('Tokopedia Import Produk Masal');

                //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

                //sesuaikan headernya 
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                //ubah nama file saat diunduh
                $excel_file_name = $supplier.'_products';
                header('Content-Disposition: attachment;filename="'.$excel_file_name.'.xlsx"');
                //unduh file
                $objWriter->save("php://output");

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