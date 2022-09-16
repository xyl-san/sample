<?php
include 'includes/conn.php'; 
require('tcpdf/tcpdf.php');
$select = "SELECT * FROM invoice ";
$result = $conn->query($select);
$pdf = new TCPDF();
$pdf->AddPage();

while($row = $result->fetch_object()){

  $id = $row->id;
  

$pdf = new TCPDF();
$pdf ->AddPage();
$pdf-> SetFont('helvetica',20);
$pdf->Cell(180,10,'Customer Invoice',0,0,'C');
$pdf->ln();
$pdf->Cell(160,70,'Customer Name',0,0,'R');
$pdf->ln();
$pdf->Cell(18,5,'Invoice: ',0,0,'L');
$pdf->Cell(20,5,'Code ',0,0,'L');
$pdf->ln(10);

$tbl = <<<EOD
<table cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="Left">Invoice Date:</th>
  <th colspan="3" align="center">Due Date:</th>
 </tr>
 <tr>
  <td colspan="3" align="Left">mm/dd/yyyy</td>
  <td colspan="3" align="center">mm/dd/yyyy</td>
 </tr>
</table>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
<table cellpadding="2" cellspacing="2" nobr="true">
  <tr>
    <th>Description</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Vat Included</th>
    <th>Amount</th>
  </tr><br>
  <tr>
    <td>00</td>
    <td>00</td>
    <td>00</td>
    <td>00</td>
    <td>00</td> 
  </tr>
  <tr><br>
    <td colspan="3"></td>
    <td>Untaxed Amount</td>
    <td>00</td>
  </tr>
  <tr>
    <td colspan="3"></td>
    <td>Tax</td>
    <td>00</td>
    </tr>
  <tr><br>
    <td colspan="3"></td>
    <td>Total Amount</td>
    <td>00</td>
  </tr>
  <tr><br>
    <td colspan="3"></td>
    <td>Paid on</td>
    <td>mm/dd/yyyy</td>
  </tr>
  <tr><br>
    <td colspan="5" align="center"> @ VPD Business Solution Inc.</td>
  </tr>
  
</table>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');



}
ob_clean();
$pdf->Output()
?>