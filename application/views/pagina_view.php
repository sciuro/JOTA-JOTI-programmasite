<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $pagina['titel']; ?></h1>
		</div>
	</header>

	<div class='row'>
		<div class='span10'>
			<?php echo $pagina['tekst']; ?>
		</div>
		<div class='span2'>
			<a href="http://www.jota-joti.nl"><img src="<?php echo base_url();?>images/logo_blauw.gif"></a>
		</div>
	</div>

	<div class='row'>
		<div class='span4 offset8'>
			<small>Laatste aanpassing: <?php echo $pagina['timestamp']; ?></small>
		</div>
	</div>
</div>
