<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	De volgende spelen zijn bekend 
	<?php if ($speltak == 'alles') { ?>
		voor alle speltakken
	<?php } elseif ($speltak) { ?>
		voor de speltak <?php echo $speltak; ?>
	<?php } ?>
	<?php if ($duur) { ?>
		met een totaal programmaduur van <?php echo $duur; ?> uur
	<?php } ?>
	:

	<ul>
	<?php foreach ($spelen as $spel) { ?>
		<li><a href="#spel<?php echo $spel['id']; ?>" data-toggle="modal"><?php echo $spel['titel']; ?></a></li>
	<?php } ?>
	</ul>

    <?php // De overlay voor het veranderen van nieuwe artikelen. ?>
	<?php foreach ($spelen as $spel) {?>
    <div id="spel<?php echo $spel['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        	<h3 id="myModalLabel"><?php echo $spel['titel']; ?></h3>
        </div>

        <div class="modal-body">
        	<p><b>Omschrijving:</b><br>
        	<?php echo $spel['omschrijving']; ?></p>
        	<p><b>Eigenschappen:</b><br>
        	Dit spel duurt <?php echo $spel['duur']; ?> minuten en je hebt <?php echo $spel['spelers']; ?>
        	spelers en <?php echo $spel['leiding']; ?> leiding nodig.
        	Dit spel kan gespeeld worden met 
        	<?php if ($spel['jota'] == '1' && $spel['joti'] == '1') { ?>
        	zowel de Jota als de Joti.
        	<?php } elseif ($spel['jota'] == '1' && $spel['joti'] == '0') { ?>
        	alleen de Jota.
        	<?php } elseif ($spel['jota'] == '0' && $spel['joti'] == '1') { ?>
        	alleen de joti.
        	<?php } ?></p>
        	<p><b>Benodigdheden:</b><br>
        	<ul>
        		<?php foreach ($artikelen[$spel['id']] as $artikel) { ?>
        		<li><?php echo $artikel['aantal']; ?>
        			<?php if ($artikel['aantal'] == '1') { 
        				echo $artikel['naam'];
        			} else {
        				echo $artikel['naammv'];
        			} ?>
        		</li>
        		<?php } ?>
        	</ul></p>
        	<p><b>Voorbereiding:</b><br>
        	<?php echo $spel['voorbereiding']; ?></p>
        	<p><b>Beschrijving:</b><br>
        	<?php echo $spel['beschrijving']; ?></p>
        </div>

    </div>

    <?php } ?>
</div>