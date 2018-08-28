<?php 

include 'koneksi.php';
$id = $_POST['id'];
$New_CO = $_POST['New_CO'];
$DoCC = $_POST['DoCC'];
$WITEL = $_POST['WITEL'];
$PAKET = $_POST['PAKET'];
$WBS_element = $_POST['WBS_element'];
$Ref_document_number = $_POST['Ref_document_number'];
$Item = $_POST['Item'];
$Cost_element = $_POST['Cost_element'];
$Name = $_POST['Name'];
$Vendor = $_POST['Vendor'];
$User_Name = $_POST['User_Name'];
$Document_Date = $_POST['Document_Date'];
$Value_TranCurr = $_POST['Value_TranCurr'];
$Debit_Date = $_POST['Debit_Date'];
$Document_Header_Text = $_POST['Document_Header_Text'];
$Purchasing_Document = $_POST['Purchasing_Document'];
$VENDOR2 = $_POST['VENDOR2'];

mysql_query("UPDATE Data SET New_CO='$New_CO', DoCC='$DoCC', WITEL='$WITEL', PAKET='$PAKET', WBS_element='$WBS_element', Ref_document_number='$Ref_document_number', Item='$Item', Cost_element='$Cost_element', Name='$Name', Vendor='$Vendor', User_Name='$User_Name', Document_Date='$Document_Date', Value_TranCurr='$Value_TranCurr', Debit_Date='$Debit_Date', Document_Header_Text='$Document_Header_Text', Purchasing_Document='$Purchasing_Document', VENDOR2='$VENDOR2' WHERE id='$id'");

header("location:index.php?pesan=update");
?>