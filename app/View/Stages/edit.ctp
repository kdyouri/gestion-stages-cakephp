<?php
/**
 * @var AppView $this
 */
$this->assign('title', 'Modifier stage');

$this->Html->script('stages_form.js', ['inline' => false]);
?>

    <h3 class="page-header">Modifier un stage</h3>

<?= $this->Form->create('Stage', ['type' => 'file']) ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $this->Form->hidden('Stage.id') ?>
            <?= $this->element('../Stages/_form') ?>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Modifier</button>
            <a href="<?= Router::url('/stages') ?>" class="btn btn-link"><i class="fa fa-undo"></i> Annuler</a>
        </div>
    </div>
<?= $this->Form->end() ?>