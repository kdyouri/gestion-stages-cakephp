<?php
App::uses('AppController', 'Controller');
/**
 * Stages Controller
 *
 * @property Stage $Stage
 */
class StagesController extends AppController {

    /**
     * Lister tous les stages
     */
    public function all() {
        $this->Stage->recursive = 0;
        $this->set('stages', $this->Paginator->paginate());
    }

    /**
     * Lister mes stages (Etudiant)
     */
    public function index() {
        $this->Stage->recursive = 0;
        $scope = ['1=0'];
        if ($etudiantId = $this->Auth->user('Etudiant.id')) {
            $scope = ['Stage.etudiant_id' => $etudiantId];
        }
        $this->set('stages', $this->Paginator->paginate('Stage', $scope));
    }

    /**
     * Lister les stages par enseignant
     */
    public function par_enseignant() {
        $this->set('enseignants', $this->Stage->Enseignant->find('all', [
            'contain' => ['Stage' => 'Etudiant']
        ]));
    }

    /**
     * Lister les stages sans encadrant
     */
    public function sans_encadrant() {
        $this->set('stages', $this->Stage->find('all', [
            'conditions' => ['Stage.enseignant_id' => null]
        ]));
    }

    /**
     * Lister les stages sans rapport
     */
    public function sans_rapport() {
        $this->set('stages', $this->Stage->find('all', [
            'conditions' => ['Stage.rapport' => null]
        ]));
    }

    /**
     * Lister les stages validés pour la soutenance
     */
    public function valides_pour_soutenance() {
        $this->set('stages', $this->Stage->find('all', [
            'conditions' => ['Stage.valide_pour_soutenance' => true]
        ]));
    }

    /**
     * Lister les stages avec notes attribués aux étudiants
     */
    public function notes_attribues($format = 'html') {
        $this->set('stages', $this->Stage->find('all', [
            'conditions' => ['Stage.note_finale !=' => null]
        ]));
        if ($format == 'csv') {
            $this->layout = null;
            $this->viewPath = 'Stages/csv';
        }
    }

    /**
     * Ajouter
     *
     * @throws Exception
     */
    public function add() {
        if ($this->request->is('post')) {
            $newStage = $this->request->data;
            $newStage['Stage']['etudiant_id'] = $this->Auth->user('Etudiant.id');

            $this->Stage->create();
            if ($this->Stage->saveAll($newStage)) {
                $this->Flash->success('Stage ajouté avec succès.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Stage n’a pas pu être ajouté. Veuillez réessayer.');
            }
        }
        $entreprises = $this->Stage->Entreprise->find('list');
        $entreprises['0'] = '-- Nouvelle entreprise --';
        $this->set(compact('entreprises'));
    }

    /**
    * Modifier
    *
    * @throws Exception
    * @param string $id
    */
    public function edit($id = null) {
        $this->Stage->id = $id;
        if (!$this->Stage->exists()) {
            throw new NotFoundException();
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stage->saveAll($this->request->data)) {
                $this->Flash->success('Stage modifié avec succès.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Stage n’a pas pu être modifié. Veuillez réessayer.');
            }
        } else {
            $this->Stage->recursive = -1;
            $this->request->data = $this->Stage->read();
        }
        $entreprises = $this->Stage->Entreprise->find('list');
        $entreprises['0'] = '-- Nouvelle entreprise --';
        $this->set(compact('entreprises'));
    }

    /**
    * Supprimer
    *
    * @throws Exception
    * @param string $id
    */
    public function delete($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException();
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Stage->delete($id)) {
            $this->Flash->success('Stage supprimé avec succès.');
        } else {
            $this->Flash->error('Stage n’a pas pu être supprimé. Veuillez réessayer.');
        }
        $this->redirect(array('action' => 'index'));
    }

    /**
    * Encadrer
    *
    * @throws Exception
    * @param string $id
    */
    public function encadrer($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException();
        }
        $this->request->allowMethod('post');
        $data = ['id' => $id, 'enseignant_id' => $this->Auth->user('Enseignant.id')];

        if ($this->Stage->save($data)) {
            $this->Flash->success('Stage modifié avec succès.');
        } else {
            $this->Flash->error('Stage n’a pas pu être modifié. Veuillez réessayer.');
        }
        $this->redirect(array('action' => 'all'));
    }

    /**
    * Valider
    *
    * @throws Exception
    * @param string $id
    */
    public function valider($id = null) {
        if (!$this->Stage->exists($id)) {
            throw new NotFoundException();
        }
        $this->request->allowMethod('post');
        $data = ['id' => $id, 'valide_pour_soutenance' => 1];

        if ($this->Stage->save($data)) {
            $this->Flash->success('Stage modifié avec succès.');
        } else {
            $this->Flash->error('Stage n’a pas pu être modifié. Veuillez réessayer.');
        }
        $this->redirect(array('action' => 'all'));
    }

    /**
     * Noter
     *
     * @throws Exception
     * @param string $id
     */
    public function noter($id = null) {
        $this->Stage->id = $id;
        if (!$this->Stage->exists()) {
            throw new NotFoundException();
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stage->save($this->request->data)) {
                $this->Flash->success('Stage modifié avec succès.');
                $this->redirect(array('action' => 'all'));
            } else {
                $this->Flash->error('Stage n’a pas pu être modifié. Veuillez réessayer.');
            }
        } else {
            $this->Stage->recursive = -1;
            $this->request->data = $this->Stage->read();
        }
    }
}
