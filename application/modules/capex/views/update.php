<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Capex
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Table Data capex
            </li>
        </ol>
    </div>
    <div class="col-lg-12">	
		<?php load_notif() ?>
		<?php validation_errors() ?>
    </div>
    <form method="post" action="<?php echo base_url('capex/update/'.$result->id)?>">

      <?php input_text2('new_co','New/CO', $result->new_co, false, false, false)?>

      <?php input_text2('docc','DoCC', $result->docc, false, false, false)?>

      <?php input_text2('witel','WITEL', $result->witel, false, false, false)?>

      <?php input_text2('packet','PACKET', $result->packet, false, false, false)?>

       <?php input_text2('wbs_element','WBS Element', $result->wbs_element, false, false, false)?>

      <?php input_text2('ref_document_number','Ref.document Number', $result->ref_document_number, false, false, false)?>

      <?php input_text2('cost_element','Cost Element', $result->cost_element, false, false, false)?>

      <?php input_text2('name','Name', $result->name, false, false, false)?>

      <?php input_text2('vendor','Vendor', $result->vendor, false, false, false)?>

      <?php input_text2('user_name','User Name', $result->user_name, false, false, false)?>

      <?php input_text2('document_date','Document Date', $result->document_date, false, false, false)?>

      <?php input_text2('value_trancurr','Value TranCurr', $result->value_trancurr, false, false, false)?>

      <?php input_text2('debit_date','Debit Date', $result->debit_date, false, false, false)?>

      <?php input_text2('document_header_text','Document Header Text', $result->document_header_text, false, false, false)?>

      <?php input_text2('purchasing_document','Purchasing Document', $result->purchasing_document, false, false, false)?>

      <?php input_text2('vendor2','Vendor2', $result->vendor2, false, false, false)?>


      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>