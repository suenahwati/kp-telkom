<!--
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Excel dengan PHP</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>
		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<a href="form.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered">
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
					// Load file koneksi.php
					include "koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = $pdo->prepare("SELECT * FROM Data");
					$sql->execute(); // Eksekusi querynya

					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['New_CO']."</td>";
						echo "<td>".$data['DoCC']."</td>";
						echo "<td>".$data['WITEL']."</td>";
						echo "<td>".$data['PAKET']."</td>";
						echo "<td>".$data['WBS_element']."</td>";
						echo "<td>".$data['Ref_document_number']."</td>";
						echo "<td>".$data['Item']."</td>";
						echo "<td>".$data['Cost_element']."</td>";
						echo "<td>".$data['Name']."</td>";
						echo "<td>".$data['Vendor']."</td>";
						echo "<td>".$data['User_Name']."</td>";
						echo "<td>".$data['Document_Date']."</td>";
						echo "<td>".$data['Value_TranCurr']."</td>";
						echo "<td>".$data['Debit_Date']."</td>";
						echo "<td>".$data['Document_Header_Text']."</td>";
						echo "<td>".$data['Purchasing_Document']."</td>";
						echo "<td>".$data['VENDOR2']."</td>";
						echo "</tr>";

						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>