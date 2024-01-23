<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Crée une nouvelle instance du contrôleur.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Affiche le tableau de bord de l'application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('welcome');
    // }

    // Affiche la page d'accueil avec les 6 premières voitures
    public function index()
    {
        $cars = Car::take(6)->get();
        return view('welcome', compact('cars'));
    }

    // Affiche la page de contact
    public function contact()
    {
        return view('contact');
    }

    // Affiche la page "À propos"
    public function about()
    {
        return view('about');
    }

    // Affiche la page FAQ (foire aux questions)
    public function faq()
    {
        return view('faq');
    }
}
