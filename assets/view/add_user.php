<!---PHP--->
<?php 
    require_once("../includes/functions.php"); 
    $frstName = ""; $lstName = ""; $update = 0; $title = "Adicionar usuário";
    $phone = ""; $city = ""; $genre = ""; $age = "";
    if(isset($_POST['id'])){
        $param = cleanInput($_POST['id'], $con);
        $user = getSingleData("users", "WHERE id = {$param}", $con);
        $uid = htmlentities($user["id"]);
        $frstName = htmlentities($user["frstName"]);
        $lstName = htmlentities($user["lstName"]);
        $phone = htmlentities($user["phone"]);
        $city = htmlentities($user["city"]);
        $genre = htmlentities($user["genre"]);
        $age = htmlentities($user["age"]);
        $title = "Editando '$frstName $lstName'";
        $update = $param;
    }
?>
<!--------->
<div id="personal-info">
    <h5 class="my-1 text-center focused"><?php echo $title; ?></h5>
    <small class="text-muted">Registro</small>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="firstName">Primeiro nome</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $frstName; ?>" required="">
            <small class="badge badge-danger invisible" id="fnError">Insira um primeiro nome válido!</small>
        </div>
        <div class="col-md-4 mb-3">
            <label for="lastName">Último nome</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $lstName; ?>" required="">
            <small class="badge badge-danger invisible" id="lnError">Insira um último nome válido!</small>
        </div>
        <div class="col-md-2 mb-3">
            <label for="genre">Gênero</label>
            <select class="custom-select d-block w-100" id="genre" value="<?php echo  $genre; ?>" required="">
                <option selected>Masculino</option>
                <option>Feminino</option>
            </select>
            <small class="badge badge-danger invisible" id="gError">Gênero inválido!</small>
        </div>
        <div class="col-md-2 mb-3">
            <label for="age">Idade</label>
            <input type="number" class="form-control" id="age" placeholder="" value="<?php echo $age; ?>" required="">
            <small class="badge badge-danger invisible" id="iError">Idade inválida!</small>     
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="address">Telefone</label>
            <input type="text" class="form-control" id="phone" placeholder="9XX-XXX-XXX" value="<?php echo $phone; ?>" required="">
            <small class="badge badge-danger invisible" id="aError">Insira um telefone válido!</small>
        </div>
        <div class="col-md-6 mb-3">
            <label for="country">Cidade</label>
            <select class="custom-select d-block w-100" id="city" value="<?php echo $city; ?>" required="">
                <option selected>Luanda</option>
                <option>Kilamba</option>
                <option>Viana</option>
                <option>Maianga</option>
                <option>Mutamba</option>
            </select>
            <small class="badge badge-danger invisible" id="cError">Insira uma cidade válida!</small>
        </div>
    </div>
    <button class="btn btn-primary btn-lg btn-block mb-2" id="addUser" onclick="newUser('<?php echo $update; ?>')">Salvar</button>
</div>