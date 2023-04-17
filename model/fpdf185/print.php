<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');

	require 'fpdf.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	if(isset ($_Get['productID'])){
	$id=$_GET['productID'];
	if(!is_numeric($id)){
		exit;
	}
}

	$que="SELECT productID, itemName as total FROM item where productID=:productID";
	$count= $conn -> prepare($que);
	$count->BindParam(":productID",$id,PDO::PARAM_INT,2);
	if($count->execute()){
	$row=$count->fetch(PDO::FETCH_OBJ);







	$pdf->SetFont('Arial', 'B', 5);
	$pdf->Image('qsu.png',6,8,5);
	// $pdf->Image('bg.png', 2, 1, -250);

	$pdf->Cell(30,10, "", 0,1,"C");

	$pdf->Cell(30,1, 'QUIRINO STATE UNIVERSITY',0,1, 'C');

	$pdf->SetFont('Arial', '', 4);
	$pdf->Cell(18,3, 'ADM - Supply Office',0,0, 'C');

	$pdf->SetFont('Arial', '', 4);
	$pdf->Cell(48,20, 'Date of Count:____________',0,1, 'C');
	$pdf->Cell(50,2, 'Accountable Employee:__________________________________________________',0,1, 'C');
	$pdf->Cell(50,7, 'Article: _______________________________________________________________',0,1, 'C');
	$pdf->Cell(29,4, 'Serial No.:__________________________________',0,0, 'C');
	$pdf->Cell(24,3.5, 'Prop No.:__________________',0,1, 'R');
	$pdf->Cell(27,8, 'Fund Source: ____________________________',0,0, 'C');
	$pdf->Cell(27,7.5, 'Amount: _______________________',0,1, 'R');
	$pdf->Cell(50,3, 'Date Acquired:__________________________________________________________',0,1, 'C');
	$pdf->Cell(20,15, '_______________________________',0,0, 'C');
	$pdf->Cell(40,15, '_______________________________',0,1, 'C');
	$pdf->Cell(20,1, 'COA Representative',0,0, 'C');
	$pdf->Cell(28,1, 'Property Officer',0,1, 'R');

	$pdf->SetFont('Arial', '', 2);
	$pdf->SetTopMargin(10);
	$pdf->Cell(25,40, 'QSU-SUP-F008',0,1, 'L');

	
	$pdf->Cell(1,1, 'REV. 00 (Feb. 11, 2019)',0,1, 'L');


	


}

	$pdf->Output("test.pdf","I");

?>
