<?php
/**
 * @var AppView $this
 */
$this->assign('title', 'Mon profil')
?>

<h3 class="page-header">Mon profil</h3>

<?= $this->Form->create('Utilisateur', ['type' => 'file']) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
                <?php
                echo $this->Form->hidden('id');
                echo $this->Form->static('nom_utilisateur', ['label' => 'Nom d’utilisateur']);
                echo $this->Form->static('role', ['label' => 'Rôle']);
                ?>
                <hr>
                <!-- Changer le mot de passe : -->
                <?php
                echo $this->Form->checkbox('changer_mdp', [
                    'label' => 'Changer le mot de passe ?',
                    'onchange' => "$('#UtilisateurMotDePasse,#UtilisateurConfirmerMotDePasse').attr('disabled', !$(this).is(':checked')).first().focus()"
                ]);
                echo $this->Form->input('mot_de_passe', ['type' => 'password', 'label' => 'Mot de passe', 'value' => '', 'disabled' => !$this->Form->value('Utilisateur.changer_mdp')]);
                echo $this->Form->input('confirmer_mot_de_passe', ['type' => 'password', 'label' => 'Confirmer le mot de passe', 'value' => '', 'disabled' => !$this->Form->value('Utilisateur.changer_mdp')]);
                ?>
            </div>
            <div class="col-md-7">
                <!-- Formulaire Enseignant / Etudiant : -->
                <?php foreach (['Enseignant', 'Etudiant'] as $alias): ?>
                <?php if (isset($this->data[$alias]['id'])): ?>
                    <?php
                    echo $this->Form->hidden("$alias.id");
                    echo $this->Form->static("$alias.prenom", ['label' => 'Prénom']);
                    echo $this->Form->static("$alias.nom", ['label' => 'Nom']);
                    echo $this->Form->static("$alias.email", ['label' => 'E-mail']);
                    echo $this->Form->input("$alias.photo", ['label' => 'Photo', 'type' => 'file']);
                    echo $this->Html->avatar(['class' => 'img-thumbnail', 'data' => $this->data, 'style' => 'height:128px']);
                    ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <button class="btn btn-primary"><i class="fa fa-save"></i> Enregistrer</button>
    </div>
</div>
<?= $this->Form->end() ?>