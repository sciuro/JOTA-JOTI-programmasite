<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span10 offset1'>
		<table class="table table-hover">
        
        	<thead>
          		<tr>
            		<th></th>
            		<th>URL</th>
            		<th>Titel</th>
          		</tr>
	        </thead>

			<tbody>
				<?php foreach ($paginas as $pagina) { ?>
				<tr>
					<td><a href="<?php echo base_url(); ?>beheer/pagina/<?php echo $pagina['id']; ?>"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
					</td>
					<td><?php echo $pagina['urlnaam'];?></td>
					<td><?php echo $pagina['titel'];?></td>


				</tr>
				<?php } ?>

			</tbody>

    	</table>
    	</div>

    </div>

</div>
