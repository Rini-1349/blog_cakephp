<?php 
namespace App\Controller;

use Cake\Utility\Security;

class FilesController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['index', 'upload']);
    }

    public function index(){
        $files = $this->Files->find('all');
        $this->set('files', $files);
    }

    public function upload(){
        if($this->request->is('post')){
            $myname = $this->request->getData()['file']['name'];
            $mytmp = $this->request->getData()['file']['tmp_name'];
            $myext = substr(strrchr($myname, "."), 1);
            $mypath = "img/".Security::hash($myname).".".$myext;
            $file = $this->Files->newEntity();
            $file->name = $myname;
            $file->path = $mypath;
            $file->created = date('Y-m-d H:i:s');
            if(move_uploaded_file($mytmp, WWW_ROOT.$mypath)){
                $this->Files->save($file);
                return $this->redirect(['action'=>'index']);
            }
        }
    }
}

