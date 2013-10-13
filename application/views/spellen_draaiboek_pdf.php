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
        
        <?php //TODO Mogelijk omharken naar een tabel met teksten en daaruit harken. Dit is wat gevoelig voor aanpassing van speltaknamen.
        if ($speltak == 'bevers') { ?>

        <p><b>Rozemarijn</b> : In Hotsjietonia is iets geks aan de hand. Overal hangen briefjes met opdrachten erop. Wij, de bewoners van Hotsjietonia, weten niet zo goed wat ze van deze briefjes moeten denken. In de krant heb ik een advertentie van een detectivebureau gelezen. Ik heb de speurneuzen opgebeld en gevraagd of ze willen komen kijken.</p>
		<p>Als de detectives binnen komen blijken het George en Lucas te zijn, de jongens die vorig jaar Professor Plof hebben geholpen om de reismachine weer in elkaar te zetten. Ik heb met hen afgesproken dat ze zo lang ze met het onderzoek bezig zijn bij mij en Professor Plof mogen logeren.</p>
		<p>George en Lucas hebben een groot prikbord gemaakt waar ze alle informatie die ze verzamelen ophangen. Samen met George en Lucas heb ik bedacht dat we alle opdrachten in Hotsjietonia gaan doen en als we de opdrachten hebben gedaan hangen we dit op het prikbord. Misschien dat we er dan achter komen wat de geheimzinnige briefjes ophanger van plan is.</p>
		<p>Helaas, George, Lucas en ik hebben hard gewerkt om alle opdrachten op te lossen, maar in plaats van minder briefjes lijkt het wel of er alleen maar briefjes bij gekomen zijn. Ik heb een goed idee, zei ik toen tegen George en Lucas. Zouden de Bevers die jullie vorig jaar geholpen hebben niet weer kunnen helpen? Dan zijn veel sneller alle opdrachten opgelost. Iedereen vindt dat een goed idee.</p>
		<p>Helpen jullie mee om alle opdrachten op te lossen?</p>

        <?php } elseif ($speltak == 'welpen') { ?>

        <p><b>Shanti</b> : Mowgli heeft mij verteld dat er in de jungle iets geks aan de hand is. Overal hangen briefjes met opdrachten erop. De dieren weten niet zo goed wat ze van deze briefjes moeten denken. Akela heeft alle dieren bij elkaar geroepen bij de Raadsrots voor een vergadering. Ik mag ook komen.</p>
		<p>Chil vertelt dat hij heeft gehoord dat er in Haveli twee speurneuzen wonen. Ik vertel dat deze speurneuzen George en Lucas heten. Ik wil wel aan deze speurneuzen vragen of zij eens naar de mysterieuze briefjes willen komen kijken. Dat vinden de andere dieren een goed idee.</p>
		<p>Ik heb na deze vergadering met George en Lucas gepraat en ze meegenomen naar de vergadering bij de Raadsrots. Eerst zijn de andere dieren nog een beetje schuw, omdat ze de speurneuzen nog niet kennen. Maar als ik hen laat zien dat het dezelfde jongens zijn die vorig jaar een reismachine hadden geknutseld komen we toch dichterbij.</p>
		<p>Met zijn allen bedenken we een plan om de geheime briefjes ophanger te ontmaskeren. Om alle informatie die we al hebben te verzamelen, komt bij de Raadsrots een groot prikbord te hangen.</p>
		<p>Daarnaast hebben we bedacht dat we alle opdrachten gaan oplossen. We willen kijken of we er op die manier achter kunnen komen wie de geheimzinnige briefjes ophanger is. Misschien komen we er zo ook achter wat hij of zij van plan is.</p>
		<p>Maar helaas, we hebben geprobeerd om alle opdrachten op te lossen. Maar het lijkt wel of er steeds meer opdrachten bij komen. Dit plannetje werkt niet.</p>
		<p>Akela heeft iedereen weer bij elkaar geroepen bij de Raadsrots.</p>
		<p>We zijn erg teleurgesteld dat het niet lukt. Maar Bagheera en Baloe hebben een nieuw idee. Waarom vragen we alle Welpen niet om ons te helpen? Als alle Welpen dit tegelijkertijd doen, dan moet het toch lukken om de geheimzinnige briefjes ophanger op te sporen. Iedereen vindt dit een goed idee. Doen jullie mee?</p>

        <?php } elseif ($speltak == 'scouts') { ?>

        <p><b>Lucas</b> : Hé George, heb je dat in de krant gelezen?</p>
		<p><b>George</b> : Wat?</p>
		<p><b>Lucas</b> : Er is weer een mysterieuze wijze een moord gepleegd. Omdat de politie er niet uitkomt hebben ze een oproep geplaatst of er misschien mensen zijn die gespecialiseerd zijn in cybercrime om hen te helpen. Misschien kunnen wij ze wel helpen...</p>
		<p><b>George</b> : Misschien moeten we even contact met ze opnemen en kijken of wij ze inderdaad ergens mee kunnen helpen. Staat erbij hoe we contact op kunnen nemen?</p>
		<p><b>Lucas</b> : Ja, er staat een telefoonnummer en een emailadres. Laten we een mailtje sturen.</p>
		<p><i>Een paar dagen later....</i></p>
		<p><b>Lucas</b> : George, we hebben een emailtje terug gekregen. Ze schrijven dat ze graag nader kennis zouden maken om te kijken of we ze kunnen helpen. Morgen komt het hen goed uit. Zullen we eens gaan kijken wat ze ons te vertellen hebben?</p>
		<p><b>George</b> : Ik heb dan al een JOTA-vergadering, maar als jij er nu naar toe gaat. Dan weten we zo snel mogelijk of we hen kunnen helpen met iets.</p>
		<p><i>Na een aantal weken....</i></p>
		<p><b>Lucas</b> : Het lukt helaas ons ook niet om de moord op te lossen. Het lijkt wel of er steeds meer bewijs bij komt, waardoor iedereen verdacht is maar we nog steeds geen dader kunnen ontmaskeren. Misschien moeten er mensen met een onbevooroordeelde blik naar kijken? We zien vast iets over het hoofd.</p>
		<p><b>George</b> : Laten we de Scouts eens vragen met ons mee te kijken. Misschien dat zij ons kunnen helpen.</p>

        <?php }  elseif ($speltak == 'explorers') { ?>
        Explorers Inleidingstekst 
        <?php } elseif ($speltak == 'roverscouts') { ?>
        Roverscouts Inleidingstekst
        <?php } else echo "FOUT, geen speltak gevonden" ?>
		<hr/>

		<h2>Algemene uitleg</h2>
		Algemene uitleg
		<hr/>

		<?php if (isset($nodiglijst)) { ?>
		<h2>Benodigdheden</h2>
		<p>De volgende artikelen zijn nodig voor de gekozen spelen. Dit is een verzamellijst!</p>

		<ul>
		<?php foreach ($nodiglijst as $artikel) { ?>
			<li>
				[&nbsp;&nbsp;]&nbsp;<?php echo $artikel['aantal']." "; ?>
				<?php if ($artikel['aantal'] == 1) { echo $artikel['naam']; } else { echo $artikel['naammv']; } ?>
			</li>
		<?php } ?>
		</ul>

		<hr/>
		<?php } ?>

		<?php foreach ($gebieden as $gebied) { ?>
			<?php if ($gebied['aantal'] >= 1) { ?>

			<center>
				<br>
				<p>
					<img src="<?php echo base_url();?>images/gebied_<?php echo $gebied['id']; ?>_overzicht.png">
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
    						<tr>
      							<td>Winnende code</td>
      							<td><?php echo $spel['wincode']; ?></td>
    						</tr>
    						<?php if ($spel['copyright'] != '') { ?>
    						<tr>
      							<td>Copyright</td>
      							<td>&copy; <?php echo $spel['copyright']; ?></td>
    						</tr>
    						<?php } ?>
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
									<?php echo $artikel['aantal']." "; ?>
									<?php if ($artikel['aantal'] == 1) { echo $artikel['naam']; } else { echo $artikel['naammv']; } ?>
								</li>
							<?php } ?>
						<?php } ?>
					</ul>
					</p>
					<?php if (count($bijlagen[$spel['id']]) != 0 ) { ?>
					<p>
						<b>Bijlagen:</b><br>
						<ul>
							<?php foreach ($bijlagen[$spel['id']] as $bijlage) { ?>
							<li>
								<a href="<?php echo base_url();?>bijlage/download/<?php echo $bijlage['id']; ?>"><?php echo $bijlage['omschrijving']; ?></a>
							</li>
							<?php } ?>
						</ul>
					</p>
					<?php } ?>
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
