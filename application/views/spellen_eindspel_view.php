<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>

	<?php if (!isset($win)) { ?>
		
		<div class='span8 offset1'>
			<p>Vul hier alle antwoorden van de verschillende spelen in welke jullie allemaal gedaan hebben.</p>
			
			<p>
				
				<?php $attributes = array('class' => 'form-horizontal');
				echo form_open(uri_string(), $attributes); ?>
			
				<?php foreach ($gebieden as $gebied) { ?>
					<div class="control-group">
						<label class="control-label" for="email"><em><?php echo $gebied['naam']?></em></label>
						<div class="controls">
							<input type='text' name='<?php echo $gebied['id']?>' id='<?php echo $gebied['id']?>' placeholder="Vul hier je antwoord in" size='25'>
						</div>
					</div>
				<?php } ?>
				
				<div class="control-group">
					<label></label>
					<div class="controls">
						<button type="submit" class="btn btn-primary">Controleer</button>
					</div>
				</div>
				</p>
			
			</form>
		</div>
		
		<?php } else { ?>
		<?php if ($win == false) { ?>
		<div class='span8 offset1'>
			<p>Helaas, jullie hebben niet gewonnen...</p>
		</div>
			<?php } else { ?>
		<div class='span8 offset1'>
			
			<?php if ($speltak == 'scouts') { ?>
			<h3>Jullie hebben gewonnen!</h3>
			<?php } else { ?>
			<h3>De kluis is open!</h3>
			<?php } ?>
						
			<?php if ($win['youtube'] != '') { ?>
			<center><iframe width="640" height="480" src="http://www.youtube.com/embed/<?php echo $win['youtube'] ?>?autoplay=1" frameborder="0" allowfullscreen></iframe></center>
			<?php } else { ?>
			<p><center><img src="<?php echo $win['plaatje'] ?>"></center></p>
			<?php } ?>

		</div>
			<?php } ?>		
		<?php } ?>
		
		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>
		
	</div>

</div>