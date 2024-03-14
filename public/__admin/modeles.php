<?php require('./templates/head-section.php');
headSection("Gestion des modeles");




//!Series Liste
$sqlSeries = 'SELECT * FROM series';
$statement = $con->prepare($sqlSeries);
$statement->execute();
$Series = $statement->fetchAll(PDO::FETCH_OBJ);


//!Modeles Liste
$sqlModeles = 'SELECT m.*,s.serie FROM modeles m,series s WHERE m.id_serie = s.id';
$statement = $con->prepare($sqlModeles);
$statement->execute();
$Modeles = $statement->fetchAll(PDO::FETCH_OBJ);







//!Insertion
if (isset($_POST['addmodele'])) {
    $modele = secure_string($_POST['modele']);
    $id_serie = secure_int($_POST['id_serie']);
    if (empty($id_serie) || empty($modele)) {
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
        $sql = 'Insert into modeles (model,id_serie) values (:modele,:id_serie)';
        $statement = $con->prepare($sql);
        $statement->execute([
            ':modele' => $modele,
            ':id_serie' => $id_serie
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
                    title: "Insertion effectuee avec succes",
                    padding: "2em",
                });
            });
        </script>
    ';

        header("Location: ./modeles");
    }
}



//!Modification
if (isset($_POST['Updatemodele'])) {
    $id = secure_int($_POST['id']);
    $modele = secure_string($_POST['modele']);
    $id_serie = secure_int($_POST['id_serie']);

    if (empty($id) || empty($modele) || empty($id_serie)) {
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
        $sql = 'Update `modeles` set model = :modele, id_serie = :id_serie where id = :id';
        $statement = $con->prepare($sql);
        $statement->execute([
            ':modele' => $modele,
            ':id_serie' => $id_serie,
            ':id' => $id
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

        header("Location: ./modeles");
    }
}


?>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
    <?php include('./templates/loader.php') ?>
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <?php require('./templates/sidebar.php');
        sidebar("modeles") ?>
        <div class="main-content flex min-h-screen flex-col">
            <?php include('./templates/header.php') ?>
            <div class="animate__animated p-6" style="z-index: 2;" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="javascript:;" class="text-primary hover:underline">Accueil</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Gestion des modeles</span>
                        </li>
                    </ul>
                    <div class="flex justify-end overflow-x-auto whitespace-nowrap p-3 text-primary">
                        <div x-data="modal">
                            <li>
                                <button type="button" class="btn btn-primary mr-2" @click="toggle">
                                    Ajouter <box-icon class="ml-2" color="white" type='solid' name='folder-plus'></box-icon>
                                </button>
                                <!-- button -->
                                <!-- modal -->
                                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                    <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                        <div style="margin-top: 80px!important;" x-show="open" x-transition x-transition.duration.300 class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                            <div class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">Ajouter Une Modeles
                                                <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                                    x
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="relative mb-4">
                                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                            <box-icon name='tag'></box-icon>
                                                        </span>
                                                        <select name="id_serie" class="form-select ltr:pl-10 rtl:pr-10">
                                                            <option selected disabled>Series</option>
                                                            <?php foreach ($Series as $seriee) : ?>
                                                                <option value="<?= $seriee->id ?>"><?= $seriee->serie ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                            <box-icon name='tag'></box-icon>
                                                        </span>
                                                        <input type="text" name="modele" placeholder="Modele" class="form-input ltr:pl-10 rtl:pr-10" />

                                                    </div>


                                                    <div class="grid grid-cols-2 gap-4">
                                                        <button type="button" @click="toggle" class="btn btn-danger w-full">Annuler</button>
                                                        <button type="submit" name="addmodele" class="btn btn-primary w-full">Ajouter</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>

                    </div>
                    <div class="panel mt-6">
                        <div x-data>

                            <table id="example" class=" table border table-bordered table-hover table-striped table-responsive" style="width:100%!important;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Serie</th>
                                        <th>Modele</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Modeles as $modelee) { ?>
                                        <tr>
                                            <td><?= $modelee->id; ?></td>
                                            <td><?= $modelee->serie; ?></td>
                                            <td><?= $modelee->model; ?></td>
                                            <td>
                                                <div style="display: flex;justify-content: start;">
                                                    <div x-data="modal">
                                                        <button @click="toggle" type="button" class="btn btn-success w-10 h-10 p-0 rounded-full mr-3">
                                                            <box-icon name='edit' type='solid' color="white"></box-icon>
                                                        </button>

                                                        <!-- button -->
                                                        <!-- modal -->
                                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                                <div style="margin-top: 80px!important;" x-show="open" x-transition x-transition.duration.300 class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                                                    <div class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">Modifier <?= $modelee->model; ?>
                                                                        <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                                                            x
                                                                        </button>
                                                                    </div>
                                                                    <div class="p-5">
                                                                        <form method="post" enctype="multipart/form-data">
                                                                            <div class="relative mb-4">
                                                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                                                    <box-icon name='tag'></box-icon>
                                                                                </span>
                                                                                <input type="hidden" value="<?= $modelee->id; ?>" name="id" />

                                                                                <input type="text" value="<?= $modelee->model; ?>" name="modele" placeholder="Modele" class="form-input ltr:pl-10 rtl:pr-10" />

                                                                            </div>
                                                                            <div class="relative mb-4">
                                                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                                                    <box-icon name='tag'></box-icon>
                                                                                </span>
                                                                                <select name="id_serie" class="form-select ltr:pl-10 rtl:pr-10">
                                                                                    <option selected disabled>Series</option>
                                                                                    <?php foreach ($Series as $seriee) : ?>
                                                                                        <option <?= $modelee->id_serie == $seriee->id ? 'selected' : '' ?> value="<?= $seriee->id ?>"><?= $seriee->serie ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="grid grid-cols-2 gap-4">
                                                                                <button type="button" @click="toggle" class="btn btn-danger w-full">Annuler</button>
                                                                                <button type="submit" name="Updatemodele" class="btn btn-primary w-full">Modifier</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <button type="button" onclick="showDeleteConfirmation(event, './__sp/modeles?id=<?= $modelee->id; ?>')" class="btn btn-danger w-10 h-10 p-0 rounded-full">
                                                        <box-icon name='trash' type='solid' color="white"></box-icon>
                                                    </button>
                                                </div>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end main content section -->
            </div>

            <?php include('./templates/footer.php') ?>
        </div>
    </div>

    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./assets/vendor/dataTables.min.js"></script>



    <script defer src="assets/js/apexcharts.js"></script>







    <?php require('./templates/alpine-scripts.php'); ?>
    <?php if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }; ?>
</body>


</html>