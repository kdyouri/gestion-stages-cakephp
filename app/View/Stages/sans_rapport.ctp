<?php
/**
 * @var AppView $this
 * @var array $stages
 */
$this->assign('title', 'Sans rapport')
?>

<h3 class="page-header">Étudiants qui n’ont pas déposer le rapport</h3>

<?php if (!empty($stages)): ?>
    <div class="panel panel-default">
        <ul class="list-group">
            <?php foreach ($stages as $stage): ?>
                <li class="list-group-item">
                    <i class="fa fa-angle-right"></i>&nbsp;
                    <?= $stage['Etudiant']['prenom'] ?> <?= $stage['Etudiant']['nom'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="alert alert-info"><i class="fa fa-information-circle"></i> Aucun élément à afficher !</div>
<?php endif; ?>