<?php 
    require_once("../includes/functions.php"); 
    if(isset($_POST['id'])){
        $param = cleanInput($_POST['id'], $con);
        deleteData('users', $param, $con);
    }
    $con->close();
?>
