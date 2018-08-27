<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>	
	<br/>

	<a href="index.php">Lihat Semua Data</a>

	<br/>
	<h3>Input data baru</h3>
	<form action="input-aksi.php" method="post">		
		<table>
			<tr>
				<td>New/CO</td>
				<td><textarea cols="30 name="New_CO"></textarea></td>					
			</tr>	
			<tr>
				<td>DoCC</td>
				<td><input type="text" name="DoCC"></td>					
			</tr>	
			<tr>
				<td>WITEL</td>
				<td><input type="text" name="WITEL"></td>					
			</tr>
			<tr>
				<td>PAKET</td>
				<td>
					<center>
					<select name="PAKET">
    				<option>---- Pilih Paket ----</option>
    				<option>BGD</option>
    				<option>TSM</option>
    				<option>KWA</option>
    				</select>
    				</center>
				</td>					
			</tr>
			<tr>
				<td>WBS element</td>
				<td><textarea required name="WBS_element"></textarea></td>					
			</tr>
			<tr>
				<td>Ref.document number</td>
				<td><textarea  rows="5" cols="20" required name=”Ref_document_number”></textarea></td>				
			</tr>
			<tr>
				<td>Item</td>
				<td><input type="text" name="Item"></td>					
			</tr>
			<tr>
				<td>Cost element</td>
				<td><input type="text" name="Cost_element"></td>					
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="Name"></td>					
			</tr>
			<tr>
				<td>Vendor</td>
				<td><input type="text" name="Vendor"></td>					
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="User_Name"></td>					
			</tr>
			<tr>
				<td>Document Date</td>
				<td><input type="date" name="Document_Date"></td>					
			</tr>
			<tr>
				<td>Value TranCurr</td>
				<td><input type="text" name="Value_TranCurr"></td>					
			</tr>
			<tr>
				<td>Debit Date</td>
				<td><input type="date" name="Debit_Date"></td>					
			</tr>
			<tr>
				<td>Document Header Text</td>
				<td><input type="text" name="Document_Header_Text"></td>					
			</tr>
			<tr>
				<td>Purchasing Document</td>
				<td><input type="text" name="Purchasing_Document"></td>					
			</tr>
			<tr>
				<td>VENDOR2</td>
				<td><input type="text" name="VENDOR2"></td>					
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
</body>
</html>