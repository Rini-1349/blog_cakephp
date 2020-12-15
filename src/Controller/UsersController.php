<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'register']);
    }

    // Autorisations d'accès à certaines actions du controller
    public function isAuthorized($loggedUser = null)
    {
        parent::isAuthorized();

        $action = $this->request->getParam('action');
        $paramPass = $this->request->getParam('pass');

        if (isset($paramPass[0]) AND $paramPass[0] != $loggedUser['id'] AND ($action == 'view' OR $action == 'edit' OR $action == 'profile'))
        {
             // Interdit l'accès aux actions des autres utilisateurs
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null Redirects on homepage with successfull message, error message otherwise.
     */
    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();

            if ($user)
            {
                $this->Auth->setUser($user);
                $this->redirect('/');
                $this->Flash->success("Vous êtes connecté(e)");
            }
            else
            {
                $this->Flash->error(__('Authentification incorrecte'));
            }
        }
    }


    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null Redirects on homepage with successfull message.
     */
    public function logout()
    {
        $this->Auth->logout();
        $this->Flash->success("Vous êtes déconnecté(e)");
        $this->redirect('/');
    }


    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects on homepage with successfull message, error message otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if  ($user->hasErrors())
            {
                $this->Flash->error(__('Erreur(s) dans le formulaire'));
            }
            else
            {
                $validPasswordFormat = preg_match('#^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[0-9])(?=\S*[\W])\S{8,20}$#', $this->request->getData('password'));
                $emailAlreadyExists = $this->Users->find('all')
                    ->where(['Users.email' => $user->email])
                    ->first();

                if ($emailAlreadyExists)
                {
                    $this->Flash->error(__('Adresse e-mail déjà utilisée. Votre utilisateur n\'a pas été enregistré'));                    
                }
                elseif(!$validPasswordFormat)
                {
                    $this->Flash->error(__('Le mot de passe doit contenir entre 8 et 20 caractères dont 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial'));
                }
                else
                {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Votre compte a bien été créé'));
        
                        return $this->redirect('/');
                    }
                    else
                    {
                        $this->Flash->error(__('Une erreur est apparue. Votre compte n\'a pas pu être créé'));
                    }
                }    
            }  
        }
        $this->set(compact('user'));
    }


    public function profile($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts', 'Posts.Categories'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Votre profil a bien été modifié'));

                return $this->redirect(['action' => 'profile', $id]);
            }
            $this->Flash->error(__('Votre profil n\'a pas pu être modifié'));
        }
        $this->set(compact('user'));
    }
}
