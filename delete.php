
<?php 
   include "db_connection.php";

   $data = $_POST['name'];

   $sql = " DELETE FROM `zwierzeta` WHERE `object_name` =  :object_name";
   
   $dispatch = $con->prepare($sql); 
   $dispatch->bindValue(':object_name', $data);
   $delete = $dispatch->execute();
   
   if($delete)
   {
   echo 'Obiekt usuniety';
   }
?>