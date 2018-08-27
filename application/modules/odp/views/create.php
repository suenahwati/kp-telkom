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
    
    <form method="post" action="action.php">
      <div class="col-lg-6">
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
      </div>
      <div class="col-lg-4">
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
      </div>
      <div class="col-lg-10">
        <div class="form-group">
          <label>Keyword Name Produk</label>
          <input type="text" name="nama_produk" value="" placeholder="Masukan Keywords" class="form-control">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="form-group">
          <label>&nbsp;</label>
          <input type="submit" name="Cari" value="Cari" class="form-control">
        </div>
      </div>
    </form>
</div>