	<header>
		<div class="bg-191">
			<div class="container" style="margin-top:-20px;">
				<div style="height:60px;;" class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5">

					<!-- <ul class="main-menu float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10">
						<!-- <li><a class="pl-0 pl-sm-10" href="<?php echo site_url(); ?>">News</a></li> -->
					<?php
					$query = $this->db->get('tbl_tags', 5);
					foreach ($query->result() as $row) :
						?>
						<li><a href="<?php echo site_url('tag/' . $row->tag_name); ?>"><?php echo $row->tag_name; ?></a></li>
					<?php endforeach; ?>
					<!-- <li><a href="<?php echo site_url('blog'); ?>">Blog</a></li> -->
					<!-- <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li> -->
					</ul>
					<?php
					$query = $this->db->get('tbl_site', 1);
					$data = $query->row_array();
					?> -->
					<ul class="main-menu float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
						<li><a class="pl-0 pl-sm-10" href="#"><i class="ion-social-facebook"></i></a></li>
						<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="ion-social-linkedin"></i></a></li>
						<li><a href="#"><i class="ion-social-instagram"></i></a></li>
					</ul>

				</div><!-- top-menu -->
			</div><!-- container -->
		</div><!-- bg-191 -->

		<div style="background-color:black; padding-right: 110px; padding-left: 110px;">
			<a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo base_url() . 'theme/images/' . $data['site_logo_header']; ?>" alt="<?php echo $data['site_name']; ?>" style="font-size: 100px; width: 200px; height: 45px; margin-top: -10px;"></a>

			<a class="right-area src-btn" href="#">
				<i class="active src-icn ion-search"></i>
				<i class="close-icn ion-close"></i>
			</a>
			<div class="src-form">
				<form method="get" action="<?php echo site_url('search'); ?>">
					<input type="text" name="search_query" placeholder="Search here" required>
					<button type="submit"><i class="ion-search"></i></a></button>
				</form>
			</div><!-- src-form -->

			<a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

			<ul class="main-menu" id="main-menu">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						NEWS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo site_url('category/news'); ?>">Mobil</a>
						<a class="dropdown-item" href="<?php echo site_url('category/news'); ?>">Motor</a>
						<a class="dropdown-item" href="<?php echo site_url('category/news'); ?>">Lain-lain</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						TIPS & TRICKS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo site_url('category/tips-dan-tricks'); ?>">Mobil</a>
						<a class="dropdown-item" href="<?php echo site_url('category/tips-dan-tricks'); ?>">Motor</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						SPORT
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo site_url('category/sport'); ?>">Moto GP</a>
						<a class="dropdown-item" href="<?php echo site_url('category/sport'); ?>">Rally</a>
						<a class="dropdown-item" href="<?php echo site_url('category/sport'); ?>">F1</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						KOMUNITAS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo site_url('category/komunitas'); ?>">Mobil</a>
						<a class="dropdown-item" href="<?php echo site_url('category/komunitas'); ?>">Motor</a>
					</div>
				</li>
				<!-- <?php
						$query = $this->db->get('tbl_category', 5);
						foreach ($query->result() as $row) :
					?>
					<li><a href="<?php echo site_url('category/' . $row->category_slug); ?>"><?php echo strtoupper($row->category_name); ?></a></li>
				<?php endforeach; ?> -->
				<li><a href="<?php echo site_url('galeri'); ?>">GALERY</a></li>
				<li><a href="<?php echo site_url('contact'); ?>">CONTACT</a></li>
			</ul>
			<div class="clearfix"></div>
		</div><!-- container -->
	</header>