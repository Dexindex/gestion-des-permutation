<?php
require '../dependencies/db.php';
require '../dependencies/functions.php';
session_start();

if (!isset($_SESSION['admin-123Toner'])) {
    header("Location: ./login");
}

global $con;
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$SqlInformations = 'SELECT * FROM general_information';
$statement = $con->prepare($SqlInformations);
$statement->execute();
$SiteInfo = $statement->fetch(PDO::FETCH_ASSOC);



if (isset($_POST["submitUpdateInfo"])) {
    $admin_nom = secure_string($_POST["admin_nom"]);
    $login = secure_string($_POST["login"]);
    $mdp = secure_string($_POST["mdp"]);

    if (empty($admin_nom)  || empty($login) || empty($mdp)) {
        echo '
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
                    title: "Tous les champs sont obligatoires",
                    padding: "2em",
                });
            });
        </script>
    ';
    } else {
        $sql = 'UPDATE general_information SET admin_nom = :admin_nom, login = :login, mdp = :mdp WHERE id = :id';
        $statement = $con->prepare($sql);
        $statement->execute([
            ':admin_nom' => $admin_nom,
            ':login' => $login,
            ':mdp' => $mdp,
            ':id' => $SiteInfo['id'],
        ]);
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
                    title: "Modification effectuee avec succes",
                    padding: "2em",
                });
            });
        </script>
    ';

        header("Location: ./");
    }
}



function headSection($title)
{


?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>123Toner - Administration | <?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css" />
        <link rel="stylesheet" href="./assets/vendor/dataTables.dataTables.min.css">
        <script src="assets/js/perfect-scrollbar.min.js"></script>
        <script defer src="assets/js/popper.min.js"></script>
        <script defer src="assets/js/tippy-bundle.umd.min.js"></script>
        <script defer src="assets/js/sweetalert.min.js"></script>
        <script src="./assets/vendor/tailwind/jquery-3.7.1.js"></script>

        <style>
            .dt-search {
                display: flex;
                justify-content: end;
                align-items: center;
            }
        </style>

    </head>

<?php } ?>