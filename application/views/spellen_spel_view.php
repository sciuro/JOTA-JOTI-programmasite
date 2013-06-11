<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $spel['titel']; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span1 offset4'>
			<div class="fb-like" data-href="<?php echo base_url();?>spellen/spel/<?php echo $spel['id'];?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
		</div>

		<div class='span2'>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo base_url();?>spellen/spel/<?php echo $spel['id'];?>" data-text="Heeft het spel '<?php echo $spel['titel']; ?>' ontdekt op de themasite." data-lang="nl"  data-hashtags="jotajoti">Tweeten</a>
		</div>

		<div class='span1'>
			<?php if ( ($this->session->userdata('validated')) && ($this->session->userdata('spellen')) ) { ?>
				<a href="<?php echo base_url();?>beheer/spel/<?php echo $spel['id'];?>"><button role="button" class="btn btn-info">Edit</button></a>
			<?php } else { ?>
				<?php if ($this->session->flashdata('submit')) { ?>
					<button href="#feedback" role="button" class="btn btn-success" data-toggle="modal">Feedback</button>
				<?php } else { ?>
					<button href="#feedback" role="button" class="btn btn-info" data-toggle="modal">Feedback</button>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

	<div id="feedback" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Feedback</h3>
		</div>
		<?php $attributes = array('class' => 'form-horizontal');
		echo form_open('feedback', $attributes); ?>
		<input type="hidden" name="spel" value="<?php echo $spel['id']; ?>">
		<?php if (isset($groepsnr)) { ?>
			<input type="hidden" name="groepsnr" value="<?php echo $groepsnr; ?>">
		<?php } ?>

		<div class="modal-body">

			<div class="control-group">
				<label class="control-label" for="feedback">Was deze informatie bruikbaar?</label>
				<div class="controls">
					<label class="radio">
						<input type="radio" name="bruikbaar" value="1">Ja
					</label>
					<label class="radio">
						<input type="radio" name="bruikbaar" value="2">Nee
					</label>
					<!--
					<div class="btn-group" data-toggle="buttons-radio">
						<button type="button" name="bruikbaar" value="1" class="btn btn-success">Ja</button>
						<button type="button" name="bruikbaar" value="2" class="btn btn-danger">Nee</button>
					</div>
					-->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="opmerking">Wat was goed/slecht?</label>
				<div class="controls">
					<textarea id="opmerking" rows="3" name="opmerking" placeholder="Opmerkingen"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="email">Wil je weten wat er mee gebeurd is?</label>
				<div class="controls">
					<?php if ($this->session->userdata('email') != '') { ?>
						<span class="input-xlarge uneditable-input"><?php echo $this->session->userdata('email'); ?></span>
					<?php } else { ?>
						<input type="text" id="email" name="email" placeholder="E-Mail adres">
					<?php } ?>
				</div>
			</div>

		</div>

		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button type="submit" class="btn btn-primary">Opslaan</button>
		</div>

		</form>
	</div>


	<div class='row-fluid'>
		<div class='span8 offset1'>

			<br>

			<table class='table'>
				 <tbody>
					<tr>
						<th>Deelnemers</th>
						<th><?php echo $spel['min_spelers'];?>-<?php echo $spel['max_spelers']; ?> spelers</th>
					</tr>
					<tr>
      					<th>Leiding</th>
      					<th><?php echo $spel['leiding']; ?></th>
    				</tr>
    				<tr>
      					<th>Duur</th>
      					<th><?php echo $spel['spelduur']; ?> minuten</th>
    				</tr>
    				<tr>
      					<th>Spellocatie</th>
      					<th>
   						<?php foreach ($spellocaties as $spellocatie) { ?>
   							<?php echo $spellocatie['naam']; ?>
   						<?php } ?>
      					</th>
    				</tr>
				</tbody>
			</table>

			<!-- ping -->
			<p>
				<b>Doel:</b><br>
				<?php echo $spel['omschrijving']; ?>
			</p>
			<p>
				<b>Benodigdheden:</b><br>
				<ul>
					<?php if (count($artikelen) == 0 ) { ?>
					<li>Geen</li>
					<?php } else { ?>
					<?php foreach ($artikelen as $artikel) { ?>
						<li>
							<?php echo $artikel['aantal']." "; ?>
							<?php if ($artikel['aantal'] == 1) { echo $artikel['naam']; } else { echo $artikel['naammv']; } ?>
						</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</p>
			<?php if (count($bijlagen) > 0) {?>
			<p>
				<b>Bijlagen:</b><br>
				Dit spel bevat de volgende bijlage:
				<ul>
				<?php foreach ($bijlagen as $bijlage) { ?>
					<li><a href="<?php echo base_url();?>bijlage/download/<?php echo $bijlage['id']; ?>"><?php echo $bijlage['filename']; ?></a> - <?php echo $bijlage['omschrijving']; ?></li>			
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
			<!-- pong -->

		</div>

		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

	</div>

</div>
