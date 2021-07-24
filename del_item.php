<?php
    // Удаление записи из таблицы
    include_once "db.php";
    $data = json_decode(trim(file_get_contents('php://input')),true);
    $item = $data['item'];;
    $del = "DELETE FROM sale WHERE item = '$item'";
    mysqli_query($conn, $del);
    echo json_encode($item);
?>