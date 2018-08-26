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
                  <a href="<?php echo base_url('user/create')?>" class="btn btn-success btn-condensed">Create New</a> &nbsp;
              </div>                                     
          </div>
          <div class="panel-body">
              <table id="example" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($result as $r): ?>
                          <tr>
                              <td><?php echo $r->username ?></td>
                              <td><?php echo $r->email ?></td>
                              <td><?php echo $r->first_name ?></td>
                              <td><?php echo $r->last_name ?></td>
                              <td><a href="<?php echo base_url('user/get/'.$r->id)?>">Edit</a></td>
                          </tr>                                            
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
          
    
    
</div>