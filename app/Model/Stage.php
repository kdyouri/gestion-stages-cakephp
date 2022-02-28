<?php
App::uses('AppModel', 'Model');
/**
 * Stage Model
 *
 * @property Etudiant $Etudiant
 * @property Enseignant $Enseignant
 * @property Entreprise $Entreprise
 */
class Stage extends AppModel {

    public $actsAs = [
        'Upload.Upload' => [
            'rapport',
            'rapport_corrigee',
            'presentation',
            'attest_stage_et_fiche_eval',
        ]
    ];

    /**
     * Règles de validation
     *
     * @var array
     */
	public $validate = array(
		'etudiant_id' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
            'numeric' => array(
				'rule' => array('numeric'),
                'message' => 'Numérique',
			),
		),
		'entreprise_id' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
            'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Numérique',
			),
		),
		'encadrant' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
		),
		'sujet' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
		),
		'technologies' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Obligatoire',
            ),
		),
		'valide_pour_soutenance' => array(
			'numeric' => array(
				'rule' => array('numeric'),
                'message' => 'Numérique',
			),
		),
		'note_finale' => array(
			'numeric' => array(
				'rule' => array('numeric'),
                'message' => 'Numérique',
			),
		),
	);

    /**
     * belongsTo associations
     *
     * @var array
     */
	public $belongsTo = array(
		'Etudiant' => array(
			'className' => 'Etudiant',
			'foreignKey' => 'etudiant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Enseignant' => array(
			'className' => 'Enseignant',
			'foreignKey' => 'enseignant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Entreprise' => array(
			'className' => 'Entreprise',
			'foreignKey' => 'entreprise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
