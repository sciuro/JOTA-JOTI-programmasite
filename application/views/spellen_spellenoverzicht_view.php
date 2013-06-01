<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span8 offset1'>

			<?php foreach ($gebieden as $gebied) { ?>

			<div>
				<h4><?php echo $gebied['naam'];?></h4>
				<ul>
					<?php foreach ($spellen as $spel) { ?>
						<?php if ($spel['gebied'] == $gebied['id']) { ?>
							<li><a href="<?php echo base_url();?>spellen/spel/<?php echo $spel['id'];?>"><?php echo $spel['titel'];?></a></li>
						<?php }?>
					<?php }?>
				</ul>
			</div>

			<?php } ?>
		</div>

		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

	</div>

</div>
