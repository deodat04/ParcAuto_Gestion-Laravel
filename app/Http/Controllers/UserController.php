<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // Constructeur de la classe UserController
    public function __construct()
    {
        // Applique le middleware 'auth' à toutes les méthodes de cette classe
        $this->middleware('auth');
    }

    // Affiche le tableau de bord des utilisateurs
    public function dashboard_user()
    {
        // Récupère tous les utilisateurs depuis la base de données
        $users = User::all();
        // Retourne la vue 'admin.dashboard_user' avec les utilisateurs
        return view('admin.dashboard_user', compact('users'));
    }

    // Affiche la page d'accueil de l'utilisateur connecté
    public function index_user()
    {
        // Récupère l'utilisateur actuellement connecté
        $user = Auth::user();
        // Retourne la vue 'index_user' avec l'utilisateur
        return view('index_user', compact('user'));
    }

    // Met à jour les informations de l'utilisateur
    public function edit_user(Request $request)
    {
        // Récupère l'utilisateur actuellement connecté
        $user = Auth::user();

        // Valide les champs du formulaire
        $request->validate([
            'name' => 'required',
            'call_num' => 'required',
            'password' => 'required|min:8',
        ]);

        // Met à jour les informations de l'utilisateur
        $user->update([
            'name' => $request->name,
            'call_num' => $request->call_num,
            'password' => Hash::make($request->password)
        ]);

        // Redirige l'utilisateur vers la page précédente
        return Redirect::back();
    }
}
