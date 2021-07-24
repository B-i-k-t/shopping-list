<?php
// Нахождение и отправка следующего за последним индексом
$sql = mysql_query("SELECT MAX(`id`) FROM sale");
while ($row = mysql_fetch_assoc($sql)) {
    echo json_encode($row['id'] + 1);
}
?>