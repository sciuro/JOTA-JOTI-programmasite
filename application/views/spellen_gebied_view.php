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
					<div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div>
				</div>
			<?php $i++; ?>
		<?php } elseif ($i == 3) { ?>
				<div class='span3 postit'>
					<img src="<?php echo base_url();?>images/postit.png">
					<div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div>
				</div>
			</div>
			<?php $i = 0; ?>
		<?php } else { ?>
				<div class='span3 postit'>
					<img src="<?php echo base_url();?>images/postit.png">
					<div class='spelnaam'><h4><?php echo $spel['titel']; ?></h4></div>
				</div>
			<?php $i++; ?>
		<?php } ?>
	<?php } ?>
	<?php } ?>

</div>