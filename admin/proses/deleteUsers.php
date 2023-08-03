<?php
include '../include/conn.php';
if (isset($_GET['id'])) {
    $usId = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $usId";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>alert("Pengguna dengan ID ' . $usId . ' berhasil dihapus!"); window.location = "../listUsers.php";</script>';
        }
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
