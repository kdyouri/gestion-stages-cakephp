<?php
/**
 * @var AppView $this
 */
?>
<?= $this->Form->create('Utilisateur', ['class' => 'form-signin']) ?>
    <h2 class="form-signin-heading">Veuillez vous connecter</h2>

    <?= $this->Form->input('nom_utilisateur', ['label' => 'Nom d’utilisateur', 'required', 'autofocus']) ?>
    <?= $this->Form->input('mot_de_passe', ['type' => 'password', 'label' => 'Mot de passe', 'required']) ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">S'identifier</button>
<?php echo $this->Form->end(); ?>

