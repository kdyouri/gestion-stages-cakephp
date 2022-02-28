<?php
/**
 * @var AppView $this
 */
$this->assign('title', 'Nouveau stage');

$this->Html->script('stages_form.js', ['inline' => false]);
?>

<h3 class="page-header">Ajouter un stage</h3>

<?= $this->Form->create('Stage', ['type' => 'file']) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->element('../Stages/_form') ?>
    </div>
    <div class="panel-footer">
        <button class="btn btn-success"><i class="fa fa-save"></i> Ajouter</button>
        <a href="<?= Router::url('/stages') ?>" class="btn btn-link"><i class="fa fa-undo"></i> Annuler</a>
    </div>
</div>
<?= $this->Form->end() ?>