<?php
/**
 * @var array $stages
 */

// Vider le "output buffer" :
ob_clean();

// Définir l'en-tête HTTP :
header('Content-Type: text/csv');
header('Content-disposition: attachment; filename=notes_attribues.csv');

// Créer la resource temporaire pour écrir dans le "output buffer" :
$fp = fopen('php://output', 'w');
fputs($fp, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM UTF-8 pour Excel

// Ajouter l'en-tête du CSV :
$header = ['#', 'Etudiant', 'Entreprise', 'Encadron', 'Sujet', 'Binôme', 'Enseignant', 'Note'];
fputcsv($fp, $header, ';');

// Ajouter les données du CSV :
foreach ($stages as $stage) {
    $row = [
        $stage['Stage']['id'],
        $stage['Etudiant']['prenom'] . ' ' . $stage['Etudiant']['nom'],
        $stage['Entreprise']['nom'],
        $stage['Stage']['encadrant'],
        $stage['Stage']['sujet'],
        $stage['Stage']['binome'],
        $stage['Enseignant']['prenom'] . ' ' . $stage['Enseignant']['nom'],
        $stage['Stage']['note_finale']
    ];
    // Ecrire les données dans le "output buffer" :
    fputcsv($fp, $row, ';');

    // Envoyer le "output buffer" au navigateur puis le vider :
    ob_flush();
    ob_clean();
}
fclose($fp);
