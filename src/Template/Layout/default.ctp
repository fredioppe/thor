<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Thor';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
     <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>
        <?= $cakeDescription ?>
    </title>
   
     
      <!-- Bootstrap 3.3.6 -->
  <?php 
  echo $this->Html->css('/webroot/Projeto/bootstrap/css/bootstrap.min.css');                  
  //<!-- Font Awesome -->
  echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');     

  //<!-- Ionicons -->
  echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css');     
  echo  $this->Html->css('/webroot/Projeto/plugins/fullcalendar/fullcalendar.min.css');

echo $this->Html->css('/webroot/Projeto/plugins/fullcalendar/fullcalendar.print.css'); 

  //<!-- Theme style --> 
  echo $this->Html->css('/webroot/Projeto/dist/css/AdminLTE.min.css'); 

  //<!-- AdminLTE Skins. Choose a skin from the css/skins
    //   folder instead of downloading all of them to reduce the load. -->
 echo $this->Html->css('/webroot/Projeto/dist/css/skins/_all-skins.min.css'); ?>     



</head>

      
  <body class="sidebar-mini wysihtml5-supported skin-black">
<div class="wrapper">

  <header class="main-header">

               <?php echo $this->Html->link( "<span class='logo-mini'><b>T</b>H</span>
               <span class='logo-lg'><b>T</b>hor</span>", 
                ['controller'=>'Dashboards', 'action'=>'index' ],['class'=>'logo','escape'=>false]); ?>     
  
   

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php if($this->request->params['controller']==='Docrecs'){
                echo '<a class="btn btn-app-menutop" href="'. $this->Url->build(array('controller'=>'produtos','action'=>'index')) .'"'.' ><span>' . __('Conta-Corrente') . '</span></a>';
      }
      ?>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 
         if ($userImagem){
          echo $this->Html->image('/webroot/img/'.$userImagem, ['class'=>'img-circle','style'=>'width: 21px' ,'alt'=>'User Image']);  
         }else{
         echo $this->Html->image('/webroot/Projeto/dist/img/user2-160x160.jpg', ['class'=>'img-circle','style'=>'width: 21px' , 'alt'=>'User Image']);  
         }
         ?>
              <span class="hidden-xs"><?= $userNome ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php 
         if ($userImagem){
          echo $this->Html->image('/webroot/img/'.$userImagem, ['class'=>'img-circle', 'alt'=>'User Image']);  
         }else{
         echo $this->Html->image('/webroot/Projeto/dist/img/user2-160x160.jpg', ['class'=>'img-circle', 'alt'=>'User Image']);  
         }
         ?>
                

                <p>  <?= $userNome ?>
                 
                  <small><?= $userEmpresa ?></small>
                </p>
              </li>
              <!-- Menu Body -->  

<!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   <?php echo $this->Html->link(__('Editar perfil'), 
                    ['controller'=>'Users', 'action'=>'perfil' ],
                    ['class' => 'btn btn-default btn-flat']);          ?>
                </div>
                <div class="pull-right">
               <?php echo $this->Html->link(__('Sair'), 
                    ['controller'=>'Users', 'action'=>'logout' ],
                    ['class' => 'btn btn-default btn-flat']);          ?>
                 
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  

   <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <?php 
         if ($userImagem){
          echo $this->Html->image('/webroot/img/'.$userImagem, ['class'=>'img-circle', 'alt'=>'User Image']);  
         }else{
         echo $this->Html->image('/webroot/Projeto/dist/img/user2-160x160.jpg', ['class'=>'img-circle', 'alt'=>'User Image']);  
         }
         ?>
           
        </div>
        <div class="pull-left info">
          <p>    <?php echo $this->Html->link($userNome, 
                    ['controller'=>'Users', 'action'=>'perfil' ]);          ?>
            
          </p>
          <p class="text-sm"><i class="fa fa-building"></i> <?= $userEmpresa ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?= __('MENU') ?></li>
        
            <li  class="<?php echo (($this->request->params['controller']==='Dashboards'))?'active':'' ?>">
                        
        <?php
            
            echo '<a href="'. $this->Url->build(array('controller'=>'dashboards','action'=>'index')) .'"'.' >
               <em class="fa fa-dashboard"></em><span> ' . __('Início') . '</span> <span class="pull-right-container"> </span> </a> ';  
        
        ?>  
        </li> 

           
     
           <li class="<?php echo (($this->request->params['controller']==='Users')&& ($this->request->params['action']=='index') )?'active':'' ?>">
       <?php if ($userRole === "adm") {
        echo  '<a href="'. $this->Url->build(array('controller'=>'users','action'=>'index')) .'"'.' >
               <i class="ion ion-person-stalker"></i><span>' . __('Usuários') . '</span></a>';}  
                 ?>
                 </li>


                 <li >
                 <?php echo  '<a href="'. $this->Url->build(array('controller'=>'Users','action'=>'logout')) .'"'.' >
               <i class="ion ion-power"></i><span>' . __('Sair') . '</span></a>'; ?> 
                </li>                 

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<?= $this->fetch('content') ?>
           </div>
  <!-- /.content-wrapper -->
 
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?= __('Versão')?></b> 1.0
    </div>
    <strong><?= __('Copyright')?> &copy; 2020.</strong> <?= __('Todos os direitos reservados. Frederico Otavio Ioppe')?>
  </footer>

</div>
<!-- ./wrapper -->



<?= $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); ?>
<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('/webroot/Projeto/bootstrap/js/bootstrap.min.js'); ?>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<?= $this->Html->script('/webroot/Projeto/plugins/slimScroll/jquery.slimscroll.min.js'); ?>
<!-- FastClick -->
<?= $this->Html->script('/webroot/Projeto/plugins/fastclick/fastclick.js'); ?>
<!-- AdminLTE App -->
<?= $this->Html->script('/webroot/Projeto/dist/js/app.min.js'); ?>
<!-- Sparkline -->
<?= $this->Html->script('/webroot/Projeto/plugins/sparkline/jquery.sparkline.min.js'); ?>
<!-- SlimScroll 1.3.0 -->
<?= $this->Html->script('/webroot/Projeto/plugins/slimScroll/jquery.slimscroll.min.js'); ?>


<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js'); ?>

<?= $this->Html->script('/webroot/Projeto/plugins/fullcalendar/fullcalendar.min.js'); ?>



 
 

</body>
</html>
