<?php
$this->db->query("TRUNCATE TABLE tbl_preferensi");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>Kriteria</title>

	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="M Fikri Setiadi" />
	<link rel="shortcut icon" href="<?php echo base_url().'assets/images/favicon.png'?>">

	<!-- Styles -->
	<link href="<?php echo base_url().'assets/plugins/pace-master/themes/blue/pace-theme-flash.css'?>" rel="stylesheet"/>
	<link href="<?php echo base_url().'assets/plugins/uniform/css/uniform.default.min.css'?>" rel="stylesheet"/>
	<link href="<?php echo base_url().'assets/plugins/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/plugins/fontawesome/css/font-awesome.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/plugins/line-icons/simple-line-icons.css'?>" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo base_url().'assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css'?>" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo base_url().'assets/plugins/waves/waves.min.css'?>" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo base_url().'assets/plugins/switchery/switchery.min.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/plugins/3d-bold-navigation/css/style.css'?>" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo base_url().'assets/plugins/slidepushmenus/css/component.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/plugins/datatables/css/jquery.datatables.min.css'?>" rel="stylesheet" type="text/css"/>	
	<link href="<?php echo base_url().'assets/plugins/datatables/css/jquery.datatables_themeroller.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.css'?>" rel="stylesheet" type="text/css"/>
	<!-- Theme Styles -->
	<link href="<?php echo base_url().'assets/css/modern.min.css'?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/themes/green.css'?>" class="theme-color" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url().'assets/css/custom.css'?>" rel="stylesheet" type="text/css"/>

	<script src="<?php echo base_url().'assets/plugins/3d-bold-navigation/js/modernizr.js'?>"></script>
	<script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/snap.svg-min.js'?>"></script>


</head>
<body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
	<div class="overlay"></div>
	<main class="page-content content-wrap">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="sidebar-pusher">
					<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
						<i class="fa fa-bars"></i>
					</a>
				</div>
				<div class="logo-box">
					<a href="<?php echo site_url('backend/dashboard');?>" class="logo-text"><span>OTOEXPERT</span></a>
				</div><!-- Logo Box -->
				<div class="topmenu-outer">
					<div class="top-menu">
						<ul class="nav navbar-nav navbar-left">
							<li>        
								<a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php 
							$count_inbox = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'));
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows();?></span></a>
								<ul class="dropdown-menu title-caret dropdown-lg" role="menu">

									<li><p class="drop-title">Anda memiliki <?php echo $count_inbox->num_rows();?> pesan baru !</p></li>
									<li class="dropdown-menu-list slimscroll messages">
										<ul class="list-unstyled">
											<?php 
											$query_msg = $this->db->get_where('tbl_inbox', array('inbox_status' => '0'), 6);
											foreach ($query_msg->result() as $row) :
												?>
												<li>
													<a href="<?php echo site_url('backend/inbox');?>">
														<div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt=""></div>
														<p class="msg-name"><?php echo $row->inbox_name;?></p>
														<p class="msg-text"><?php echo word_limiter($row->inbox_message,5);?></p>
														<p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->inbox_created_at));?></p>
													</a>
												</li>
											<?php endforeach;?>

										</ul>
									</li>
									<li class="drop-all"><a href="<?php echo site_url('backend/inbox');?>" class="text-center">All Messages</a></li>
								</ul>
							</li>
							<?php
							$count_comment = $this->db->get_where('tbl_comment', array('comment_status' => '0'));
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-comment"></i><span class="badge badge-success pull-right"><?php echo $count_comment->num_rows();?></span></a>
								<ul class="dropdown-menu title-caret dropdown-lg" role="menu">
									<li><p class="drop-title">Anda memiliki <?php echo $count_comment->num_rows();?> komentar baru !</p></li>
									<li class="dropdown-menu-list slimscroll messages">
										<ul class="list-unstyled">
											<?php 
											$query_cmt = $this->db->get_where('tbl_comment', array('comment_status' => '0'), 6);
											foreach ($query_cmt->result() as $row) :
												?>
												<li>
													<a href="<?php echo site_url('backend/comment/unpublish');?>">
														<div class="msg-img"><div class="online on"></div><img class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt=""></div>
														<p class="msg-name"><?php echo $row->comment_name;?></p>
														<p class="msg-text"><?php echo word_limiter($row->comment_message,5);?></p>
														<p class="msg-time"><?php echo date('d-m-Y H:i:s', strtotime($row->comment_date));?></p>
													</a>
												</li>
											<?php endforeach;?>

										</ul>
									</li>
									<li class="drop-all"><a href="<?php echo site_url('backend/comment/unpublish');?>" class="text-center">All Comments</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
									<span class="user-name"><?php echo $this->session->userdata('name');?><i class="fa fa-angle-down"></i></span>
									<?php
									$user_id=$this->session->userdata('id');
									$query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
									if($query->num_rows() > 0):
										$row = $query->row_array();
										?>
										<img class="img-circle avatar" src="<?php echo base_url().'assets/images/'.$row['user_photo'];?>" width="40" height="40" alt="">
										<?php else:?>
											<img class="img-circle avatar" src="<?php echo base_url().'assets/images/user_blank.png';?>" width="40" height="40" alt="">
										<?php endif;?>
									</a>
									<ul class="dropdown-menu dropdown-list" role="menu">
										<li role="presentation"><a href="<?php echo site_url('backend/change_pass');?>"><i class="fa fa-key"></i>Change Password</a></li>
										<li role="presentation"><a href="<?php echo site_url('backend/comment/unpublish');?>"><i class="fa fa-comment"></i>Comments<span class="badge badge-success pull-right"><?php echo $count_comment->num_rows();?></span></a></li>
										<li role="presentation"><a href="<?php echo site_url('backend/inbox');?>"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right"><?php echo $count_inbox->num_rows();?></span></a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><a href="<?php echo site_url('logout');?>"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo site_url('logout');?>" class="log-out waves-effect waves-button waves-classic">
										<span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
									</a>
								</li>
							</ul><!-- Nav -->
						</div><!-- Top Menu -->
					</div>
				</div>
			</div><!-- Navbar -->
			<div class="page-sidebar sidebar">
				<div class="page-sidebar-inner slimscroll">
					<div class="sidebar-header">
						<div class="sidebar-profile">
							<?php
							$user_id=$this->session->userdata('id');
							$query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
							if($query->num_rows() > 0):
								$row = $query->row_array();
								?>
								<a href="javascript:void(0);">
									<div class="sidebar-profile-image">
										<img src="<?php echo base_url().'assets/images/'.$row['user_photo'];?>" class="img-circle img-responsive" alt="">
									</div>
									<div class="sidebar-profile-details">
										<span><?php echo $this->session->userdata('name');?><br>
											<?php if($row['user_level']=='1'):?>
												<small>Administrator</small>
												<?php else:?>
													<small>Author</small>
												<?php endif;?>
											</span>
										</div>
									</a>
									<?php else:?>
										<a href="javascript:void(0);">
											<div class="sidebar-profile-image">
												<img src="<?php echo base_url().'assets/images/user_blank.png';?>" class="img-circle img-responsive" alt="">
											</div>
											<div class="sidebar-profile-details">
												<span><?php echo $this->session->userdata('name');?><br>
													<?php if($row['user_level']=='1'):?>
														<small>Administrator</small>
														<?php else:?>
															<small>Author</small>
														<?php endif;?>
													</span>
												</div>
											</a>
										<?php endif;?>
									</div>
								</div>
								<ul class="menu accordion-menu">
									<li><a href="<?php echo site_url('backend/dashboard');?>" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p></a></li>
									<li class="droplink active open"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span><p>Post</p><span class="arrow"></span></a>
										<ul class="sub-menu">
											<li><a href="<?php echo site_url('backend/post/add_new');?>">Add New</a></li>
											<li><a href="<?php echo site_url('backend/post');?>">Post List</a></li>
											<li class="active"><a href="<?php echo site_url('backend/category');?>">Category</a></li>
											<li><a href="<?php echo site_url('backend/tag');?>">Tag</a></li>
										</ul>
									</li>
									<li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span><p>Topsis</p><span class="arrow"></span></a>
										<ul class="sub-menu">
											<li><a href="<?php echo site_url('backend/kriteria');?>">Kriteria</a></li>
											<li><a href="<?php echo site_url('backend/alternatif');?>">Alternatif</a></li>
											<li><a href="<?php echo site_url('backend/hasil_topsis');?>">Hasil Topsis</a></li>
										</ul>
									</li>
									<li><a href="<?php echo site_url('backend/inbox');?>" class="waves-effect waves-button"><span class="menu-icon icon-envelope"></span><p>Inbox</p></a></li>
									<li><a href="<?php echo site_url('backend/comment');?>" class="waves-effect waves-button"><span class="menu-icon icon-bubbles"></span><p>Comments</p></a></li>
									<li><a href="<?php echo site_url('backend/subscriber');?>" class="waves-effect waves-button"><span class="menu-icon icon-users"></span><p>Subscribers</p></a></li>
									<?php if($this->session->userdata('access')=='1'):?>
										<li><a href="<?php echo site_url('backend/users');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Users</p></a></li>
										<li><a href="<?php echo site_url('backend/settings');?>" class="waves-effect waves-button"><span class="menu-icon icon-settings"></span><p>Settings</p></a></li>
										<?php else:?>
										<?php endif;?>
										<li><a href="<?php echo site_url('logout');?>" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span><p>Log Out</p></a></li>

									</ul>
								</div><!-- Page Sidebar Inner -->
							</div><!-- Page Sidebar -->
							<div class="page-inner">
								<div class="page-title">
									<h3>Detail Perhitungan Topsis</h3>
									<div class="page-breadcrumb">
										<ol class="breadcrumb">
											<li><a href="<?php echo site_url('backend/hasil_topsis');?>">Hasil Topsis</a></li>
											<li class="active">Detail Perhitungan</li>
										</ol>
									</div>
								</div>

								<div id="main-wrapper">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-6">
													<div class="panel panel-white">
														<div class="panel-body">
															<div class="table-responsive">
																<h3 class="mb-2">Nilai Alternatif</h3>
																<div class="table-responsive">
																	<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																		<thead class="text-uppercase">
																			<tr>
																				<th scope="col">#</th>
																				<th scope="col">K01</th>
																				<th scope="col">K02</th>
																				<th scope="col">K03</th>
																				<th scope="col">K04</th>
																				<th scope="col">K05</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($alternatif->result() as $alt) : ?>
																				<tr>
																					<td><?= $alt->kode_alt; ?></td>
																					<td><?= $alt->k01; ?></td>
																					<td><?= $alt->k02; ?></td>
																					<td><?= $alt->k03; ?></td>
																					<td><?= $alt->k04; ?></td>
																					<td><?= $alt->k05; ?></td>
																				</tr>
																			<?php endforeach; ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>

												<!-- menghitung nilai normalisasi -->
												<?php 
												foreach ($total_alternatif->result() as $sum) {
													# code...
													$sum1 = $sum->total1;
													$sum2 = $sum->total2;
													$sum3 = $sum->total3;
													$sum4 = $sum->total4;
													$sum5 = $sum->total5;
												}

												?>
												<div class="col-md-6">
													<div class="panel panel-white">
														<div class="panel-body">
															<div class="table-responsive">
																<h3 class="mb-2">Nilai Normalisasi</h3>
																<div class="table-responsive">
																	<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																		<thead class="text-uppercase">
																			<tr>
																				<th scope="col">#</th>
																				<th scope="col">K01</th>
																				<th scope="col">K02</th>
																				<th scope="col">K03</th>
																				<th scope="col">K04</th>
																				<th scope="col">K05</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($alternatif->result() as $alt) : ?>
																				<tr>
																					<td><?= $alt->kode_alt; ?></td>
																					<td><?= number_format($alt->k01/sqrt($sum1), 4); ?></td>
																					<td><?= number_format($alt->k02/sqrt($sum2), 4); ?></td>
																					<td><?= number_format($alt->k03/sqrt($sum3), 4); ?></td>
																					<td><?= number_format($alt->k04/sqrt($sum4), 4); ?></td>
																					<td><?= number_format($alt->k05/sqrt($sum5), 4); ?></td>
																				</tr>
																			<?php endforeach; ?>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div><!-- Row -->

										<!-- menghitung nilai bobot ternormalisasi -->
										<?php 

										foreach ($ambil_id->result() as $key ) {
											$kriteria1 = $key->k01;
											$kriteria2 = $key->k02;
											$kriteria3 = $key->k03;
											$kriteria4 = $key->k04;
											$kriteria5 = $key->k05;
										}

										?>
										<div class="col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<div class="table-responsive">
														<h3 class="mb-2">Nilai Normalisasi Terbobot</h3>
														<div class="table-responsive">
															<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																<thead class="text-uppercase">
																	<tr>
																		<th scope="col">#</th>
																		<th scope="col">K01</th>
																		<th scope="col">K02</th>
																		<th scope="col">K03</th>
																		<th scope="col">K04</th>
																		<th scope="col">K05</th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($alternatif->result() as $alt) : ?>
																		<tr>
																			<td><?= $alt->kode_alt; ?></td>
																			<td><?= number_format(($alt->k01 / sqrt($sum1)) * $kriteria1, 4); ?></td>
																			<td><?= number_format(($alt->k02 / sqrt($sum2)) * $kriteria2, 4); ?></td>
																			<td><?= number_format(($alt->k03 / sqrt($sum3)) * $kriteria3, 4); ?></td>
																			<td><?= number_format(($alt->k04 / sqrt($sum4)) * $kriteria4, 4); ?></td>
																			<td><?= number_format(($alt->k05 / sqrt($sum5)) * $kriteria5, 4); ?></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div><!-- Row -->

										<!-- menghitung menentukan solusi ideal positif (A+) dan Matriks Ideal Negatif (-A) -->
										<div class="col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<div class="table-responsive">
														<h3 class="mb-2">Menentukan Solusi Ideal Positif (A+) dan Matriks Ideal Negatif (A-)</h3>
														<div class="table-responsive">
															<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																<thead class="text-uppercase">
																	<tr>
																		<th scope="col">Yi</th>
																		<th scope="col" colspan="10" style="text-align: center;">Solusi Ideal</th>
																		<th scope="col">Max</th>
																		<th scope="col">Min</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<th>Y1</th>
																		<?php foreach ($alternatif->result() as $a) : ?>
																			<td><?= number_format(($a->k01 / sqrt($sum1)) * $kriteria1, 4); ?></td>
																		<?php endforeach; ?>

																		<?php foreach ($min_max->result() as $q) : ?>
																			<th><?= number_format(($q->max1 / sqrt($sum1)) * $kriteria1, 4); ?></th>
																			<th><?= number_format(($q->min1 / sqrt($sum1)) * $kriteria1, 4); ?></th>

																		<?php endforeach; ?>
																	</tr>
																	<tr>
																		<th>Y2</th>
																		<?php foreach ($alternatif->result() as $a) : ?>
																			<td><?= number_format(($a->k02 / sqrt($sum2)) * $kriteria2, 4); ?></td>
																		<?php endforeach; ?>

																		<?php foreach ($min_max->result() as $q) : ?>
																			<th><?= number_format(($q->max2 / sqrt($sum2)) * $kriteria2, 4); ?></th>
																			<th><?= number_format(($q->min2 / sqrt($sum2)) * $kriteria2, 4); ?></th>
																		<?php endforeach; ?>
																	</tr>
																	<tr>
																		<th>Y3</th>
																		<?php foreach ($alternatif->result() as $a) : ?>
																			<td><?= number_format(($a->k03 / sqrt($sum3)) * $kriteria3, 4); ?></td>
																		<?php endforeach; ?>

																		<?php foreach ($min_max->result() as $q) : ?>
																			<th><?= number_format(($q->max3 / sqrt($sum3)) * $kriteria3, 4); ?></th>
																			<th><?= number_format(($q->min3 / sqrt($sum3)) * $kriteria3, 4); ?></th>
																		<?php endforeach; ?>
																	</tr>
																	<tr>
																		<th>Y4</th>
																		<?php foreach ($alternatif->result() as $a) : ?>
																			<td><?= number_format(($a->k04 / sqrt($sum4)) * $kriteria4, 4); ?></td>
																		<?php endforeach; ?>

																		<?php foreach ($min_max->result() as $q) : ?>
																			<th><?= number_format(($q->max4 / sqrt($sum4)) * $kriteria4, 4); ?></th>
																			<th><?= number_format(($q->min4 / sqrt($sum4)) * $kriteria4, 4); ?></th>
																		<?php endforeach; ?>
																	</tr>
																	<tr>
																		<th>Y5</th>
																		<?php foreach ($alternatif->result() as $a) : ?>
																			<td><?= number_format(($a->k05 / sqrt($sum5)) * $kriteria5, 4); ?></td>
																		<?php endforeach; ?>

																		<?php foreach ($min_max->result() as $q) : ?>
																			<th><?= number_format(($q->max5 / sqrt($sum5)) * $kriteria5, 4); ?></th>
																			<th><?= number_format(($q->min5 / sqrt($sum5)) * $kriteria5, 4); ?></th>
																		<?php endforeach; ?>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div><!-- Row -->
										<div class="col-md-12">
											<div class="panel panel-white">
												<div class="panel-body">
													<h3 class="mb-2">Menghitung jarak solusi ideal positif (D+) dan solusi ideal negatif(D-)</h3>
													<div class="row">
														<div class="col-md-6">
															<div class="panel panel-white">
																<div class="panel-body">
																	<div class="table-responsive">
																		<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																			<thead class="text-uppercase">
																				<tr>
																					<th scope="col" colspan="2" style="text-align: center;">Ideal Positif(D+)</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php $i = 1; ?>
																				<?php foreach ($min_max->result() as $a) : ?>
																					<?php
																					$maksimal1 = ($a->max1 / sqrt($sum1)) * $kriteria1;
																					$maksimal2 = ($a->max2 / sqrt($sum2)) * $kriteria2;
																					$maksimal3 = ($a->max3 / sqrt($sum3)) * $kriteria3;
																					$maksimal4 = ($a->max4 / sqrt($sum4)) * $kriteria4;
																					$maksimal5 = ($a->max5 / sqrt($sum5)) * $kriteria5;
																					?>

																					<?php foreach ($alternatif->result() as $a) : ?>
																						<?php
																						$y1 = $a->k01 / sqrt($sum1) * $kriteria1;
																						$y2 = $a->k02 / sqrt($sum2) * $kriteria2;
																						$y3 = $a->k03 / sqrt($sum3) * $kriteria3;
																						$y4 = $a->k04 / sqrt($sum4) * $kriteria4;
																						$y5 = $a->k05 / sqrt($sum5) * $kriteria5;

																						$dPositif = number_format(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);
																						?>

																						<tr>
																							<th scope="row"><?= "D" . $i++ . "+"; ?></th>
																							<td><?= $dPositif; ?></td>
																						</tr>

																					<?php endforeach; ?>

																				<?php endforeach; ?>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="panel panel-white">
																<div class="panel-body">
																	<div class="table-responsive">
																		<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																			<thead class="text-uppercase">
																				<tr>
																					<th scope="col" colspan="2" style="text-align: center;">Ideal Negatif(D-)</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php $i = 1; ?>
																				<?php foreach ($min_max->result() as $a) : ?>
																					<?php
																					$minimal1 = ($a->min1 / sqrt($sum1)) * $kriteria1;
																					$minimal2 = ($a->min2 / sqrt($sum2)) * $kriteria2;
																					$minimal3 = ($a->min3 / sqrt($sum3)) * $kriteria3;
																					$minimal4 = ($a->min4 / sqrt($sum4)) * $kriteria4;
																					$minimal5 = ($a->min5 / sqrt($sum5)) * $kriteria5;
																					?>

																					<?php foreach ($alternatif->result() as $a) : ?>
																						<?php
																						$y1 = $a->k01 / sqrt($sum1) * $kriteria1;
																						$y2 = $a->k02 / sqrt($sum2) * $kriteria2;
																						$y3 = $a->k03 / sqrt($sum3) * $kriteria3;
																						$y4 = $a->k04 / sqrt($sum4) * $kriteria4;
																						$y5 = $a->k05 / sqrt($sum5) * $kriteria5;

																						$dPositif = number_format(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);
																						?>

																						<tr>
																							<th scope="row"><?= "D" . $i++ . "+"; ?></th>
																							<td><?= $dPositif; ?></td>
																						</tr>

																					<?php endforeach; ?>

																				<?php endforeach; ?>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- Row -->

											<div class="col-md-12">
												<div class="panel panel-white">
													<div class="panel-body">
														<div class="table-responsive">
															<h3 class="mb-2">Menghitung Nilai Preferensi Untuk Setiap Alternatif</h3>
															<br>
															<div class="table-responsive">
																<table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
																	<thead class="text-uppercase">
																		<tr>
																			<th scope="col">Kode</th>
																			<th scope="col">Nama Alternatif</th>
																			<th scope="col">Image</th>
																			<th scope="col">Nilai Preferensi</th>
																			<th scope="col">Perangkingan</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$i = 1;
																		foreach ($min_max->result() as $a) {

																			$maks1 = ($a->max1 / sqrt($sum1)) * $kriteria1;
																			$maks2 = ($a->max2 / sqrt($sum2)) * $kriteria2;
																			$maks3 = ($a->max3 / sqrt($sum3)) * $kriteria3;
																			$maks4 = ($a->max4 / sqrt($sum4)) * $kriteria4;
																			$maks5 = ($a->max5 / sqrt($sum5)) * $kriteria5;

																			$min1 = ($a->min1 / sqrt($sum1)) * $kriteria1;
																			$min2 = ($a->min2 / sqrt($sum2)) * $kriteria2;
																			$min3 = ($a->min3 / sqrt($sum3)) * $kriteria3;
																			$min4 = ($a->min4 / sqrt($sum4)) * $kriteria4;
																			$min5 = ($a->min5 / sqrt($sum5)) * $kriteria5;


																			foreach ($alternatif->result() as $alt) {

																				$y1 = $alt->k01 / sqrt($sum1) * $kriteria1;
																				$y2 = $alt->k02 / sqrt($sum2) * $kriteria2;
																				$y3 = $alt->k03 / sqrt($sum3) * $kriteria3;
																				$y4 = $alt->k04 / sqrt($sum4) * $kriteria4;
																				$y5 = $alt->k05 / sqrt($sum5) * $kriteria5;

																				$dPositif = number_format(sqrt(pow(($maks1 - $y1), 2) + pow(($maks2 - $y2), 2) + pow(($maks3 - $y3), 2) + pow(($maks4 - $y4), 2) + pow(($maks5 - $y5), 2)), 4);

																				$dNegatif = number_format(sqrt(pow(($min1 - $y1), 2) + pow(($min2 - $y2), 2) + pow(($min3 - $y3), 2) + pow(($min4 - $y4), 2) + pow(($min5 - $y5), 2)), 4);

																				$pref = $dNegatif / ($dNegatif + $dPositif);

																		// $query = "INSERT INTO tbl_preferensi VALUES('','$pref')";

																		// mysqli_query($conn, $query);

																		// echo "hasil preferensi = ". $pref. "</br>";
																				$this->db->query("INSERT INTO tbl_preferensi(id,pref) VALUES ('','$pref')");
																			}
																		}
																		$sql = "SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC";
																		$pref = $this->db->query($sql);
																		?>
																		<?php foreach ($pref->result_array() as $pre) : ?>
																			<tr>
																				<td><?= "A" . $pre['id_alt']; ?></td>
																				<td><?= $pre['nama_alt']; ?></td>
																				<td>
																					<img src="<?= base_url() . 'assets/images/' . $pre["gambar"]; ?>" width="50">
																				</td>
																				<td><?= $pre['pref']; ?></td>
																				<td>
																					<?= $i++; ?>
																				</td>
																			</tr>
																		<?php endforeach; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div><!-- Row -->
											<div class="page-title">
												<h3>Detail Perhitungan Topsis</h3>
												<div class="page-breadcrumb">
													<ol class="breadcrumb">
														<li><a href="<?php echo site_url('backend/hasil_topsis');?>">Kembali</a></li>
													</ol>
												</div>
											</div>

										</div><!-- Main Wrapper -->
										<div class="page-footer">
											<p class="no-s"><?= date('Y');?> &copy; Otoexpert.</p>
										</div>
									</div><!-- Page Inner -->
								</main><!-- Page Content -->


								<!--EDIT RECORD MODAL-->
								<form action="<?php echo site_url('backend/kriteria/edit');?>" method="post">
									<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Edit Kriteria</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" name="id" required>
													<div class="form-group">
														<input type="text" name="kode" class="form-control" placeholder="Cth : C1" required>
														<input type="text" name="kriteria" class="form-control" placeholder="Masukan Kriteria" required>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-success">Edit</button>
												</div>
											</div>
										</div>
									</div>
								</form>

								<!--DELETE RECORD MODAL-->
								<form action="<?= site_url('backend/kriteria/delete');?>" method="post">
									<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Delete Kriteria</h4>
												</div>
												<div class="modal-body">
													<div class="alert alert-info">
														Anda yakin mau menghapus data ini?
													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="id" required>
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-success">Delete</button>
												</div>
											</div>
										</div>
									</div>
								</form>

								<!-- Javascripts -->
								<script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.4.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/pace-master/pace.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/jquery-blockui/jquery.blockui.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/switchery/switchery.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/uniform/jquery.uniform.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/classie.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/main.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/waves/waves.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/3d-bold-navigation/js/main.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/jquery-mockjax-master/jquery.mockjax.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/moment/moment.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/datatables/js/jquery.datatables.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/js/modern.min.js'?>"></script>
								<script src="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.js'?>"></script>
								<script>
									$(document).ready(function(){
										$('#data-table').dataTable();

                //Edit Record
                $('.btn-edit').on('click',function(){
                	var id=$(this).data('id_krt');
                	var name=$(this).data('kriteria');
                	$('[name="id"]').val(id);
                	$('[name="kode"]').val(kode);
                	$('[name="kriteria"]').val(nama);
                	$('#EditModal').modal('show');
                });

                //Edit Record
                $('.btn-delete').on('click',function(){
                	var id=$(this).data('id_krt');
                	$('[name="id"]').val(id);
                	$('#DeleteModal').modal('show');
                });

            });
        </script>

        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
        	<script type="text/javascript">
        		$.toast({
        			heading: 'Success',
        			text: "Category Saved!",
        			showHideTransition: 'slide',
        			icon: 'success',
        			hideAfter: false,
        			position: 'bottom-right',
        			bgColor: '#7EC857'
        		});
        	</script>
        	<?php elseif($this->session->flashdata('msg')=='info'):?>
        		<script type="text/javascript">
        			$.toast({
        				heading: 'Info',
        				text: "Category Updated!",
        				showHideTransition: 'slide',
        				icon: 'info',
        				hideAfter: false,
        				position: 'bottom-right',
        				bgColor: '#00C9E6'
        			});
        		</script>
        		<?php elseif($this->session->flashdata('msg')=='success-delete'):?>
        			<script type="text/javascript">
        				$.toast({
        					heading: 'Success',
        					text: "Category Deleted!.",
        					showHideTransition: 'slide',
        					icon: 'success',
        					hideAfter: false,
        					position: 'bottom-right',
        					bgColor: '#7EC857'
        				});
        			</script>
        			<?php else:?>

        			<?php endif;?>


        		</body>
        		</html>