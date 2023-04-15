<?php
require('fpdf.php');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve booking data from the database
$sql = "SELECT * FROM bookingtbl WHERE id = 4"; // Change the id as per your requirement
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    // Initialize fpdf object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Add invoice details
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Invoice');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,'Order Id:');
    $pdf->Cell(40,10,$row['id']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'Service Date:');
    $pdf->Cell(40,10,$row['date']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'Service Time:');
    $pdf->Cell(40,10,$row['timing']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'Service Bill:');
    $pdf->Cell(40,10,$row['serviceBill']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'Service:');
    $pdf->Cell(40,10,$row['serviceId']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'User:');
    $pdf->Cell(40,10,$row['userId']);
    $pdf->Ln(10);
    $pdf->Cell(40,10,'Service Status:');
    $pdf->Cell(40,10,$row['serviceStatus']);
    $pdf->Ln(10);

    // Output the generated PDF
    $pdf->Output('D', 'invoice.pdf');
  }
} else {
  echo "0 results";
}

$conn->close();
?>