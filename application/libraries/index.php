<?php
require('/fpdf.php');

class Invoice extends FPDF {
    // Header
    function Header() {
        // Logo
        $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Invoice',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Invoice body
    function createInvoice($invoice) {
        $this->SetFont('Arial','',12);
        // Invoice number
        $this->Cell(0,10,'Invoice No. '.$invoice['number'],0,1);
        $this->Ln(10);
        // Date
        $this->Cell(0,10,'Date: '.$invoice['date'],0,1);
        $this->Ln(10);
        // Customer details
        $this->Cell(0,10,'Customer: '.$invoice['customer'],0,1);
        $this->Ln(10);
        // Invoice items
        $this->Cell(50,10,'Item',1,0);
        $this->Cell(50,10,'Quantity',1,0);
        $this->Cell(50,10,'Price',1,1);
        foreach ($invoice['items'] as $item) {
            $this->Cell(50,10,$item['name'],1,0);
            $this->Cell(50,10,$item['quantity'],1,0);
            $this->Cell(50,10,$item['price'],1,1);
        }
        // Total amount
        $this->Ln(10);
        $this->Cell(0,10,'Total: '.$invoice['total'],0,1);
    }
}

// Create a new invoice instance
$pdf = new Invoice();
$pdf->AliasNbPages();
$pdf->AddPage();
// Invoice data
$invoice = array(
    'number' => 'INV-001',
    'date' => '15 April 2023',
    'customer' => 'John Doe',
    'items' => array(
        array(
            'name' => 'Product 1',
            'quantity' => 2,
            'price' => '$10'
        ),
        array(
            'name' => 'Product 2',
            'quantity' => 1,
            'price' => '$20'
        )
    ),
    'total' => '$40'
);
// Generate the invoice
$pdf->createInvoice($invoice);
// Output the invoice as a downloadable PDF
$pdf->Output('invoice.pdf','D');
?>
