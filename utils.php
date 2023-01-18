<?php
class UploadResults
{
    public bool $valid = false;
    public string $urlTemp;
    public string $urlInsert;
    public string $urlTarget;
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

    $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;
    $result->urlTarget = $url_target;

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