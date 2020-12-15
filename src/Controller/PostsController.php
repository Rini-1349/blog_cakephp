<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    // Autorisations d'accès à certaines actions du controller
    public function isAuthorized($loggedUser = null)
    {
        parent::isAuthorized();

        $action = $this->request->getParam('action');
        $paramPass = $this->request->getParam('pass');

        if (isset($paramPass[0]) AND ($action == 'edit' OR $action == 'delete'))
        {
            $postsFromUser = $this->Posts->find()->select(['id'])->where(['user_id' == $loggedUser['id']]);
            $posts = [];
            foreach ($postsFromUser as $postFromUser)
            {
                $posts[] = $postFromUser['id'];
            }

            if (in_array((int)$paramPass[0], $posts))
            {
                // Si l'article est celui de l'utilisateur connecté
                return true;
            }
            else
            {
                // Interdit l'accès aux actions des autres utilisateurs
                return false;
            }  
        }
        else
        {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories', 'Images'],
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Categories'],
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('L\'article a bien été envoyé.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erreur d\'envoi de l\'article, merci de réessayer.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('L\'article a bien été modifiée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erreur de modification, merci de réessayer.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('L\'article a bien été supprimer.'));
        } else {
            $this->Flash->error(__('Erreur de suppression, merci de réessayer.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
