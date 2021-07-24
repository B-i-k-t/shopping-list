
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="index.js"> </script>
    <title>Список Покупок</title>
</head>
<body>

    <h1> Список покупок </h1>
    <button class="btn__add" onclick="add()"> Добавить
    <button class="btn__clear" onclick="clearAll()"> Очистить </button>
    <div>
    <?php
    include_once "db.php";
    // Проверка на пустоту таблицы при первой загрузке и вывод записей если не пуста
    $sql_show_table = 'SELECT id, name, amount, comment, buy, item  FROM sale';
    $show_table = mysqli_query($conn, $sql_show_table);
    if (mysqli_num_rows ($show_table) != 0)
    {
        while ($row = mysqli_fetch_array($show_table)) { 
            echo '<script> 
            let save__item'.$row["item"].' = document.createElement("div");
            save__item'.$row["item"].'.className = "item__save";
            save__item'.$row["item"].'.id = "item__save'. $row["item"] . '";
            save__item'.$row["item"].'.innerHTML = "' . $row["name"] . '" + " " + "'. $row["amount"] .'" + " шт. (" + "'. $row["comment"] .'"  + ")";
            let buy'.$row["item"].' = document.createElement("button");
            buy'.$row["item"].'.className = "btn__buy";
            buy'.$row["item"].'.innerHTML = "Куплено";
            let buy_ident'.$row["item"].' = "button_buy( ' . $row["item"] . ' )";
            buy'.$row["item"].'.setAttribute("onclick", buy_ident'.$row["item"].');
            save__item'.$row["item"].'.append(buy'.$row["item"].');
            let del'.$row["item"].' = document.createElement("button");
            del'.$row["item"].'.className = "btn__del";
            del'.$row["item"].'.innerHTML = "Удалить";
            let del_ident'.$row["item"].' = "button_del(' . $row["item"] . ')";
            del'.$row["item"].'.setAttribute("onclick", del_ident'.$row["item"].');
            save__item'.$row["item"].'.append(del'.$row["item"].');
            document.body.append(save__item'.$row["item"].');
            let item__buy'.$row["item"].' = document.getElementById("item__save' . $row["item"] . '");
            if (' . $row["buy"] . ' == 0) {       
                 item__buy'.$row["item"].'.style.textDecoration = "none";
            }
            else {
                item__buy'.$row["item"].'.style.textDecoration = "line-through";
            }
        </script>';
        };
    }
    

?>
    </div>
    
</body>
</html>