<?php
    // Поставить признак куплено в запись таблицы
    include_once "db.php";
    $data = json_decode(trim(file_get_contents('php://input')),true);
    $item = $data['item'];
    $buy = "UPDATE sale SET buy = 1 WHERE item = '$item'";
    mysqli_query($conn, $buy);
    echo json_encode($item);
?>