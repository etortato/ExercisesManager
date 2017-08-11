<?php
/**
 * Created by PhpStorm.
 * User: ebastos
 * Date: 14/04/2017
 * Time: 17:13
 */
include_once "./rules/ValidaLogin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Professores</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-table.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/noty.css">
    <script src="js/jquery-3.2.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script src="js/bootstrap-table-pt-BR.js"></script>
    <script src="js/noty.js"></script>
    <script src="js/custom.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top nav-noborder" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a class="btn btn-toolbar btn-selected" href="#">Professores</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="container-full jumbotron" style="padding-bottom: 20px; padding-top: 70px">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#dialogCadastraProfessor">
                NOVO PROFESSOR
            </div>
        </div>
    </div>
</div>
<?php
include_once "Professores.php";
?>
<div class="container">
    <div class="row">
        <hr>
        <div class="col-lg-12">
            <div class="col-sm-12 col-md-6">
                Feito com: <a href="getbootstrap.com">Bootstrap</a> | <a href="http://bootstrap-table.wenzhixin.net.cn/">BootstrapTable</a> | <a href="http://ned.im/noty/">Noty</a> | <a href="https://secure.php.net/">PHP</a>
            </div>
            <div class="col-sm-12 col-md-6">
                <p class="muted pull-right">© 2017 Eduardo Tortato. Universidade Federal do Paraná</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
