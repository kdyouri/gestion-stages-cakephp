<?php
/**
 * @var AppView $this
 * @var array $stages
 */
$this->assign('title', 'Mes stages')
?>

<h3 class="page-header">Mes stages</h3>

<div class="panel panel-default">
    <div class="panel-body">
        <p>
            <?= $this->Html->link('Ajouter un stage', ['action' => 'add'], ['class' => 'btn btn-sm btn-success', 'icon' => 'plus-circle']) ?>&nbsp;
        </p>

        <?php if (!empty($stages)): ?>
        <div class="table-responsive">
            <table class="table table-stiped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= $this->Paginator->sort('Entreprise.nom', 'Entreprise') ?></th>
                    <th><?= $this->Paginator->sort('encadrant', 'Encadron') ?></th>
                    <th><?= $this->Paginator->sort('sujet', 'Sujet') ?></th>
                    <th><?= $this->Paginator->sort('binome', 'Binôme') ?></th>
                    <th><?= $this->Paginator->sort('Enseignant.nom', 'Enseignant') ?></th>
                    <th nowrap><?= $this->Paginator->sort('valide_pour_soutenance', 'Validé ?') ?></th>
                    <th><?= $this->Paginator->sort('note_finale', 'Note') ?></th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($stages as $stage): ?>
                    <tr>
                        <td><?= h($stage['Stage']['id']) ?></td>
                        <td><?= h($stage['Entreprise']['nom']) ?></td>
                        <td><?= h($stage['Stage']['encadrant']) ?></td>
                        <td><?= h($stage['Stage']['sujet']) ?></td>
                        <td><?= h($stage['Stage']['binome']) ?></td>
                        <td><?= h(@$stage['Enseignant']['nom']) ?></td>
                        <td class="text-center">
                            <i class="fa fa-<?= ($stage['Stage']['valide_pour_soutenance']) ? 'check-circle text-success' : 'clock-o text-danger' ?>"></i>
                        </td>
                        <td><?= h($stage['Stage']['note_finale']) ?></td>
                        <td nowrap>
                            <?= $this->Html->link(null, "/stages/edit/{$stage['Stage']['id']}", ['title' => 'Modifier', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-info', 'icon' => 'pencil']) ?>
                            <?= $this->Form->postLink(null, "/stages/delete/{$stage['Stage']['id']}", ['title' => 'Supprimer', 'data-toggle' => 'tooltip', 'confirm' => sprintf('Voulez-vous supprimer #%s ?', $stage['Stage']['id']), 'class' => 'btn btn-xs btn-danger', 'icon' => 'trash']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination: -->
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <p>
                    <?php echo $this->Paginator->counter(['format' => 'Page {:page} sur {:pages}, {:count} ligne(s)']); ?>
                </p>
            </div>
            <div class="col-md-7 col-sm-12">
                <ul class="pagination pull-right" style="margin:0">
                    <?php
                    echo $this->Paginator->prev('«', ['tag' => 'li'], null, ['tag' => 'li', 'disabledTag' => 'a']);
                    echo $this->Paginator->numbers(['separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a']);
                    echo $this->Paginator->next('»', ['tag' => 'li'], null, ['tag' => 'li', 'disabledTag' => 'a']);
                    ?>
                </ul>
            </div>
        </div>
        <?php else: ?>
            <div class="alert alert-info"><i class="fa fa-information-circle"></i> Aucun élément à afficher !</div>
        <?php endif; ?>
    </div>
</div>
