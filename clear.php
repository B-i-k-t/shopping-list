<?php 
    // Очищение таблицы
    include_once "db.php";
    $clear = 'TRUNCATE TABLE sale';
    mysqli_query($conn, $clear);
?>