<?php require_once("../includes/functions.php"); 
$frstName = cleanInput($_POST['frstName'], $con);
$lstName = cleanInput($_POST['lstName'], $con);
$phone = cleanInput($_POST['phone'], $con);
$city = cleanInput($_POST['city'], $con);
$genre = cleanInput($_POST['genre'], $con);
$age = cleanInput($_POST['age'], $con);

$sql = "INSERT INTO users (frstName, lstName, phone, city, genre, age)
        VALUES ('{$frstName}', '{$lstName}', '{$phone}', '{$city}', '{$genre}', {$age})";

if ($con->query($sql) === TRUE) {
    echo "Usuário adicionado";
} else {
    echo "Erro ao adicionar usuário, tente novamente";
}
$con->close();