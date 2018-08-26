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
		
		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
	</head>
	<body>
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="index.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>
			
			<h3>Form Import Data</h3>
			<hr>
			
			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="Format.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>
				
				<!-- 
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">
				
				<button type="submit" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Preview
				</button>
			</form>
			
			<hr>
			
			<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';
				
				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
				
				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];
				
				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
					
					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';
					
					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
					
					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import.php'>";
					
					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";
					
					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='17' class='text-center'>Preview Data</th>
					</tr>
					<tr>
						<th>New/CO</th>
						<th>DoCC</th>
						<th>WITEL</th>
						<th>PAKET</th>
						<th>WBS element</th>
						<th>Ref_document_number</th>
						<th>Item</th>
						<th>Cost element</th>
						<th>Name</th>
						<th>Vendor</th>
						<th>User Name</th>
						<th>Document Date</th>
						<th>Value TranCurr</th>
						<th>Debit Date</th>
						<th>Document Header Text</th>
						<th>Purchasing_Document</th>
						<th>VENDOR2</th>
					</tr>";
					
					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$New_CO = $row['A']; // Ambil data
						$DoCC = $row['B']; // Ambil data 
						$WITEL = $row['C']; // Ambil data 
						$PAKET = $row['D']; // Ambil data 
						$WBS_element = $row['E']; // Ambil data 
						$Ref_document_number = $row['F']; // Ambil data 
						$Item = $row['G']; // Ambil data
						$Cost_element = $row['H']; // Ambil data
						$Name = $row['I']; // Ambil data
						$Vendor = $row['J']; // Ambil data
						$User_Name = $row['K']; // Ambil data
						$Document_Date = $row['L']; // Ambil data
						$Value_TranCurr = $row['M']; // Ambil data
						$Debit_Date = $row['N']; // Ambil data
						$Document_Header_Text = $row['O']; // Ambil data
						$Purchasing_Document = $row['P']; // Ambil data
						$VENDOR2 = $row['Q']; // Ambil data
						// Cek jika semua data tidak diisi
						// Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						
						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$New_CO_td = ( ! empty($New_CO))? "" : " style='background: #E07171;'"; 
							$DoCC_td = ( ! empty($DoCC))? "" : " style='background: #E07171;'"; 
							$WITEL_td = ( ! empty($WITEL))? "" : " style='background: #E07171;'"; 
							$PAKET_td = ( ! empty($PAKET))? "" : " style='background: #E07171;'"; 
							$WBS_element_td = ( ! empty($WBS_element))? "" : " style='background: #E07171;'";
							$Ref_document_number_td = ( ! empty($Ref_document_number))? "" : " style='background: #E07171;'";
							$Item_td= ( ! empty($Item))? "" : " style='background: #E07171;'";
							$Cost_element_td= ( ! empty($Cost_element))? "" : " style='background: #E07171;'";
							$Name_td= ( ! empty($Name))? "" : " style='background: #E07171;'";
							$Vendor_td= ( ! empty($Vendor))? "" : " style='background: #E07171;'";
							$User_Name_td= ( ! empty($User_Name))? "" : " style='background: #E07171;'";
							$Document_Date_td= ( ! empty($Document_Date))? "" : " style='background: #E07171;'";
							$Value_TranCurr_td= ( ! empty($Value_TranCurr))? "" : " style='background: #E07171;'";
							$Debit_Date_td= ( ! empty($Debit_Date))? "" : " style='background: #E07171;'";
							$Document_Header_Text_td= ( ! empty($Document_Header_Text))? "" : " style='background: #E07171;'";
							$Purchasing_Document_td= ( ! empty($Purchasing_Document))? "" : " style='background: #E07171;'";
							$VENDOR2_td= ( ! empty($VENDOR2))? "" : " style='background: #E07171;'";
							// Jika salah satu data ada yang kosong
							
							
							echo "<tr>";
							echo "<td".$New_CO_td.">".$New_CO."</td>";
							echo "<td".$DoCC_td.">".$DoCC."</td>";
							echo "<td".$WITEL_td.">".$WITEL."</td>";
							echo "<td".$PAKET_td.">".$PAKET."</td>";
							echo "<td".$WBS_element_td.">".$WBS_element."</td>";
							echo "<td".$Ref_document_number_td.">".$Ref_document_number."</td>";
							echo "<td".$Item_td.">".$Item."</td>";
							echo "<td".$Cost_element_td.">".$Cost_element."</td>";
							echo "<td".$Name_td.">".$Name."</td>";
							echo "<td".$Vendor_td.">".$Vendor."</td>";
							echo "<td".$User_Name_td.">".$User_Name."</td>";
							echo "<td".$Document_Date_td.">".$Document_Date."</td>";
							echo "<td".$Value_TranCurr_td.">".$Value_TranCurr."</td>";
							echo "<td".$Debit_Date_td.">".$Debit_Date."</td>";
							echo "<td".$Document_Header_Text_td.">".$Document_Header_Text."</td>";
							echo "<td".$Purchasing_Document_td.">".$Purchasing_Document."</td>";
							echo "<td".$VENDOR2_td.">".$VENDOR2."</td>";
							echo "</tr>";
						}
						
						$numrow++; // Tambah 1 setiap kali looping
					}
					
					echo "</table>";
					
					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					
					
					// Jika semua data sudah diisi
						echo "<hr>";
						
						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
				
					
					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>
	</body>
</html>