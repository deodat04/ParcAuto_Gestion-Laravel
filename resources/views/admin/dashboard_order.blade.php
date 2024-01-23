<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('user/img/logo.png') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">

    <title>Dashboard Réservation</title>
    <style>
        .order {
            margin: 0 auto;
            width: 500px;
            border: 1px solid #ccc;
            padding: 1rem;
        }

        .head {
            background-color: #f9f9f9;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }

        .container {
            padding: 0.5rem;
        }

        p {
            margin-bottom: 0.5rem;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
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
                <h1>Réservation</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard_order') }}">Reservations</a>
                    </li>
                </ul>
            </div>
            <div>
                <p>

                     Veuillez garder ce message à l'esprit et effectuer chaque jour un inventaire des véhicules disponibles!<br><br>

                    Après validation d'un paiement, le véhicule concerné est automatiquement rendu indisponible!<br>
                    Si la date de Réservationne correspond à la date du jour et le véhicule est disponible avant la date de réservation,<br>
                    Rendez-vous dans le dashnoard pour marquer le véhicule concerné comme disponible si vous le souhaitez. Mais cela n'est pas conseillé car
                    des utilisateurs pourraient réserver pour une même période! 
                    
                </p>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Liste des Réservations</h3>

                </div>
                <hr>
                @foreach ($orders as $order)
                    <div class="container">
                        <h4>ID Reservation: {{ $order->id }}</h4>
                        <p>ID Utilisateur : {{ $order->payment->user_id }}</p>
                        <p>Nom Client : {{ $order->payment->user->name }}</p>
                        <p>Paiement total : {{ $order->payment->cost }}</p>
                        <p>Véhivule : {{ $order->car->brand }} {{ $order->car->name }}</p>
                        @if ($order->payment->is_paid)
                            <p>Déjà payé</p>
                        @else
                            <p>Pas encore payé</p>
                        @endif

                        <p>Date de location: {{ $order->rent_date }}</p>
                        {{-- <p> Date de retour:{{ $order->return_date }}</p>  --}}
                        Preuve de paiement:
                        @if ($order->payment->payment_receipt == null)
                           Pas de paiement
                        @else
                            <a href="{{ url('storage/' . $order->payment->payment_receipt) }}">Télécharger la preuve de paiement</a>
                            @if ($order->payment->is_paid == true)
                                <p>Le paiement est effectué</p>
                            @else
                                <form action="{{ route('confirmPayment', $order) }}" method="post">

                                    @csrf
                                    <button type="submit">Confirmer le paiement</button>
                                </form>
                            @endif
                        @endif

                        <hr>
                    </div>
                @endforeach
            </div>

        </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('admin/assets/script.js') }}"></script>
</body>

</html>
