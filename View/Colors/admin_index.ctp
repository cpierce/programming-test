<h2>Color <span class="small">Management</span></h2>
<div class="btn-group">
	<?php
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> Add Color', array(
			'action' => 'add',
		), array(
			'class' => 'btn btn-primary btn-sm',
			'escape' => false,
		));		
		echo $this->Html->link('Manage Votes', array(
			'controller' => 'votes',
			'action' => 'index',
		), array(
			'class' => 'btn btn-default btn-sm',
			'escape' => false,
		));		
	?>
</div>
<p>&nbsp;</p>
<?php
if (!empty($colors)) {
?>
	<div class="panel panel-info">
		<div class="panel-heading">Colors</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th><?php echo $this->Paginator->sort('Color.name', 'Color'); ?></th>
							<th><?php echo $this->Paginator->sort('Color.vote_count', '# of Cities with Color'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($colors as $color) { ?>
						<tr>
							<td>
								<div class="btn-group">
								<?php
								echo $this->Html->link(__('Edit'), array(
									'action' => 'edit',
									$color['Color']['id'],
								), array(
									'class' => 'btn btn-default btn-xs',
								));
								echo $this->Form->postLink(__('Delete'), array(
									'action' => 'delete',
									$color['Color']['id'],
								), array(
									'class' => 'btn btn-danger btn-xs',
								), __('Are you sure you want to delete this color?'));
								?>
								</div>
							</td>
							<td><?php echo $color['Color']['name']; ?></td>
							<td><?php echo $color['Color']['vote_count']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
					<?php
						// if there are more than 10 entrys show the pagination for additional pages
						if ($this->Paginator->hasPage(null, 2)) { 
					?>
					<tfoot>
						<tr>
							<td colspan="3" class="text-right">
								<ul class="pagination pagination-sm pagination-right">
								<?php
									echo $this->Paginator->first('<span class="glyphicon glyphicon-fast-backward"></span> First', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
									echo $this->Paginator->prev('<span class="glyphicon glyphicon-step-backward"></span> Prev', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
									echo $this->Paginator->numbers(array(
										'currentClass' => 'active',
										'currentTag' => 'a',
										'tag' => 'li',
										'separator' => '',
									));
									echo $this->Paginator->next('Next <span class="glyphicon glyphicon-step-forward"></span>', array('escape' => false, 'tag' => 'li', 'currentClass' => 'disabled'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
									echo $this->Paginator->last('Last <span class="glyphicon glyphicon-fast-forward"></span>', array('escape' => false, 'tag' => 'li', 'currentClass' => 'disabled'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
								?>
								</ul>
								<p><?php echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total.')); ?></p>
							</td>
						</tr>
					</tfoot>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
<?php
} else {
	echo '<p>There are currently no colors in the system.</p>';
}