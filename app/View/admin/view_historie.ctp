<div class="historie view">
<h2><?php  echo __('History');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($history['Historie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($history['Historie']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($history['Historie']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($history['Historie']['date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit History'), array('action' => 'editHistorie', $history['Historie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete History'), array('action' => 'deleteHistorie', $history['Historie']['id']), null, __('Are you sure you want to delete # %s?', $history['Historie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Histories'), array('action' => 'indexHistorie')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('action' => 'addHistorie')); ?> </li>
	</ul>
</div>
