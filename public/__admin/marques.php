<?php require('./templates/head-section.php');
headSection("Gestion des marques") ?>


<?php


//!Marques Liste
$sqlMarques = 'SELECT  id,marque,img FROM `marques`';
$statement = $con->prepare($sqlMarques);
$statement->execute();
$Marques = $statement->fetchAll(PDO::FETCH_OBJ);


//!Insertion
if (isset($_POST['addmarque'])) {
    $marque = secure_string($_POST['marque']);

    $uploadedFile = $_FILES['img'];
    $uploadPath = '../assets/images/marques/';
    $watermarkPath = '../_umedia/watermark.png';

    $result = secure_image_upload($uploadedFile, $uploadPath, $watermarkPath);



    if (empty($marque) || !$result) {
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
        $sql = 'Insert into `marques` (marque,img) values (:marque,:img)';
        $statement = $con->prepare($sql);
        $statement->execute([
            ':marque' => $marque,
            ':img' => $result
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

        header("Location: ./marques");
    }
}



//!Modification
if (isset($_POST['Updatemarque'])) {
    $id = secure_int($_POST['id']);
    $marque = secure_string($_POST['marque']);
    if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
        $uploadedFile = $_FILES['img'];
        $uploadPath = '../assets/images/marques/';
        $watermarkPath = '../_umedia/watermark.png';
        $result = secure_image_upload($uploadedFile, $uploadPath, $watermarkPath);
    } else {
        $sqlMarquesImages = 'SELECT img FROM `marques` WHERE id = :id';
        $statement = $con->prepare($sqlMarquesImages);
        $statement->execute([':id' => $id]);
        $MarquesImages = $statement->fetch(PDO::FETCH_ASSOC);
        $result = $MarquesImages['img'];
    }
    if (empty($marque)) {
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
                    title: "La marque est obligatoire",
                    padding: "2em",
                });
            });
        </script>
    ';
    } else {
        $sql = 'Update `marques` set marque = :marque, img = :img where id = :id';
        $statement = $con->prepare($sql);
        $statement->execute([
            ':marque' => $marque,
            ':img' => $result,
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

        header("Location: ./marques");
    }
}


?>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
    <?php include('./templates/loader.php') ?>
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <?php require('./templates/sidebar.php');
        sidebar("marques") ?>
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
                            <span>Gestion des marques</span>
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
                                            <div class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">Ajouter Une Marque
                                                <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                                    X
                                                </button>
                                            </div>
                                            <div class="p-5">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="relative mb-4">
                                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                            <box-icon name='tag'></box-icon>
                                                        </span>
                                                        <input type="text" name="marque" placeholder="Marque" class="form-input ltr:pl-10 rtl:pr-10" />

                                                    </div>
                                                    <div class="relative mb-4">
                                                        <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                            <box-icon name='image'></box-icon>
                                                        </span>
                                                        <input type="file" accept="image/*" name="img" placeholder="Marque Logo" class="form-input ltr:pl-10 rtl:pr-10" />

                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <button type="button" @click="toggle" class="btn btn-danger w-full">Annuler</button>
                                                        <button type="submit" name="addmarque" class="btn btn-primary w-full">Ajouter</button>
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


                            <table id="example" class=" table border table-bordered table-hover table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Marque</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Marques as $Marque) { ?>
                                        <tr>
                                            <td><?= $Marque->id; ?></td>
                                            <td><?= $Marque->marque; ?></td>
                                            <td><img src="../assets/images/marques/<?= $Marque->img; ?>" alt="image" width="50" height="50" class="rounded-full" /></td>
                                            <td>
                                                <div style="display: flex;justify-content: start;">
                                                    <div class="" x-data="modal">
                                                        <button type="button" class="btn btn-success w-10 h-10 p-0 rounded-full mr-3" @click="toggle">
                                                            <box-icon name='edit' type='solid' color="white"></box-icon>
                                                        </button>
                                                        <!-- button -->
                                                        <!-- modal -->
                                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                                <div style="margin-top: 80px!important;" x-show="open" x-transition x-transition.duration.300 class="panel border-0 py-1 px-4 rounded-lg overflow-hidden w-full max-w-sm my-8">
                                                                    <div class="flex items-center justify-between p-5 font-semibold text-lg dark:text-white">Modifier <?= $Marque->marque; ?>
                                                                        <button type="button" @click="toggle" class="text-white-dark hover:text-dark">
                                                                            X
                                                                        </button>
                                                                    </div>
                                                                    <div class="p-5">
                                                                        <form method="post" enctype="multipart/form-data">
                                                                            <div class="relative mb-4">
                                                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                                                    <box-icon name='tag'></box-icon>
                                                                                </span>
                                                                                <input type="hidden" value="<?= $Marque->id; ?>" name="id" />

                                                                                <input type="text" value="<?= $Marque->marque; ?>" name="marque" placeholder="Marque" class="form-input ltr:pl-10 rtl:pr-10" />

                                                                            </div>
                                                                            <div class="relative mb-4">
                                                                                <span class="absolute ltr:left-3 rtl:right-3 top-1/2 -translate-y-1/2 dark:text-white-dark">
                                                                                    <img style="padding-left: 13px;" class="w-70  h-10 rounded-2" src="../assets/images/marques/<?= $Marque->img; ?>" alt="img" srcset="../assets/images/marques/<?= $Marque->img; ?>">
                                                                                </span>

                                                                                <input type="file" accept="image/*" name="img" placeholder="Marque Logo" class="form-input ltr:pl-10 rtl:pr-10" />

                                                                            </div>
                                                                            <div class="grid grid-cols-2 gap-4">
                                                                                <button type="button" @click="toggle" class="btn btn-danger w-full">Annuler</button>
                                                                                <button type="submit" name="Updatemarque" class="btn btn-primary w-full">Modifier</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <button type="button" onclick="showDeleteConfirmation(event, './__sp/marques?id=<?= $Marque->id; ?>')" class="btn btn-danger w-10 h-10 p-0 rounded-full">
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