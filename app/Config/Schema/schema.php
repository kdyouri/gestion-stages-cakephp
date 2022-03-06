<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $enseignants = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary', 'comment' => 'Identifiant'),
		'prenom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Prénom', 'charset' => 'utf8mb4'),
		'nom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Nom', 'charset' => 'utf8mb4'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Adresse courriel', 'charset' => 'utf8mb4'),
		'photo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Photo du profil', 'charset' => 'utf8mb4'),
		'utilisateur_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'Utilisateur'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'utilisateur_id' => array('column' => 'utilisateur_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

	public $entreprises = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary', 'comment' => 'Identifiant'),
		'nom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Nom', 'charset' => 'utf8mb4'),
		'adresse' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Adresse', 'charset' => 'utf8mb4'),
		'tel' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Téléphone', 'charset' => 'utf8mb4'),
		'ville' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Ville', 'charset' => 'utf8mb4'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

	public $etudiants = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary', 'comment' => 'Identifiant'),
		'prenom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Prénom', 'charset' => 'utf8mb4'),
		'nom' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Nom', 'charset' => 'utf8mb4'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Adresse courriel', 'charset' => 'utf8mb4'),
		'photo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Photo du profil', 'charset' => 'utf8mb4'),
		'numero' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Numéro', 'charset' => 'utf8mb4'),
		'utilisateur_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'Utilisateur'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'utilisateur_id' => array('column' => 'utilisateur_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

	public $stages = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary', 'comment' => 'Identifiant'),
		'etudiant_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'Etudiant'),
		'enseignant_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'Enseignant'),
		'entreprise_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index', 'comment' => 'Entreprise'),
		'encadrant' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Encadrant', 'charset' => 'utf8mb4'),
		'sujet' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Intitulé du sujet', 'charset' => 'utf8mb4'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1000, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Description du sujet', 'charset' => 'utf8mb4'),
		'technologies' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Technologies utilisées', 'charset' => 'utf8mb4'),
		'binome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Prénom et nom du binome', 'charset' => 'utf8mb4'),
		'rapport' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Rapport version initiale', 'charset' => 'utf8mb4'),
		'rapport_corrigee' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Rapport version corrigée', 'charset' => 'utf8mb4'),
		'presentation' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Présentation', 'charset' => 'utf8mb4'),
		'attest_stage_et_fiche_eval' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Attéstation de stage et fiche d\'évaluation', 'charset' => 'utf8mb4'),
		'valide_pour_soutenance' => array('type' => 'tinyinteger', 'null' => false, 'default' => '0', 'unsigned' => true, 'comment' => 'Validé pour la soutenance ?'),
		'note_finale' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => true, 'comment' => 'Note finale'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'entreprise_id' => array('column' => 'entreprise_id', 'unique' => 0),
			'enseignant_id' => array('column' => 'enseignant_id', 'unique' => 0),
			'etudiant_id' => array('column' => 'etudiant_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

	public $utilisateurs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary', 'comment' => 'Identifiant'),
		'nom_utilisateur' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Nom d\'utilisateur', 'charset' => 'utf8mb4'),
		'mot_de_passe' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Mot de passe', 'charset' => 'utf8mb4'),
		'role' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Rôle', 'charset' => 'utf8mb4'),
		'active' => array('type' => 'tinyinteger', 'null' => false, 'default' => '1', 'unsigned' => true, 'comment' => 'Activé ?'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

}
