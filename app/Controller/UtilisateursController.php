<?php
App::uses('AppController', 'Controller');
/**
 * Utilisateurs Controller
 *
 * @property Utilisateur $Utilisateur
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UtilisateursController extends AppController {

    /**
     * Avant chaque action
     */
    public function beforeFilter() {
        parent::beforeFilter();

        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    /**
     * Se connecter
     */
    public function login() {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Nom d’utilisateur ou mot de passe invalide! Veuillez réessayer.');
        }
    }

    /**
     * Se déconnecter
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Éditer profil
     *
     * @throws Exception
     */
    public function profile() {
        $this->Utilisateur->id = $this->Auth->user('id');
        if (!$this->Utilisateur->exists()) {
            throw new NotFoundException();
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Utilisateur->saveAll($this->request->data)) {
                $this->Flash->success('Profil enregistré avec succès.');
            } else {
                $this->Flash->error('Profil n’a pas pu être enregistré. Veuillez réessayer.');
            }
        } else {
            $this->request->data = $this->Utilisateur->read();
        }
    }

    /**
     * Lister
     */
	public function index() {
		$this->Utilisateur->recursive = 0;
		$this->set('utilisateurs', $this->paginate());
	}

    /**
     * Ajouter
     *
     * @throws Exception
     */
	public function add() {
		if ($this->request->is('post')) {
			$this->Utilisateur->create();
			if ($this->Utilisateur->save($this->request->data)) {
				$this->Flash->success(__('L\'utilisateur a été enregistré.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pas pu être enregistré. Veuillez réessayer.'));
			}
		}
	}

    /**
     * Modifier
     *
     * @param string $id
     * @throws Exception
     */
	public function edit($id = null) {
        $this->Utilisateur->id = $id;
        if (!$this->Utilisateur->exists()) {
			throw new NotFoundException();
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Utilisateur->save($this->request->data)) {
				$this->Flash->success(__('L\'utilisateur a été enregistré.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('L\'utilisateur n\'a pas pu être enregistré. Veuillez réessayer.'));
			}
		} else {
			$this->request->data = $this->Utilisateur->read();
		}
	}

    /**
     * Supprimer
     *
     * @throws NotFoundException
     * @param string $id
     */
	public function delete($id = null) {
		if (!$this->Utilisateur->exists($id)) {
			throw new NotFoundException();
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Utilisateur->delete($id)) {
			$this->Flash->success(__('L\'utilisateur a été supprimé.'));
		} else {
			$this->Flash->error(__('L\'utilisateur n\'a pas pu être supprimé. Veuillez réessayer.'));
		}
		$this->redirect(array('action' => 'index'));
	}
}
