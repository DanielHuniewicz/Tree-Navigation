<?php
    include "db_connection.php";

    $data = array(
    ':object_name'  => $_POST['object_name'],
    ':parent_id' => $_POST['parent_id']
    );

    $sql = "INSERT INTO `zwierzeta` (`object_name`, `parent_id`) VALUES (:object_name, :parent_id)";

    $dispatch = $con->prepare($sql);

    if($dispatch->execute($data))
    {
    echo 'Obiekt dodany';
    }
?>