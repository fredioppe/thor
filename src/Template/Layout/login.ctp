<!DOCTYPE html>
<html>
<head>
   <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=__('Sistema de Usuario | Thor') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <?php 
  echo $this->Html->css('/webroot/Projeto/bootstrap/css/bootstrap.min.css');   
  //<!-- Font Awesome -->
  echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');  
  //<!-- Ionicons -->
  echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'); 
  //<!-- Theme style --> 
  echo $this->Html->css('/webroot/Projeto/dist/css/AdminLTE.min.css'); 
  //<!-- iCheck -->
  echo $this->Html->css('/webroot/Projeto/plugins/iCheck/square/blue.css'); 
  ?>   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">


  </div>
  
    <?php  echo $this->Flash->render(); ?>
              

 <?= $this->fetch('content') ?>

</div>
<!-- /.login-box -->

  <?php      
//<!-- jQuery 2.2.3 -->
echo $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); 
//<!-- Bootstrap 3.3.6 -->
echo $this->Html->script('/webroot/Projeto/bootstrap/js/bootstrap.min.js'); 
//<!-- iCheck -->
echo $this->Html->script('/webroot/Projeto/plugins/iCheck/icheck.min.js'); 
?> 
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
