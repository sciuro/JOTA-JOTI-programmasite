<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span6 offset1'>
			<?php if (($speltak == 'bevers') || ($speltak == 'welpen')) { ?>
			<div>
				<h4>Online spelen Jota & Joti:</h4>
				<ul>
					<?php foreach ($duur as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
					<?php }?>
				</ul>
			</div>

			<div>
				<h4>Online spelen Jota:</h4>
				<ul>
					<?php foreach ($duur as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>/jota">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
					<?php }?>
				</ul>
			</div>

			<div>
				<h4>Online spelen Joti:</h4>
				<ul>
					<?php foreach ($duur as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>/joti">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
					<?php }?>
				</ul>
			</div>

			<?php } else { ?>
			<div>
				<h4>Online spelen:</h4>
				<ul>
					<?php foreach ($duur as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/web/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur.</a></li>
					<?php }?>
				</ul>
			</div>
			<?php } ?>

			<div>
				<h4>Spelen downloaden (pdf) voor offline gebruikt:</h4>
				<ul>
					<?php foreach ($duur as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak;?>/pdf/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte']?> uur.</a></li>
					<?php }?>
				</ul>
			</div>

		</div>

		<div class='span2'>
			<?php if ($speltak == 'bevers') { ?>
            	<img src="<?php echo base_url();?>images/george_staat.png">
            <?php } elseif ($speltak == 'welpen') { ?>
            	<img src="<?php echo base_url();?>images/lucas_staat.png">
            <?php } elseif ($speltak == 'scouts') { ?>
            	<img src="<?php echo base_url();?>images/george_staat.png">
            <?php } ?>
		</div>
		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

</div>
