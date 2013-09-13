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
            Dit zijn alle activiteiten met uitleg, gesorteerd per speltak en totale opkomstduur. Via de link krijg je een lijst met alle activiteiten die binnen je selectie past. Hiervan kun je dan 1 PDF laten genereren waar alle speluitleg voor de desbetreffende speltak en opkomstduur. Ook zit hierbij een benodigdhedenlijst.
			</div>

			<?php foreach ($speltakken as $speltak) { ?>

			<div>
				<h4><?php echo $speltak['naam'];?>:</h4>
				<ul>
					<?php foreach ($duur[$speltak['naam']] as $opkomsttijd) { ?>
						<li><a href="<?php echo base_url();?>spellen/<?php echo $speltak['naam'];?>/pdf/<?php echo $opkomsttijd['lengte'];?>">Totale opkomstduur van <?php echo $opkomsttijd['lengte'];?> uur</a></li>
					<?php }?>
				</ul>
			</div>

			<?php } ?>

		</div>

		<div class='span2'>
           	<img src="<?php echo base_url();?>images/george_staat.png">
		</div>
		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

</div>
