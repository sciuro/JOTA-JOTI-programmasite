<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/nicedit/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

	<?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/spel', $attributes); ?>
    <?php if (isset($spel['id'])) {?><input type="hidden" name="spelid" value="<?php echo $spel['id']; ?>"> <?php }?>

	<div class='row-fluid'>
		<div class='span10 offset1'>
            <ul id="myTab" class="nav nav-tabs">
            	<li class="active"><a href="#algemeen" data-toggle="tab">Algemeen</a></li>
            	<li><a href="#beschrijving" data-toggle="tab">Beschrijving</a></li>
            	<li><a href="#gebieden" data-toggle="tab">Gebieden</a></li>
            	<li><a href="#lokatie" data-toggle="tab">Lokatie</a></li>
            	<li><a href="#artikelen" data-toggle="tab">Artikelen</a></li>
            	<li><a href="#copyright" data-toggle="tab">Copyright</a></li>
            	<li class='span1'></li>
            	<?php if ($this->session->flashdata('submit')) { ?>
            		<li><button type="submit" class="btn btn-success">Opslaan</button></li>
            	<?php } else { ?>
            		<li><button type="submit" class="btn btn-primary">Opslaan</button></li>
            	<?php } ?>
            </ul>
        </div>
    </div>

    <div class='row-fluid'>
		<div class='span10 offset1'>

            <div id="myTabContent" class="tab-content">

              	<div class="tab-pane fade in active" id="algemeen">
					<div class="control-group">
						<label class="control-label" for="titel">Naam</label>
						<div class="controls">
							<input type="text" id="titel" name="titel" placeholder="Naam van het spel" value="<?php echo $spel['titel'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="omschrijving">Omschrijving</label>
						<div class="controls">
							<input class="span8" type="text" id="omschrijving" name="omschrijving" placeholder="Omschrijving van het spel" value="<?php echo $spel['omschrijving'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="spelduur">Spelduur</label>
						<div class="controls">
							<select class="span1" id="spelduur" name="spelduur">
								<?php for ($i = 15; $i <= 120; ) {
									if ($i == $spel['spelduur']) {?>
									<option value="<?php echo $i;?>" selected><?php echo $i;?></option>
									<?php } else {?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								<?php $i=$i+15;
								} ?>
							</select> minuten
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="onderdeel">Onderdeel</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="onderdeel" name="jota" value="1" <?php if ($spel['jota'] != 0){?>checked="yes"<?php }?> > Jota
							</label>
							<label class="checkbox">
								<input type="checkbox" id="onderdeel" name="joti" value="1" <?php if ($spel['joti'] != 0){?>checked="yes"<?php }?> > Joti
							</label>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="deelnemers">Aantal deelnemers</label>
						<div class="controls">
							<select class="span1" id="deelnemers" name="min_spelers">
								<?php for ($i = 1; $i <= 40; $i++) {
									if ($i == $spel['min_spelers']) {?>
										<option value="<?php echo $i;?>" selected><?php echo $i;?></option>
									<?php } else {?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								<?php } ?>
							</select>
							minimaal<br>
							<select class="span1" id="deelnemers" name="max_spelers">
								<?php for ($i = 1; $i <= 40; $i++) {
									if ($i == $spel['max_spelers']) {?>
										<option value="<?php echo $i;?>" selected><?php echo $i;?></option>
									<?php } else {?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								<?php } ?>
							</select>
							maximaal
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="leiding">Aantal leiding</label>
						<div class="controls">
							<select class="span1" id="leiding" name="leiding">
								<?php for ($i = 1; $i <= 10; $i++) {
									if ($i == $spel['leiding']) {?>
										<option value="<?php echo $i;?>" selected><?php echo $i;?></option>
									<?php } else {?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="duur">Opkomst lengte</label>
						<div class="controls">
							<?php foreach ($duur as $progln) {
								$checked=0;
								foreach ($spel['duur'] as $item) {
									if ($item['duur_id'] == $progln['id']) {
										$checked=1;
									}
								} ?>
								<label class="checkbox">
									<input type="checkbox" id="duur" name="duur<?php echo $progln['id'];?>" value="1" <?php if ($checked != 0){?>checked="yes"<?php }?> > <?php echo $progln['lengte'];?> uur
								</label>
							<?php } ?>
						</div>
					</div>

				</div>

				<div class="tab-pane fade" id="beschrijving">
					<div class="control-group">
						<label class="control-label" for="voorbereiding">Voorbereiding</label>
						<div class="controls">
							<textarea style="width: 500px; height: 200px;" id="voorbereiding" name="voorbereiding" placeholder="Voorbereiding voor het spel"><?php echo $spel['voorbereiding'];?></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="beschrijving">Beschrijving</label>
						<div class="controls">
							<textarea style="width: 500px; height: 200px;" id="beschrijving" name="beschrijving" placeholder="Beschrijving voor het spel"><?php echo $spel['beschrijving'];?></textarea>
						</div>
					</div>

				</div>

				<div class="tab-pane fade" id="gebieden">
					<div class="control-group">
						<label class="control-label" for="gebieden">Aandachts gebieden</label>
						<div class="controls">
							<?php
							$speltak="geen";
							foreach ($gebieden as $gebied) {
								$checked=0;
								foreach ($spel['gebied'] as $item) {
									if ($item['gebied_id'] == $gebied['id']) {
										$checked=1;
									}
								}
								if ($speltak != $gebied['speltak']) {
									echo "<i>".$gebied['speltak']."</i><br>";
									$speltak=$gebied['speltak'];
								}
								?>
								<label class="checkbox">
									<input type="checkbox" id="gebieden" name="gebied<?php echo $gebied['id'];?>" value="1" <?php if ($checked != 0){?>checked="yes"<?php }?> > <?php echo $gebied['naam'];?>
								</label>
							<?php } ?>
					
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="lokatie">
					<div class="control-group">
						<label class="control-label" for="spellokatie">Spellokaties</label>
						<div class="controls">
							<?php foreach ($spellokaties as $spellokatie) {
								$checked=0;
								foreach ($spel['lokatie'] as $item) {
									if ($item['spellokatie_id'] == $spellokatie['id']) {
										$checked=1;
									}
								} ?>
								<label class="checkbox">
									<input type="checkbox" id="spellokatie" name="lokatie<?php echo $spellokatie['id'];?>" value="1" <?php if ($checked != 0){?>checked="yes"<?php }?> > <?php echo $spellokatie['naam'];?>
								</label>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="artikelen">
					<div class="control-group">
						<label class="control-label" for="artikelen">Artikelen</label>
						<div class="controls">
							<?php foreach ($artikelen as $artikel) {
								$artikelaantal=0;
								foreach ($spel['artikelen'] as $item) {
									if ($item['artikel_id'] == $artikel['id']) {
										$artikelaantal=$item['aantal'];
									}
								} 
								if ($artikelaantal > 0) {
									echo "<p>";
								} else {
									echo "<p class='muted'>";
								} ?>
								<label class="checkbox">
									<input class="span1" type="text" id="artikelen" name="artikelaantal<?php echo $artikel['id'];?>" value="<?php echo $artikelaantal;?>"> <?php echo $artikel['naam']; ?>
								</label>
							<?php } ?> 
					
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="copyright">
					<div class="control-group">
						<label class="control-label" for="copyright">Copyright</label>
						<div class="controls">
							<input type="text" id="copyright" name="copyright" placeholder="Copyright owner" value="<?php echo $spel['copyright'];?>">
						</div>
					</div>
				</div>


			</div>









		<?php if ($titel != 'Nieuw spel') { ?>
		<hr>





		<hr>


<?php } ?>
		</div>
	</div>
	</form>

</div>
