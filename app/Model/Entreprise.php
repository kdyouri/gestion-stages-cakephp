<?php
App::uses('AppModel', 'Model');
/**
 * Entreprise Model
 *
 */
class Entreprise extends AppModel {

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
		'nom' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Obligatoire',
			),
		),
	);
}
