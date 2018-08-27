<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Data ODP
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
                  <!-- <a href="<?php echo base_url('odp/create')?>" class="btn btn-success btn-condensed">Create New</a> &nbsp; -->
              </div>                                     
          </div>
          <div class="panel-body">
              <table id="example1" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Noss ID</th>
                          <th>ODP Index</th>
                          <th>ODP Name</th>
                          <th>Latitude</th>
                          <th>Clus Name</th>
                          <th>Cluster Status</th>
                         <!--  <th>avai</th>
                          <th>Used</th>
                          <th>rsk</th>
                          <th>rsv</th>
                          <th>Is Total</th>
                          <th>regional</th>
                          <th>witel</th>
                          <th>datel</th>
                          <th>sto</th>
                          <th>Sto Desc</th>
                          <th>Odp Info</th>
                          <th>Update Date</th>
                          <th>keterangan</th>
                          <th>Date Created</th>
                          <th>Date Modified</th>
                          <th>Created By</th>
                          <th>Modified By</th>
                          <th>deleted</th> -->
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $r): ?>
                          <tr>
                              <td><?php echo $r->noss_id ?></td>
                              <td><?php echo $r->odp_index ?></td>
                              <td><?php echo $r->odp_name ?></td>
                              <td><?php echo $r->latitude ?></td>
                              <td><?php echo $r->clusname ?></td>
                              <td><?php echo $r->clusterstatus ?></td>
                             <!--  <td><?php echo $r->avai ?></td>
                              <td><?php echo $r->used ?></td>
                              <td><?php echo $r->rsk ?></td>
                              <td><?php echo $r->rsv ?></td>
                              <td><?php echo $r->is_total ?></td>
                              <td><?php echo $r->regional ?></td>
                              <td><?php echo $r->witel ?></td>
                              <td><?php echo $r->datel ?></td>
                              <td><?php echo $r->sto ?></td>
                              <td><?php echo $r->sto_desc ?></td>
                              <td><?php echo $r->odp_info ?></td>
                              <td><?php echo $r->update_date ?></td>
                              <td><?php echo $r->keterangan ?></td>
                              <td><?php echo $r->date_created ?></td>
                              <td><?php echo $r->date_modified ?></td>
                              <td><?php echo $r->created_by ?></td>
                              <td><?php echo $r->modified_by ?></td>
                              <td><?php echo $r->deleted ?></td> -->

                              <td><a href="<?php echo base_url('user/get/'.$r->id)?>">Edit</a></td>
            
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
                    window.location.href="<?php echo base_url('odp/create')?>";
                }
            }
        ]
    } );
} );

</script>