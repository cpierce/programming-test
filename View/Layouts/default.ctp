<!DOCTYPE html>
<html>
<head>
	<title>Programming Test - <?php echo $this->fetch('title'); ?></title>
	<?php
		echo $this->Html->charset();
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css(array(
			'/lib/bootstrap/css/bootstrap.css',
			'/lib/bootstrap/css/bootstrap-theme.css',
			'layout',
		));
		echo $this->Html->script(array(
			'jquery',
			'/lib/bootstrap/js/bootstrap.js',
		));
		echo $this->fetch('css');
	?>
</head>
<body>
		<div id="header">
			<div class="container text-center">
				<h1><a href="/"><span class="glyphicon glyphicon-tasks"></span> Programming Test</a></h1>
			</div>
		</div>
		<div id="content">
			<div class="container">
			<?php 
				echo $this->Session->flash();
				echo $this->fetch('content'); 
			?>
			</div>
		</div>
		<?php
		echo $this->element('sql_dump'); 
		?>
		<div id="footer">
			<div class="container text-center">
				<p>Written by Chris Pierce</p>
			</div>
		</div>
	</div>
	<?php
		echo $this->fetch('script');
	?>
</body>
</html>
