<?php
include 'includes/session.php'; 
require('tcpdf/tcpdf.php');
include 'conn.php';
$select = "SELECT *, purchase_order.id FROM purchase_order LEFT JOIN supplier ON supplier.id=purchase_order.supplier_id LEFT JOIN supplier_product ON supplier_product.id=purchase_order.supplier_id LEFT JOIN admin ON admin.id=purchase_order.supplier_id";
$result = $conn->query($select);

$pdf = new TCPDF();
$pdf->AddPage();

while($row = $result->fetch_object()){

  $id = $row->id;
  

$pdf = new TCPDF();
$pdf ->AddPage();
$pdf-> SetFont('helvetica', 'B',20);
$pdf->Cell(10,5,$business_name,0,0,'L');
$pdf->Cell(160,5,'PURCHASE ORDER',0,0,'R');
$pdf->ln(15);

$pdf-> SetFont('helvetica ', 'B',10,);
$pdf->Cell(27,5,'Street Address:',0,0,'L');
$pdf->Cell(50,5,$address,0,0);
$pdf->ln();

$pdf->Cell(9,5,'City:',0,0,'L');
$pdf->Cell(50,5,'Quezon',0,0);
$pdf->Cell(57.5,5,'DATE:',0,0,'R');
$pdf->Cell(30,5,$purchase_date,1,0);
$pdf->ln();

$pdf->Cell(7,5,'Zip:',0,0,'L');
$pdf->Cell(50,5,'150099',0,0);
$pdf->Cell(59.5,5,'PO #:',0,0,'R');
$pdf->Cell(30,5,$purchase_order_id,1,0);
$pdf->ln();

$pdf->Cell(27,5,'Phone Number:',0,0,'L');
$pdf->Cell(50,5,$phone_number,0,0);
$pdf->ln(10);

$pdf->SetFillColor(140, 217, 140);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(118,10,'VENDOR',0,0,'L',true);
$pdf->Cell(73,10,'SHIP TO',0,0,'C',true);
$pdf->ln(10);

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(28,5,'Company Name:',0,0,'L');
$pdf->Cell(50,5,$business_name,0,0);
$pdf->Cell(39,5,'Name:',0,0,'R');
$pdf->Cell(50,5,'fafa',0,0);
$pdf->ln();

$pdf->Cell(39,5,'Contact or Department:',0,0,'L');
$pdf->Cell(50,5,'afaf',0,0);
$pdf->Cell(45,5,'Company Name:',0,0,'R');
$pdf->Cell(50,5,'aff',0,0);
$pdf->ln();

$pdf->Cell(27,5,'Street Address:',0,0,'L');
$pdf->Cell(50,5,'ave',0,0);
$pdf->Cell(55.5,5,'Street Address:',0,0,'R');
$pdf->Cell(50,5,'faaaa',0,0);
$pdf->ln();

$pdf->Cell(9,5,'City:',0,0,'L');
$pdf->Cell(50,5,'afa',0,0);
$pdf->Cell(55,5,'City:',0,0,'R');
$pdf->Cell(50,5,'faaf',0,0);
$pdf->ln();

$pdf->Cell(9,5,'ZIP:',0,0,'L');
$pdf->Cell(50,5,'fafa',0,0);
$pdf->Cell(54,5,'ZIP:',0,0,'R');
$pdf->Cell(50,5,'af',0,0);
$pdf->ln();

$pdf->Cell(27,5,'Phone Number:',0,0,'L');
$pdf->Cell(50,5,'fafa',0,0);
$pdf->Cell(55.5,5,'Phone Number:',0,0,'R');
$pdf->Cell(50,5,'faf',0,0);
$pdf->ln(10);

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(45,8,'REQUISITIONER',1,0,'C',true); 
$pdf->Cell(48,8,'SHIP VIA',1,0,'C',true);
$pdf->Cell(35 ,8,'F.O.B',1,0,'C',true);
$pdf->Cell(62,8,'SHIPPING TERMS',1,0,'C',true); 
$pdf->ln();

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(45,5,'DFHHDDD',1,0);//REQUISTIONER
$pdf->Cell(48,5,'HDHDHDDDH',1,0);//SHIP VIA
$pdf->Cell(35,5,'HDHDHDHDH',1,0);//F.O.M
$pdf->Cell(62,5,'DHDHDDDH',1,0);//FOR SHIPPING TERM
$pdf->ln(10);

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(35,8,'Item #',1,0,'C',true); 
$pdf->Cell(55,8,'Description',1,0,'C',true); 
$pdf->Cell(30,8,'Quantity',1,0,'C',true);
$pdf->Cell(30,8,'Unit Price',1,0,'C',true);
$pdf->Cell(40,8,'Total',1,0,'C',true);
$pdf->ln();

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(35,5,'gdsdggdd',1,0);//for item #
$pdf->Cell(55,5,'adafaa',1,0);//for Description
$pdf->Cell(30,5,$quantity,1,0);//for quantity
$pdf->Cell(30,5,$price,1,0);//for unit price
$pdf->Cell(40,5,$total,1,0);//for total
$pdf->ln(15);

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30,5,'RECEIVED BY:',0,0,'L');
$pdf->Cell(45,5,'',0,0);
$pdf->Cell(80,5,'SUBTOTAL:',0,0,'R');
$pdf->Cell(45,5, $subtotal,0,0);
$pdf->ln();

$pdf->Cell(30,5,'APPROVED BY:',0,0,'L');
$pdf->Cell(45,5,'',0,0);
$pdf->Cell(80.5,5,'TAX:',0,0,'R');
$pdf->Cell(48,5, $sales_tax,0,0);
$pdf->ln();

$pdf->Cell(155,5,'SHIPPING:',0,0,'R');
$pdf->Cell(55,5,'1010110',0,0);
$pdf->ln();

$pdf->Cell(155,5,'TOTAL AMOUNT:',0,0,'R');
$pdf->Cell(45,5, $total,0,0);
$pdf->ln(10);

$pdf->Cell(190,5,'If you have any concerns and questions regarding  this purchase order please contact us',0,0,'C');
$pdf->ln();
$pdf->Cell(160,5,'@',0,0,'C');

}
ob_clean();
$pdf->Output()
?>

