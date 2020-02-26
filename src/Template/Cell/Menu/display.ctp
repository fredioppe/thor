  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><a href="meu-perfil-adm.html">
              <?= $userData ?>
          Frederico Ioppe</a></p>
          <p class="text-sm"><i class="fa fa-building"></i> Thor</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="active"><a href="dashboard-adm.html"> <em class="fa fa-dashboard"></em> <span>Dashboard</span> <span class="pull-right-container"> </span> </a>
        </li>



<li>
          <a href="grid-empresas-adm.html">
            <i class="fa fa-building"></i>
            <span>Empresas</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="ion ion-person-stalker"></i>
            <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="grid-usuarios-adm.html"><i class="fa fa-circle-o"></i> Gerenciar usuários</a></li>
            <li><a href="grid-liberar-usuarios-adm.html"><i class="fa fa-circle-o"></i> Liberar solicitações</a></li>
          </ul>
        </li>
        <li>
          <a href="relatorios-adm.html">
            <i class="fa fa-line-chart"></i>
            <span>Relatórios</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="ion ion-power"></i>
            <span>Sair</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

             
