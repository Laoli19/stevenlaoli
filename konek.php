<?php
$host="localhost";
$user = "root";
$password= "";
$databasename ="e-church";

$db = mysqli_connect($host,$user,$password, $databasename);

// Periksa koneksi ke database
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


function query($query){
    global $db;
    $result =mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows []= $row;
    }
    return $rows;
}
?>