<?php
    // соединение с бд
    $conn = mysqli_connect("localhost", "root", "", "test");
    if ($conn == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        die;
    }
?>