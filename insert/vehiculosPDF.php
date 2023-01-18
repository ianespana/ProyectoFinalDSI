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
    $this->Cell(340,10,'Reporte de Vehiculos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(13, 20, 'ID', 1, 0, 'C', 0);
    $this->Cell(28, 20, 'Niv', 1, 0, 'C', 0);
    $this->Cell(26, 20, 'Tipo', 1, 0, 'C', 0);
    $this->Cell(25, 20, 'Marca', 1, 0, 'C', 0);
    $this->Cell(28, 20, 'Modelo', 1, 0, 'C', 0);
    $this->Cell(32, 20, 'Num Serie', 1, 0, 'C', 0);
    $this->Cell(30, 20, 'Clase', 1, 0, 'C', 0);
    $this->Cell(35, 20, 'Combustible', 1, 0, 'C', 0);
    $this->Cell(25, 20, 'Cilindros', 1, 0, 'C', 0);
    $this->Cell(50, 20, 'Caballos de Fuerza', 1, 0, 'C', 0);
    $this->Cell(50, 20, 'Tipo de Carroceria', 1, 0, 'C', 0);
    $this->Cell(28, 20, 'Color', 1, 0, 'C', 0);
    $this->Cell(34, 20, 'Transmision', 1, 0, 'C', 0);
    $this->Cell(32, 20, 'Serie Motor', 1, 0, 'C', 0);
    $this->Cell(28, 20, 'Capacidad', 1, 1, 'C', 0);

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



$pdf = new PDF("L", "mm", array(480,120));

$pdf-> AliasNbPages();
$pdf->AddPage("L");
$pdf->SetFont('Arial','',13);

$row = $resultado->fetch_assoc();
    $pdf->Cell(13, 20, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(28, 20, $row['niv'], 1, 0, 'C', 0);
    $pdf->Cell(26, 20, utf8_decode($row['tipo']), 1, 0, 'C', 0);
    $pdf->Cell(25, 20, $row['marca'], 1, 0, 'C', 0);
    $pdf->Cell(28, 20, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(32, 20, $row['numero_serie'], 1, 0, 'C', 0);
    $pdf->Cell(30, 20, $row['clase'], 1, 0, 'C', 0);
    $pdf->Cell(35, 20, $row['tipo_combustible'], 1, 0, 'C', 0);
    $pdf->Cell(25, 20, $row['numero_cilindros'], 1, 0, 'C', 0);
    $pdf->Cell(50, 20, $row['caballos_fuerza'], 1, 0, 'C', 0);
    $pdf->Cell(50, 20, $row['tipo_carroceria'], 1, 0, 'C', 0);
    $pdf->Cell(28, 20, $row['color'], 1, 0, 'C', 0);
    $pdf->Cell(34, 20, utf8_decode($row['transmision']), 1, 0, 'C', 0);
    $pdf->Cell(32, 20, $row['serie_motor'], 1, 0, 'C', 0);
    $pdf->Cell(28, 20, $row['capacidad'], 1, 0, 'C', 0);






$pdf->Output();
?>