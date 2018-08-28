<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Odp
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Table Data ODP
            </li>
        </ol>
    </div>
    <div class="col-lg-12">	
		<?php load_notif() ?>
		<?php validation_errors() ?>
    </div>
    <form method="post" action="<?php echo base_url('odp/update/'.$result->id)?>">

      <?php input_text2('odp_name','odp_name', $result->odp_name, true, false, false)?>

      <?php input_text2('latitude','latitude', $result->latitude, true, false, false)?>

      <?php input_text2('longitude','longitude', $result->longitude, true, false, false)?>

      <?php input_text2('keterangan','keterangan', $result->keterangan, false, false, false)?>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>