<?php
	require 'fpdf.php';
	$pdf = new FPDF('P', 'mm', array(215.9, 330.2));
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Image('qsu.png',10,10,10);
	$pdf->Cell(83,7, 'QUIRINO STATE UNIVERSITY',0,1, 'C');

	$pdf->SetFont('Arial', '', 11);
	$pdf->Cell(60,3, 'ADM - Supply Office',0,0, 'C');

	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(110,30, 'Date of Count:____________',0,1, 'R');
	$pdf->Cell(70,3, 'Accountable Employee:__________________________________________________________',0,1, 'L');
	$pdf->Cell(69,7, 'Article: _______________________________________________________________________',0,1, 'L');
	$pdf->Cell(101,4, 'Serial No.:__________________________________',0,0, 'C');
	$pdf->Cell(82.5,3.5, 'Prop No.:__________________________',0,1, 'R');
	$pdf->Cell(94,8, 'Fund Source: ____________________________',0,0, 'C');
	$pdf->Cell(89,9, 'Amount: ____________________________',0,1, 'R');
	$pdf->Cell(183,3, 'Date Acquired:_________________________________________________________________',0,1, 'C');
	$pdf->Cell(183,15, '_______________________________',0,0, 'L');
	$pdf->Cell(1,15, '_______________________________',0,1, 'R');
	$pdf->Cell(68,1, 'COA Representative',0,0, 'C');
	$pdf->Cell(93,1, 'Property Officer',0,1, 'R');

	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(25,40, 'QSU-SUP-F008',0,1, 'C');
	$pdf->Cell(190,45, 'REV. 00 (Feb. 11, 2019)',0,0, 'L');





	$pdf->Output();

?>
