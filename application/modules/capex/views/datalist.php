<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Capex
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
              <h3 class="panel-title">Data Capex</h3>
              <div class="btn-group pull-right">

              </div>                                     
          </div>
          <div class="panel-body">
              <table id="example1" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                <label>Show <select name="tarkimanDatatables_length" aria-controls="tarkimanDatatables" class="">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>New/CO</th>
                          <th>DoCC</th>
                          <th>WITEL</th>
                          <th>PACKET</th>
                          <th>WBS Element</th>
                          <th>Ref.document Number</th>
                          <th>Item</th>
                          <th>Cost Element</th>
                          <th>Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $r): ?>
                          <tr>
                              <td><?php echo $r->id ?></td>
                              <td><?php echo $r->new_co ?></td>
                              <td><?php echo $r->docc ?></td>
                              <td><?php echo $r->witel ?></td>
                              <td><?php echo $r->packet ?></td>
                              <td><?php echo $r->wbs_element ?></td>
                              <td><?php echo $r->ref_document_number ?></td>
                              <td><?php echo $r->item ?></td>
                              <td><?php echo $r->cost_element ?></td>
                              <td><?php echo $r->name ?></td>
                              <td class="dt-center"><?php echo btn_edit('capex/get/'.$r->id)?> <?php echo btn_delete('capex/delete/'.$r->id)?></td>
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
                    window.location.href="<?php echo base_url('capex/create')?>";
                }
            }
        ]
    } );
} );

</script>