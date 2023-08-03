<?php
include '../include/conn.php';

if (isset($_GET['id'])) {
    $transactionId = $_GET['id'];

    $query = "DELETE FROM transaction WHERE id = $transactionId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>alert("Transaksi dengan ID ' . $transactionId . ' berhasil dihapus!"); window.location = "../listTransaction.php";</script>';
        } else {
            echo '<script>alert("Transaksi dengan ID ' . $transactionId . ' tidak ditemukan!"); window.location = "../listTransaction.php";</script>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
$conn->close();
