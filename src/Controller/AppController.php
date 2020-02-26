<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Network\Session;
use Cake\I18n\I18n;
use Cake\Utility\Security;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
        
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {        
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
                                     
        $this->loadComponent('Auth', [
        
      
       
            'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
        ],
            'loginRedirect' => [
                'controller' => 'Dashboards',
                'action' => 'index'
            ],
               'authError' => '',
 
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authorize' => array('Controller'),    
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email'/*,
                        'password' => 'password'*/
                    ]
                ]
            ],
        ]); 
                
    }
    
   public function isAuthorized($user)
    {     I18n::locale($this->request->session()->read('Auth.User.uidioma'));
        if (isset($user['role']) && $user['uativo'] === '1' && $user['role'] === 'adm') {
            return true;
        }

         if ($user['uativo'] === '0') {
              $this->Flash->error(__('Este usuário está momentaneamente desativado, entre em contato com o administrador do sistema pelo telefone +55 112 ou pelo e-mail @.com.br.'), [
                    'key' => 'auth'
                ]);
            return $this->redirect($this->Auth->logout());
        }
        
        return false; //aqui    
        
        
        
        
    }  
    

public $uses = array('User');
    
    
    public function beforeFilter(Event $event)
    { 
            $this->Auth->allow('login');                            
             
 
    }  
        
    

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {      
    
     I18n::locale($this->request->session()->read('Auth.User.uidioma'));
        if($this->Auth->user('id')){
        $this->loadModel('Users');
        $this->loadModel('Empresas');
        $user = $this->Users->get($this->Auth->user('id'));
        $empresa = $this->Empresas->get($user->empresa_id);
        
        $this->set('userId', $this->Auth->user('id'));
        $this->set('userNome', $user->name);
        $this->set('userImagem', $user->foto);
        $this->set('userRole', $user->role);
        $this->set('userEmpresa', $empresa->nome);  
        }
        
        
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
