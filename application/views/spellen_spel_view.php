<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $spel['titel']; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span8 offset1'>

			<br>

			<table class='table'>
				 <tbody>
					<tr>
						<th>Deelnemers</th>
						<th><?php echo $spel['min_spelers'];?>-<?php echo $spel['max_spelers']; ?> spelers</th>
					</tr>
					<tr>
      					<th>Leiding</th>
      					<th><?php echo $spel['leiding']; ?></th>
    				</tr>
    				<tr>
      					<th>Duur</th>
      					<th><?php echo $spel['spelduur']; ?> minuten</th>
    				</tr>
    				<tr>
      					<th>Spellocatie</th>
      					<th>
   						<?php foreach ($spellocaties as $spellocatie) { ?>
   							<?php echo $spellocatie['naam']; ?>
   						<?php } ?>
      					</th>
    				</tr>
				</tbody>
			</table>

			<!-- ping -->
			<p>
				<b>Doel:</b><br>
				<?php echo $spel['omschrijving']; ?>
			</p>
			<p>
				<b>Benodigdheden:</b><br>
				<ul>
					<?php if (count($artikelen) == 0 ) { ?>
					<li>Geen</li>
					<?php } else { ?>
					<?php foreach ($artikelen as $artikel) { ?>
						<li>
							<?php echo $artikel['aantal']." "; ?>
							<?php if ($artikel['aantal'] == 1) { echo $artikel['naam']; } else { echo $artikel['naammv']; } ?>
						</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</p>
			<p>
				<b>Voorbereiding:</b><br>
				<?php echo $spel['voorbereiding']; ?>
			</p>
			<p>
				<b>Beschrijving:</b><br>
				<?php echo $spel['beschrijving']; ?>
			</p>
			<!-- pong -->

		</div>

		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

	</div>

</div>
