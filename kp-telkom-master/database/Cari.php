<?php
include 'Koneksi.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<form action="Cari.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

	<button><a href="index.php">Lihat Semua Data</a></button>

<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

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
		</tr>
		<?php
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysql_query("select * from Data where CONCAT(id,New_CO, DoCC, WITEL, PAKET, WBS_element, Ref_document_number, Item, Cost_element, Name, Vendor, User_Name, Document_Date, Document_Header_Text, Purchasing_Document, VENDOR2) like '%".$cari."%'");
	}else{
		$data = mysql_query("select * from Data");
	}
	$no = 1;
	while($d = mysql_fetch_array($data)){
	?>
	<tr>
	<td><?php echo $no++; ?></td>
     <td><?php echo $d['New_CO']; ?></td>
	 <td><?php echo $d['DoCC']; ?></td>
	 <td><?php echo $d['WITEL']; ?></td>
	 <td><?php echo $d['PAKET']; ?></td>
	 <td><?php echo $d['WBS_element']; ?></td>
	 <td><?php echo $d['Ref_document_number']; ?></td>
	 <td><?php echo $d['Item']; ?></td>
	 <td><?php echo $d['Cost_element']; ?></td>
     <td><?php echo $d['Name']; ?></td>
	 <td><?php echo $d['Vendor']; ?></td>
	 <td><?php echo $d['User_Name']; ?></td>
	 <td><?php echo $d['Document_Date']; ?></td>
	 <td><?php echo $d['Value_TranCurr']; ?></td>
	 <td><?php echo $d['Debit_Date']; ?></td>
	 <td><?php echo $d['Document_Header_Text']; ?></td>
	 <td><?php echo $d['Purchasing_Document']; ?></td>
	 <td><?php echo $d['VENDOR2']; ?></td>
	</tr>
	<?php } ?>
</table>