<?php

require 'database.php';

$db = Database::connect();
$type = empty($_GET['type']) ? 'nombre' : $_GET['type'];

if($type === 'nombre') {
    $table1 = 'number';
    $table2 = 'reference';
    $table3 = 'voitures';
    $foreign = 'reference.id';
} else {
    throw new Exception('Unknown type ' . $type);
}

$query = $db->prepare("SELECT MAX(number.value), MAX(number.id) FROM $table3 INNER JOIN $table2 ON voitures.id_ref = $foreign INNER JOIN $table1 ON voitures.id_num = number.id WHERE $foreign = ?");
$query->execute([$_GET['filter']]);
$items = $query->fetchAll();

header('Content-Type: application/json');
echo json_encode(array_map(function ($item) {
    return [
        'id' => $item['MAX(number.id)'] + 1,
        'value' => $item['MAX(number.value)'] + 1
    ];
}, $items));

