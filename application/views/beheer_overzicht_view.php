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
            <ul id="myTab" class="nav nav-tabs">
            	<li class="active"><a href="#algemeen" data-toggle="tab">Algemeen</a></li>
            	<li><a href="#bezoekers" data-toggle="tab">Bezoekers</a></li>
            	<li><a href="#oorsprong" data-toggle="tab">Oorsprong</a></li>
            	<li><a href="#browsers" data-toggle="tab">Browsers</a></li>
            	<li><a href="#fouten" data-toggle="tab">Fouten</a></li>
            </ul>

        </div>
    </div>

    <div class='row-fluid'>
		<div class='span10 offset1'>

			<div id="myTabContent" class="tab-content">

				<div class="tab-pane fade in active" id="algemeen">
					<p>Aantal bezoekers vandaag: <?php echo $stats_today['0']['count']; ?></p>

				</div>

				<div class="tab-pane" id="bezoekers">

                	<script type="text/javascript">
                		$(function () {
							var hits = { label: "hits", data: [
								<?php foreach ($hits_ph as $hour) {
									echo "[".$hour['timestamp'].", ".$hour['hits']."], ";
								} ?>
							],
								bars: {show:true}
							};

                			$.plot(
                    			$("#graph_hits_ph"),
                    			[hits],
                    			{ xaxis: {
                    				mode: "time",
                    				timezone: "browser"
                    			  }
                    			}
                    		);

                		});
                	</script>

                	<div id="graph_hits_ph" style="width:600px;height:300px;"></div>
                	<br>
                	<table class='table'>
						<caption>Populaire pagina's</caption>
						<thead>
							<tr>
								<th>Lokatie</th>
								<th>Hits</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($popular as $page) { ?>
								<tr>
									<td><a href="<?php echo base_url().$page['uri'] ?>">/<?php echo $page['uri'] ?></a></td>
									<td><?php echo $page['hits'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>

				<div class="tab-pane" id="oorsprong">
					<table class='table'>
						<caption>Waar komen de bezoekers vandaan</caption>
						<thead>
							<tr>
								<th>Lokatie</th>
								<th>Aantal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($referrer as $refer) { ?>
								<tr>
									<td><a href="<?php echo $refer['referrer'] ?>" target='new'><?php echo $refer['referrer'] ?></a></td>
									<td><?php echo $refer['count'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="browsers">
					<table class='table'>
						<caption>Welke browsers gebruiken bezoekers</caption>
						<thead>
							<tr>
								<th>Browser</th>
								<th>Hits</th>
								<th>Procent</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($browsers as $browser) { ?>
								<tr>
									<td><?php echo $browser['browser'].' '.$browser['version'] ?></td>
									<td><?php echo $browser['hits'] ?></td>
									<td><?php echo round(($browser['hits']/$totalhits)*100, 1) ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

					<table class='table'>
						<caption>Welke systemen gebruiken bezoekers</caption>
						<thead>
							<tr>
								<th>OS</th>
								<th>Hits</th>
								<th>Procent</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($oses as $os) { ?>
								<tr>
									<td><?php echo $os['platform'].' '.$os['mobile'] ?></td>
									<td><?php echo $os['hits'] ?></td>
									<td><?php echo round(($os['hits']/$totalhits)*100, 1) ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>

				<div class="tab-pane" id="fouten">
					<table class='table'>
						<caption>Fouten in de website</caption>
						<thead>
							<tr>
								<th>Lokatie</th>
								<th>Vanwaar</th>
								<th>Aantal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($error_404 as $error) { ?>
								<tr>
									<td>/<?php echo $error['uri'] ?></td>
									<td><a href="<?php echo $error['referrer'] ?>"><?php echo $error['referrer'] ?></a></td>
									<td><?php echo $error['count'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>

			</div>

		</div>
	</div>

</div>



