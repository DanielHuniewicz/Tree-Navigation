<?php
    include "db_connection.php";

    $data = array(
    ':object_name'  => $_POST['child'],
    //':parent_id' => $_POST['parent']
    ':parent_id' => $_POST['parent_id2']
    );

    $sql = "UPDATE `zwierzeta` SET `parent_id` =:parent_id WHERE `object_name`= :object_name";

    $dispatch = $con->prepare($sql);

    if($dispatch->execute($data))
    {
    echo 'Rodzic zedytowany';
    }
?>



