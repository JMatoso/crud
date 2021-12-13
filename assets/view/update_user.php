<?php require_once("../includes/functions.php"); 
$uid = cleanInput($_POST['id'], $con);
$frstName = cleanInput($_POST['frstName'], $con);
$lstName =  cleanInput($_POST['lstName'], $con);
$phone =  cleanInput($_POST['phone'], $con);
$city =  cleanInput($_POST['city'], $con);
$genre =  cleanInput($_POST['genre'], $con);
$age =  cleanInput($_POST['age'], $con);

$sql = "UPDATE users SET frstName = '{$frstName}', lstName = '{$lstName}', phone = '{$phone}', 
        city = '{$city}', genre = '{$genre}', age = {$age} WHERE id = {$uid} LIMIT 1";

if ($con->query($sql) === TRUE) {
    echo "Usuário atualizado";
} else {
    echo "Erro ao atualizar usuário, tente novamente";
}
$con->close();