<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	<center><img src="<?php echo base_url();?>images/kaart_<?php echo $speltak;?>.jpg" width="1000" border="0" usemap="#kaart"></center>
	<map name="kaart">
		<?php foreach ($gebieden as $gebied) { ?>
  		<area shape="rect" coords="<?php echo $gebied['kaartloc']; ?>" href="<?php echo base_url();?>spelen/gebied/<?php echo $gebied['id']; ?>" alt="<?php echo $gebied['naam']; ?>" title="<?php echo $gebied['naam']; ?>">
  		<?php } ?>
	</map>

</div>