<h2>Edit Color</h2>
<?php
echo $this->Form->create('Color', array(
	'novalidate' => true,
	'class' => 'form-horizontal',
	'role' => 'form',
	'inputDefaults' => array(
		'format' => array(
			'before',
			'label',
			'between',
			'input',
			'after',
			'error',
		),
		'class' => 'form-control',		
		'div' => array(
			'class' => 'form-group col-md-12',
		),
		'label' => array(
			'class' => 'control-label',
		),
		'error' => array(
			'attributes' => array(
				'wrap' => 'span', 
				'class' => 'help-block label label-danger',
			),
		),
	),
));
echo $this->Form->input('Color.name');
echo '<div>';
	echo $this->Form->button('Submit', array(
		'type' => 'submit',
		'class' => 'btn btn-sm btn-primary',
	));
	echo ' ';
	echo $this->Html->link('Cancel', array(
		'action' => 'index',
	), array(
		'class' => 'black btn btn-sm btn-default',
	));
echo '</div>';
echo $this->Form->input('Color.id');
echo $this->Form->end();