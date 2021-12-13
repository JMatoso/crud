<?php
$servername = "localhost";
$username = "matoso";
$password = "";
$database = "crud";

global $con;
// Criar conexao
$con = new mysqli($servername, $username, $password, $database);

// Verificar conexao
if ($con->connect_error)
    die("Erro ao conectar ao banco de dados! " . $con->connect_error);

function cleanInput($input, $con){
    $input = htmlspecialchars($input);
    $input = mysqli_real_escape_string($con, $input);
    return $input;
}
function goodQuery($result){
    if(!$result)
        die("<title>CRUD</title><small class='badge badge-danger py-2 mb-2'>Algo correu mal!</small>");
}
function getData($table, $param, $con){
    $sql = "SELECT * FROM users {$param}";
    $result = $con->query($sql);
    goodQuery($result);
    return $result;
}
function getSingleData($table, $param, $con){
    $sql = "SELECT * FROM users {$param}";
    $result = $con->query($sql);
    goodQuery($result);
    if ($result->num_rows > 0) {
        while($result = $result->fetch_assoc()) { 
            return $result;
        }
    }else{
        return null;
    }
}
function deleteData($table, $param, $con){
    $sql = "DELETE FROM users WHERE id = '{$param}' LIMIT 1";
    $result = $con->query($sql);
    goodQuery($result);
    if ($con->query($sql) === TRUE) {
        echo "Usuário eliminado";
    } else {
        echo "Erro ao eliminar usuário: " . $con->error;
    }
}
function fromArray($table, $order, $page, $con){
    $qntd = 1;
    $numOfContents = $qntd * $page;
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT $numOfContents, $qntd";
    $result = $con->query($sql);
    
    goodQuery($result);
    return $result;
}