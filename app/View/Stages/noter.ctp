<?php
/**
 * @var AppView $this
 */
$this->assign('title', 'Noter');
?>

<h3 class="page-header">Attribuer la note finale</h3>

<?= $this->Form->create('Stage') ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->hidden('Stage.id') ?>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo $this->Form->static('encadrant', ['label' => 'Nom et prénom de l’encadrant dans l’entreprise']);
                    echo $this->Form->static('sujet', ['label' => 'Intitulé du sujet']);
                    echo $this->Form->static('description', ['label' => 'Description du sujet']);
                    echo $this->Form->static('technologies', ['label' => 'Technologies utilisées']);
                    echo $this->Form->static('binome', ['label' => 'Nom et prénom du binôme (si le stage est en binôme)']);
                    ?>
                </div>
                <div class="col-md-6">
                    <strong>Première version du rapport</strong>
                    <?php
                    echo $this->Form->hidden('rapport');
                    echo $this->Form->document('rapport');
                    ?>
                    <strong>Version corrigée du rapport</strong>
                    <?php
                    echo $this->Form->hidden('rapport_corrigee');
                    echo $this->Form->document('rapport_corrigee');
                    ?>
                    <strong>Présentation</strong>
                    <?php
                    echo $this->Form->hidden('presentation');
                    echo $this->Form->document('presentation');
                    ?>
                    <strong>Attestation de stage et fiche d’évaluation</strong>
                    <?php
                    echo $this->Form->hidden('attest_stage_et_fiche_eval');
                    echo $this->Form->document('attest_stage_et_fiche_eval');
                    ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?= $this->Form->input('note_finale', ['label' => 'Note finale']) ?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Modifier</button>
            <a href="<?= Router::url('/stages/all') ?>" class="btn btn-link"><i class="fa fa-undo"></i> Annuler</a>
        </div>
    </div>
<?= $this->Form->end() ?>