<!DOCTYPE html>
<html>
<?php

$id = $_GET["id"];


if (empty($_GET["id"])) {
    //eliminar por id
} else {
    //mostrar productos y eliminar ahi
}
?>
<div>
    <label for="categoria">Elige la categoria:</label>


    <?php
    $dbData = array(
        "servername" => "",
        "username" => "",
        "password" => "",
        "dbname" => ""
    );

    $defaultFile = fopen("../user_data.txt", "r");

    foreach ($dbData as $index => $value) {
        $newLine = fgets($defaultFile);
        $dbData[$index] = trim($newLine);
    }

    $mysqli = new mysqli($dbData["servername"], $dbData["username"], $dbData["password"], $dbData["dbname"]);
    $query = "SELECT id, nombre FROM productos";
    $result = $mysqli->query($query);

    echo '<select name="categoria">';

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nombre = $row['nombre'];

        echo '<option value="' . $id . '">' . $nombre . '</option>';
    }
    echo '</select>';

    // Close the database connection
    $mysqli->close();






    ?>

</div>

</html>