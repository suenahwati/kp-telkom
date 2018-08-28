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

      <?php input_text2('noss_id', 'NOSS ID', $result->noss_id, true, false, false)?>

      <?php input_text2('odp_index', 'ODP INDEX', $result->odp_index, true, false, false)?>

      <?php input_text2('odp_name', 'ODP NAME', $result->odp_name, true, false, false)?>

      <?php input_text2('latitude', 'LATITUDE', $result->latitude, true, false, false)?>

      <?php input_text2('longitude', 'LONGITUDE', $result->longitude, true, false, false)?>

      <?php input_text2('clusname', 'CLUSNAME', $result->clusname, false, false, false)?>

      <?php input_text2('clusterstatus', 'CLUSTER STATUS', $result->clusterstatus, false, false, false)?>

      <?php input_text2('avai', 'AVAI', $result->avai, false, false, false)?>

      <?php input_text2('used', 'USED', $result->used, false, false, false)?>

      <?php input_text2('rsk', 'RSK', $result->rsk, false, false, false)?>

      <?php input_text2('rsv', 'RSV', $result->rsv, false, false, false)?>

      <?php input_text2('is_total', 'IS TOTAL', $result->is_total, false, false, false)?>

      <?php input_text2('regional', 'REGIONAL', $result->regional, false, false, false)?>

      <?php input_text2('witel', 'WITEL', $result->witel, false, false, false)?>

      <?php input_text2('datel', 'DATEL', $result->datel, false, false, false)?>

      <?php input_text2('sto', 'STO', $result->sto, false, false, false)?>

      <?php input_text2('sto_desc', 'STO DESC', $result->sto_desc, false, false, false)?>

      <?php input_text2('odp_info', 'ODP INFO', $result->odp_info, false, false, false)?>

      <?php input_text2('update_date', 'UPDATE DATE', $result->update_date, false, false, false)?>

      <?php input_text2('keterangan', 'KETERANGAN', $result->keterangan, true, false, false)?>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>