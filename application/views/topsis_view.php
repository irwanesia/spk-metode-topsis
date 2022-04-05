<?php
$this->db->query("TRUNCATE TABLE tbl_preferensi");
								// $no = 1;
foreach ($total_alternatif->result() as $b) {
	$sum1 = $b->total1;
	$sum2 = $b->total2;
	$sum3 = $b->total3;
	$sum4 = $b->total4;
	$sum5 = $b->total5;

}

foreach ($kriteria->result() as $k) {

	$kriteria1 = $k->k01;
	$kriteria2 = $k->k02;
	$kriteria3 = $k->k03;
	$kriteria4 = $k->k04;
	$kriteria5 = $k->k05;

}

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

$sql = "SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC limit 1";
// $sql = "SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON tbl_preferensi.id = tbl_alternatif.id_alt INNER JOIN tbl_visitor ON tbl_visitor.id = tbl_alternatif.id_alt ORDER BY pref DESC limit 1";

$sql2 = "SELECT * FROM tbl_visitor ORDER BY id DESC limit 1";

$pref = $this->db->query($sql);
$visitor = $this->db->query($sql2); 

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $site_title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/favicon.png' ?>">
	<!-- SEO Tag -->
	<meta name="description" content="<?php echo $site_desc; ?>" />
	<link rel="canonical" href="<?php echo site_url(); ?>" />
	<meta property="og:locale" content="id_ID" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $site_title; ?>" />
	<meta property="og:description" content="<?php echo $site_desc; ?>" />
	<meta property="og:url" content="<?php echo site_url(); ?>" />
	<meta property="og:site_name" content="<?php echo $site_name; ?>" />
	<meta property="og:image" content="<?php echo base_url() . 'theme/images/logo.png' ?>" />
	<meta property="og:image:secure_url" content="<?php echo base_url() . 'theme/images/logo.png' ?>" />
	<meta property="og:image:width" content="560" />
	<meta property="og:image:height" content="315" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?php echo $site_desc; ?>" />
	<meta name="twitter:title" content="<?php echo $site_title; ?>" />
	<meta name="twitter:site" content="<?php echo $site_twitter; ?>" />
	<meta name="twitter:image" content="<?php echo base_url() . 'theme/images/logo.png' ?>" />
	<!-- End SEO Tag. -->

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link href="<?php echo base_url() . 'theme/plugins/bootstrap.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'theme/fonts/ionicons.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'theme/common/styles.css' ?>" rel="stylesheet">

	<style type="text/css">
		.topsis {
			width: 100%;
			height: 100%;
			background-color: #333;
			position: absolute;
			top: 0;
			bottom: 0;
			opacity: 0.99;
			z-index: 1000;
		}

		.hasil-topsis {
			margin-top: 100px;
			opacity: 2;
			width: 60%;
		}
		.card {
			padding: 30px;
		}

		.footer {
			margin-bottom: 200px;
		}

	</style>

</head>

<body>

	<?php echo $header; ?>

	<section class="ptb-0">
		<div class="mb-30 brdr-ash-1 opacty-5"></div>
	</section>


	<section class="topsis">
		<?php 
		$no=0;
		foreach ($pref->result() as $row):
			$no++;
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row->pref;?></td>
			</tr>
			
		<?php endforeach; ?>


		<div class="container hasil-topsis">
			<div class="row">
				<div class="col">
					<div class="card text-center d-flex align-items-center" style="border: none;">
						<?php foreach ($pref->result_array() as $pre) : ?>
							<img class="card-img-top img-thumbnail" src="<?= base_url() . 'assets/images/' . $pre["gambar"]; ?>" alt="<?= $pre["gambar"]; ?>" style="width: 300px; height: 180px; border:none;">
							<div class="card-body">
								<!-- <h4 class="card-title"><?= $pre["id_alt"]; ?></h4> -->
								<h4 class="card-title"><?= $pre["nama_alt"]; ?>, menjadi rekomendasi terbaik untuk anda!</h4>
								<h4 class="card-title"><?= $pre["pref"]; ?></h4>
								<p>Kunjungi dealer <a href="<?= $pre["website"]; ?>" target="_blank"><?= $pre["website_seo"]; ?></a>.</p>
							</div>
							
						<?php endforeach; ?>

						<a href="<?= base_url().'home' ?>" class="btn btn-success mt-20">Kembali</a>
						<?php foreach ($visitor->result_array() as $v) : ?>
							<?php $v["nama"]; ?>
						<?php endforeach; ?>

						<?php 
						// $id_alt = $pre["id_alt"];
						// $nama_visitor = $v["nama"];
						$nama_alt = $pre["nama_alt"];
						// echo $id_alt . $nama . $nama_alt;
						$this->db->query("INSERT INTO tbl_topsis_insert(id, nama_alt, jumlah) VALUES ('','$nama_alt',1)");
						 ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="footer">
		
	</div>
	<?php echo $footer; ?>

	<!-- SCIPTS -->
	<script type="text/javascript" src="<?php echo base_url() . 'theme/plugins/jquery-3.2.1.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'theme/plugins/tether.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'theme/plugins/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'theme/common/scripts.js' ?>"></script>

</body>

</html>	