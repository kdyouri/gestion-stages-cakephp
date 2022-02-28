<div class="utilisateurs index">
	<h2><?php echo __('Utilisateurs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom_utilisateur'); ?></th>
			<th><?php echo $this->Paginator->sort('mot_de_passe'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($utilisateurs as $utilisateur): ?>
	<tr>
		<td><?php echo h($utilisateur['Utilisateur']['id']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['nom_utilisateur']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['mot_de_passe']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['role']); ?>&nbsp;</td>
		<td><?php echo h($utilisateur['Utilisateur']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $utilisateur['Utilisateur']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $utilisateur['Utilisateur']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $utilisateur['Utilisateur']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $utilisateur['Utilisateur']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Utilisateur'), array('action' => 'add')); ?></li>
	</ul>
</div>
