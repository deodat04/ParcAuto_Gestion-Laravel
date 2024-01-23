<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarHub</title>
    <link rel="icon" href="{{ asset('user/img/logo.png') }}" sizes="100">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
</head>

<body>
    <x-navbar_user />

    <!-- CAROUSEL -->

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('user/img/slider4.png') }}" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('user/img/slider5.png') }}" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('user/img/slider3.png') }}" class="d-block w-100 img-fluid" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Precedant</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
    <!-- CAROUSEL END -->

    <!-- RENT -->
    <div class="rent container-lg mt-5">
        <h2 style= "font-weight: bold">Recommendations</h2>

            <div class="row mt-4">
                @foreach ($cars as $car)
                <div class="col-lg-4 col-sm-6 mt-4">
                    <div class="card border-0 shadow-lg">
                        <img src="{{ asset('storage/' . $car->car_img) }}" class="card-img-top" alt="...">
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
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 text-center">
                    <a href="{{ route('index_car') }}"
                        class="btn btn-primary bg-primary-blue text-white rounded-full mt-2">
                        Explorer nos voitures
                    </a>
                </div>
            </div>
    </div>
    <!-- RENT END -->
    <x-footer_user />
    <script>
        docntListener('DOMContentLoaded', function () {
            var carouselExample = document.getElementById('carouselExample');
            var carousel = new bootstrap.Carousel(carouselExample, {
                interval: 5000
            });

            setInterval(function () {
                carousel.next();
            }, 5000);
        });
    </script>



    <script src="{{ asset('user/js/script.js') }} }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>