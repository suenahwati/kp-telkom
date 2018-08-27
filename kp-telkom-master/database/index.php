<?php
include 'koneksi.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
<br/>
	<button><a href="input.php">Tambah Data Baru</a></button>
	<button><a href="cari.php">Cari</a></button>
  <button><a href="import_php/index.php">import</a></button>
  <button><a href="Export_data/data.php">Export</a></button>
	<br/>
	<h3>Data user</h3>
	<table border="1" class="table">
<table border="1">
  <tr>
   <th>No</th>
   <th>New/CO</th>
   <th>DoCC</th>
   <th>WITEL</th>
   <th>PAKET</th>
   <th>WBS element</th>
   <th>Ref.document number</th>
   <th>Item</th>
   <th>Cost element</th>
   <th>Name</th>
   <th>Vendor</th>
   <th>User Name</th>
   <th>Document Date</th>
   <th>Value TranCurr</th>
   <th>Debit Date</th>
   <th>Document Header Text</th>
   <th>Purchasing Document</th>
   <th>VENDOR2</th>
   <th>Opsi</th>		           
  </tr>
  <?php 
  $halaman = 40;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysql_query("SELECT * FROM Data");
  $total = mysql_num_rows($result);
  $pages = ceil($total/$halaman);            
  $query = mysql_query("select * from Data LIMIT $mulai, $halaman")or die(mysql_error);
  $no =$mulai+1;
  while ($data = mysql_fetch_assoc($query)) {
    ?>    
    <tr>
   <td><?php echo $no++; ?></td>
   <td><?php echo $data['New_CO']; ?></td>
	 <td><?php echo $data['DoCC']; ?></td>
	 <td><?php echo $data['WITEL']; ?></td>
	 <td><?php echo $data['PAKET']; ?></td>
	 <td><?php echo $data['WBS_element']; ?></td>
	 <td><?php echo $data['Ref_document_number']; ?></td>
	 <td><?php echo $data['Item']; ?></td>
	 <td><?php echo $data['Cost_element']; ?></td>
     <td><?php echo $data['Name']; ?></td>
	 <td><?php echo $data['Vendor']; ?></td>
	 <td><?php echo $data['User_Name']; ?></td>
	 <td><?php echo $data['Document_Date']; ?></td>
	 <td><?php echo $data['Value_TranCurr']; ?></td>
	 <td><?php echo $data['Debit_Date']; ?></td>
	 <td><?php echo $data['Document_Header_Text']; ?></td>
	 <td><?php echo $data['Purchasing_Document']; ?></td>
	 <td><?php echo $data['VENDOR2']; ?></td>
	 <td>
		<button><a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></button> |
		<button><a class="edit" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a></button>					
	 </td>
    </tr>

    <?php               
  } 
  ?>
</table>          
<div class="">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <button><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></button>
  <?php } ?>
</div>