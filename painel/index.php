<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Div Admin</title>
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <link
      rel="stylesheet"
      href="bower_components/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="bower_components/font-awesome/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="bower_components/Ionicons/css/ionicons.min.css"
    />
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css" />
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css" />
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
          <a
            href="#"
            class="sidebar-toggle"
            data-toggle="push-menu"
            role="button"
          >
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
                  <img
                    src="dist/img/avatar5.png"
                    class="user-image"
                    alt="User Image"
                  />
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Nome do administrador</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img
                      src="dist/img/avatar5.png"
                      class="img-circle"
                      alt="User Image"
                    />

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
                      <a href="#" class="btn btn-default btn-flat">Sair</a>
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
              <img
                src="dist/img/avatar5.png"
                class="img-circle"
                alt="User Image"
              />
            </div>
            <div class="pull-left info">
              <p>Nome do administrador</p>
              <!-- Status -->
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Usuários</span></a>
            </li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"
                ><i class="fa fa-users"></i> <span>Administradores</span></a
              >
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Produtos</span></a>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"
                ><i class="fa fa-users"></i> <span>Categorias</span></a
              >
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Banners</span></a>
            </li>
               <!-- Optionally, you can add icons to the links -->
               <li class="active">
              <a href="pedidos.php">
                <i class="fa fa-users"></i> <span>Pedidos</span></a>
             <!-- Optionally, you can add icons to the links -->
             <li class="active">
              <a href="#">
                <i class="fa fa-users"></i> <span>Pedidos Aceitos</span></a>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Pedidos Aceitos</span></a
              >
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Pedidos Recusados</span></a
              >
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i>
                <span>Pedidos em Preparação</span></a
              >
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
              <a href="#"><i class="fa fa-users"></i> <span>Pedidos Acaminho</span></a
              >
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
          <ol class="breadcrumb">
            <li>
              <a href="/"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="active">Usuários</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Usuários</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Fulano</td>
                        <td>fulano@hcode.com.br</td>
                        <td>
                          <button
                            type="button"
                            class="btn btn-primary btn-xs btn-flat"
                          >
                            Editar
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger btn-xs btn-flat"
                          >
                            Excluir
                          </button>
                        </td>
                      </tr>

                      <tr>
                        <td>Fulano</td>
                        <td>fulano@hcode.com.br</td>
                        <td>
                          <button
                            type="button"
                            class="btn btn-primary btn-xs btn-flat"
                          >
                            Editar
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger btn-xs btn-flat"
                          >
                            Excluir
                          </button>
                        </td>
                      </tr>

                      <tr>
                        <td>Fulano</td>
                        <td>fulano@hcode.com.br</td>
                        <td>
                          <button
                            type="button"
                            class="btn btn-primary btn-xs btn-flat"
                          >
                            Editar
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger btn-xs btn-flat"
                          >
                            Excluir
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <!-- ./col -->
                <div class="col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>44</h3>

                      <p>Usuários</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-xs-6">
                  <!-- banners -->
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3>3</h3>

                      <p>Produtos</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-barcode-outline"></i>
                    </div>
                  </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
                <div class="col-xs-6">
                  <!-- banners -->
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3>3</h3>

                      <p>categorias</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-categ"></i>
                    </div>
                  </div>
                </div>
                <!-- ./col -->

                <div class="col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>15</h3>

                      <p>Administradores</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
              </div>

              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Novo Administrador</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form-user-create">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputName">Nome</label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputName"
                        placeholder="Digite o nome do usuário"
                        name="name"
                      />
                    </div>
                    <div class="form-group">
                      <label>Gênero</label>
                      <div class="radio">
                        <label for="exampleInputGenderM">
                          <input
                            type="radio"
                            id="exampleInputGenderM"
                            name="gender"
                          />
                          Masculino</label
                        >
                      </div>
                      <div class="radio">
                        <label for="exampleInputGenderF">
                          <input
                            type="radio"
                            id="exampleInputGenderF"
                            name="gender"
                          />
                          Feminino</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputBirth">Nascimento</label>
                      <input
                        type="date"
                        class="form-control"
                        id="exampleInputBirth"
                        name="birth"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCountry">País</label>
                      <select
                        class="form-control"
                        id="exampleInputCountry"
                        name="country"
                      >
                        <option value="" selected="selected">
                          Selecione um país
                        </option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">E-mail</label>
                      <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        placeholder="Digite o e-mail"
                        name="email"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Senha</label>
                      <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Crie uma senha"
                        name="password"
                      />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Foto</label>
                      <input type="file" id="exampleInputFile" name="photo" />
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="admin" /> Administrador
                      </label>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                      Salvar
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <a target="_blank" href="https://www.hcode.com.br">Hcode</a>
        </div>
        <!-- Default to the left -->
        Projeto desenvolvido Por Douglas e Reinaldo
      </footer>
    </div>
  </body>
</html>
