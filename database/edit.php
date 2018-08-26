<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="judul">
	<br/>
	
	<button><a href="index.php">Lihat Semua Data</a></button>

	<br/>
	<h3>Edit data</h3>

	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysql_query("SELECT * FROM Data WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<form action="update.php" method="post">		
		<table>
			<tr>
				<td>New/CO</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
					<input type="text" name="New_CO" value="<?php echo $data['New_CO'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>DoCC</td>
				<td><input type="text" name="DoCC" value="<?php echo $data['DoCC'] ?>"></td>					
			</tr>	
			<tr>
				<td>WITEL</td>
				<td><input type="text" name="WITEL" value="<?php echo $data['WITEL'] ?>"></td>					
			</tr>
			<tr>
				<td>PAKET</td>
				<td><input type="text" name="PAKET" value="<?php echo $data['PAKET'] ?>"></td>					
			</tr>
			<td>WBS element</td>
				<td><input type="text" name="WBS_element" value="<?php echo $data['WBS_element'] ?>"></td>					
			</tr>
			<td>Ref.document number</td>
				<td><input type="text" name="Ref_document_number" value="<?php echo $data['Ref_document_number'] ?>"></td>	
			</tr>
			<td>Item</td>
				<td><input type="text" name="Item" value="<?php echo $data['Item'] ?>"></td>					
			</tr>
			<td>Cost element</td>
				<td><input type="text" name="Cost_element" value="<?php echo $data['Cost_element'] ?>"></td>				
			</tr>
			<td>Name</td>
				<td><input type="text" name="Name" value="<?php echo $data['Name'] ?>"></td>				
			</tr>
			<td>Vendor</td>
				<td><input type="text" name="Vendor" value="<?php echo $data['Vendor'] ?>"></td>				
			</tr>	
			<td>User Name</td>
				<td><input type="text" name="User_Name" value="<?php echo $data['User_Name'] ?>"></td>				
			</tr>	
			<td>Document Date</td>
				<td><input type="text" name="Document_Date" value="<?php echo $data['Document_Date'] ?>"></td>				
			</tr>	
			<td>Value TranCurr</td>
				<td><input type="text" name="Value_TranCurr" value="<?php echo $data['Value_TranCurr'] ?>"></td>			
			</tr>
			<td>Debit Date</td>
				<td><input type="text" name="Debit_Date" value="<?php echo $data['Debit_Date'] ?>"></td>			
			</tr>	
			<td>Document Header Text</td>
				<td><input type="text" name="Document_Header_Text" value="<?php echo $data['Document_Header_Text'] ?>"></td>
			</tr>	
			<td>Purchasing Document</td>
				<td><input type="text" name="Purchasing_Document" value="<?php echo $data['Purchasing_Document'] ?>"></td>
			</tr>
			<td>VENDOR2</td>
				<td><input type="text" name="VENDOR2" value="<?php echo $data['VENDOR2'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Edit"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>
</body>
</html>