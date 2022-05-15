	<div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
      <nav class="navbar">
        <div class="container-fluid">
        	<a href="<?php echo $AreaInfo['area_url'];?>index.php" class="navbar-brand"><?php echo $AreaInfo['area_name'];?></a>
        	<ul class="navbar-nav ml-auto">
			<li class="nav-item nav-height dropdown with-arrow">
		      <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
		        <?php echo $text['lang'];?> <i class="fa fa-angle-down ml-5" aria-hidden="true"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
		        <a href="?lang=en" class="dropdown-item">English</a>
		        <a href="?lang=es" class="dropdown-item">Espa&ntildeol</a>
		        <a href="?lang=fr" class="dropdown-item">Fran&ccedilais</a>
		        <a href="?lang=ch" class="dropdown-item">&#20013&#25991</a>
			<a href="?lang=tr" class="dropdown-item">Türkçe</a>
		      </div>
		    </li>
		    <li class="nav-item nav-height dropdown with-arrow">
		      <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
		        <i class="fa fa-user"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
		        <a href="<?php echo $AreaInfo['area_url'];?>myprofile.php" class="dropdown-item"><?php echo $text['porfile'];?></a>
		        <a href="<?php echo $AreaInfo['area_url'];?>mysettings.php" class="dropdown-item"><?php echo $text['settings'];?></a>
		        <a href="<?php echo $AreaInfo['area_url'];?>logout.php" class="dropdown-item"><?php echo $text['logout'];?></a>
		        <div class="dropdown-divider"></div>
		        <div class="dropdown-content">
		          <button class="btn btn-block" role="button" onclick="halfmoon.toggleDarkMode()"><i class="fa fa-sun"></i> <?php echo $text['theme'];?></button>
		        </div>
		      </div>
		    </li>
		    <li class="nav-item nav-height hidden-on-up">
		      <button class="btn btn-sm my-auto" onclick="halfmoon.toggleSidebar()"><i class="fa fa-bars"></i></button>
		    </li>
        </div>
      </nav>