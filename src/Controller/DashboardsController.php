<?php
namespace App\Controller;
use App\Controller\AppController;                                      

class DashboardsController extends AppController{
    
public function isAuthorized($user)
{
     if (isset($user['role']) && $user['uativo'] === '1' && $user['role'] === 'adm' ) {
            if ($this->request->action === 'index') {
                return $this->redirect(['controller' => 'Dashboards', 'action' => 'indexadm']); 
                return true;
            }
        }else if(isset($user['role']) && $user['uativo'] === '1' && $user['role'] === 'pedido' || $user['role'] === 'relatorio' ){
             if ($this->request->action === 'index') {        
                return true;
            }
        }
     
           
    return parent::isAuthorized($user);
    
}
    
        
    public function view($id = null)
    {
        $empresas = $this->Empresas->find('all');
        $this->set(compact('empresas'));   
        
        $consultorProjeto = $this->ConsultoresProjetos->get($id);
        $this->set(compact('consultorProjeto'));
    }      

    public function index() {              
        $this->loadModel('Users');
        $this->loadModel('Empresas');
        
        $user = $this->Users->find();
        $user->select(['count' => $user->func()->count('*')]);
        $sumUser = $user->sumOf('count');
        
        $this->set('totalUser', $sumUser);
        
        $empresa = $this->Empresas->find();
        $empresa->select(['count' => $empresa->func()->count('*')]);
        $sumEmpresa = $empresa->sumOf('count');
        
        $this->set('totalEmpresa', $sumEmpresa);
               
    }
           
        public function indexadm() {              
        $this->loadModel('Users');
        $this->loadModel('Empresas');
        
        $user = $this->Users->find();
        $user->select(['count' => $user->func()->count('*')]);
        $sumUser = $user->sumOf('count');
        
        $this->set('totalUser', $sumUser);
        
        $empresa = $this->Empresas->find();
        $empresa->select(['count' => $empresa->func()->count('*')]);
        $sumEmpresa = $empresa->sumOf('count');
        
        $this->set('totalEmpresa', $sumEmpresa);
        
   
            
    }

   } 
?>