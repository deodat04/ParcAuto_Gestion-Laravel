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

    <title>Editer Utilisateur</title>
    <style>
         /* La couleur d'arrière-plan du bouton lorsqu'il est en état ouvert */
         .accordion-button:not(.collapsed) {
            background-color: #0d7c5d;
        }

        /*La couleur du texte "Modifier votre compte" lorsque l'accordéon est ouvert */
        .accordion-button:not(.collapsed) h5 {
            color: white;
        }

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
                <h1>Editer Utilisateur</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('dashboard_user') }}">Utilisateur</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Editer compte</h3>

                </div>
                <form method="post"  action="{{ route('admin_update_user', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                    <div class="mb-3">
                                    <label for="" class="form-label">Nom</label>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Numéro de téléphone</label>
                                    <input type="number" name="call_num" value="{{ $user->call_num }}"
                                        class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <!-- Label for isAdmin -->
                                    <label class="form-check" for="is_Admin">
                                        Administrateur
                                        </label>
                                        <!-- Checkbox isAdmin -->
                                        <input class="form-control" type="checkbox" id="is_admin" name="is_admin"  {{ $user->is_admin== 1 ? 'checked' : "" }} />
                </div>

                <button type="submit" class="btn btn-success">Soumettre</button>
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
