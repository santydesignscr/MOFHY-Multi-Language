<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-1 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$cli =  mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_status`=1");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($cli);?></h3>
					<i class="fa fa-users fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="myclients.php" class="text-white">View Clients <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-2 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$acc =  mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_status`=1");;
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($acc);?></h3>
					<i class="fa fa-shopping-cart fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="myaccounts.php" class="text-white">View Accounts <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-3 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$ssl =  mysqli_query($connect,"SELECT * FROM `hosting_ssl`");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($ssl);?></h3>
					<i class="fa fa-shield-alt fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="myssl.php" class="text-white">View SSL <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card text-center bg-matrix-4 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$tic =  mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_status`=0 OR `ticket_status`=2");
					?>
					<h3 class="mb-0 pt-10 text-white"><?php echo mysqli_num_rows($tic);?></h3>
					<i class="fa fa-bullhorn fa-3x pt-15 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05);">
					<a href="mytickets.php" class="text-white">View Tickets <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title mb-0">
			    Monthly Traffic
			  </h2>
			  	<p class="my-0">This is just a monthly overveiw of this website traffic. This system uses cookie system inorder to store browser data and save it for later use non cookie supported browser wont be listed down there.</p>
			  <div class="row text-center">
			  	<div class="col">
			  		<h2 class="my-0">
				    <?php
				    $ctime = time();
				    $otime = time()-30*86400;
				    $visit = mysqli_query($connect,"SELECT * FROM `hosting_visits` WHERE `visit_type`=1 AND `visit_time`BETWEEN ".$otime." AND ".$ctime."");
				    echo mysqli_num_rows($visit);
				    ?></h2>
			  		<p class="my-0">Unique Visits</p>
			  	</div>
			  	<div class="col">
			  		<h2 class="my-0">
				    <?php
				    $visit1 = mysqli_query($connect,"SELECT * FROM `hosting_visits` WHERE `visit_type`=0 AND `visit_time`BETWEEN ".$otime." AND ".$ctime."");
				    echo mysqli_num_rows($visit1);
				    ?></h2>
			  		<p class="my-0">Total Visits</p>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title mb-0">
			    Recent Visitors 
			  </h2>
			  <div class="table-responsive" style="overflow-y: auto;height: 150px">
				  <table class="table">
				  	<thead>
				  		<tr>
				  			<th>ID</th>
				  			<th>Device</th>
				  			<th>IP Address</th>
				  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php
					    $visits = mysqli_query($connect,"SELECT * FROM `hosting_visits` ORDER BY `visit_id` DESC LIMIT 20");
					    while($VisitInfo = mysqli_fetch_assoc($visits)){
					    	echo "<tr>";
					    	$Count = $Count ?? 1;
					    	echo "<td>".$Count."</td>";
					    	echo "<td>".$VisitInfo['visit_device']."</td>";
					    	echo "<td>".$VisitInfo['visit_ip']."</td>";
					    	echo "</tr>";
					    	$Count += 1;
					    }
					    ?>
				  	</tbody>
				  </table>
				  <a href="<?php echo $AreaInfo['area_url'];?>admin/visitors.php" class=""><i class="fa fa-forward"></i> Ver Más</a>
			  </div>
			</div>
		</div>
	</div>
</div>