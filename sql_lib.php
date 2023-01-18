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