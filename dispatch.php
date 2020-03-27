<?php

    include "db_connection.php";

    $parent_id = 0;

    $sql = "SELECT * FROM zwierzeta";

    $dispatch = $con->prepare($sql);
    $dispatch->execute();
    $result = $dispatch->fetchAll();

    foreach($result as $row)
    {
        $data = data_node($parent_id, $con);
    }

    echo json_encode(array_values($data));

    function data_node($parent_id, $con)
    {
        $sql = "SELECT * FROM zwierzeta WHERE parent_id = '".$parent_id."'";

        $dispatch = $con->prepare($sql);
        $dispatch->execute();
        $result = $dispatch->fetchAll();
        $out = array();

        foreach($result as $row)
        {
            $sub = array();
            $sub['text'] = "ID_R = ".$row['parent_id']." , ".$row['object_name'] ;
            $sub['nodes'] = array_values(data_node($row['object_id'], $con));
            $out[] = $sub;
        }
        return $out;
    }

?>