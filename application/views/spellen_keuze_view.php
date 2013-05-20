<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	Online spelen inzien:
	<ul>
		<?php foreach ($duur as $opkomsttijd) { ?>
			<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
		<?php }?>
	</ul>

	Spelen downloaden (pdf) voor offline gebruikt:
	<ul>
		<?php foreach ($duur as $opkomsttijd) { ?>
			<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/pdf/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte']?> uur.</a></li>
		<?php }?>
	</ul>

</div>
