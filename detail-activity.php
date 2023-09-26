<?php
session_start();

// Memeriksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda perlu login untuk mengakses halaman ini');
            document.location.href = 'index.php';
          </script>";
    exit;
}

$title = 'Detail Aktivitas';

// Memeriksa level pengguna
if ($_SESSION["level"] != "super-admin") {
    echo "<script>
            alert('Anda tidak memiliki hak akses untuk mengakses halaman ini');
            window.history.back();
          </script>";
    exit;
}

include 'layout/header.php';

// Fungsi untuk mengonversi tanggal dari format YYYY-MM-DD ke tanggal bulan tahun
function convertDateFormat($date) {
    $tanggal = date_create($date); // Membuat objek tanggal dari string
    return date_format($tanggal, "d F Y"); // Mengonversi ke format tanggal bulan tahun
}

// Ambil id_akun dari URL
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Query SQL untuk mengambil detail aktivitas berdasarkan id_akun
    // Note: Anda perlu memiliki fungsi 'select' untuk menjalankan kueri SQL.
    // Dengan asumsi ini didefinisikan di tempat lain dalam kode Anda.
    $query_nama = select("SELECT nama FROM akun WHERE id_akun = $id_user");

    if ($query_nama) {
        $nama_akun = $query_nama[0]['nama'];
        
        // Query untuk mendapatkan detail aktivitas
        $query = "SELECT * FROM activity WHERE id_akun = $id_user";
        $result = mysqli_query($db, $query);
?>

<!-- Content Wrapper. Contains page content --> 
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="nav-icon fas fa-user"></i> Detail Aktivitas</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Header (Page header) --> 
    <section class="content"> 
        <div class="container-fluid"> 
            <div class="card"> 
                <div class="card-body"> 
                <?php if (mysqli_num_rows($result) > 0) : ?>
                    <h2>Aktivitas - <?php echo $nama_akun; ?></h2>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                                <th style="text-align: center; vertical-align: middle;">Tipe Aktivitas & Nama Project</th>
                                <th style="text-align: center; vertical-align: middle;">Tanggal Mulai</th>
                                <th style="text-align: center; vertical-align: middle;"style="text-align: center; vertical-align: middle;">Tanggal Selesai</th>
                                <th style="text-align: center; vertical-align: middle;">Status Aktivitas</th>
                                <th style="text-align: center; vertical-align: middle;">Detail Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($result)) :
                            ?>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $data['tanggal']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $data['tipe_activity']; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo convertDateFormat($data['start_date']); ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo convertDateFormat($data['end_date']); ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $data['status_activity']; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $data['detail_activity']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Tidak ada data aktivitas yang ditemukan untuk akun ini.</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    } else {
        echo "<script>
                alert('Gagal mengambil data nama akun');
                window.location='absensi-akun.php';
              </script>";
        exit;
    }
} else {
    echo "<script>
            alert('ID aktivitas tidak valid');
            window.location='absensi-akun.php';
          </script>";
    exit;
}
?>

<?php include 'layout/footer.php'; ?>
