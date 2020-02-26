
     <?php  echo $this->Flash->render('auth'); ?>
  <!-- /.login-logo -->
  <div class="login-box-body">

           
   <p class="login-box-msg"><strong>Frederico Otavio Ioppe</strong><br><?= __('Entrar') ?><br><?= __('Faça o login para começar a sua sessão.') ?></p>
     <?php   
              $this->Flash->render('auth');
               $this->Form->templates($form_templates['cleanForm']); 
             echo $this->Form->create('user',['id'=>'formUser']); ?>

      <div class="form-group has-feedback">         
               <?= $this->Form->input('email', ['class' => 'form-control', 
                                            'label' => false,
                                            'div' => false,
                                            __('placeholder="E-mail"')]) ?>        
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <?= $this->Form->input('password', ['class' => 'form-control', 
                                            'label' => false,
                                             'div' => false,
                                            __('placeholder="Senha"')])?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label style="display: none">
             <?php echo $this->Form->checkbox('rememberMe', [
                                  'type'=>'checkbox', 
                                  'div' => false,                                       
                                  'label'=> false,
                                  'hidden' => false ,
                                       'hiddenField' => true  
                                 ] ); ?>
               Lembre-me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">

          <?= $this->Form->button(__('Entrar'), ['name'=>'sd','class' => 'btn btn-primary btn-block btn-flat']); ?>
        </div>
        <!-- /.col -->
      </div>
<?php echo $this->Form->end(); ?>

    

  </div>
  <!-- /.login-box-body -->  

 <?= $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); ?>  
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
            $(element).closest('.form-group').removeClass('has-error');
            //$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            //$(element).closest('.form-group').find('span.fa').remove();
            //$(element.form).find("label[for=" + element.id + "]").append(' <span class="fa fa-check"></span>'); 
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

/*$.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
}); */

$(document).ready(function() {  
    $("#formUser").validate({
        rules: {
            email: {
                required: true,
                emailcustom: true,
                minlength: 1,
                maxlength: 100
            },


        },
        messages: { 
        password:"Campo obrigatório. Preencha corretamente.",                            
             email:"Campo obrigatório. Preencha corretamente."
        }
    })

  
});   
</script>      

