<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span4 offset3 form-search'>
			<?php $attributes = array('class' => 'form-horizontal');
			echo form_open('beheer/spel', $attributes); ?>
				<input type="text" id="search" name="search" placeholder="Spelnaam" value="<?php echo $search; ?>">
				<div class="btn-group">
					<button type="submit" class="btn">Go</button>
					<button class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>Titel</li>
						<li>Speltak</li>
						<li>Duur</li>
						<li>Deelnemers</li>
						<li>Leiding</li>
					</ul>
				</div>
			</form>
		</div>
	</div>


	<div class='row-fluid'>
		<div class='span10 offset1'>
		<table class="table table-hover">
        
        	<thead>
          		<tr>
            		<th></th>
            		<th>Spelnaam</th>
            		<th>Speltak</th>
            		<th>Jota</th>
            		<th>Joti</th>
          		</tr>
	        </thead>

			<tbody>
				<?php foreach ($spelen as $spel) { ?>
				<tr>
					<td><a href="<?php echo base_url(); ?>beheer/spel/<?php echo $spel['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
						<a href="<?php echo base_url(); ?>beheer/verwijder/spel/<?php echo $spel['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
					</td>
					<td><?php echo $spel['titel'];?></td>
					<td><?php echo $speltakken[$spel['id']];?></td>
					<td><?php if ($spel['jota'] > 0) { ?><i class="icon-ok"></i><?php } ;?></td>
					<td><?php if ($spel['joti'] > 0) { ?><i class="icon-ok"></i><?php } ;?></td>

				</tr>
				<?php } ?>

			</tbody>

    	</table>
    	</div>

    </div>

</div>
