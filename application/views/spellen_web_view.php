<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span12'>
			<center><img src="<?php echo base_url();?>images/kaart_<?php echo $speltak;?>.jpg" width="1000" border="0" usemap="#kaart"></center>
			<map name="kaart">
				<?php foreach ($gebieden as $gebied) { ?>
  				<area shape="rect" coords="<?php echo $gebied['kaartloc']; ?>" href="<?php echo base_url();?>spellen/gebied/<?php echo $gebied['id']; ?>/<?php echo $opkomstduur; ?>/<?php echo $jjkeuze; ?>" alt="<?php echo $gebied['naam']; ?>" title="<?php echo $gebied['naam']; ?>">
  				<?php } ?>
			</map>
		</div>
	</div>

</div>