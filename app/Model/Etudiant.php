<?php
App::uses('AppModel', 'Model');
/**
 * Etudiant Model
 *
 * @property Utilisateur $Utilisateur
 * @property Stage $Stage
 */
class Etudiant extends AppModel {

    public $actsAs = [
        'Upload.Upload' => [
            'photo' => [
                'extensions' => array('jpg', 'jpeg'),
                'nameCallback' => 'filename'
            ]
        ]
    ];

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Utilisateur' => array(
            'className' => 'Utilisateur',
            'foreignKey' => 'utilisateur_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Stage' => array(
            'className' => 'Stage',
            'foreignKey' => 'etudiant_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    /**
     * Champ d'affichage
     *
     * @var string
     */
	public $displayField = 'nom';

    /**
     * Règles de validation
     *
     * @var array
     */
	public $validate = array(
        'prenom' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
        ),
        'nom' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'E-mail valide',
            ),
        ),
        'photo' => array(
            'extension' => array(
                'rule' => array('extension', array('jpg', 'jpeg')),
                'message' => 'Type JPEG',
            ),
        ),
	);

    /**
     * Renomer le fichier de la photo de profil
     *
     * @param string $field
     * @param string $currentName
     * @param array $data
     * @param array $options
     * @return string
     */
    public function filename($field, $currentName, $data, $options) {
        return 'profile.jpg';
    }

    /**
     * Avant validation
     *
     * @param array $options
     * @return bool
     */
    public function beforeValidate($options = array()) {
        // Enlever le champ `photo` si aucun fichier n'a été sélectionné :
        if (isset($this->data[$this->alias]['photo']) && empty($this->data[$this->alias]['photo']['size']))
            unset($this->data[$this->alias]['photo']);

        return parent::beforeValidate($options);
    }
}
