	<div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
      <nav class="navbar">
        <div class="container-fluid">
        	<a href="<?php echo $AreaInfo['area_url'];?>index.php" class="navbar-brand"><?php echo $AreaInfo['area_name'];?></a>
        	<ul class="navbar-nav ml-auto">
		    <li class="nav-item nav-height dropdown with-arrow">
		      <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
		        <i class="fa fa-user"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
		        <a href="logout.php" class="dropdown-item"><?php echo $text['logout'];?></a>
		        <div class="dropdown-divider"></div>
		        <div class="dropdown-content">
		          <button class="btn btn-block" role="button" onclick="halfmoon.toggleDarkMode()"><i class="fa fa-sun"></i> Switch</button>
		        </div>
		      </div>
		    </li>
		    <li class="nav-item nav-height hidden-on-up">
		      <button class="btn btn-sm my-auto" onclick="halfmoon.toggleSidebar()"><i class="fa fa-bars"></i></button>
		    </li>
        </div>
      </nav>	
	<div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
      <div class="sidebar">
        <div class="sidebar-menu">
        	<h5 class="sidebar-title"><?php echo $text['logged_as'];?></h5>
		    <div class="sidebar-divider"></div>
		    <a href="myprofile.php" class="sidebar-link sidebar-link-with-icon">
		      <span class="sidebar-icon bg-secondary text-dark rounded-circle">
		        <!--<i class="fa fa-user-circle" aria-hidden="true"></i>-->
		        <?php $Email = $ClientInfo['hosting_client_email'];
				$Default = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Twemoji_1f600.svg/440px-Twemoji_1f600.svg.png";
				$Size = 30;
				$Grav_URL = "https://www.gravatar.com/avatar/".md5(strtolower(trim($Email)))."?d=".urlencode($Default)."&s=".$Size;
				?>
				 <img class="rounded-circle" src="<?php echo $Grav_URL ?? 'Hello';?>" height="30px" width="30px">
		      </span>
		      <?php echo $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname'];?>
		    </a>

        	<h5 class="sidebar-title"><?php echo $text['main_menu'];?></h5>
		    <div class="sidebar-divider"></div>
		    <a href="<?php echo $AreaInfo['area_url'];?>logout.php" class="sidebar-link sidebar-link-with-icon">
		      <span class="sidebar-icon bg-transparent">
		        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
		      </span>
		      <?php echo $text['logout'];?>
		    </a>
		    <br />
        </div>
      </div>
      <div class="content-wrapper">
      	<div class="container-fluid">
      		<div class="card p-15">
      			<h5 class="mb-0 px-5"><?php echo $text['validate_title'];?></h5><hr>
      			<div>
      				<p><?php echo $text['validate_text'];?></p>
      				<form action="function/Validate.php" method="post">
      					<div class="form-group">
      						<label class="form-label"><?php echo $text['validate_key'];?></label>
      						<input type="text" name="validation_key" class="form-control" placeholder="<?php echo $text['validate_key_place'];?>">
      					</div>
      					<div class="form-group">
      						<button name="validate" class="btn btn-sm btn-primary"><?php echo $text['validate_buttom'];?></button>
      						<a href="resendemail.php" class="btn btn-sm btn-secondary"><?php echo $text['resend_email'];?></a>
      					</div>
      				</form>
      			</div>
      		</div>
      	</div>