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
                  <a href="<?php echo base_url('user/create')?>" class="btn btn-success btn-condensed">Create New</a> &nbsp;
              </div>                                     
          </div>
          <div class="panel-body">
              <table id="example" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Noss ID</th>
                          <th>ODP Index</th>
                          <th>ODP Name</th>
                          <th>Latitude</th>
                          <th>Clus Name</th>
                          <th>Cluster Status</th>
                          <th>avai</th>
                          <th>Used</th>
                          <th>rsk</th>
                          <th>rsv</th>
                          <th>Is Total</th>
                          <th>regional</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $r): ?>
                          <tr>
                              <td><?php echo $r->noss_id ?></td>
                              <td><?php echo $r->odp_index ?></td>
                              <td><?php echo $r->odp_name ?></td>
                              <td><?php echo $r->clusname ?></td>
                              <td><?php echo $r->clusterstatus ?></td>
                              <td><?php echo $r->avai ?></td>
                              <td><?php echo $r->used ?></td>
                              <td><?php echo $r->rsk ?></td>
                              <td><?php echo $r->rsv ?></td>
                              <td><?php echo $r->is_total ?></td>
                              <td><?php echo $r->regional ?></td>
                              <td><a href="<?php echo base_url('user/get/'.$r->id)?>">Edit</a></td>
                          </tr>                                            
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
          
    
    
</div>