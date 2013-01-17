<div class='container'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	De volgende spelen zijn bekend 
	<?php if ($speltak == 'alles') { ?>
		voor alle speltakken
	<?php } elseif ($speltak) { ?>
		voor de speltak <?php echo $speltak; ?>
	<?php } ?>
	<?php if ($duur) { ?>
		met een totaal programmaduur van <?php echo $duur; ?> uur
	<?php } ?>
	:

<pre><?php print_r($spelen); ?></pre>

</div>