 
   <?php  echo $this->Flash->render('salvar'); ?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= __('Meus dados') ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?= __('Home') ?></a></li>
        <li class="active"><?= __('Meus dados') ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php 
              $this->Form->templates($form_templates['shortForm']); 
             echo $this->Form->create($user, ['class'=>'form-horizontal', 'id'=>'formUser']); ?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?= $user->name ?></h3>
              <p class="text-muted text-center"><?= $userEmpresa ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Minhas informações') ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-building-o margin-r-5"></i> <?= __('Empresa') ?></strong>
              <p class="text-muted">
                <?= $userEmpresa ?>
              </p>

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> <?= __('Telefone') ?></strong>
              <p class="text-muted"><?= $user->telefone ?></p>

              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> <?= __('E-mail') ?></strong>
              <p class="text-muted"><a href="mailto:exemplo@email.com.br"><?= $user->email ?></a></p>

              <hr>

              <strong><i class="fa fa-check-circle margin-r-5"></i> <?= __('Permissão') ?></strong>
             
              
                            <?php               
                if ($user->role ==="adm") {
                echo '<p>'. __('Administrador') . '</p>';
                }elseif ($user->role ==="pedido") {
                    echo '<p>'. __('Pedidos') . '</p>';
                }elseif ($user->role ==="relatorio") {
                    echo '<p>'. __('Relatório') . '</p>';
                }?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#geral" data-toggle="tab"><i class="fa fa-info-circle margin-r-5"></i> <?= __('Alterar informações') ?></a></li>
              <li><a href="#senha" data-toggle="tab"><i class="fa fa-lock margin-r-5"></i>  <?= __('Alterar senha') ?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="geral">
                            <!-- TINHA UM FORM AQUI -->
                             
                          
                      <?php                  
                    echo $this->Form->input('name',  [ 
                        'label' => __('Nome Completo')                        
                    ]);                    
                    echo $this->Form->input('telefone',  ['placeholder'=> __('Exemplo: +55 11 4444-4444'), 
                        'label' => __('Telefone')
                    ]);                     
                    echo $this->Form->input('email',  [ 
                        'label' => __('E-mail'),'disabled' => TRUE
                    ]);                    
                    echo $this->Form->input('empresa_id', ['options' => $empresas,'label' => __('Empresa')
                    ,'disabled' => TRUE]);      
                      ?>
     
                        
                  <div class="form-group">
                    <label for="inputPermissao" class="col-sm-2 control-label"><?= __('Permissão') ?></label>
    
                    <div class="col-sm-10">
                    <?php  $this->Form->templates($form_templates['cleanForm']); 
                    echo $this->Form->input('role',  ['class'=>'form-control','label' => false,
                        'options' => [
                        'adm' => __('Administrador'), 
                        'pedido' => __('Pedidos'),
                        'relatorio' => __('Relatório'), 
                        ],'disabled' => TRUE]);   
                        ?>                         
                        <p>&nbsp;</p>
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Administrador') ?>:</strong> <?= __('Poderá visualizar pedidos, alterar status dos pedidos, cadastrar empresas, cadastrar usuários e visualizar relatórios.') ?></p>
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Pedidos') ?>:</strong> <?= __('Poderá visualizar seus pedidos e solicitar pedidos.') ?></p>
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Relatório') ?>:</strong> <?= __('Poderá visualizar relatórios.') ?></p>
                    </div>
                  </div>
                                      <div class="form-group">
                    <label for="inputIdioma" class="col-sm-2 control-label"><?= __('Idioma') ?></label>  
                   <?php   
                   echo $this->Form->input('uidioma', array(
                     'templates' => [   
                        'nestingLabel' => '{{hidden}}<label{{attrs}} class="margin-r-5">{{input}}{{text}}</label>',                                                                                                      
                        'inputContainer' => '<div class="radio col-sm-10"> {{content}} </div>'                     
                        ],                        
                        'type' => 'radio',
                        'id'=>'uidioma',
                        'options' => ['pt_BR' => [__(' Português - BR')],'es'=> __(' Espanhol')],                   
                        'label' => false,
                        'hiddenField' => false, // added for non-first elements
                    )); 
                     ?>
                     
                     
                  </div>
              
               <!-- TINHA UM FORM AQUI FECHADO --> 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="senha">   
              <!-- TINHA UM FORM AQUI 
                <form class="form-horizontal" id="UserForm">-->
                <?php $this->Form->templates($form_templates['shortForm']); 
                
                  echo $this->Form->input('password',  ['placeholder'=>__('Senha'),
                        'label' => __('Senha')                        
                    ]);
                    
                    echo $this->Form->input('password_again',  [ 'type'=>'password', 'placeholder'=>__('Confirme a senha') ,
                        'label' => __('Confirme') ,  'default'=>$user->password,                      
                    ]);
                    ?>
                  <!--<div class="form-group">
                    <label for="inputSenha" class="col-sm-2 control-label"><?= __('Senha') ?></label>
    
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputConfirmeSenha" class="col-sm-2 control-label"><?= __('Confirme') ?></label>
    
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="password_again" name="password_again" placeholder="Confirme a senha">
                    </div>
                  </div>
              <!--   </form>
                TINHA UM FORM AQUI FECHADO -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          <div class="box-footer">
           <?php
                 echo $this->Form->button(__('Voltar para o início'), ['name' => 'cancel', 'id'=>'cancel', 'type' => 'button'  ,'class' =>'btn btn-default']);
                echo $this->Form->button(__('Salvar'),['name' =>'salvar','id'=>'salvar', 'type' => 'button', 'class' =>'btn btn-primary pull-right']);
           ?>     
          </div>
          <!-- /.box-footer -->
          
                         <!-- modal para salvar -->       
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Atenção') ?></h4>
      </div>
      <div class="modal-body">
         <?= __('Você alterou algumas informações do seu cadastro. Deseja salvar?') ?>          
      </div>                          
      <div class="modal-footer">   
              <button type="button" id="btncontinuar"  data-dismiss="modal" class="btn btn-default"><?= __('Cancelar') ?></button>           
       <?php   
         echo $this->Form->button(__('Continuar'), ['class' =>'btn btn-primary']);
                                                                
         ?>

      </div>                                        
    </div>
  </div>
</div>
 <!-- modal para salvar -->
          
          
          
          
          
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php  echo $this->Form->end();?>
    </section>
    <!-- /.content -->
<?= $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); ?>  
                 <?= $this->Html->script('/webroot/js/jquery.mask.min.js'); ?>                 

  <script type="text/javascript">
 $(document).ready(function() {        

        var name = $('#name').val();
        var telefone = $('#telefone').val();   
        var email = $('#email').val()
        var uidioma =  $('input[name=uidioma]:checked').val() 
                
 $('#cancel').click(function() {  
                                                             
    if( $('#name').val() != name || $('#telefone').val() != telefone || $('#email').val() != email  
    || uidioma !=  $('input[name=uidioma]:checked').val() )           
    {
       $("#M2").modal();   
    } else
    {
        location.href ='<?php use Cake\Routing\Router;  echo Router::url(array('controller'=>'Dashboards', 'action'=>'index'));?>';
        
    }
       


});
});
</script>




     <!-- modal para cancelar -->       
  <div class="modal fade" id="M2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Atenção') ?></h4>
      </div>
      <div class="modal-body">
         <?= __('Tem certeza que deseja sair dessa página sem salvar? Você perderá as informações alteradas.') ?>          
      </div>                          
      <div class="modal-footer">              
         <button type="button" id="continuarM2"  data-dismiss="modal" class="btn btn-default"><?= __('Cancelar') ?></button>
        <button type="button" id="cancelM2" onclick="location.href='<?php  echo Router::url(array('controller'=>'Dashboards', 'action'=>'index'));?>'"  data-dismiss="modal" class="btn btn-primary"><?= __('Continuar') ?></button>
      </div>                                        
    </div>                                                    
  </div>
</div>

 <!-- modal para cancelar -->  
 
 <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
  <script type="text/javascript">
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
     errorElement: "span",
    errorClass: "help-block",


    highlight: function (element, errorClass, validClass) {
        if (element.type === "radio") {
            this.findByName(element.name).addClass(errorClass).removeClass(validClass);
        } else {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $(element).closest('.form-group').find('span.fa').remove();  
            $(element.form).find("label[for=" + element.id + "]").append(' <span class="fa fa-times-circle-o"></span>');                                                              
            //$(element).closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        }
    },
    unhighlight: function (element, errorClass, validClass) {
        if (element.type === "radio") {
            this.findByName(element.name).removeClass(errorClass).addClass(validClass);
        } else {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).closest('.form-group').find('span.fa').remove();
            $(element.form).find("label[for=" + element.id + "]").append(' <span class="fa fa-check"></span>'); 
            //$(element).closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
        }
    }
});




 jQuery.validator.addMethod('lettersonly', function(value, element) {
    return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùç]+$/i.test(value);
}, "Letters and spaces only please");
  
   $.validator.addMethod('customphone', function (value, element) {
    return this.optional(element) || /^[0-9-+ ]+$/.test(value);
}, "Please enter a valid phone number");

   $.validator.addMethod('emailcustom', function (value, element) {
    return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
}, "Please enter a valid phone number");

$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
        || /[A-Z]/.test(value) // has a lowercase letter
});

$(document).ready(function() {  
    
    $('#telefone').mask('+00 00 0000-0000'); 
       lingua= '<?php echo $this->request->session()->read('Auth.User.uidioma') ?>'  ;
    
        if(lingua == 'es') {
        var messages = {
             password:{
                required:"Campo requerido. Llenar correctamente.", 
                pwcheck: "Incluyendo letra y número.",
                minlength: "Al menos 8 caracteres, incluyendo letras y números."
            },
             password_again:{
                required:"Campo requerido. Llenar correctamente.", 
                pwcheck: "Incluyendo letra y número.",
                equalTo: "La contraseña no coincide, introduzca los 2 campos con la misma contraseña.",
                minlength: "Al menos 8 caracteres, incluyendo letras y números."
            },
            name: "Campo requerido. Llenar correctamente.",
            email:"Campo requerido. Llenar correctamente.",
            telefone:"Llenar el teléfono exactamente igual que el ejemplo: +55 11 4444-4444.",
            
        };
        
    }else if(lingua == 'pt_BR') {
   
        var messages = {
           password:{
                required:"Campo obrigatório. Preencha corretamente.", 
                pwcheck: "Incluindo letra e número.",
                minlength: "Min. de 8 caracteres, incluindo letra e número."
            },
             password_again:{
                required:"Campo obrigatório. Preencha corretamente.", 
                pwcheck: "Incluindo letra e número.",
                equalTo: "A senha não confere, preencha os 2 campos com a mesma senha.",
                minlength: "Min. de 8 caracteres, incluindo letra e número."
            },
             name: "Campo obrigatório. Preencha corretamente.",
             email:"Campo obrigatório. Preencha corretamente.",
             telefone:"Preencha o telefone exatamente como o exemplo: +55 11 4444-4444."
        }; 
    }
    
    
      
    $("#formUser").validate({
        rules: {
           name: {                 
                required: true, 
                lettersonly: true,
                minlength: 5,
                maxlength: 150
            },
            telefone: {
                required: true,
                minlength: 16,
            }, 
            email: {
                required: true,
                emailcustom: true,
                minlength: 5,
                maxlength: 100
            },
            /*password:{ 
              required: true,   
             minlength: 8,
             pwcheck: true,
             
            },
            password_again: {   
             required: true,  
                minlength: 8,
                pwcheck: true,
                equalTo: "#password"
            },*/
        },    
      messages:messages
    })

    $('#salvar').click(function() {     
        if($("#formUser").valid()){
            $("#myModal").modal();
        }
    }); 
});    //data-toggle="modal" data-target="#myModal"  
</script>   
