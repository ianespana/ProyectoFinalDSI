<?php
class RunResults
{
    public bool|mysqli_result $result;
    public int|string $affectedRows;
}

class InsertResults
{
    public bool|mysqli_result $result;
    public int|string $affectedRows;
    public int|string $insertId;
}

function Connect(): bool|mysqli
{
    return mysqli_connect("localhost", "root", "", "control_vehicular_31");
}

function Close(mysqli $conn): bool {
    return mysqli_close($conn);
}

function RunQuery(string $query): RunResults
{
    $conn = Connect();
    $result = mysqli_query($conn, $query);

    $results = new RunResults();
    $results->result = $result;
    $results->affectedRows = mysqli_affected_rows($conn);

    Close($conn);
    return $results;
}

function InsertArray(string $table, array $array, array $exclude): InsertResults
{
    $query = "INSERT INTO $table SET";
    foreach ($array as $key => $value) {
        if (!in_array($key, $exclude) && $value) {
            $query .= " $key = '$value',";
        }
    }

    $query = rtrim($query, ",");
    $conn = Connect();
    $result = mysqli_query($conn, $query);

    $results = new InsertResults();
    $results->result = $result;
    $results->affectedRows = mysqli_affected_rows($conn);
    $results->insertId = mysqli_insert_id($conn);

    Close($conn);
    return $results;
}

// function createXMLFile($vehiculos){

// $conn = Connect();
// $vehiculo = array();
// $sql = "SELECT id, niv, tipo, marca, modelo, numero_serie, clase, tipo_combustible, caballos_fuerza, tipo_carroceria, color, transmision, serie_motor, capacidad FROM vehiculos"

// if($result = $mysqli->query($sql)){
//     $vehiculo = $result->fetch_all(MYSQLI_ASSOC);

//     if(count($vehiculos)){
        
//         $xmlFile = createXMLFile($vehiculos);
//         echo "Archivo generado exitosamente";
//     } else {
//         echo "No se ha encontrado un registro";
//     }

//     $result->free();

// }
// mysqli->close();




//     $filepath = '../proyecto_final/vehiculos.xml';

//     $dom = new DOMDocument('1.0', 'utf-8');
//     $root = $dom->createElement('vehiculos');

//     foreach ($vehiculos as $vehiculo){

//         $vehiculoElemento = $dom->createElement('vehiculo');
//         $vehiculoElemento->setAttribute('id',$vehiculo['id']);

//         $niv = $dom->createElement('niv', ($vehiculo['niv']));
//         $vehiculoElemento->appendChild($niv);

//         $tipo = $dom->createElement('tipo', ($vehiculo['tipo']));
//         $vehiculoElemento->appendChild($tipo);
        
//         $marca = $dom->createElement('marca', ($vehiculo['marca']));
//         $vehiculoElemento->appendChild($marca);
        
//         $modelo = $dom->createElement('modelo', ($vehiculo['modelo']));
//         $vehiculoElemento->appendChild($modelo);
        
//         $numero_serie = $dom->createElement('numero_serie', ($vehiculo['numero_serie']));
//         $vehiculoElemento->appendChild($numero_serie   );
        
//         $clase = $dom->createElement('clase', ($vehiculo['clase']));
//         $vehiculoElemento->appendChild($clase);
        
//         $tipo_combustible = $dom->createElement('tipo_combustible', ($vehiculo['tipo_combustible']));
//         $vehiculoElemento->appendChild($tipo_combustible);
        
//         $numero_cilindros = $dom->createElement('numero_cilindros', ($vehiculo['numero_cilindros']));
//         $vehiculoElemento->appendChild($numero_cilindros);
        
//         $caballos_fuerza = $dom->createElement('caballos_fuerza', ($vehiculo['caballos_fuerza']));
//         $vehiculoElemento->appendChild($caballos_fuerza);
        
//         $tipo_carroceria = $dom->createElement('tipo_carroceria', ($vehiculo['tipo_carroceria']));
//         $vehiculoElemento->appendChild($tipo_carroceria);
        
//         $color = $dom->createElement('color', ($vehiculo['color']));
//         $vehiculoElemento->appendChild($color);
        
//         $transmision = $dom->createElement('transmision', ($vehiculo['transmision']));
//         $vehiculoElemento->appendChild($transmision);
        
//         $serie_motor = $dom->createElement('serie_motor', ($vehiculo['serie_motor']));
//         $vehiculoElemento->appendChild($serie_motor);
        
//         $capacidad = $dom->createElement('capacidad', ($vehiculo['capacidad']));
//         $vehiculoElemento->appendChild($capacidad);

//         $root->appendChild($vehiculoElemento);
//     }

//     $dom->appendChild($root);
    
//     if($dom->save($filePath)){

//         return $filepath;
//     }
//     return false;
// }