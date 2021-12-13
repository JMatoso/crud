<!---PHP--->
<?php 
    require_once("../includes/functions.php"); 
    $param = "";
    $search = false;
    $query;
    if(isset($_POST['q'])){
        $search = true;
        $param = $query = cleanInput($_POST['q'], $con);
        $param = "WHERE id = {$param} or frstName = '{$param}' or lstName = '{$param}' or city = '{$param}' or genre = '{$param}' or phone = '{$param}' or age = '{$param}'";
    }else if(isset($_POST['f'])){
        $param = cleanInput($_POST['f'], $con);
        if($param == "alf")
            $param = "ORDER BY frstName ASC";
        else if($param == "alf-desc")
            $param = "ORDER BY frstName DESC";
        else if($param == "asc")
            $param = "ORDER BY id ASC";
        else if($param == "desc")
            $param = "ORDER BY id DESC";
    }else{
        $param = "ORDER BY id DESC";
    }
?>
<!--------->
<table>
    <tr>
        <th class="top-th"><small>ID</small></th>
        <th class="top-th">Primeiro nome</th>
        <th class="top-th">Último nome</th> 
        <th class="top-th">Telefone</th>
        <th class="top-th">Cidade</th>
        <th class="top-th">Gênero</th>
        <th class="top-th">Idade</th>
        <th class="top-th">Ação</th>
    </tr>
    <?php
    $result = getData("users", $param, $con);
    if ($result->num_rows > 0) {
        echo "<small class='text-muted ml-2 my-2'>Usuários (".$result->num_rows.")</small>";
        while($user = $result->fetch_assoc()) { 
            $uid =  htmlentities($user["id"]);
            $frstName = htmlentities($user["frstName"]);
            $lstName =  htmlentities($user["lstName"]);
            $phone =  htmlentities($user["phone"]);
            $city =  htmlentities($user["city"]);
            $genre =  htmlentities($user["genre"]);
            $age =  htmlentities($user["age"]);
            ?>
           <tr>
                <th class="body-th"><small><?php echo $uid; ?></small></th>
                <th class="body-th"><?php echo $frstName; ?></th>
                <th class="body-th"><?php echo $lstName; ?></th>
                <th class="body-th"><a class="text-muted" href="tel:+<?php echo $phone; ?>"><?php echo $phone; ?></a></th>
                <th class="body-th"><?php echo $city; ?></th>
                <th class="body-th"><?php echo $genre; ?></th>
                <th class="body-th"><?php echo $age; ?></th>
                <th class="action-th">
                    <div class="">
                        <button type="button" 
                                class="btn w-40 btn-sm btn-outline-primary" 
                                data-toggle="tooltip" 
                                data-placement="auto" 
                                title="" 
                                data-original-title="Editar"
                                onclick="editUser('<?php echo $uid; ?>')">
                            <i class="fa fa-user-edit"></i>
                        </button>
                        <button type="button" 
                                class="btn w-40 btn-sm btn-outline-danger pl-2" 
                                data-toggle="tooltip" 
                                data-placement="auto" 
                                title="" 
                                data-original-title="Eliminar"
                                onclick="deleteUser('<?php echo $uid; ?>')">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </th>
            </tr>
        <?php }
    } else {
        if($search)
            echo "<h5 class='my-1 text-center focused'>Sem resultados para '$query'</h5>";
        else
            echo "<h5 class='my-1 text-center focused'>Sem usuários</h5>";
    }?>
</table>