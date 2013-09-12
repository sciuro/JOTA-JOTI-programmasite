<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $spel[0]['titel']; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='offset3 span6'>
			<div class='hero-unit'>
				<?php if ($speltak == 'scouts') { ?>
				<center><h1><?php echo $spel[0]['wincode'] ?></h1></center>
				<?php } else { ?>
				<center><h1>Code = <?php echo $spel[0]['wincode'] ?></h1></center>	
				<?php }?>
			</div>
			<div>
				<center><a href="<?php echo $returnurl; ?>"><button role="button" class="btn btn-success">Terug</button></a></center>
			</div>
		</div>
	</div>


</div>
