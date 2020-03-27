<?php

    include "db_connection.php";

    $query = "SELECT * FROM zwierzeta ORDER BY object_name ASC";

    $dispatch = $con->prepare($query);
    $dispatch->execute();
    $result = $dispatch->fetchAll();

    $out = '<option value="0">Nazwa rodzica</option>';

    foreach($result as $row)
    {
        $out .= '<option value="'.$row["object_id"].'">'.$row["object_name"].'</option>';
    }

    echo $out;

?>