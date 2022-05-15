<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Last Visits</h5>
			<a href="<?php echo $AreaInfo[
       "area_url"
   ]; ?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th width="5%">ID</th>
					<th width="42.5%">Device</th>
					<th width="42.5%">IP Address</th>
				<tbody>
				  		<?php
        if (isset($_GET["pageno"])) {
            $pageno = $_GET["pageno"];
        } else {
            $pageno = 1;
        }

        $no_of_records_per_page = 30;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM hosting_visits";
        $result = mysqli_query($connect, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $visits = mysqli_query(
            $connect,
            "SELECT * FROM `hosting_visits` ORDER BY `visit_id` DESC LIMIT $offset, $no_of_records_per_page"
        );
        $count = mysqli_query(
            $connect,
            "SELECT * FROM `hosting_visits` ORDER BY `visit_id` DESC"
        );
        $rows = mysqli_num_rows($count);
        if ($pageno > 1) {
            $mult = $pageno * $no_of_records_per_page;
            $Count = 1;
            $rest = $no_of_records_per_page - 1;
            $Count = $Count * $mult - $rest;
        }
        while ($VisitInfo = mysqli_fetch_assoc($visits)) {
            echo "<tr>";
            $Count = $Count ?? 1;
            echo "<td>" . $Count . "</td>";
            echo "<td>" . $VisitInfo["visit_device"] . "</td>";
            echo "<td>" . $VisitInfo["visit_ip"] . "</td>";
            echo "</tr>";
            $Count += 1;
        }
        ?>
				  	</tbody>
			</table>
            <div style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10p">
    <button class="btn <?php if ($pageno <= 1) {
        echo "disabled";
    } ?>" style="margin-left: 5px;" type="button"><a style="color: white;" href="?pageno=1">First</a></button>
    
    <buttom class="btn <?php if ($pageno <= 1) {
        echo "disabled";
    } ?>" style="margin-left: 5px;" type="button"><a style="color: white;" href="<?php if (
    $pageno <= 1
) {
    echo "#";
} else {
    echo "?pageno=" . ($pageno - 1);
} ?>">Prev</a></buttom>
            
    <buttom class="btn <?php if ($pageno >= $total_pages) {
        echo "disabled";
    } ?>" style="margin-left: 5px;" type="button"><a style="color: white;" href="<?php if (
    $pageno >= $total_pages
) {
    echo "#";
} else {
    echo "?pageno=" . ($pageno + 1);
} ?>">Next</a></buttom>
          
        <button class="<?php if ($pageno >= $total_pages) {
            echo "disabled";
        } ?> btn" style="margin-left: 5px;"type="button"><a style="color: white;" href="?pageno=<?php echo $total_pages; ?>">Last</a></button>
</div>
            
		<p class="pb-10"><?php echo $rows; ?> Visits Found</p>
	</div>
</div>