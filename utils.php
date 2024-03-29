<?php
include "pdf_mysql.php";

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial','',18);
        $this->Cell(160,10,'Reporte',0,1,'C');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
    }
}

function GeneratePDF(string $table, string $key, string $value): void {
    GenerateXML($table, $key, $value);
    $width = 400;
    if ($table == "vehiculos") {
        $width = 600;
    }

    $pdf = new PDF("L", "mm", array($width,100));
    $pdf->AddPage("L");
    $pdf->Table("SELECT * FROM $table WHERE $key = '$value'");
    $pdf->Output();
}

function GenerateXML(string $table, string $key, string $value): void {
    $xml = new SimpleXMLElement('<objects/>');
    $results = RunQuery("SELECT * FROM $table WHERE $key = '$value'");
    foreach ($results->result as $key => $var) {
        if ($key === 0) {
            foreach ($var as $k => $v) {
                $obj = $xml->addChild('attribute');
                $obj->addChild('name', $k);
                $obj->addChild('value', $v);
            }
        }
    }

    $xml->asXML("../xmls/respaldo_$table-$value.xml");
}

class UploadResults
{
    public bool $valid = false;
    public string $urlTemp;
    public string $urlInsert;
    public string $urlTarget;
    public string $urlRelativeDir;
    public string $fileType;
    public string $error;
}

function ProcessUpload(array $files, string $inputName): UploadResults {
    $result = new UploadResults();

    $file = $files[$inputName]["name"];
    $file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    $result->fileType = $file_type;

    $url_temp = $files[$inputName]["tmp_name"];
    $result->urlTemp = $url_temp;

    $url_insert = dirname(__FILE__) . "/uploads";
    $result->urlInsert = $url_insert;

    $url_target = str_replace("\\", "/", $url_insert) . "/$file";
    $result->urlTarget = $url_target;
    $result->urlRelativeDir = "/uploads/$file";

    if (!file_exists($url_insert)) {
        mkdir($url_insert, 0777, true);
    }

    $file_size = $files[$inputName]["size"];
    if ($file_size > 1000000) {
        $result->error = "El archivo es muy pesado";
        return $result;
    }

    if ($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif" ) {
        $result->error = "Solo se permiten imágenes tipo JPG, JPEG, PNG & GIF";
        return $result;
    }

    $result->valid = true;
    return $result;
}

function PrettifyString(string $input): string {
    $input = str_replace("_", " ", $input);
    return ucwords(strtolower($input));
}

function DisplayData(mysqli_result $data, string $table, bool $admin = false): string
{
    if ($data->num_rows == 0) return "No se ha encontrado ningun resultado.";

    $output = "<div class='table-wrapper'><table class='fl-table'>";
    foreach ($data as $key => $var) {
        if ($key === 0) {
            $output .= "<thead><tr>";
            foreach ($var as $k => $v) {
                $prettyName = PrettifyString($k);
                $output .= "<th>$prettyName</th>";
            }

            if ($admin) {
                $output .= "<th>Update</th>";
                $output .= "<th>Delete</th>";
            }

            $output .= "</tr></thead><tbody>";
        }

        $output .= "<tr>";
        $output .= DisplayRow($var, $key, $table, $admin);
        $output .= "</tr>";
    }

    $output .= "</tbody></table></div>";
    return $output;
}

function DisplayRow($row, int $key, string $table, bool $admin = false): string
{
    $output = "";
    if ($admin) {
        $output = "<form action=\"./select_a.php\" method=\"post\">";
        $output .= "<input type=\"hidden\" name=\"table\" value=\"$table\"/>";
    }

    foreach ($row as $k => $v) {
        $output .= "<td>";
        if ($admin) {
            if ($k === "id") {
                $output .= "<input type=\"hidden\" type=\"text\" id=\"$k\" name=\"$k\" value=\"$v\">$v";
            } else {
                $output .= "<input type=\"text\" id=\"$k\" name=\"$k\" value=\"$v\">";
            }
        } else {
            $output .= $v;
        }
        $output .= "</td>";
    }

    if ($admin) {
        $output .= "<td>";
        $output .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
        $output .= "</td><td>";
        $output .= "<input type=\"submit\" name=\"delete\" value=\"Delete\">";
        $output .= "</td>";
    }

    $output .= "</form>";

    return $output;
}