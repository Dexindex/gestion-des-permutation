<?php
require '../../dependencies/db.php';
require '../../dependencies/functions.php';


session_start();

if (!isset($_SESSION['admin-123Toner'])) {
    header("Location: ../login");
}


$id = secure_int($_GET['id']);
$sql = 'DELETE FROM cartouches_toners WHERE id = :id ';
$statement = $con->prepare($sql);



try {
    if ($statement->execute([':id' => $id])) {
        $_SESSION['msg'] = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    padding: "2em",
                    timerProgressBar: true,
                    
                });
                toast.fire({
                    icon: "success",
                    title: "Suppression effectuee avec succes",
                    padding: "2em",
                });
            });
        </script>
        ';
        header("Location: ../toners");
    }
} catch (PDOException $e) {
    if ($e->getCode() === '23000' && $e->errorInfo[1] === 1451) {
        $_SESSION['msg'] = '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    padding: "2em",
                    timerProgressBar: true,
                    
                });
                toast.fire({
                    icon: "error",
                    title: "Erreur lors de la Suppression",
                    padding: "2em",
                });
            });
        </script>
        ';
        header("Location: ../toners");
    }
}
