	<div class="panel panel-primary">
		<div class="panel-heading"><span class="pull-right glyphicon glyphicon-question-sign"></span>Color Test Support</div>
		<div class="panel-body">
			<p>Click color name to populate the Votes for that color.</p>
			<p>By clicking "Total" all columns that are populated will be added together.</p>
			<p>If at any time you need help, please fill the form out below to have a customer service representative contact you.</p>
			<?php
				echo $this->Form->create('Support', array(
					'controller' => 'supports',
					'action' => 'add',
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
				echo $this->Form->input('Support.full_name');
				echo $this->Form->input('Support.email');
				echo $this->Form->input('Support.comment');
				echo '<div>';
				echo $this->Form->button('Submit', array(
					'type' => 'submit',
					'class' => 'btn btn-sm btn-primary',
				));
				echo ' ';
				echo $this->Form->button('Reset', array(
					'type' => 'reset',
					'class' => 'black btn btn-sm btn-default',
				));
				echo '</div>';
				echo $this->Form->end();
			?>
		</div>
		<div class="panel-footer">
			Color and Vote data may be edited by <a href="/admin">backend admin</a>
		</div>
	</div>
