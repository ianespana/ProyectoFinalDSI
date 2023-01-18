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
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(160,10,'Reporte de Vehiculos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Niv', 1, 0, 'C', 0);
    $this->Cell(26, 10, 'Tipo', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Marca', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Modelo', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Num Serie', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Clase', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Combustible', 1, 0, 'C', 0);
    $this->Cell(21, 10, 'Cilindros', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Caballos de Fuerza', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Tipo de Carroceria', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Color', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Transmision', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Serie Motor', 1, 0, 'C', 0);
    $this->Cell(28, 10, 'Capacidad', 1, 1, 'C', 0);

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

$consulta = "SELECT * FROM vehiculos";
$resultado = Connect()->query($consulta);



$pdf = new PDF("L", "mm", array(400,100));

$pdf-> AliasNbPages();
$pdf->AddPage("L");
$pdf->SetFont('Arial','',11);

$row = $resultado->fetch_assoc();
    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['niv'], 1, 0, 'C', 0);
    $pdf->Cell(26, 10, utf8_decode($row['tipo']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['marca'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['numero_serie'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['clase'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['tipo_combustible'], 1, 0, 'C', 0);
    $pdf->Cell(21, 10, $row['numero_cilindros'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['caballos_fuerza'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['tipo_carroceria'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['color'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['transmision'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['serie_motor'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['capacidad'], 1, 0, 'C', 0);






$pdf->Output();
?>