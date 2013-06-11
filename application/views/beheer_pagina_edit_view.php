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
                echo form_open('beheer/opslaan/pagina', $attributes); ?>
    <?php if (isset($pagina['id'])) {?><input type="hidden" name="paginaid" value="<?php echo $pagina['id']; ?>"> <?php }?>

	<div class='row-fluid'>
		<div class='span10 offset1'>
            <ul id="myTab" class="nav nav-tabs">
            	<li class="active"><a href="#algemeen" data-toggle="tab">Algemeen</a></li>
            	<li><a href="#tekst" data-toggle="tab">Tekst</a></li>
            	<li class='span4'></li>
            	<a class="btn btn-info" href="<?php echo base_url();?>info/pagina/<?php echo $pagina['urlnaam'];?>">Naar pagina</a>
            	<?php if ($this->session->flashdata('submit')) { ?>
            		<button type="submit" class="btn btn-success">Opslaan</button>
            	<?php } else { ?>
            		<button type="submit" class="btn btn-primary">Opslaan</button>
            	<?php } ?>
            </ul>
        </div>
    </div>

    <div class='row-fluid'>
		<div class='span10 offset1'>

            <div id="myTabContent" class="tab-content">

              	<div class="tab-pane fade in active" id="algemeen">
					<div class="control-group">
						<label class="control-label" for="urlnaam">URL</label>
						<div class="controls">
							<input type="text" id="urlnaam" name="urlnaam" placeholder="naam" value="<?php echo $pagina['urlnaam'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="titel">Titel</label>
						<div class="controls">
							<input class="span8" type="text" id="titel" name="titel" placeholder="Titel van de pagina" value="<?php echo $pagina['titel'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="banner">Fotobanner</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="banner" name="banner" value="1" <?php if ($pagina['banner'] != 0){?>checked="yes"<?php }?> >
							</label>
						</div>
					</div>

				</div>

				<div class="tab-pane fade" id="tekst">
					<div class="control-group">
						<label class="control-label" for="tekst">Tekst</label>
						<div class="controls">
							<textarea style="width: 500px; height: 200px;" id="tekst" name="tekst" placeholder="Paginatekst"><?php echo $pagina['tekst'];?></textarea>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
	</form>

</div>
