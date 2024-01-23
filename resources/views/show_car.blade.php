<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarHub</title>
    <link rel="icon" href="{{ asset('user/img/logo.png') }}" sizes="50">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
</head>

<body>
    <x-navbar_user />

    <!-- DETAIL -->
    <div class="container-fluid">
        <div class="card border-0 shadow-lg rounded pb-4">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ url('Storage/' . $car->car_img) }}" class="w-100">
                </div>
                <div class="col-lg-6 mt-4 ps-3 d-flex flex-column justify-content-around">
                    <div class="row px-3">
                        <h1 class="fw-bold">{{ $car->brand }}{{ $car->name }}</h1>
                        <p class="fs-3 fw-semibold">FCFA {{ $car->price }}/day</p>
                    </div>
                    <form action="{{ route('add_order', $car) }}" method="post" class="">
                        @csrf
                        <div class="row px-3">
                            <div class="date-input mb-3">
                                <label for="dateFirst" class="fs-4 fw-semibold mb-1" style="color: #0d7c5d;">Date
                                    Emprunt</label>
                                <input type="date" name="rent_date" class="form-control" id="dateFirst">
                            </div>
                            <div class="date-input">
                                <label for="dateFirst" class="fs-4 fw-semibold mb-1" style="color: #0d7c5d;">Date
                                    Retour</label>
                                <input type="date" name="return_date" class="form-control" id="dateFirst">
                            </div>
                        </div>
                        <div class="detail-btn ms-3 pt-3">
                            <button class="btn btn-rent" type="submit">Louer maintenant</button>
                        </div>
                    </form>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p style="color: red; margin-left:20px;">La date de prêt doit être antérieure à la date
                                retour</p>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <div class="card border-0 shadow-lg rounded mt-5">
            <h5 class="ms-3 mt-4 text-center">Fiche du produit</h5>
            <hr>
            <div class="detail-product row text-center">
                <div class="col-lg-3 col-6">
                    <p class="mb-1">Marque</p>
                    <p>{{ $car->brand }}</p>
                </div>
                <div class="col-lg-3 col-6">
                    <p class="mb-1">Type</p>
                    <p> {{ $car->name }}</p>
                </div>
                <div class="col-lg-3 col-6">
                    <p class="mb-1">Numero immatriculation</p>
                    <p>{{ $car->plat_num }}</p>
                </div>
                <div class="col-lg-3 col-6">
                    <p class="mb-1">Année</p>
                    <p>2023</p>
                </div>
            </div>
            <hr>
            <div class="detail-desc mt-2">
                <h3 class="fs-3 fw-semibold ms-5">Description</h3>
                <p class="fs-6 text-secondary px-5 py-4">Cette voiture offre une variété de fonctionnalités possibles
                    Une expérience de conduite confortable, sûre et sophistiquée.Avec un design moderne et
                    Aérodynamique, cette voiture a les caractéristiques suivantes: <br>
                    1. Haute performance: la voiture est équipée d'un moteur haut de gamme qui offre une accélération et une
                    vitesse maximale impressionnantes.Le système de direction réactif est également disponible avec une
                    précision et un contrôle stable. <br>
                   2. Connectivité numérique: avec le dernier système d'infodivertissement, cette voiture fournit une
                    Connectivité numérique extraordinaire.Les conducteurs et les passagers peuvent être connectés à un smartphone
                    , accéder aux applications, écoutez de la musique ou utiliser facilement la navigation via l'écran
                    Touch intuitif. <br>
                  3. Sécurité de haut niveau: fonctionnalités de sécurité avancées telles que les systèmes de freinage antiblocage, les superviseurs
                     d'angles morts, les caméras arrières et les capteurs de stationnement aident à réduire le risque d'accidents.Cette voiture est aussi
                    équipée de coussins gonflables (airbags) et de systèmes de freinage d'urgence qui optimisent la 
                    protection des passagers.<br>
                    4. Caractéristique de confort: avec un fauteuil confortable et un réglage électrique, le conducteur peut trouver une
                    position idéale.Autres fonctionnalités telles que la climatisation automatique, le chauffage des sièges, le système audio
                    La clime et le contrôle de la température de la double zone assurent un confort maximal pour votre trajet.<br>
                   5. Efficacité énergétique: cette voiture est équipée d'une technologie qui optimise l'efficacité des matériaux
                    GRILD, comme un système hybride ou un moteur respectueux de l'environnement.Cela aide à réduire la consommation de carburants et l'émission de gaz à effet de serre.<br>
                    6. Conception innovante: la conception extérieure de cette voiture se démarque avec des lignes aérodynamiques élégantes
                    et des détails charmants.Un intérieur grand et polyvalent offre suffisamment d'espace pour
                    passagers et bagages.<br>
                    Cette voiture est une manifestation des progrès de la technologie automobile qui unit de haute performance,
                    sécurité, confort, efficacité et beauté dans un ensemble incroyable </p>
            </div>
        </div>
    </div>
    <!-- DETAIL END -->
    <x-footer_user />



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    < </body>

</html>
