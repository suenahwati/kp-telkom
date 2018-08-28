<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Table Data User 
            </li>
        </ol>
    </div>
    <div class="col-lg-12">	
		<?php load_notif() ?>
		<?php validation_errors() ?>
    </div>
    <form method="post" action="<?php echo base_url('capex/update/'.$result->id)?>">

      <?php input_text2('username', 'Username', $result->username, true, false, true)?>

      <?php input_text2('email', 'Email', $result->email, true, false, false)?>

      <?php input_text2('first_name', 'First Name', $result->first_name, true, false, false)?>

      <?php input_text2('last_name', 'Last Name', $result->last_name, false, false, false)?>

      <div class="col-lg-12">
        <div class="form-group">
          <?php btn_back($this->uri->segment(1)) ?>&nbsp;
          <?php btn_save() ?>
        </div>
      </div>
    </form>
</div>