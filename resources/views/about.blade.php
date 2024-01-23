<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>A Propos CarHub</title>
    <link rel="icon" href="logo.png" sizes="50" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

    <!-- Polices Web Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />

    <!-- Feuille de style bootstrap personnalisée -->
    {{-- <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet" /> --}}

    <!-- Feuille de style modèle -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <x-navbar_user />

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">A Propos de <span class="text-success">CarHub</span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="img/pict2.jpg" alt="" />
                    <div class="d-flex align-items-center p-4 mb-4 text-dark">
                        <p>

                            CarHub est une plate-forme de location de voitures en ligne qui fournit des services de haute qualité
                            Pour les clients
                            qui ont besoin d'un véhicule temporaire.En utilisant des technologies avancées et des processus
                            efficace,
                            CarHub
                            facilite le processus de location de voiture pour les clients, en éliminant la complexité et en donnant
                            expérience
                            confortable et fiable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-success ml-n2 mr-4"
                            style="width: 100px; height: 100px; margin-right:20px;">
                            <i class="fa fa-2x fa-check-circle  text-dark "></i>
                        </div>
                        <h4 class="text-uppercase m-0">Confort et commodité</h4>
                    </div>
                    <p class="text-dark  text-justify">
                        CarHub offre une commodité et un confort aux clients dans la location d'une voiture.Via ce site,
                        Les clients peuvent rapidement rechercher la voiture qu'ils souhaitent, vérifier la disponibilité et
                        faire
                        commander avec
                        quelques clics.
                    </p>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-success ml-n2 mr-4"
                            style="width: 100px; height: 100px; margin-right:20px;">
                            <i class="fa fa-2x fa-fast-forward  text-dark"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Un processus de location rapide et sûr</h4>
                    </div>
                    <p class="text-dark text-justify">CarHub promet la rapidité et la sécurité dans le processus
                        de location.
                        Avec seulement quelques documents nécessaires, les clients peuvent facilement terminer le processus
                        inscription
                        et vérification.</p>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-success ml-n2 mr-4"
                            style="width: 100px; height: 100px; margin-right:20px;">
                            <i class="fa fa-2x fa-car text-dark"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Un grand choix de véhicule</h4>
                    </div>
                    <p class="text-dark text-justify">
                        CarHub propose une variété de choix de véhicules, allant de voitures familiales confortables à
                        voiture de luxe
                        élégant.Les clients peuvent choisir une voiture qui convient à leurs besoins, à la fois pour voyager en
                        entreprise
                        ou
                        vacances.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <x-footer_user />
</body>

</html>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>
