<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('user/img/logo.png') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">

    <title>Editer Vehicule</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <x-sidebar-admin />
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Editer Véhicule</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard_car') }}">Véhicule</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Editer voiture</h3>

                </div>
                <form method="post" action="{{ route('update_car', $car) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Nom : </label>
                        <input class="form-control" type="text"name="name"value="{{ $car->name }}" />
                        <label>Marque : </label>
                        <input class="form-control" type="text"name="brand"value="{{ $car->brand }}" />
                        <label>Couleur : </label>
                        <input class="form-control" type="text"name="colour" value="{{ $car->colour }}" />
                        <label>Plaque d'immatriculation : </label>
                        <input class="form-control" type="text"name="plat_num"value="{{ $car->plat_num }}" />
                        <label>Capacité : </label>
                        <input class="form-control"type="number" name="capacity" value="{{ $car->capacity }}" />
                        <label>Carburant : </label>
                        <input class="form-control" type="text"name="fuel"value="{{ $car->fuel }}" />
                        <label>Prix ​​/ jour : </label>
                        <input class="form-control"type="number" name="price" value="{{ $car->price }}" />
                        <!-- Label disponibilité -->
                        <label for="dispo">Disponible ?&nbsp;: &nbsp;</label>
                        <input id="dispo" type="checkbox" name="dispo" {{ $car->dispo ? 'checked' : ''}} />
                        <input type="file" name="car_img">
                        <br>
                        <button class="btn btn-success" type="submit">Valider</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('admin/assets/script.js') }}"></script>
</body>

</html>
