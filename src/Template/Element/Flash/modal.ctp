<?php
/* $class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}     */
?>  
<?= $this->Html->script('/webroot/Projeto/plugins/jQuery/jquery-2.2.3.min.js'); ?>
<script type="text/javascript">

$(document).ready(function(){ 
        $("#myModal").modal();  
       $("#btncontinuar").click(function(){      
           $("#txtmodal").val('0kkey293j4k123');
      
    });
      $("#btnsalvar").click(function(){      
           $("#txtmodal").val('11233ddasdx'); 
           
   
   //$('#modal').modal('toggle');
   
             });                               
});
//           //'\  h($params['name'])  ?>/' onclick="location.href='\index/'"
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         <?= h($message) ?>                 
      </div>                          
      <div class="modal-footer">              
        <button type="button" class="btn btn-default" id="btncontinuar" data-dismiss="modal">Continuar</button>
        <?php 
         
        //echo $this->Form->Button('Salvar',['name'=>'salvarmodal','id' =>'btnsalvar', 'data-dismiss'=>'modal', 'controller'=>'users', 'action'=>'add']);
          ?>
        <button type="button" id="btnsalvars" onclick="location.href='\index/'"  data-dismiss="modal" class="btn btn-primary">Salvar</button>
      </div>                                        
    </div>
  </div>
</div>