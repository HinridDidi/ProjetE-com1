
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Light Phone</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="registerClient.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        
                    </ul>
                    <form class="d-flex">
                    <a href="panierView.php" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Panier
                        </a>
                        <a href="loginAdmin.php" class="btn btn-outline-dark" type="submit">
                        <i class="bi bi-award-fill"></i>
                            Admin
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Vente de Telephones</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Magasiner le telephone de vos reves</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    session_start();
                    require '../classes/telephone.class.php';
                    require '../classes/utilisateur.class.php';
                    $user = new Utilisateur(); 

                    $phones = new Telephone();
                    $allPhones = $phones->getAllPhones();

                    foreach ($allPhones as $phone) {
                    ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                
                                <img class="card-img-top" src="<?php echo $phone['Photo'] ?>" alt="..." />
                                
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        
                                        <h5 class="fw-bolder"><?php echo $phone['Nom'] ?></h5>
                                        
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <?php echo $phone['Prix'] ?>$
                                    </div>
                                </div>
                                
                                <form action="" method="post">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="../controllers/addPhoneP.php?id_phone=<?php echo $phone['id_phone'] ?>">Ajouter au Panier</a></div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION["idUser"]) && $user->VerifComment($_SESSION["idUser"], $phone['id_phone'])) {
                                        ?>
                                        <label>Commentaire déjà envoyé</label>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="mt-3">
                                            <div class="mb-3">
                                                <label for="comment_<?php echo $phone['id_phone'] ?>" class="form-label">Laisser un commentaire :</label>
                                                <textarea class="form-control" id="comment_<?php echo $phone['id_phone'] ?>" name="comment_<?php echo $phone['id_phone'] ?>" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; By Didi & Co </p></div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contenu']) && isset($_POST['utilisateur_id']) && isset($_POST['telephone_id'])) {
    // Récupération des données POST
    $contenu = $_POST['contenu'];
    $utilisateur_id = $_POST['utilisateur_id'];
    $telephone_id = $_POST['telephone_id'];

    
    $commentaire = new Commentaire(); 
    $result = $commentaire->EnvoiCommentaire($contenu, $utilisateur_id, $telephone_id);
    if ($result === true) {
       
        echo "Le commentaire a été inséré avec succès.";
        header('Location: acceuilView.php');
        exit();
    } else {
        echo "Erreur lors de l'insertion du commentaire : " . $result;
    }
} else {
    echo "Erreur : Veuillez fournir les informations nécessaires pour ajouter un commentaire.";
}
?>

