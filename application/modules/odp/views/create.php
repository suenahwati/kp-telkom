<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Tambah Data ODP
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
    <form method="post" action="<?php echo base_url('odp/save')?>">

      <?php input_text2('noss_id', 'NOSS ID', null, true, false, false)?>

      <?php input_text2('odp_index', 'ODP INDEX', null, true, false, false)?>

      <?php input_text2('odp_name', 'ODP NAME', null, true, false, false)?>

      <?php input_text2('latitude', 'LATITUDE', null, true, false, false)?>

      <?php input_text2('longitude', 'LONGITUDE', null, true, false, false)?>

      <?php input_text2('clusname', 'CLUSNAME', null, false, false, false)?>

      <?php input_text2('clusterstatus', 'CLUSTER STATUS', null, false, false, false)?>

      <?php input_text2('avai', 'AVAI', null, false, false, false)?>

      <?php input_text2('used', 'USED', null, false, false, false)?>

      <?php input_text2('rsk', 'RSK', null, false, false, false)?>

      <?php input_text2('rsv', 'RSV', null, false, false, false)?>

      <?php input_text2('istotal', 'IS TOTAL', null, false, false, false)?>

      <?php input_text2('regional', 'REGIONAL', null, false, false, false)?>

      <?php input_text2('witel', 'WITEL', null, false, false, false)?>

      <?php input_text2('datel', 'DATEL', null, false, false, false)?>

      <?php input_text2('sto', 'STO', null, false, false, false)?>

      <?php input_text2('sto_desc', 'STO DESC', null, false, false, false)?>

      <?php input_text2('odp_info', 'ODP INFO', null, false, false, false)?>

      <?php input_text2('update_date', 'UPDATE DATE', null, false, false, false)?>

      <?php input_text2('keterangan', 'KETERANGAN', null, true, false, false)?>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>