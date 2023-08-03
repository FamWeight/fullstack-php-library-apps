<?php
include '../include/conn.php';
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $query = "DELETE FROM books WHERE id = $bookId";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>alert("Buku dengan ID ' . $bookId . ' berhasil dihapus!"); window.location = "../listBooks.php";</script>';
        } else {
            echo '<script>alert("Buku dengan ID ' . $bookId . ' tidak ditemukan!"); window.location = "../listBooks.php";</script>';
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
