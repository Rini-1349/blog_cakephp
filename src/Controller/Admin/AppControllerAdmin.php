<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppControllerAdmin extends Controller
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

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authError' => "Vous n'êtes pas autorisé(e) à accéder à cet emplacement.",
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]],
            'authorize' => ['Controller'],
            'unauthorizedRedirect' => ['Prefix' => false, 'controller' => 'Users', 'action' => 'login']
        ]);
        
<<<<<<< HEAD
        $loggedAdmin = null;

        if($this->Auth->user())
        {
            $loggedAdmin = $this->Auth->user();
        }

        $this->set('loggedAdmin', $loggedAdmin);
=======
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
>>>>>>> 85bce88bda3707d72657a9f37858796cfe0516b7

        $loggedUser = null;

        if($this->Auth->user())
        {
            $loggedUser = $this->Auth->user();
        }

        $this->set('loggedUser', $loggedUser);
    }

    public function isAuthorized($user = null)
    {
        // Seuls les admins ont le droit d'accéder au Back Office (role = 1)
        if ($user['role'] === 0)
        {
            return false;
        }
        return true;
    }
}
