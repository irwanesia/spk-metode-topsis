<?php
session_start();
$title = "Detail Perhitungan Topsis";
include "template/sidebar.php";
include "template/header.php";

require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// ambil data di URL
$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");

// $delete = mysqli_query($conn, "TRUNCATE TABLE tbl_preferensi");
// untuk mengosongkan data table preference
mysqli_query($conn, "TRUNCATE TABLE tbl_preferensi");

?>

<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <?php include "template/topbar.php"; ?>
    <!-- end page-title -->

    <!-- data admin -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Detail Hasil Topsis</h4>
                <!-- <p class="d"><a href="print-hasil.php"><i class="fa fa-print"></i> Print</a></p> -->
                <!-- <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-alternatif" role="tab" aria-controls="nav-home" aria-selected="true">Nilai Alternatif</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-normalisasi" role="tab" aria-controls="nav-profile" aria-selected="false">Nilai Normalisasi</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-terbobot" role="tab" aria-controls="nav-contact" aria-selected="false">Nilai Normalisasi Terbobot</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-alternatif" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                    <div class="tab-pane fade" id="nav-normalisasi" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                    <div class="tab-pane fade" id="nav-terbobot" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div> -->
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Alternatif</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
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
                                    <?php foreach ($alternatif as $alt) : ?>
                                        <tr>
                                            <td><?= $alt['kode_alt']; ?></td>
                                            <td><?= $alt['k01']; ?></td>
                                            <td><?= $alt['k02']; ?></td>
                                            <td><?= $alt['k03']; ?></td>
                                            <td><?= $alt['k04']; ?></td>
                                            <td><?= $alt['k05']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                $a2 = mysqli_query($conn, "SELECT SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif");
                ?>
                <!-- menghitung jumlah sum masing2 alternatif -->
                <?php foreach ($a2 as $a) : ?>
                    <?php $sum1 = $a['total1']; ?>
                    <?php $sum2 = $a['total2']; ?>
                    <?php $sum3 = $a['total3']; ?>
                    <?php $sum4 = $a['total4']; ?>
                    <?php $sum5 = $a['total5']; ?>

                <?php endforeach; ?>

                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Normalisasi</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
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
                                    <?php foreach ($alternatif as $a) : ?>
                                        <tr>
                                            <th scope="row"><?= $a['kode_alt']; ?></th>
                                            <td><?= number_format($a['k01'] / sqrt($sum1), 4); ?></td>
                                            <td><?= number_format($a['k02'] / sqrt($sum2), 4); ?></td>
                                            <td><?= number_format($a['k03'] / sqrt($sum3), 4); ?></td>
                                            <td><?= number_format($a['k04'] / sqrt($sum4), 4); ?></td>
                                            <td><?= number_format($a['k05'] / sqrt($sum5), 4); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                $id = $_GET["id"];
                $result = mysqli_query($conn, "SELECT * FROM tbl_visitor WHERE id = $id");
                $k = mysqli_fetch_assoc($result);
                $kriteria1 = $k['k01'];
                $kriteria2 = $k['k02'];
                $kriteria3 = $k['k03'];
                $kriteria4 = $k['k04'];
                $kriteria5 = $k['k05'];

                // $result = mysqli_query($conn, "SELECT * FROM karyawan WHERE id = $id");
                // $k = mysqli_fetch_assoc($result);
                ?>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Normalisasi Terbobot</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
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
                                    <?php $alternatif ?>
                                    <?php foreach ($alternatif as $a) : ?>
                                        <tr>
                                            <th scope="row"><?= $a['kode_alt']; ?></th>
                                            <td><?= number_format(($a['k01'] / sqrt($sum1)) * $kriteria1, 4); ?></td>
                                            <td><?= number_format(($a['k02'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
                                            <td><?= number_format(($a['k03'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
                                            <td><?= number_format(($a['k04'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
                                            <td><?= number_format(($a['k05'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menentukan Solusi Ideal Positif (A+) dan Matriks Ideal Negatif (A-)</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Yi</th>
                                        <th scope="col" colspan="15">Solusi Ideal</th>
                                        <th scope="col">Max</th>
                                        <th scope="col">Min</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- menentukan max dan min -->
                                    <?php
                                    $query = mysqli_query($conn, "SELECT max(k01) as max1, min(k01) as min1, max(k02) as max2, min(k02) as min2, max(k03) as max3, min(k03) as min3, max(k04) as max4, min(k04) as min4, max(k05) as max5, min(k05) as min5 FROM tbl_alternatif");
                                    ?>


                                    <tr>
                                        <th>Y1</th>
                                        <?php foreach ($alternatif as $a) : ?>
                                            <td><?= number_format(($a['k01'] / sqrt($sum1)) * $kriteria1, 4); ?></td>
                                        <?php endforeach; ?>

                                        <?php foreach ($query as $q) : ?>
                                            <th><?= number_format(($q['max1'] / sqrt($sum1)) * $kriteria1, 4); ?></th>
                                            <th><?= number_format(($q['min1'] / sqrt($sum1)) * $kriteria1, 4); ?></th>

                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <th>Y2</th>
                                        <?php foreach ($alternatif as $a) : ?>
                                            <td><?= number_format(($a['k02'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
                                        <?php endforeach; ?>

                                        <?php foreach ($query as $q) : ?>
                                            <th><?= number_format(($q['max2'] / sqrt($sum2)) * $kriteria2, 4); ?></th>
                                            <th><?= number_format(($q['min2'] / sqrt($sum2)) * $kriteria2, 4); ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <th>Y3</th>
                                        <?php foreach ($alternatif as $a) : ?>
                                            <td><?= number_format(($a['k03'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
                                        <?php endforeach; ?>
                                        <?php foreach ($query as $q) : ?>
                                            <th><?= number_format(($q['max3'] / sqrt($sum3)) * $kriteria3, 4); ?></th>
                                            <th><?= number_format(($q['min3'] / sqrt($sum3)) * $kriteria3, 4); ?></th>
                                        <?php endforeach; ?>

                                    </tr>
                                    <tr>
                                        <th>Y4</th>
                                        <?php foreach ($alternatif as $a) : ?>
                                            <td><?= number_format(($a['k04'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
                                        <?php endforeach; ?>
                                        <?php foreach ($query as $q) : ?>
                                            <th><?= number_format(($q['max4'] / sqrt($sum4)) * $kriteria4, 4); ?></th>
                                            <th><?= number_format(($q['min4'] / sqrt($sum4)) * $kriteria4, 4); ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <th>Y5</th>
                                        <?php foreach ($alternatif as $a) : ?>
                                            <td><?= number_format(($a['k05'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
                                        <?php endforeach; ?>
                                        <?php foreach ($query as $q) : ?>
                                            <th><?= number_format(($q['max5'] / sqrt($sum5)) * $kriteria5, 4); ?></th>
                                            <th><?= number_format(($q['min5'] / sqrt($sum5)) * $kriteria5, 4); ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menghitung jarak solusi ideal positif (D+) dan solusi ideal negatif(D-)</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col" colspan="2">Ideal Positif(D+)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($query as $a) : ?>
                                                <?php
                                                $maksimal1 = ($a['max1'] / sqrt($sum1)) * $kriteria1;
                                                $maksimal2 = ($a['max2'] / sqrt($sum2)) * $kriteria2;
                                                $maksimal3 = ($a['max3'] / sqrt($sum3)) * $kriteria3;
                                                $maksimal4 = ($a['max4'] / sqrt($sum4)) * $kriteria4;
                                                $maksimal5 = ($a['max5'] / sqrt($sum5)) * $kriteria5;
                                                ?>

                                                <?php foreach ($alternatif as $a) : ?>
                                                    <?php
                                                    $y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
                                                    $y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
                                                    $y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
                                                    $y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
                                                    $y5 = $a['k05'] / sqrt($sum5) * $kriteria5;

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
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col" colspan="2">Ideal Negatif(D-)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($query as $a) : ?>
                                                <?php

                                                $minimal1 = ($a['min1'] / sqrt($sum1)) * $kriteria1;
                                                $minimal2 = ($a['min2'] / sqrt($sum2)) * $kriteria2;
                                                $minimal3 = ($a['min3'] / sqrt($sum3)) * $kriteria3;
                                                $minimal4 = ($a['min4'] / sqrt($sum4)) * $kriteria4;
                                                $minimal5 = ($a['min5'] / sqrt($sum5)) * $kriteria5;
                                                ?>

                                                <?php foreach ($alternatif as $a) : ?>
                                                    <?php
                                                    $y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
                                                    $y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
                                                    $y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
                                                    $y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
                                                    $y5 = $a['k05'] / sqrt($sum5) * $kriteria5;



                                                    $dNegatif = number_format(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

                                                    $pref = $dNegatif / ($dNegatif + $dPositif);
                                                    // echo $pref;
                                                    ?>

                                                    <tr>
                                                        <th scope="row"><?= "D" . $i++ . "-"; ?></th>
                                                        <td><?= $dNegatif; ?></td>
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

                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menghitung Nilai Preferensi untuk setiap alternatif</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
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
                                    <!-- delete isi tabel preferensi -->
                                    <?php

                                    $i = 1;
                                    ?>
                                    <?php foreach ($query as $a) : ?>
                                        <?php
                                        $maksimal1 = ($q['max1'] / sqrt($sum1)) * $kriteria1;
                                        $maksimal2 = ($q['max2'] / sqrt($sum2)) * $kriteria2;
                                        $maksimal3 = ($q['max3'] / sqrt($sum3)) * $kriteria3;
                                        $maksimal4 = ($q['max4'] / sqrt($sum4)) * $kriteria4;
                                        $maksimal5 = ($q['max5'] / sqrt($sum5)) * $kriteria5;

                                        $minimal1 = ($q['min1'] / sqrt($sum1)) * $kriteria1;
                                        $minimal2 = ($q['min2'] / sqrt($sum2)) * $kriteria2;
                                        $minimal3 = ($q['min3'] / sqrt($sum3)) * $kriteria3;
                                        $minimal4 = ($q['min4'] / sqrt($sum4)) * $kriteria4;
                                        $minimal5 = ($q['min5'] / sqrt($sum5)) * $kriteria5;
                                        ?>

                                        <?php foreach ($alternatif as $a) : ?>
                                            <?php
                                            $y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
                                            $y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
                                            $y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
                                            $y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
                                            $y5 = $a['k05'] / sqrt($sum5) * $kriteria5;

                                            $dPositif = number_format(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);

                                            $dNegatif = number_format(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

                                            $pref = $dNegatif / ($dNegatif + $dPositif);

                                            $query = "INSERT INTO tbl_preferensi VALUES('','$pref')";
                                            mysqli_query($conn, $query);

                                            ?>

                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <?php $preff = mysqli_query($conn, "SELECT *  FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC"); ?>
                                    <?php foreach ($preff as $pref) : ?>
                                        <tr>
                                            <td><?= "A" . $pref['id_alt']; ?></td>
                                            <td><?= $pref['nama_alt']; ?></td>
                                            <td>
                                                <img src="../assets/img/<?= $pref['gambar']; ?>" alt="<?= $pref['gambar']; ?>" width="80" height="60">
                                            </td>
                                            <td><?= $pref['pref']; ?></td>
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
        </div>
    </div>
</div>
<!-- data admin Table end -->
</div>


<?php include "template/footer.php"; ?>