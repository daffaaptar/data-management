<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          alert('Anda perlu login untuk memasuki halaman');
          document.location.href = 'index.php';
        </script>";
  exit;
}

include 'config/app.php';

// menerima id akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data Akun Berhasil Dihapus');
            document.location.href = 'dataakun.php';
          </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal Dihapus');
            document.location.href = 'dataakun.php';
          </script>";
}
