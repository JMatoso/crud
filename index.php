<!-- Made by Jose Matoso-->

<!---PHP--->
<?php require_once("assets/includes/functions.php"); ?>
<!--------->

<!--Documento-->
<!DOCTYPE html>
<html lang="pt">

<head>
    <!--Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#2196fa">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#2196fa">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#2196fa">
    <!-----> 

    <title>CRUD</title>

    <!--Styes/Links-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/v4-shims.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <!----->
</head>

<body>
    <!--Main-->
    <main role="main"> 
        <!--Container-->
        <div class="container">
                <!--Snackbar-->
                <div id="snackbar"><span id="snack"></span></div>
                <small class="text-m-muted">
                    <a href="http://facebook.com/jastec0" target="_blank" rel="noopener noreferrer">
                        <span class="fa-facebook-span">
                            <i class="fa fa-facebook"></i>
                        </span>                      
                    </a>
                    <a href="mailto:jastecangola@gmail.com" class="ml-1" target="_blank" rel="noopener noreferrer">
                        <span class="fa-google-span">
                            <i class="fa fa-google"></i>
                        </span>                      
                    </a>
                    <span class="ml-1">
                        Jastec - 2020
                    </span>
                </small>
                <div class=" row"> 
                    <!--Title-->
                    <div class="col-md-7">
                        <h1 class="text-center text-primary">CRUD</h1>
                    </div>
                    <!--Search-->
                    <div class="btn-group w-25 col-md-5 top-search">
                        <input type="text"id="textarea" class="form-control" placeholder="Procurar...">
                        <a href="#" class="btn btn-link" id="search">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                   
                </div>
            <!--Content space-->
            <div id="content" class="content">
                <!--Content-->
                <img src='assets/images/lazy-loader.gif' class='image-center' alt='Content Loading Gif'>
            </div>
            <!--Bottom Menu-->
            <div class="container fixed-bottom content-center">
                <!--Menu content-->
                <center>
                    <div class="menu btn-group mr-2">
                        <!--See Users-->
                        <button class="btn btn-light" onclick="seeUsers()">Ver usuários</button>
                        <!--Add User-->
                        <button class="btn btn-light" onclick="addUser()">Adicionar usuários</button>
                        <!--Dropdown button-->
                        <div class="btn-group dropup">
                            <!--Order view-->
                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ordenar por</button>
                            <div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -116px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="#" onclick="filterInfo('alf')">Ordem alfabetica</a>
                                <a class="dropdown-item" href="#" onclick="filterInfo('alf-desc')">Ord. alf. descendente</a>
                                <a class="dropdown-item" href="#" onclick="filterInfo('asc')">Ordem ascendente</a>
                                <a class="dropdown-item" href="#" onclick="filterInfo('desc')">Ordem descendente</a>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </main>
    <!------>
</body>

<!--Scripts-->
<script src="assets/js/jquery-slim.min.js"></script>
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/tooltip.js"></script>
<script src="assets/js/dropdown.js"></script>
<script src="assets/fontawesome/js/all.min.js"></script>
<script src="assets/fontawesome/js/v4-shims.min.js"></script>
<script src="assets/js/app.js"></script>
<!--Scripts-->

</html>

<!---PHP Close conection--->
<?php $con->close(); ?>
<!--------->