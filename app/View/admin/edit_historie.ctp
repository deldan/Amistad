<div class="historie form">
<?php echo $this->Form->create('Historie');?>
	<fieldset>
		<legend><?php echo __('Edit history'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('text');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteHistorie', $this->Form->value('Historie.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Historie.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List histories'), array('action' => 'indexhistorie'));?></li>
	</ul>
</div>
