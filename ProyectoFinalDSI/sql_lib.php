<?php
class RunResults
{
    public bool|mysqli_result $result;
    public int|string $affectedRows;
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