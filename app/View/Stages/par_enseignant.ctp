<?php
/**
 * @var AppView $this
 * @var array $enseignants
 */
$this->assign('title', 'Étudiants par enseignant')
?>

<h3 class="page-header">Étudiants par enseignant</h3>

<?php if (!empty($enseignants)): ?>
    <?php foreach ($enseignants as $enseignant): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-angle-down"></i>&nbsp;
            <?= $enseignant['Enseignant']['prenom'] ?> <?= $enseignant['Enseignant']['nom'] ?>
        </div>
        <ul class="list-group">
            <?php foreach ($enseignant['Stage'] as $stage): ?>
            <li class="list-group-item">
                <i class="fa fa-angle-right"></i>&nbsp;
                <?= $stage['Etudiant']['prenom'] ?> <?= $stage['Etudiant']['nom'] ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info"><i class="fa fa-information-circle"></i> Aucun élément à afficher !</div>
<?php endif; ?>