<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User
        </h1>
<!--         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Table Data User 
            </li>
        </ol> -->
        <?php load_notif() ?>
    </div>


    <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">List Users</h3>
              <div class="btn-group pull-right">

              </div>                                     
          </div>
          <div class="panel-body">
              <table id="example1" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Group Name</th>
                          <th>Description</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $r): ?>
                          <tr>
                              <td><?php echo $r->group_name ?></td>
                              <td><?php echo $r->description ?></td>
                              <td class="dt-center"><?php echo btn_edit('user/get/'.$r->id)?> <?php echo btn_delete('user/delete/'.$r->id)?></td>
                          </tr>                                            
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
          
    
    
</div>

<script type="text/javascript">

$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Tambah Data',
                action: function ( e, dt, node, config ) {
                    window.location.href="<?php echo base_url('user/create')?>";
                }
            }
        ]
    } );
} );

</script>