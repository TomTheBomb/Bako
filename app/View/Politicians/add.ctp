<div class="politicians form">
<?php echo $this->Form->create('Politician'); ?>
	<fieldset>
		<legend><?php echo __('Add Politician'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('initials');
		echo $this->Form->input('surname');
		echo $this->Form->input('title');
		echo $this->Form->input('post-nominals');
		echo $this->Form->input('salutation');
		echo $this->Form->input('party');
		echo $this->Form->input('electorate');
		echo $this->Form->input('ministry');
		echo $this->Form->input('contact_address_line1');
		echo $this->Form->input('contact_address_line2');
		echo $this->Form->input('contact_address_line3');
		echo $this->Form->input('contact_address_suburb');
		echo $this->Form->input('contact_address_state');
		echo $this->Form->input('contact_address_postcode');
		echo $this->Form->input('contact_address_pobox_');
		echo $this->Form->input('contact_address_pobox_suburb');
		echo $this->Form->input('contact_address_pobox_state');
		echo $this->Form->input('contact_address_pobox_postcode');
		echo $this->Form->input('contact_address_email');
		echo $this->Form->input('contact_address_phone');
		echo $this->Form->input('contact_address_fax');
		echo $this->Form->input('contact_address_website');
		echo $this->Form->input('ministerial_office_address_line1');
		echo $this->Form->input('ministerial_office_address_line2');
		echo $this->Form->input('ministerial_office_address_line3');
		echo $this->Form->input('ministerial_office_address_suburb');
		echo $this->Form->input('ministerial_office_address_state');
		echo $this->Form->input('ministerial_office_address_postcode');
		echo $this->Form->input('ministerial_office_pobox_');
		echo $this->Form->input('ministerial_office_pobox_suburb');
		echo $this->Form->input('ministerial_office_pobox_state');
		echo $this->Form->input('ministerial_office_pobox_postcode');
		echo $this->Form->input('ministerial_office_email');
		echo $this->Form->input('ministerial_office_phone');
		echo $this->Form->input('ministerial_office_fax');
		echo $this->Form->input('ministerial_office_website');
		echo $this->Form->input('alternative_office_address_line1');
		echo $this->Form->input('alternative_office_address_line2');
		echo $this->Form->input('alternative_office_address_line3');
		echo $this->Form->input('alternative_office_address_suburb');
		echo $this->Form->input('alternative_office_address_state');
		echo $this->Form->input('alternative_office_address_postcode');
		echo $this->Form->input('alternative_office_pobox_');
		echo $this->Form->input('alternative_office_pobox_suburb');
		echo $this->Form->input('alternative_office_pobox_state');
		echo $this->Form->input('alternative_office_pobox_postcode');
		echo $this->Form->input('alternative_office_email');
		echo $this->Form->input('alternative_office_phone');
		echo $this->Form->input('alternative_office_fax');
		echo $this->Form->input('alternative_office_website');
		echo $this->Form->input('office_holder');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Politicians'), array('action' => 'index')); ?></li>
	</ul>
</div>
