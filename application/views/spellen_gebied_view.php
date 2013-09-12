<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $gebied; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span12'>
			<center><img src="<?php echo base_url();?>images/gebied_<?php echo $gebiednr;?>_overzicht.png" width="800" border="0" usemap="#kaart"></center>
		</div>
	</div>
	<?php $i = 0; ?>
	<?php foreach ($spellen as $spel) { ?>
	<?php if ($spel['gebied'] == $gebiednr) { ?>
		<?php if ($i == 0) { ?>
			<div class='row-fluid'>
				<div class='span3 postit'>
					<img src="<?php echo base_url();?>images/postit.png">
					<a href="#spel<?php echo $spel['id']; ?>" data-toggle="modal"><div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div></a>

					<!-- Berichtenscherm -->
    				<div id="spel<?php echo $spel['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        				<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        					<h3 id="myModalLabel"><?php echo $spel['titel']; ?></h3>
        				</div>					

						<div class="modal-body">
							<table>
								<tbody>
									<tr>
										<td><strong>Uitleg:</strong></td>
										<td><?php echo $spel['omschrijving']; ?></td>
									</tr>
								</tbody>
							</table>
							<br>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>" data-text="De <?php echo $speltak; ?> hebben de code van <?php echo $gebied; ?> gevonden!" data-lang="nl" data-hashtags="jotajoti">Tweeten</a>
						</div>

						<div class="modal-footer">
							<?php if ($speltak == 'scouts') {$buttontext="Kleurcode"; } else {$buttontext="Kluiscode"; } ?>
							<a href="<?php echo base_url();?>spellen/code/<?php echo $spel['id'].'/'.$gebiednr; ?>"><button role="button" class="btn btn-success"><?php echo $buttontext ?></button></a>
							<a href="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>"><button role="button" class="btn btn-info">Spelbeschrijving</button></a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Sluiten</button>
						</div>
					</div>
					<!-- Einde berichtenscherm -->

				</div>
			<?php $i++; ?>
		<?php } elseif ($i == 3) { ?>
				<div class='span3 postit'>
					<img src="<?php echo base_url();?>images/postit.png">
					<a href="#spel<?php echo $spel['id']; ?>" data-toggle="modal"><div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div></a>

					<!-- Berichtenscherm -->
    				<div id="spel<?php echo $spel['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        				<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        					<h3 id="myModalLabel"><?php echo $spel['titel']; ?></h3>
        				</div>					

						<div class="modal-body">
							<table>
								<tbody>
									<tr>
										<td><strong>Uitleg:</strong></td>
										<td><?php echo $spel['omschrijving']; ?></td>
									</tr>
								</tbody>
							</table>
							<br>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>" data-text="De <?php echo $speltak; ?> hebben de code van <?php echo $gebied; ?> gevonden!" data-lang="nl" data-hashtags="jotajoti">Tweeten</a>
						</div>

						<div class="modal-footer">
							<?php if ($speltak == 'scouts') {$buttontext="Kleurcode"; } else {$buttontext="Kluiscode"; } ?>
							<a href="<?php echo base_url();?>spellen/code/<?php echo $spel['id'].'/'.$gebiednr; ?>"><button role="button" class="btn btn-success"><?php echo $buttontext ?></button></a>
							<a href="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>"><button role="button" class="btn btn-info">Spelbeschrijving</button></a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Sluiten</button>
						</div>
					</div>
					<!-- Einde berichtenscherm -->

				</div>
			</div>
			<?php $i = 0; ?>
		<?php } else { ?>
				<div class='span3 postit'>
					<img src="<?php echo base_url();?>images/postit.png">
					<a href="#spel<?php echo $spel['id']; ?>" data-toggle="modal"><div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div></a>

					<!-- Berichtenscherm -->
    				<div id="spel<?php echo $spel['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        				<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        					<h3 id="myModalLabel"><?php echo $spel['titel']; ?></h3>
        				</div>					

						<div class="modal-body">
							<table>
								<tbody>
									<tr>
										<td><strong>Uitleg:</strong></td>
										<td><?php echo $spel['omschrijving']; ?></td>
									</tr>
								</tbody>
							</table>
							<br>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>" data-text="De <?php echo $speltak; ?> hebben de code van <?php echo $gebied; ?> gevonden!" data-lang="nl" data-hashtags="jotajoti">Tweeten</a>
						</div>

						<div class="modal-footer">
							<?php if ($speltak == 'scouts') {$buttontext="Kleurcode"; } else {$buttontext="Kluiscode"; } ?>
							<a href="<?php echo base_url();?>spellen/code/<?php echo $spel['id'].'/'.$gebiednr; ?>"><button role="button" class="btn btn-success"><?php echo $buttontext ?></button></a>
							<a href="<?php echo base_url();?>spellen/spel/<?php echo $spel['id']; ?>"><button role="button" class="btn btn-info">Spelbeschrijving</button></a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Sluiten</button>
						</div>
					</div>
					<!-- Einde berichtenscherm -->

				</div>
			<?php $i++; ?>
		<?php } ?>
	<?php } ?>
	<?php } ?>

</div>
