<?php
/**
 * @var AppView $this
 */

$is_new_item = isset($this->data['Entreprise']);
?>
<div class="row">
    <div class="col-md-6">
        <div id="SelectEntreprise"<?php if ($is_new_item) echo ' class="hidden"' ?>>
            <?= $this->Form->input('entreprise_id', ['empty' => true, 'disabled' => $is_new_item]) ?>
        </div>
        <div id="NouvelleEntreprise"<?php if (!$is_new_item) echo ' class="hidden"' ?>>
            <?php
            echo $this->Form->input('Entreprise.nom', ['label' => 'Entreprise', 'placeholder' => 'Nom', 'disabled' => !$is_new_item]);
            echo $this->Form->input('Entreprise.adresse', ['label' => false, 'placeholder' => 'Adresse', 'disabled' => !$is_new_item]);
            echo $this->Form->input('Entreprise.tel', ['label' => false, 'placeholder' => 'Téléphone', 'disabled' => !$is_new_item]);
            echo $this->Form->input('Entreprise.ville', ['label' => false, 'placeholder' => 'Ville', 'disabled' => !$is_new_item]);
            ?>
            <div class="form-group text-right">
                <button class="btn btn-default btn-sm" type="button" id="EntrepriseRetour"><i class="fa fa-undo"></i> Liste de choix</button>
            </div>
        </div>
        <?php
        echo $this->Form->input('encadrant', ['label' => 'Nom et prénom de l’encadrant dans l’entreprise']);
        echo $this->Form->input('sujet', ['label' => 'Intitulé du sujet']);
        echo $this->Form->input('description', ['label' => 'Description du sujet', 'rows' => 3]);
        echo $this->Form->input('technologies', ['label' => 'Technologies utilisées']);
        echo $this->Form->input('binome', ['label' => 'Nom et prénom du binôme (si le stage est en binôme)']);
        ?>
    </div>
    <div class="col-md-6">
        <?php
        echo $this->Form->input('rapport', ['label' => 'Première version du rapport', 'type' => 'file']);
        echo $this->Form->document('rapport');
        echo $this->Form->input('rapport_corrigee', ['label' => 'Version corrigée du rapport', 'type' => 'file']);
        echo $this->Form->document('rapport_corrigee');
        echo $this->Form->input('presentation', ['label' => 'Présentation', 'type' => 'file']);
        echo $this->Form->document('presentation');
        echo $this->Form->input('attest_stage_et_fiche_eval', ['label' => 'Attestation de stage et fiche d’évaluation', 'type' => 'file']);
        echo $this->Form->document('attest_stage_et_fiche_eval');
        ?>
    </div>
</div>
