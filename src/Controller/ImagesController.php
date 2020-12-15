<?php 
namespace App\Controller;

use Cake\Utility\Security;

class ImagesController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['index', 'upload']);
    }

    public function index(){
        $images = $this->Images->find('all');
        $this->set('images', $images);
    }

    public function upload($postId = null){
        if($this->request->is('post')){
            $myname = $this->request->getData()['file']['name'];
            $mytmp = $this->request->getData()['file']['tmp_name'];
            $myext = substr(strrchr($myname, "."), 1);
            $mypath = "img/".Security::hash($myname).".".$myext;
            $image = $this->Images->newEntity();
            $image->name = $myname;
            $image->path = $mypath;
            $image->created = date('Y-m-d H:i:s');
            $image->post_id = $postId;
            if(move_uploaded_file($mytmp, WWW_ROOT.$mypath)){
                $this->Images->save($image);
                return $this->redirect(['controller' => 'posts', 'action'=>'index']);
            }
        }
    }
}

