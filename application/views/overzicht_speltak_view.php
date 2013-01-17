<div class='container'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	De volgende gebieden zijn hier bekend:
	<ul>
	<?php foreach ($gebieden as $gebied) { ?>
		<li><a href="<?php echo base_url();?>overzicht/gebieden/<?php echo $gebied['id']; ?>"><?php echo $gebied['naam']; ?></a></li>
	<?php } ?>
	</ul>

	De volgende totaalduur van programma's is hier bekend:
	<ul>
	<?php foreach ($duur as $lengte) { ?>
		<li><a href="<?php echo base_url();?>overzicht/spelen/<?php echo $speltak; ?>/<?php echo $lengte['lengte']; ?>"><?php echo $lengte['lengte']; ?> uur</a></li>
	<?php } ?>
	</ul>

	Vind <a href="<?php echo base_url();?>overzicht/spelen/<?php echo $speltak; ?>/">hier</a> alle spelen van de speltak <?php echo $speltak; ?>.

</div>