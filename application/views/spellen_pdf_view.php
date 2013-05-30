<div class='container pagina'>
	<header class="jumbotron subhead">
		<div class="container">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>

	<?php $attributes = array('class' => 'form-horizontal');
          echo form_open('spellen/draaiboekpdf/', $attributes); ?>

    <input type="hidden" name="speltak" value="<?php echo $speltak; ?>">
    <input type="hidden" name="opkomstduur" value="<?php echo $opkomstduur; ?>">

	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<input type="checkbox" name="select-all" id="select-all" />Selecteer alles
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


	<button type="submit" class="btn btn-primary">Genereer</button>

</div>
