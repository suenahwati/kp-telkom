<?php
// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';
	
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO data(`New_CO`, `DoCC`, `WITEL`, `PAKET`, `WBS_element`,  `Ref_document_number`, `Item`                                 , `Cost_element`, `Name`, `Vendor`, `User_Name`, `Document_Date`, `Value_TranCurr`,                                  `Debit_Date`, `Document_Header_Text`, `Purchasing_Document`, `VENDOR2`)
								    VALUES(:New_CO,:DoCC,:WITEL,:PAKET,:WBS_element,:Ref_document_number,:Item,:Cost_element, :Name,:Vendor,:User_Name,:Document_Date,:Value_TranCurr,:Debit_Date,:Document_Header_Text,:Purchasing_Document,:VENDOR2)");
	
	$numrow = 1;
	foreach($sheet as $row){
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
		if(empty($New_CO) && empty($DoCC) && empty($WITEL) && empty($PAKET) && empty($WBS_element) 
			              && empty($Ref_document_number) && empty($Item) && empty($Cost_element) && empty($Name) 
			              && empty($Vendor) && empty($User_Name) && empty($Document_Date) && empty($Value_TranCurr)
			              && empty($Debit_Date) && empty($Document_Header_Text) && empty($Purchasing_Document) 
			              && empty($VENDOR2))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			$sql->bindParam(':New_CO', $New_CO);
			$sql->bindParam(':DoCC', $DoCC);
			$sql->bindParam(':WITEL', $WITEL);
			$sql->bindParam(':PAKET', $PAKET);
			$sql->bindParam(':WBS_element', $WBS_element);
			$sql->bindParam(':Ref_document_number', $Ref_document_number);
			$sql->bindParam(':Item', $Item);
			$sql->bindParam(':Cost_element', $Cost_element);
			$sql->bindParam(':Name', $Name);
			$sql->bindParam(':Vendor', $Vendor);
			$sql->bindParam(':User_Name', $User_Name);
			$sql->bindParam(':Document_Date', $Document_Date);
			$sql->bindParam(':Value_TranCurr', $Value_TranCurr);
			$sql->bindParam(':Debit_Date', $Debit_Date);
			$sql->bindParam(':Document_Header_Text', $Document_Header_Text);
			$sql->bindParam(':Purchasing_Document', $Purchasing_Document);
			$sql->bindParam(':VENDOR2', $VENDOR2);
			$sql->execute(); // Eksekusi query insert
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location: index.php'); // Redirect ke halaman awal
?>