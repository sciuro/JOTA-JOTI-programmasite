<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	<div class='row-fluid'>
		<div class='span10 offset1'>
			<h4>Online spelen Jota & Joti:</h4>
			<ul>
				<?php foreach ($duur as $opkomsttijd) { ?>
					<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
				<?php }?>
			</ul>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span10 offset1'>
			<h4>Online spelen Jota:</h4>
			<ul>
				<?php foreach ($duur as $opkomsttijd) { ?>
					<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>/jota">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
				<?php }?>
			</ul>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span10 offset1'>
			<h4>Online spelen Joti:</h4>
			<ul>
				<?php foreach ($duur as $opkomsttijd) { ?>
					<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>/joti">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
				<?php }?>
			</ul>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span10 offset1'>
			<h4>Spelen downloaden (pdf) voor offline gebruikt:</h4>
			<ul>
				<?php foreach ($duur as $opkomsttijd) { ?>
					<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/pdf/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte']?> uur.</a></li>
				<?php }?>
			</ul>
		</div>
	</div>

</div>
