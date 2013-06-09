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
			<center><img src="<?php echo base_url();?>images/gebied_<?php echo $gebiednr;?>_logo.png"></center>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span12'>	

			<?php foreach ($spellen as $spel) { ?>
			<?php if ($spel['gebied'] == $gebiednr) { ?>

				<?php echo $spel['titel']; ?>

			<?php } ?>
			<?php } ?>

		</div>
	</div>

</div>