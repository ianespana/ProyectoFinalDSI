<?php
require('../../proyecto_final/FPDF/fpdf.php');
class PDF extends FPDF
{
// Header de página
function Header()
{
    // Logo
    //No hay logo xd
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Vehiculos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(28, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Tipo', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'FechaE', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'FechaV', 1, 0, 'C', 0);
    $this->Cell(28, 10, '???', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Observaciones', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'IDConductor', 1, 1, 'C', 0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require "../../proyecto_final/sql_lib.php";

$consulta = "SELECT * FROM licencias";
$resultado = Connect()->query($consulta);




$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(28, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['tipo'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['fecha_expedicion'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['fecha_vencimiento'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['atributo_desconocido'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['observacion'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['id_conductor'], 1, 1, 'C', 0);
}





$pdf->Output();
?>