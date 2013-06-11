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
			<?php $attributes = array('class' => 'form-horizontal');
          	echo form_open('spellen/draaiboekpdf/', $attributes); ?>

    		<input type="hidden" name="speltak" value="<?php echo $speltak; ?>">
    		<input type="hidden" name="opkomstduur" value="<?php echo $opkomstduur; ?>">

			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" name="select-all" id="select-all" checked="yes" />Selecteer alles
					</label>
				</div>
			</div>

			<?php foreach ($gebieden as $gebied) { ?>
				<div class="control-group">
					<label class="control-label" for="spelgebied<?php echo $gebied['id']; ?>"><em><?php echo $gebied['naam']; ?></em></label>
					<div class="controls">
				
						<?php foreach ($spellen as $spel) { ?>
							<?php if ($spel['gebied'] == $gebied['id']) { ?>
								<label class="checkbox">
									<input type="checkbox" name="spel<?php echo $spel['id']; ?>" value="1" checked="yes"><?php echo $spel['titel'];?>
								</label>
							<?php } ?>
						<?php } ?>

					</div>
				</div>
			<?php } ?>
		</div>

		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>

	</div>

	<div class='row-fluid'>
		<div class='span2 offset3'>
			<button type="submit" class="btn btn-primary">Genereer</button>
		</div>
	</div>

</div>
