<div class='container pagina'>

	<div class='row tekst'>
		<div class='span9'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

<div class='row'>    
	<table class="table table-hover span7 offset2">
        
        <thead>
          <tr>
            <th></th>
            <th>Spelnaam</th>
            <th>Speltak</th>
            <th>Duur</th>
            <th>Deelnemers</th>
            <th>Leiding</th>
            <th>Jota</th>
            <th>Joti</th>

          </tr>
        </thead>

		<tbody>
			<?php foreach ($spelen as $spel) { ?>
			<tr>
				<td><a href="#veranderspel<?php echo $spel['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
					<a href="<?php echo base_url(); ?>beheer/verwijder/spel/<?php echo $spel['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
				</td>
				<td><?php echo $spel['titel'];?></td>
				<td></td>
				<td><?php echo $spel['duur'];?></td>
				<td><?php echo $spel['spelers'];?></td>
				<td><?php echo $spel['leiding'];?></td>
				<td><?php echo $spel['jota'];?></td>
				<td><?php echo $spel['joti'];?></td>

			</tr>
			<?php } ?>

    </table>

</div>
