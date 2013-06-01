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
		<?php echo form_open('login/process'); ?>
			<?php if(! is_null($msg)) echo $msg;?>

			<div class="control-group">
				<label class="control-label" for="groepsnummer"><em>Nummer</em></label>
				<div class="controls">
					<input type='text' name='groepsnummer' id='groepsnummer' size='25'>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label></label>
					<a href="#login" data-toggle="modal"><button type="submit" class="btn btn-primary">Login</button></a>

					<!-- Berichtenscherm -->
    				<div id="login" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        				<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        					<h3 id="myModalLabel">Inloggen</h3>
        				</div>					

						<div class="modal-body">
							<p>Helaas, op dit moment is dit nog niet opengesteld.</p>
						</div>

						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Sluiten</button>
						</div>
					</div>
					<!-- Einde berichtenscherm -->

				</div>
			</div>

		</form>
		</div>
	<div class='span3'>
        <img src="<?php echo base_url();?>images/logo_blauw.gif">
	</div>

</div>