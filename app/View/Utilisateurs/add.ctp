<div class="utilisateurs form">
<?php echo $this->Form->create('Utilisateur'); ?>
	<fieldset>
		<legend><?php echo __('Add Utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('nom_utilisateur');
		echo $this->Form->input('mot_de_passe');
		echo $this->Form->input('role');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Utilisateurs'), array('action' => 'index')); ?></li>
	</ul>
</div>
