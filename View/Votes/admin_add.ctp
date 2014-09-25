<h2>Add Votes</h2>
<?php
echo $this->Form->create('Vote', array(
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
echo $this->Form->input('Vote.city');
echo $this->Form->input('Vote.color_id', array(
	'empty' => true,
	'data-placeholder' => 'Please choose a color',
));
echo $this->Form->input('Vote.number_of_votes');
echo '<div>';
	echo $this->Form->button('Submit', array(
		'type' => 'submit',
		'class' => 'btn btn-sm btn-danger',
	));
	echo ' ';
	echo $this->Html->link('Cancel', array(
		'action' => 'index',
	), array(
		'class' => 'black btn btn-sm btn-primary',
	));
echo '</div>';
echo $this->Form->end();
echo $this->Html->css(array('chosen'), array('inline' => false));
echo $this->Html->script(array('jquery.chosen'), array('inline' => false));
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('select').chosen({allow_single_deselect: true});
	});
</script>