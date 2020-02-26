<?php
namespace App\View\Cell;


use Cake\View\Cell;

class MenuCell extends Cell
{
     function beforeFilter(){
      
       
     }
   public function display() {
       
        $this->set('auth',$this->request->session()->read('User.name'));
        $this->set('auth','asdasd');
       //UsersController::_isAuthorized($user, ['action' => 'add'])
       //$this -> set('user', $this-> user());
        $this->loadModel('Users');
$recent = $this->Users->find();
$this->set('recent_articles', $recent);
       // $menu = [];
        //if (PostsController::_isAuthorized($user, ['action' => 'add'])) // In that method you must handle authorization
       //     $menu[] = ['title' => 'Add post', 'url' => array('controller' => 'Posts', 'action' => 'add')];
      // $this -> set ('menu', $menu); // Handle this in Template/Cell/Menu/display.ctp
    }

}

?>