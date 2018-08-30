<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Import Data
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 
            </li>
        </ol>
    </div>
    <div class="col-lg-12"> 
    <?php load_notif() ?>
    <?php validation_errors() ?>
    </div>
    <form method="post" action="<?php echo base_url('capex/import_action')?>" enctype="multipart/form-data">

    	<div class="col-md-6 col-xs-12">
	    	<div class="form-group">
		    	<label for="exampleFormControlFile1">Upload File</label>
		    	<input type="file" name="file" class="form-control-file" id="file">
		  	</div>
	  	</div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                <span><a href="<?php echo base_url('uploads/templates/sample_data_capex.xlsx') ?>">Download template (.xls/.xlsx)</a></span>
            </div>
        </div>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>