
<?php
    // Добавление записи в таблицу
    include_once "db.php";
    $data = json_decode(trim(file_get_contents('php://input')),true);
    $name = $data['name'];
    $count = $data['count'];
    $comment = $data['comment'];
    $item = $data['item'];
    $add = "INSERT INTO sale (name, amount, comment, item) VALUES ('$name', '$count', '$comment', '$item')";
    mysqli_query($conn, $add);
    echo json_encode($name);
?>