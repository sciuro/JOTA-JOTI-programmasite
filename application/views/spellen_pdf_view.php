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

	<?php foreach ($gebieden as $gebied) { ?>
		<div class="control-group">
			<label class="control-label" for="spelgebied<?php echo $gebied['id']; ?>"><em><?php echo $gebied['naam']; ?></em></label>
			<div class="controls">
				<label class="checkbox inline">
					<?php foreach ($spellen as $spel) { ?>
						<?php if ($spel['gebied'] == $gebied['id']) { ?>
							<input type="checkbox" id="spelgebied<?php echo $gebied['id']; ?>" name="spel<?php echo $spel['id']; ?>" value="1" checked="yes"><?php echo $spel['titel'];?> <br>
						<?php } ?>
					<?php } ?>

				</label>
			</div>
		</div>


	<?php } ?>


	<button type="submit" class="btn btn-primary">Genereer</button>

</div>
