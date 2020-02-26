   
   
 
    <?php  echo $this->Flash->render('salvar'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= __('Cadastrar usuários') ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><? __(' Início') ?></a></li>
        <li class="active"><?= __('Usuários') ?></li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
  
  <!-- Main content -->
   
      <div class="row">
        <div class="col-xs-12 margin-bottom">
            <?php  echo $this->Form->create(null, [ 'type' => 'get',
                'url' => ['action' => 'add' ]
            ]); 
      
                   echo $this->Form->Button(__('Novo usuário'),  ['controller' => 'Users', 'action' => 'add', 'class' => 'btn btn-success pull-right']);             
               echo $this->Form->end();     
                 ?>
                
           
        </div>
      </div>
          <?php
                             if($this->Paginator->param('count') === 0) {echo "<p>".__("Sua pesquisa não retornou nenhum resultado, tente pesquisar novamente com outro termo.")."</p>";} 
                           ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= __('Usuários do sistema') ?></h3>
              <div class="box-tools">
              
              <?php  echo $this->Form->create('User', [
                    'url' => ['controller' => 'Users', 'action' => 'procurar'], ['div' => false] ]);   ?>
                <div class="input-group input-group-sm" style="width: 180px;">   
                     
                <?php  echo $this->Form->input('procurar',
                                    ['templates' => ['inputContainer' => '{{content}}'], 
                                    'class' => 'form-control pull-right', 
                                            'label' => false,
                                             'div' => false,
                                            'placeholder'=>__('Digite o nome do usuário')]); 
                                            ?>
                  <div class="input-group-btn"> 
                    <?php  
                     echo $this->Form->button('<i class="fa fa-search"></i>', array('class' => 'btn btn-default', 'escape'=>false));
                     echo $this->Form->end();     
                    ?>  
                     </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th><?= __('Nome completo') ?></th>
                  <th><?= __('Empresa') ?></th>
                  <th><?= __('Telefone') ?></th>
                  <th><?= __('E-mail') ?></th>
                  <th><?= __('Status') ?></th> 
                  <th><?= __('Idioma') ?></th>
                  <th>&nbsp;</th>
                </tr>
                    <?php foreach ($users as $user): ?>             
                <tr>
                  <td><?php
                 
                   if ($user->foto){
                      echo $this->Html->image('/webroot/img/'.$userImagem, ['class'=>'img-circle','style'=>'width: 21px' ,'alt'=>'User Image']);  
                     }else{
                     echo $this->Html->image('/webroot/Projeto/dist/img/user2-160x160.jpg', ['class'=>'img-circle','style'=>'width: 21px' , 'alt'=>'User Image']);  
                     }
                     echo $user->name ;
                   ?></td>
                  <td><?=  $user->empresa ?></td>
                  <td><?=  $user->telefone ?></td>
                  <td><?=  $user->email ?></td>
                  
                  
                  
                  <?php  if ($user->uativo === '0') {echo "<td><span class='label label-default'>"; echo __("Inativo"); echo "</span></td>";}   
                  elseif($user->uativo === '1'){echo "<td><span class='label label-primary'>"; echo __("Ativo"); echo "</span></td>";} 
                  ?>
                  
                   <?php  if ($user->uidioma === 'pt_BR') {echo "<td>"; echo __("Português - BR");echo "</td>";}
                  elseif($user->uidioma === 'es'){echo "<td>"; echo __("Espanhol");echo "</td>";} 
                  ?>
                  
                   <td>
                  <?php
                 echo $this->Html->link('<i class="fa fa-pencil"></i>', 
                    ['controller'=>'Users', 'action'=>'edit', $user->id ],
                    ['class' => 'btn btn-xs btn-default pull-right', 
                    'escape'=>false]);    ?>

                 </td>
                </tr>
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  

                                      
              
              
    <?php
 echo $this->Paginator->prev('« ' , array('class' => 'btn btn-default prev', 'tag' => 'button'), null, array('class' => 'btn btn-default prev disabled', 'tag' => 'button')); 
 echo $this->Paginator->numbers(array('separator' => '',  'currentClass' => 'disabled', 'tag' => 'button'));                                      
 echo $this->Paginator->next( ' »', array('class' => 'btn btn-default next', 'tag' => 'button'), null, array('class' => 'btn btn-default next disabled', 'tag' => 'button'));    
    ?>
                     
              
               <!-- <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    
    <!-- /.content -->


    </section>
    <!-- /.content -->
    

