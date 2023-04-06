<?php
session_start();
include "verifica_adm.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Div Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css" />
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="pianelcss/form_banner.css">
    <script src="js/newbanner.js"></script>
    <script src="js/newproduto.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Div Lanchonete</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="dist/img/avatar5.png" class="user-image" alt="User Image" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['adm']?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image" />

                                    <p>
                                        Fulano Junior - Web Developer
                                        <small>Membro desde Abr. 2018</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../views/login/logout_adm.php" class="btn btn-default btn-flat">logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/avatar5.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['adm']?></p>
                        <!-- Status -->
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="usuarios.php"><i class="fa fa-users"></i> <span>Usuários</span></a>
                    </li>

                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="#"><i class="fa fa-users"></i> <span>Administradores</span></a>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="all_produtos.php"><i class="fa fa-users"></i> <span>Produtos</span></a>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="all_categorias.php"><i class="fa fa-users"></i> <span>Categorias</span></a>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="all_banners.php"><i class="fa fa-users"></i> <span>Banners</span></a>
                    </li>
                     <!-- Optionally, you can add icons to the links -->
                     <li class="active">
                        <a href="pedidos.php"><i class="fa fa-users"></i> <span>Pedidos</span></a>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="pedidos_aceitos.php"><i class="fa fa-users"></i> <span>Pedidos em preparação</span></a>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="pedidos_recusados.php"><i class="fa fa-users"></i> <span>Pedidos Recusados</span></a>
                    </li>
                
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                        <a href="pedidos_acaminho.php"><i class="fa fa-users"></i> <span>Pedidos Acaminho</span></a>
                    </li>

                     <!-- Optionally, you can add icons to the links -->
                     <li class="active">
                        <a href="pedidos_finalizados.php"><i class="fa fa-users"></i> <span>Pedidos Finalizados</span></a>
                    </li>
                     <!-- Optionally, you can add icons to the links -->
                     <li class="active">
                        <a href="../views/login/logout_adm.php"><i class="fa fa-users"></i> <span>Sair</span></a>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Div Painel
                    <small>Gerenciamento do sistema</small>
                </h1>


