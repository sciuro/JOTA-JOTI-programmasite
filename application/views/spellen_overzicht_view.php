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
			<div>
				Via deze pagina zijn alle spellen in te zien.
			</div>
			<div class='row-fluid'>
			<?php foreach ($speltakken as $speltak) { ?>

			<div class='span4'>
			<div>
				<h4><?php echo $speltak['naam'];?></h4>
				<h5> Jota & Joti:</h5>
				<ul>
					<?php $i=0; ?>
					<?php foreach ($duur[$speltak['naam']] as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak['naam'];?>/overzicht/<?php echo $opkomsttijd['lengte'];?>"><?php echo $opkomsttijd['lengte'];?> uur</a></li>
						<?php $i++; ?>
					<?php }?>
					<?php $j=3-$i; for ($k=0; $k < $j; $k++) { 
						echo "<br>";
					}?>
				</ul>
			</div>

			<div>
				<h5> Jota:</h5>
				<ul>
					<?php $i=0; ?>
					<?php foreach ($duur[$speltak['naam']] as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak['naam'];?>/overzicht/<?php echo $opkomsttijd['lengte'];?>/jota"><?php echo $opkomsttijd['lengte'];?> uur</a></li>
						<?php $i++; ?>
					<?php }?>
					<?php $j=3-$i; for ($k=0; $k < $j; $k++) { 
						echo "<br>";
					}?>
				</ul>
			</div>

			<div>
				<h5> Joti:</h5>
				<ul>
					<?php $i=0; ?>
					<?php foreach ($duur[$speltak['naam']] as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak['naam'];?>/overzicht/<?php echo $opkomsttijd['lengte'];?>/joti"><?php echo $opkomsttijd['lengte'];?> uur</a></li>
						<?php $i++; ?>
					<?php }?>
					<?php $j=3-$i; for ($k=0; $k < $j; $k++) { 
						echo "<br>";
					}?>
				</ul>
			</div>
			</div>

			<?php } ?>
			</div>

		</div>

		<div class='span2'>
           	<img src="<?php echo base_url();?>images/george_staat.png">
		</div>
		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

</div>
