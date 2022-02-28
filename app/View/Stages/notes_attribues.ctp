<?php
/**
 * @var AppView $this
 * @var array $stages
 */
$this->assign('title', 'Notes')
?>

<h3 class="page-header">Notes attribués aux étudiants</h3>

<div class="panel panel-default">
    <div class="panel-body">
        <?php if (!empty($stages)): ?>
            <p>
                <?= $this->Html->link('Exporter', ['action' => 'notes_attribues', 'csv'], ['class' => 'btn btn-sm btn-success', 'icon' => 'file-excel-o']) ?>&nbsp;
            </p>

            <div class="table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Etudiant</th>
                        <th>Entreprise</th>
                        <th>Encadron</th>
                        <th>Sujet</th>
                        <th>Binôme</th>
                        <th>Enseignant</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($stages as $stage): ?>
                        <tr>
                            <td><?= h($stage['Stage']['id']) ?></td>
                            <td><?= h($stage['Etudiant']['prenom']) ?> <?= h($stage['Etudiant']['nom']) ?></td>
                            <td><?= h($stage['Entreprise']['nom']) ?></td>
                            <td><?= h($stage['Stage']['encadrant']) ?></td>
                            <td><?= h($stage['Stage']['sujet']) ?></td>
                            <td><?= h($stage['Stage']['binome']) ?></td>
                            <td><?= h(@$stage['Enseignant']['prenom']) ?> <?= h(@$stage['Enseignant']['nom']) ?></td>
                            <td><?= h($stage['Stage']['note_finale']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info"><i class="fa fa-information-circle"></i> Aucun élément à afficher !</div>
        <?php endif; ?>
    </div>
</div>
