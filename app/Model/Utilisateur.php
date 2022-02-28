<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Utilisateur Model
 *
 */
class Utilisateur extends AppModel {

    public $hasOne = [
        'Enseignant',
        'Etudiant',
    ];

    /**
     * Champ d'affichage
     *
     * @var string
     */
	public $displayField = 'nom_utilisateur';

    /**
     * Règles de validation
     *
     * @var array
     */
	public $validate = array(
		'nom_utilisateur' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Obligatoire',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Déja utilisé',
			),
		),
		'mot_de_passe' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
                'message' => 'Obligatoire',
			),
		),
		'confirmer_mot_de_passe' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
                'message' => 'Obligatoire',
			),
			'sameAs' => array(
				'rule' => array('sameAs', 'mot_de_passe'),
				'message' => 'Ne correspond pas',
			),
		),
		'role' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
                'message' => 'Obligatoire',
			),
		),
		'active' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Numérique',
			),
		),
	);

    /**
     * Avant enregistrer
     *
     * @param array $options
     * @return bool
     */
    public function beforeSave($options = array()) {
        // Hasher le mot de passe :
        if (isset($this->data[$this->alias]['mot_de_passe'])) {
            $hasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['mot_de_passe'] = $hasher->hash($this->data[$this->alias]['mot_de_passe']);
        }
        return true;
    }

    /**
     * Valider la correspondance des mots de passe
     *
     * @param $check
     * @param $field
     * @return bool
     */
    public function sameAs($check, $field) {
        $value = array_shift($check);
        $otherValue = $this->data[$this->alias][$field];

        return $value === $otherValue;
    }
}
