<div class="politicians index">
	<h2><?php echo __('Politicians'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('initials'); ?></th>
			<th><?php echo $this->Paginator->sort('surname'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('post-nominals'); ?></th>
			<th><?php echo $this->Paginator->sort('salutation'); ?></th>
			<th><?php echo $this->Paginator->sort('party'); ?></th>
			<th><?php echo $this->Paginator->sort('electorate'); ?></th>
			<th><?php echo $this->Paginator->sort('ministry'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_line1'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_line2'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_line3'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_state'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_pobox_'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_pobox_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_pobox_state'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_pobox_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_email'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_fax'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_address_website'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_line1'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_line2'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_line3'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_state'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_address_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_pobox_'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_pobox_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_pobox_state'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_pobox_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_email'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_fax'); ?></th>
			<th><?php echo $this->Paginator->sort('ministerial_office_website'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_line1'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_line2'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_line3'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_state'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_address_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_pobox_'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_pobox_suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_pobox_state'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_pobox_postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_email'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_fax'); ?></th>
			<th><?php echo $this->Paginator->sort('alternative_office_website'); ?></th>
			<th><?php echo $this->Paginator->sort('office_holder'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($politicians as $politician): ?>
	<tr>
		<td><?php echo h($politician['Politician']['id']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['initials']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['surname']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['title']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['post-nominals']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['salutation']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['party']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['electorate']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministry']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_line1']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_line2']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_line3']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_pobox_']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_pobox_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_pobox_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_pobox_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_email']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_phone']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_fax']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['contact_address_website']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_line1']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_line2']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_line3']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_address_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_pobox_']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_pobox_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_pobox_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_pobox_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_email']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_phone']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_fax']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['ministerial_office_website']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_line1']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_line2']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_line3']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_address_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_pobox_']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_pobox_suburb']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_pobox_state']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_pobox_postcode']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_email']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_phone']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_fax']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['alternative_office_website']); ?>&nbsp;</td>
		<td><?php echo h($politician['Politician']['office_holder']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $politician['Politician']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $politician['Politician']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $politician['Politician']['id']), null, __('Are you sure you want to delete # %s?', $politician['Politician']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Politician'), array('action' => 'add')); ?></li>
	</ul>
</div>
