<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Colors and Votes</div>
		<div class="panel-body">
			<?php
				if (!empty($colors)) {
			?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><span class="glyphicon glyphicon-tint"></span> Color</th>
							<th class="text-right"><span class="glyphicon glyphicon-signal"></span> Votes</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($colors as $color) {
							echo '<tr>';
							echo '<td data-color-id="'.$color['Color']['id'].'" class="color">'.$color['Color']['name'].' <span class="pull-right label label-primary">'.$color['Color']['vote_count'].' Cities</span></td>';
							echo '<td class="text-right votes" data-sum="0" id="vote_'.$color['Color']['id'].'">&nbsp;</td>';
							echo '</tr>';
						}
					?>
					</tbody>
					<tfoot>
						<tr>
							<td class="total"><span class="pull-right"><strong>Total</strong></span></td>
							<td id="total-votes" class="text-right">&nbsp;</td>							
						</tr>
					</tfoot>
				</table>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		// Show votes when color is clicked
		$('.color').click(function() {
			var color_id = $(this).data('color-id');
			$.getJSON('/colors/view/' + color_id, function(voteData) {
				var number_of_votes = voteData.total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				$('#vote_' + color_id).text(number_of_votes);
				$('#vote_' + color_id).data('sum', voteData.total);
			});
		});
		
		// Show sum when total is clicked
		$('.total').click(function() {
			var total = 0;
			$('.votes').each(function() {
				total += (parseInt($(this).data('sum')));
			});
			$('#total-votes').text(total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,'));
		});
	});
</script>