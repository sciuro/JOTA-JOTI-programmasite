<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $gebied; ?></h1>
		</div>
	</header>

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
							<p>Geheime code: <?php echo $spel['wincode']; ?></p>
						</div>

						<div class="modal-footer">
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
							<p>Geheime code: <?php echo $spel['wincode']; ?></p>
						</div>

						<div class="modal-footer">
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
							<p>Geheime code: <?php echo $spel['wincode']; ?></p>
						</div>

						<div class="modal-footer">
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