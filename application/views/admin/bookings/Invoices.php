<?php

require('/application/libraries/fpdf.php');

$booking_id = $_GET['booking_id'];

// Retrieve the booking details from the database using the $booking_id

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Invoice');

$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Booking ID:');
$pdf->Cell(40, 10, $booking_id);

// Add more cells and lines for invoice details

$pdf->Output('D', 'invoice.pdf');
