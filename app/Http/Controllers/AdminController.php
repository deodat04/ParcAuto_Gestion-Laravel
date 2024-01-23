<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    //! CONTRÔLEUR TABLEAU DE BORD UTILISATEUR
    // Affiche le tableau de bord des utilisateurs pour l'administrateur
    public function dashboard_user()
    {
        $users = User::all();
        return view('admin.dashboard_user', compact('users'));
    }

    // Supprime un utilisateur
    public function delete_user(User $user)
    {
        $user->delete();
        return Redirect::back();
    }


    //! CONTRÔLEUR TABLEAU DE BORD VOITURE
    // Affiche le tableau de bord des voitures pour l'administrateur
    public function dashboard_car()
    {
        $cars = Car::all();
        return view('admin.dashboard_car', compact('cars'));
    }

    // Affiche la vue de création d'une nouvelle voiture
    public function create_car()
    {
        return view('admin.dashboard_create_car');
    }
    // Affiche la vue de création d'un nouvel admin
    public function create_admin()
    {
        return view('admin.dashboard_create_admin');
    }

/**
 * Fonction pour enregistrer une nouvelle voiture dans la base de données
 * en vérifiant les champs obligatoires et en stockant l'image de la voiture dans le système de stockage
 * @param Request $request Les détails de la voiture à enregistrer
 * @return Redirect redirection vers le tableau de bord des voitures
 */
public function store_car(Request $request)
{
    $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'colour' => 'required',
        'plat_num' => 'required',
        'capacity' => 'required',
        'fuel' => 'required',
        'price' => 'required',
        'car_img' => 'required'
    ]);
    $file = $request->file('car_img');
    $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
    Storage::disk('local')->put('public/' . $path, file_get_contents($file));
    Car::create([
        'name' => $request->name,
        'brand' => $request->brand,
        'colour' => $request->colour,
        'plat_num' => $request->plat_num,
        'capacity' => $request->capacity,
        'fuel' => $request->fuel,
        'price' => $request->price,
        'car_img' => $path
    ]);
    return Redirect::route('dashboard_car');
}
/**
 * Fonction pour enregistrer un nouvel admin dans la base de données
 * en vérifiant les champs obligatoires 
 * @param Request $request Les détails de l'admin
 * @return Redirect redirection vers le tableau de bord des utilisateurs
 */
public function store_admin(Request $request)
{

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'age' => ['required', 'integer', 'min:18', 'max:255'],
        'gender' => ['required'],
        'call_num' => ['required'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    //On crée une nouvelle instance de l'utilisateur Admin
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'gender' => $request->gender,
        'call_num' => $request->call_num,
        'password' => Hash::make($request->password),
        'is_admin' => 1,
    ]);
    return Redirect::route('dashboard_user');
}
    // Supprime une voiture de la base de données
    public function delete_car(Car $car)
    {
        $car->delete();
        return Redirect::route('dashboard_car');
    }

    // Affiche la vue de modification d'une voiture spécifique
    public function edit_car(Car $car)
    {
        return view('admin.dashboard_edit_car', compact('car'));
    }

    
    // Met à jour les informations de l'utilisateur
    public function admin_update_user(Request $request, User $user)
    {
        // Récupère l'utilisateur actuellement connecté
    

        // Valide les champs du formulaire
        $request->validate([
            'name' => 'required',
            'call_num' => 'required',
        ]);

        // Met à jour les informations de l'utilisateur
        $user->update([
            'name' => $request->name,
            'call_num' => $request->call_num,
            'is_admin' => $request->is_admin == "on" ? 1 : 0        ]);

        // Redirige l'utilisateur vers la page précédente
        return Redirect::route('dashboard_user');
    }
    public function admin_edit_user(User $user)
    {
        return view('admin.dashboard_edit_user', compact('user'));
    }

    // Met à jour les informations d'une voiture dans la base de données
    public function update_car(Car $car, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'colour' => 'required',
            'plat_num' => 'required',
            'capacity' => 'required',
            'fuel' => 'required',
            'price' => 'required',
           
            // 'car_img' => 'required'
        ]);

        if ($request->hasFile('car_img')) {
            $file = $request->file('car_img');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $path, file_get_contents($file));

            $car->update([
                'car_img' => $path
            ]);
        }

        $car->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'colour' => $request->colour,
            'plat_num' => $request->plat_num,
            'capacity' => $request->capacity,
            'fuel' => $request->fuel,
            'price' => $request->price,
            'dispo' => $request->dispo == "on" ? true : false
            // 'car_img' => $path
        ]);

        return Redirect::route('dashboard_car');
    }
    //! FIN CONTRÔLEUR TABLEAU DE BORD VOITURE
}
