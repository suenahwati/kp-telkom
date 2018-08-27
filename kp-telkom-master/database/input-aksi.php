<?php 
include 'koneksi.php';
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

mysql_query("INSERT INTO Data VALUES('','$New_CO','$DoCC','$WITEL','$PAKET','$WBS_element','$Ref_document_number','$Item','$Cost_element','$Name','$Vendor','$User_Name','$Document_Date','$Value_TranCurr','$Debit_Date','$Document_Header_Text','$Purchasing_Document','$VENDOR2')");

header("location:index.php?pesan=input");
?>