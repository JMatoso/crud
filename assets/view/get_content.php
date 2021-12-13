<!---PHP--->
<?php require_once("../includes/functions.php"); ?>
<!--------->
<?php
if(isset($_POST["page"])){
    $page = cleanInput($_POST["page"], $con);
    $upArray = fromArray("ups","desc", $page, $con);
    foreach ($upArray as $up):
        $uid =  htmlentities($up["id"]);
        $frstName = htmlentities($up["frstName"]);
        $lstName =  htmlentities($up["lstName"]);
        $phone =  htmlentities($up["phone"]);
        $city =  htmlentities($up["city"]);
        $genre =  htmlentities($up["genre"]);
        $age =  htmlentities($up["age"]);
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
                                onclick="editup('<?php echo $uid; ?>')">
                            <i class="fa fa-up-edit"></i>
                        </button>
                        <button type="button" 
                                class="btn w-40 btn-sm btn-outline-danger pl-2" 
                                data-toggle="tooltip" 
                                data-placement="auto" 
                                title="" 
                                data-original-title="Eliminar"
                                onclick="deleteup('<?php echo $uid; ?>')">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </div>
                </th>
            </tr>            
        <?php
    endforeach;
}
?>
<!---PHP Close conection--->
<?php $con->close(); ?>
<!--------->