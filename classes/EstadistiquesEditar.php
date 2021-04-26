<?php

include_once '../DB/DatabaseOOP.php';
include_once '../DB/EstadistiquesRow.php';

$nivell = $_POST['nivellE'];
$modalitat = $_POST['modalidadE'];
$data_partida = $_POST['data_partida'];
$intents = $_POST['intents'];
$id = $_POST['idE'];

$db = null;
$result = null;
try {
    $db = new DatabaseOOP("localhost", "root", "", "m07uf4");
    $db->connect();
    $db->editarPerId($id, $modalitat, $nivell, $data_partida, $intents);
    $result = $db->selectAll();

    echo DatabaseOOP::TABLE_START;
    foreach (new EstadistiquesRow(new RecursiveArrayIterator($row = $result->fetch_all(MYSQLI_ASSOC))) as $key => $row) {
        echo $row;
    }
} catch (Exception $error) {
    echo "connection failed: " . $error->getMessage();
}
echo DatabaseOOP::TABLE_END;
