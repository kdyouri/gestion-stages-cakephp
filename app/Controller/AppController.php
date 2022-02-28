<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('AccessList', 'Lib');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {


    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'all' => array(
                    'userModel' => 'Utilisateur',
                    'scope' => array('active' => true)
                ),
                'Form' => array(
                    'fields' => array('username' => 'nom_utilisateur', 'password' => 'mot_de_passe'),
                    'passwordHasher' => 'Blowfish',
                )
            ),
            'loginAction' => '/utilisateurs/login',
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'authError' => 'Accès refusé',
            'authorize' => ['Controller']
        ),
        'Flash',
        'Paginator',
        'DebugKit.Toolbar',
    );

    public $helpers = array(
        'Html' => ['className' => 'Bs3Html'],
        'Form' => ['className' => 'Bs3Form']
    );

    /**
     * Authorisation
     *
     * @param $user
     * @return bool
     */
    public function isAuthorized($user) {
        return AccessList::isAuthorized($user, $this->request->params);
    }
}
