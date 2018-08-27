<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Capex
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Table Capex 
            </li>
        </ol>
    </div>
    <div class="col-lg-12"> 
    <?php load_notif() ?>
    <?php validation_errors() ?>
    </div>
    <form method="post" action="<?php echo base_url('capex/save')?>">

      <?php input_text2('new_co', 'New/CO', null, true, false, false)?>

     <!--  <?php 
      $options = array(
                  'laki' => 'Laki-laki',
                  'per'=>'Perempuan' 
                ); 
      ?>

      <?php input_select('new_co', 'New/CO', $options,'',true,false) ?> -->

      <?php input_text2('docc', 'DoCC', null, true, false, false)?>

      <?php input_text2('witel', 'WITEL', null, true, false, false)?>

      <?php input_text2('packet', 'PACKET', null, true, false, false)?>

      <?php input_text2('wbs_element', 'WBS', null, true, false, false)?>

      <?php input_text2('ref_document_number', 'Ref.document Number', null, true, false, false)?>

      <?php input_text2('item', 'Item', null, true, false, false)?>

      <?php input_text2('cost_element', 'Cost Element', null, true, false, false)?>

      <?php input_text2('name', 'Name', null, true, false, false)?>

      <?php input_text2('vendor', 'Vendor', null, true, false, false)?>

      <?php input_text2('user_name', 'User Name', null, true, false, false)?>

      <?php input_text2('document_date', 'Document Date', null, true, false, false)?>

      <?php input_text2('value_trancurr', 'Value_TranCurr', null, true, false, false)?>

      <?php input_text2('debit_date', 'Debit Date', null, true, false, false)?>

      <?php input_text2('document_header_text', 'Document Header Text', null, false, false, false)?>

      <?php input_text2('Purchasing_Document', 'Purchasing Document', null, false, false, false)?>

      <?php input_text2('vendor2', 'Vendor2', null, true, false, false)?>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>