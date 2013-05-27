<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>JOTA-JOTI 2013 Spelbeschrijving</title>
		<style type="text/css">

		@page {
			margin: 2cm;
		}

		body {
  			font-family: sans-serif;
			margin: 0.5cm 0;
			text-align: justify;
		}

		#header,
		#footer {
			position: fixed;
  			left: 0;
			right: 0;
			color: #aaa;
			font-size: 0.9em;
		}

		#header {
  			top: 0;
			border-bottom: 0.1pt solid #aaa;
		}

		#footer {
  			bottom: 0;
  			border-top: 0.1pt solid #aaa;
		}

		#header table,
		#footer table {
			width: 100%;
			border-collapse: collapse;
			border: none;
		}

		#header td,
		#footer td {
  			padding: 0;
			width: 50%;
		}

		.page-number {
  			text-align: center;
		}

		.page-number:before {
  			content: "Pagina " counter(page);
		}

		hr {
  			page-break-after: always;
  			border: 0;
		}

		#spelgegevens {
			width: 100%;
			border:thin blue solid;
			border-style:dashed;
		}

	</style>
	</head>
	<body>
		<center><img src="<?php echo base_url();?>images/<?php echo $speltak; ?>_logo.png"></center>
		<center><h1>Spelbeschrijving</h1></center>
		<center><h2>Spelaanbod<br>
			JOTA-JOTI 2013<br>
			<?php echo $speltak; ?><br>
			<?php echo $opkomstduur; ?> uur<br>
		</h2></center>
		<center><img src="<?php echo base_url();?>images/share-it-pdf.png"></center>
		<hr/>

		<div id="header">
  			<table>
    			<tr>
      				<td>Share-it</td>
      				<td style="text-align: right;">JOTA-JOTI 2013</td>
    			</tr>
  			</table>
		</div>

		<div id="footer">
  			<div class="page-number"></div>
		</div>

		<h2>Inleiding</h2>
		Inleiding tekst
		<hr/>

		<h2>Inhoud</h2>
		Inhoud tekst
		<hr/>

		<h2>Algemene uitleg</h2>
		Algemene uitleg
		<hr/>

		<?php foreach ($gebieden as $gebied) { ?>
			<?php if ($gebied['aantal'] >= 1) { ?>

			<center>
				<br>
				<p>
					<img src="<?php echo base_url();?>images/gebied_<?php echo $gebied['id']; ?>_logo.png">
					<h1>Gebied<br>
					<?php echo $gebied['naam']; ?></h1><br>
				</p>
			</center>
			<hr/>

			<?php foreach ($spellen as $spel) { ?>
				<?php if ($spel['gebied'] == $gebied['id']) { ?>

					<h2><?php echo $spel['titel']; ?></h2>

					<p>
						<table id="spelgegevens">
    						<tr>
      							<td>Deelnemers</td>
      							<td><?php echo $spel['min_spelers']; ?>-<?php echo $spel['max_spelers']; ?> spelers</td>
    						</tr>
    						<tr>
      							<td>Leiding</td>
      							<td><?php echo $spel['leiding']; ?></td>
    						</tr>
    						<tr>
      							<td>Duur</td>
      							<td><?php echo $spel['duur']; ?> minuten</td>
    						</tr>
    						<tr>
      							<td>Jota</td>
      							<td><?php if ($spel['jota'] == 1){echo "Ja";} else { echo "Nee";} ?></td>
    						</tr>
    						<tr>
      							<td>Joti</td>
      							<td><?php if ($spel['joti'] == 1){echo "Ja";} else { echo "Nee";} ?></td>
    						</tr>
    						<tr>
      							<td>Spellocatie</td>
      							<td>
   									<?php foreach ($spellocaties[$spel['id']] as $spellocatie) { ?>
   										<?php echo $spellocatie['naam']; ?>
   									<?php } ?>
      							</td>
    						</tr>
  						</table>
  					</p>
  					<br>

					<p>
						<b>Doel:</b><br>
						<?php echo $spel['omschrijving']; ?>
					</p>
					<p>
						<b>Benodigdheden:</b><br>
						<ul>
						<?php if (count($artikelen[$spel['id']]) == 0 ) { ?>
							<li>Geen</li>
						<?php } else { ?>
							<?php foreach ($artikelen[$spel['id']] as $artikel) { ?>
								<li>
									<?php echo $artikel['aantal']." X "; ?>
									<?php if ($artikel['aantal'] == 1) { echo $artikel['naam']; } else { echo $artikel['naammv']; } ?>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
					</p>
					<p>
						<b>Voorbereiding:</b><br>
						<?php echo $spel['voorbereiding']; ?>
					</p>
					<p>
						<b>Beschrijving:</b><br>
						<?php echo $spel['beschrijving']; ?>
					</p>

					<hr/>

				<?php }?>
			<?php }?>
		<?php }?>
		<?php }?>

	</body>
</html>