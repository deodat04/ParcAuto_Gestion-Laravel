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

    <!-- HERO -->
    <div class="hero">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <br>
                    <h1 class="hero__title" style="margin-left: 20px">
                        Consulter une game de voiture de tout genre avec CarHub !
                    </h1>
                    <p class="hero__subtitle" style="margin-left: 20px">
                        Simplifiez votre expérience de location de voiture avec notre processus de réservation sans
                        effort!
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hero__image-container ">
                    <div class="hero__image">
                        <img src="{{ asset('user/img/hero.png') }}" alt="hero" class="img-fluid" />
                    </div>
                    <div class="hero__image-overlay"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- RENT -->
    <div class="rent container-lg mt-0 riwayat-body">
        <h1 style= "font-weight: bold">Nos Véhicules</h1>
            <div class="row mt-1">
                @foreach ($cars as $car)
                <div class="col-lg-4 col-sm-6 mt-4">
                    <div class="card border-0 shadow-lg">
                        <img src="{{ url('storage/' . $car->car_img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="rent-merk">{{ $car->brand }}</p>
                        </div>
                        <p class="rent-price fw-semibold d-flex justify-content-center" style="color : red">{{
                            $car->price }}FCFA/jour</p>

                        @if ($car->dispo)
                        <form action="{{ route('show_car', $car) }}" method="get">
                            <button type="submit"
                                class="btn btn-rent border-0 rounded-0 rounded-bottom p-2 fw-semibold w-100">
                                Louer Maintenant
                            </button>
                        </form>
                        @else
                        <p class="fw-bold text-danger text-center mt-3">Ce véhicule n'est actuellement pas disponible
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
    </div>
    <!-- RENT END -->

    <x-footer_user />

    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>