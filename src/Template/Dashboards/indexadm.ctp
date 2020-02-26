  
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
 
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          <?= __('Início') ?>
        <small><?= __('Versão 1.2')?></small>
      </h1>
      <ol class="breadcrumb">
             <li><?php echo $this->Html->link( '<i class="fa fa-dashboard"></i>' .__(' Início'), 
                ['controller'=>'Dashboards', 'action'=>'index' ],
                [ 
                'escape'=>false]); ?>      </li>       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue-active"><i class="fa fa-building-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?= __('Empresas') ?></span>
              <span class="info-box-number"><?= $totalEmpresa ?></span>   
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?= __('Usuários') ?></span>
              <span class="info-box-number"><?= $totalUser ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- /.col -->

        <!-- /.col -->
      </div>
     
      <div class="row">
       
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-info-circle"></i>
              <h3 class="box-title"><?= __('Seja bem-vindo')?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>                
                <dt><?= __('Sistema de Cadastro Thor')?></dt>
                
                <dd><?= __('O sistema de solicitação de pedidos Thor permite o cadastro de usuários.')?></dd> 
     
                <dd>&nbsp;</dd><dt><?= __('Para cadastrar um usuário:')?></dt>
                <dd><?= __('Clique em “Usuários” no menu, depois clique em “Novo usuário”, preencha todos os campos e clique em “Cadastrar” e confirme para finalizar o cadastro.')?></dd>
                
                 <dd>&nbsp;</dd><dt><?= __('Para alterar as informações de um usuário:')?></dt>
                <dd><?= __('Clique em “Usuários” no menu, utilize a tabela de usuários ou o campo “buscar” para localizar o usuário que deseja alterar, clique no ícone “editar”, altere o que for necessário, salve e confirme para efetivar a ação.')?></dd>
                         
                <dd>&nbsp;</dd><dt><?= __('Para desativar ou ativar um usuário:')?></dt>
                <dd><?= __('Um usuário não pode ser deletado do sistema, pode ser apenas desabilitado, podendo ser habilitado novamente quando necessário. Clique em “Usuários” no menu, utilize a tabela de usuários ou o campo “buscar” para localizar o usuário que deseja alterar, clique no ícone “editar”, ao final da tela desmarque a opção “Ativo” para desativar o usuário ou marque novamente para ativar. Salve e confirme para efetivar a ação.')?></dd>
     
                
               
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        
     <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-link"></i>
              <h3 class="box-title">Links úteis</h3>
            </div>
            <!-- /.box-header -->   
            <div class="box-body">
              <dl class="margin">
                <dt><?= __('Links para agilizar o seu trabalho')?></dt>
                                                

                <dd><?php echo $this->Html->link('<i class="fa fa-angle-right margin-r-5"></i>'. __(' Cadastrar usuários'), 
                ['controller'=>'Users', 'action'=>'add' ],
                ['class' => 'small-box-footer', 
                'escape'=>false]); ?></dd>  

                <dd><?php echo $this->Html->link('<i class="fa fa-angle-right margin-r-5"></i>'. __(' Editar meus dados'), 
                ['controller'=>'Users', 'action'=>'perfil' ],
                ['class' => 'small-box-footer', 
                'escape'=>false]); ?></dd>                                                            
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>  
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      
      <div class="row">

        <!-- ./col -->
          <div class="col-md-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h2><?= __('Cadastro de usuários')?></h2>
              <p><?= __('Cadastre novos usuários.')?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>               
               <?php echo $this->Html->link(__('Gerenciar usuários '). '<i class="fa fa-arrow-circle-right"></i>', 
                ['controller'=>'Users', 'action'=>'index' ],
                ['class' => 'small-box-footer', 
                'escape'=>false]); ?>             
          </div>
          <!-- small box -->

        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

