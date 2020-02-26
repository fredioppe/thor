<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;                                   
use Cake\Core\Configure;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text; 
use Cake\I18n\Time;  
use Cake\Auth\DefaultPasswordHasher;  
//use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Routing\Router;


class UsersController extends AppController{
    
    public function isAuthorized($user)
    {
         if (isset($user['role']) && $user['uativo'] === '1') {
                if ($this->request->action === 'perfil') {
                    return true;
                }
            }

        return parent::isAuthorized($user);
    }       

    public $paginate = [
        'limit' => 20 ,
         'order' => [
            'id' => 'desc']];

    public $helpers = [
         'Paginator' => ['templates' => 'paginator-templates']
         ];

    
    public function beforeFilter(Event $event)
    {     
        $this->Auth->allow(['login','logout', 'esquecisenha', 'retornoesquecisenha', 'senhanovousuario','alterarsenha']);
       
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }        

    public function procurar($procurar=null) { 
        
        if($this->request->is('post')) {
        $procurar = $this->request->data['procurar'];
      
        return $this->redirect(
            ['controller' => 'Users', 'action' => 'index', 'procurar'=> $procurar]
        );
        
        $this->redirect(
            ['controller' => 'Users', 'action' => 'index']);
    }            
    }
    
    public function index() {
       
     $this->set('empresas', $this->Users->Empresas->find('list', [        
        'valueField' => 'nome' 
    ])); 
      
        $procurar=null;
         if(!empty($this->request->query('procurar')))
        {
            $procurar=$this->request->query('procurar');
        }
        
                
        $users = $this->Users->find('all', [ 
        'contain' => ['Empresas'] , 'nome' => ['nome'] ,
        'fields' => ['id','name', 'empresa' => 'Empresas.nome','telefone','uativo', 'email', 'uidioma','foto']
        ])
         
        ->where(['name LIKE ' => '%'.$procurar.'%' ]);
         
         
        $this->set('users', $this->paginate($users));      
                                     
    } 

    public function edit($id = null)
    {       
          //debug($this->request->session()->read('Auth.User.uidioma'));
        
        $this->set('form_templates', Configure::read('Templates'));         
        $user = $this->Users->get($id,[ 
        'contain' => ['Empresas'] , 'nome' => ['nome'] ,
        'fields' => ['id','name', 'empresas' => 'Empresas.nome','telefone','empresa_id','uativo', 'email', 'uidioma', 'eatvio'=>'Empresas.eativo']
        ]);              
        $user = $this->Users->patchEntity($user, $this->request->data);  
        

        
        if ($this->request->is(['post', 'put'])) {   
            $folderToSaveFiles = WWW_ROOT . '/img/' ;
            if(!empty($this->request->data['foto']))
            {
                    $file = $this->request->data['foto']; 
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
                    $arr_ext = array('jpg', 'jpeg', 'gif','png');                                       
                    if(in_array($ext, $arr_ext))
                    {
                        $newFilename = 'an'.$user->id.'_'.$file['name']; 
                        $result = move_uploaded_file( $file['tmp_name'], $folderToSaveFiles . $newFilename );
                        $user = $this->Users->get($user->id);
                        $user->foto = $newFilename;
                        $this->Users->save($user);
                    }
            }     
            if ($this->Users->save($user)) {  
                $this->Flash->save(__('Informações salvas com sucesso.'), ['key' => 'salvar']);
                
            }
        }

        $this->set('user', $user);
         
        $this->set('empresas', $this->Users->Empresas->find('list', [        
            'valueField' => 'nome' 
        ])); 
        
                 
    }

    public function perfil($id = null)
    {
        $this->set('form_templates', Configure::read('Templates'));     
    
        if ($this->Auth->user('id')){ 
            $user = $this->Users->get($this->Auth->user('id')); 
            
             if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->save(__('Informações salvas com sucesso.'), ['key' => 'salvar']);
                //return $this->redirect(['action' => 'perfil']);
            }
            
        }
        }
        $this->set('user', $user);
        
        $this->set('empresas', $this->Users->Empresas->find('list', [        
            'valueField' => 'nome' 
        ])); 
    }

    
    public function add()                                
    { 
  
           $salt='1234vcdwe';  
           $this->request->data['token'] =  sha1('fsdfsdf'.time().$salt).'_'.dechex(time().'_'.Time::now());
                               
         //debug($this->request->data);
         if (isset($this->request->data['cancel'])) {
             if($this->request->data['name'] != null) { 
                $this->Flash->modal(__('Tem certeza que deseja sair dessa página? Você perderá todas as informações.')
                ,['params' => ['name' =>'users']]);
             
             }else{
                 return $this->redirect( array( 'action' => 'index' ));
             }
        }
        
        $this->set('form_templates', Configure::read('Templates')); 
        $user = $this->Users->newEntity();  
        
                   
        if (isset($this->request->data['txtmodal'])) {
             if ($this->request->is('post')) {   
                $user = $this->Users->patchEntity($user, $this->request->data);
               
                if($user->errors() == null){
                            
                          if($this->request->data['txtmodal'] === '11233ddasdx' ) { 
                               $this->Users->save($user);
                               $folderToSaveFiles = WWW_ROOT . '/img/' ;
                               if(!empty($this->request->data['foto']))
                               {
                                       $file = $this->request->data['foto']; 
                                       $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
                                       $arr_ext = array('jpg', 'jpeg', 'gif','png');                                       
                                       if(in_array($ext, $arr_ext))
                                       {
                                           $newFilename = 'an'.$user->id.'_'.$file['name']; 
                                           $result = move_uploaded_file( $file['tmp_name'], $folderToSaveFiles . $newFilename );
                                           $user = $this->Users->get($user->id);
                                           $user->foto = $newFilename;
                                           $this->Users->save($user);
                                       }
                               }   
                               $this->Flash->save(__('Usuário cadastrado com sucesso.'), ['key' => 'salvar']);
                               return $this->redirect( array( 'action' => 'index' )); 
                           
                }                         
               } 
             } 
        }
           
        $this->set('user', $user);    
        
        $this->set('empresas', $this->Users->Empresas->find('list', [        
        'valueField' => 'nome' 
    ]));   
  
  
    }

    public function login(){         
       // debug($this->Cookie->read('rememberMe')['password']);   
         $this->Auth->logout();
        $this->viewBuilder()->layout('login');
        $this->set('form_templates', Configure::read('Templates'));
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('E-mail ou senha incorreta!'), [
                    'key' => 'auth'
                ]);
            } 
        }                                             
    }
    
    
    function checkLogin($username, $passhash)  
    {  
        $user = $this->find(array('email' => $username, 'password' => $passhash), array(), null, 0);  
        if ($user)  
        {  
            $this->data = $user;  
            $this->id = $user['User']['id'];  
            return true;  
        }  
  
        return false;  
    }  
    

    
   } 

?>
