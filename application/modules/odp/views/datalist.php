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
              <h3 class="panel-title">List ODP</h3>
              <div class="btn-group pull-right">
                  <!-- <a href="<?php echo base_url('odp/create')?>" class="btn btn-success btn-condensed">Create New</a> &nbsp; -->
              </div>                                     
          </div>
          <div class="panel-body">
              <table id="tarkimanDatatables" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                         <!--  <th>NOSS ID</th> -->
                         <!--  <th>ODP INDEX</th> -->
                          <th>NO</th>
                          <th>ODP NAME</th>
                          <th>LATITUDE</th>
                          <th>LONGITUDE</th>
                          <th>KETERANGAN</th>
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
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
              </table>
          </div>
      </div>
  </div>
             
</div>

<script type="text/javascript" src="<?php asset_back('plugins/datatables/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php asset_back('plugins/datatables/js/dataTables.buttons.min.js');?>"></script>
<script type="text/javascript" src="<?php asset_back('plugins/datatables/js/dataTables.fixedHeader.min.js')?>"></script>
<script type="text/javascript" src="<?php asset_back('plugins/datatables/js/dataTables.responsive.min.js')?>"></script>
<script type="text/javascript" src="<?php asset_back('plugins/datatables/js/responsive.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php asset_back('js/tarkiman.min.js');?>"></script>
<script type="text/javascript">
 
    $(document).ready(function() {

        var table = $('#tarkimanDatatables').DataTable({
              "dom": 'Bfrtip',
              "buttons": [
                {
                    "text": 'Tambah Data',
                    action: function ( e, dt, node, config ) {
                        window.location.href="<?php echo base_url('odp/create')?>";
                    }
                },
                {
                    "text": 'Import Data',
                    action: function ( e, dt, node, config ) {
                        window.location.href="<?php echo base_url('odp/import')?>";
                    }
                }
              ],
              "processing": true,
              "serverSide": true,
              "responsive": true,                          
              "search": {
                "caseInsensitive": false
              },
              "ajax": $.fn.dataTable.pipeline( {
                  url: "<?php echo base_url('odp/datatables');?>",
                  pages: 5 // number of pages to cache
              } ),
              "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    var info = table.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:first', nRow).html(index);
                    $('td:eq(1)', nRow).css( "text-align", "left" );
                    $('td:eq(2)', nRow).css( "text-align", "left" );
                    $('td:eq(3)', nRow).css( "text-align", "left" );
                    $('td:eq(4)', nRow).css( "text-align", "left" );
                    return nRow;
                },
                "columnDefs": [
                  { responsivePriority: 1, targets: 4 }
                ]
        });

  });

</script>