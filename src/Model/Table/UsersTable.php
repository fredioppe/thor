<?php   
namespace App\Model\Table;       
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Entity;
use Cake\Mailer\Email;
use Cake\Routing\Router;
        
class UsersTable extends Table{
    public function initialize(array $config)
    {                                    
        $this->belongsTo('Empresas');
        $this->displayField('nome');  
      
    }
    
    public function beforeSave($options = array(), Entity $entity){
  
    
    if(!$entity->isNew()){
        

        
        
        return true;
    }else{ 
        if($entity->txtmodal === '11233ddasdx'){
            $entity->uativo ='1';
            $this->error = __('My error message');
            

    
             return true;
        }     
   }
        
            $this->error = __('My error message');
    return false;
}

    public function afterSave($created, $options = array()) {
        //debug($created) ;
       /* if ($created) {

        } */
    } 
  public function validationDefault(Validator $validator)
    {
        
        $validator = new Validator();
        $validator  
            
            //->requirePresence('name', 'create')
            ->notEmpty('name', 'Erro nome.') 
            
            ->add('email', 
                    ['unique' => [
                        'rule' => 'validateUnique', 
                        'provider' => 'table', 
                        'message' => __('Este e-mail já está sendo utilizado por outro usuário.')]
                    ])

            //->requirePresence('telefone', 'create')
            ->notEmpty('telefone', 'Erro telefone.') ;
        
        return $validator;  

        } 

}     
?>
