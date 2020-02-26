        <?php  echo $this->Flash->render(); ?>
           <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= __('Novo usuário') ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><? __(' Início') ?></a></li>
        <li class="active"><?= __('Usuário') ?></li>
      </ol>
    </section>   
    <!-- Main content -->
    <section class="content">

 
     


  <!-- Main content -->

 <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> <?=__('Informações') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

 
             <?php 
              $this->Form->templates($form_templates['shortForm']); 
             echo $this->Form->create($user, ['class'=>'form-horizontal', 'id'=>'formUser', 'enctype' => 'multipart/form-data'] ); ?> 
              <div class="box-body">
                        
                        <div class="form-group hidden">
                       <?php  echo $this->Form->hidden('txtmodal', ['id'=>'txtmodal']); ?> 
                        </div>       
                     <?php   
                 
                       echo $this->Form->input('token',  [ 'templates' => [                                                                                                                        
                        'inputContainer' => '<div style="display:none;">{{content}}</div>',                     
                        ], 
                        'label' => false                     
                    ]);                
                    
                    echo $this->Form->input('name',  [ 
                        'label' => __('Nome Completo'), 'required'=>false                     
                    ]);                                                 
                    echo $this->Form->input('telefone',  [  
                        'label' => __('Telefone'), 'placeholder'=>__('Exemplo: +55 11 4444-4444'), 'required'=>false , 'error'=> ['attributes' => ['class' => 'col-xs-12 error-message inline']] 
                    ]);                     
                  
                       
                     $this->Form->templates($form_templates['emailForm']);   
                    
                     echo $this->Form->input('email',[  'label' => 'E-mail', 'class'=>'form-control'
                    ]);                 
                     
                   if ($this->Form->isFieldError('email')) {
                        echo   '<div class="form-group has-error" id="email-error-2"><label class="col-sm-2 control-label"> </label><div class="col-sm-10">' . 
                        $this->Form->error('email'). '</div></div>';
                    } 
                   echo $this->Form->input('foto', ['type' => 'file']); 
                     $this->Form->templates($form_templates['shortForm']);
                                       
                    echo $this->Form->input('empresa_id', ['empty'=>__('Selecione'),'options' => $empresas,'label' => __('Empresa')
                    ]);      
                    
                    echo $this->Form->input('role', ['label' => __('Permissão'),'empty'=>__('Selecione'),
                        'options' => [
                            'adm' => __('Administrador')
                        ]]);
                                                 
                        
                        ?> 
                 
                 
                  <div class="form-group">
                   <?php echo $this->Form->label('', ''); ?>
                  <div class="col-sm-10">
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Administrador') ?>:</strong> <?= __('Poderá visualizar pedidos, alterar status dos pedidos, cadastrar empresas, cadastrar usuários e visualizar relatórios.')?></p>
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Pedidos') ?>:</strong> <?= __('Poderá visualizar seus pedidos e solicitar pedidos.')?></p>
                        <p><i class="fa fa-angle-right margin-r-5"></i> <strong><?= __('Relatório') ?>:</strong> <?= __('Poderá visualizar relatórios.')?></p>
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
                        'options' => ['pt_BR' => [__(' Português - BR')],'es'=> __(' Espanhol')],
                         'value'=>'pt_BR' ,
                        'label' => false,
                        'hiddenField' => false, // added for non-first elements
                    )); 
                     ?>
                     
                     
                  </div>
                              
                    
                   <div class="form-group">
                    <?php echo $this->Form->label('Ativoo', __('Ativo')); ?>
                    
                          <div class="col-sm-10 checkbox">
                          <label>
                        <?php 
                        
                        
                        
                             /*  'templates' => [
                       'inputContainer' => '{{content}}',
                       'hiddenBlock' => '<div style="display:none;">{{content}}</div>'],*/
                        
                        
                        echo   $this->Form->checkbox('uativo', [
                                                           
                                      'type'=>'checkbox', 
                                      'label'=> false,
                                      'checked'=> true,
                                      'disabled' => true,
                                     'hiddenField' => false  
                                 ] );?> 
                             </label>
                            </div>       
                    
                  </div>
                  <!-- /.box-footer -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            
              
              
               <?php
               
                echo $this->Form->button(__('Voltar'), ['name' => 'cancel', 'id'=>'cancel', 'type' => 'button' ,'class' =>'btn btn-default']);
              //  echo //$this->Form->button(__('Salvar'),['name' => 'salvar' , 'class' =>'btn btn-primary pull-right'
              //]);
                 // ,'data-toggle'=>'modal', 'data-target'=>'#myModal'
                ?>
                        <button type="button" id="ss"  class="btn btn-primary pull-right" ><?= __('Cadastrar') ?></button>

              </div>
              <!-- /.box-footer -->
              <?= $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); ?>  
               <?= $this->Html->script('/webroot/js/jquery.mask.min.js'); ?>     
              <script type="text/javascript">

$(document).ready(function(){ 
        
     $( "#email" ).change(function() {
     
      //if(cnpj != $('#cnpj').attr('value') ) {
     $('#email-error-2').remove();
      //}

  

});  
        
        
         
       $("#btncontinuar").click(function(){      
           $("#txtmodal").val('0kkey293j4k123');
      
    });
      $("#btnsalvar").click(function(){      
           $("#txtmodal").val('11233ddasdx'); 
           
            $('#btncontinuar').addClass("disabled");
             $('#btncontinuar').attr('disabled','disabled');
           
           
           $(this).addClass("disabled");
             $(this).attr('disabled','disabled');
    $('#formUser').submit();
    
   //$('#modal').modal('toggle');
   
             });                               
});
//           //'\  h($params['name'])  ?>/' onclick="location.href='\index/'"
</script>
              
    <!-- modal para salvar -->       
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Atenção') ?></h4>
      </div>
      <div class="modal-body">
         <?= __('Tem certeza que deseja cadastrar este usuário?') ?>          
      </div>                          
      <div class="modal-footer">    
      <button type="button" id="btncontinuar"  data-dismiss="modal" class="btn btn-default"><?= __('Cancelar') ?></button>          
       <?php                                                                                                     
         echo $this->Form->button(__('Salvar'), ['name' => 'btnsalvar' ,'id'=>'btnsalvar' ,'class' =>'btn btn-primary']);
                                                                
         ?>
        
      </div>                                        
    </div>
  </div>
</div>
 <!-- modal para salvar --> 
 
  <!-- modal para cancelar -->       
  <div class="modal fade" id="M2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Atenção') ?></h4>
      </div>
      <div class="modal-body">
         <?= __('Tem certeza que deseja sair dessa página? Você perderá todas as informações. ') ?>          
      </div>                          
      <div class="modal-footer">              
         <button type="button" id="continuarM2"  data-dismiss="modal" class="btn btn-default"><?= __('Cancelar') ?></button>
        <button type="button" id="cancelM2" onclick="location.href='\index/'"  data-dismiss="modal" class="btn btn-primary"><?= __('Continuar') ?></button>
      </div>                                        
    </div>
  </div>
</div>
 <!-- modal para cancelar -->  
 <script type="text/javascript">
 $(document).ready(function() {
 $('#cancel').click(function() {  
 
    if( $('#name').val() || $('#telefone').val() || $('#email').val()) {
       $("#M2").modal();
    } else
    {
        location.href='\index/';
        
    }
       


});
});
</script> 
 
   
                      <?php
                 echo $this->Form->end();
            ?>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     <!-- /.content -->
           </section>
    <!-- /.content -->



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

$(document).ready(function() {  
    
    $('#telefone').mask('+00 00 0000-0000');       
    lingua= '<?php echo $this->request->session()->read('Auth.User.uidioma') ?>'  ;
    
    if(lingua == 'es') {
        var messages = {
            name: "Campo requerido. Llenar correctamente.",
            email:"Campo requerido. Llenar correctamente.",
            telefone:"Llenar el teléfono exactamente igual que el ejemplo: +55 11 4444-4444.",
            empresa_id:"Campo requerido. Llenar correctamente.",
            role:"Campo requerido. Llenar correctamente."
        };
        
    }else if(lingua == 'pt_BR') {
   
        var messages = {
            name: "Campo obrigatório. Preencha corretamente.",
            email:"Campo obrigatório. Preencha corretamente.",
            telefone:"Preencha o telefone exatamente como o exemplo: +55 11 4444-4444.",
            empresa_id:"Campo obrigatório. Preencha corretamente.",
            role:"Campo obrigatório. Preencha corretamente."
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
            role: {
                required: true
            }, 
            empresa_id: {
                required: true
            }, 
            email: {
                required: true,
                emailcustom: true,
                minlength: 1,
                maxlength: 100
            },

        },
          messages:messages
               
       
    })

    $('#ss').click(function() {     
        if($("#formUser").valid()){
            $("#myModal").modal();
        }
    }); 
});    //data-toggle="modal" data-target="#myModal"  
</script>      
           
      
    