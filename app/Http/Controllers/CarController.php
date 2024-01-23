<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    // Affiche toutes les voitures disponibles
    public function index_car()
    {
        //variable contenant les voitures du model Car où le champs "disponible" est egale = 1
        // $cars= Car::where('dispo', '=',true)->get();
        $cars = Car::all();
        return view('index_car', compact('cars'));
    }

    // Affiche les détails d'une voiture spécifique
    public function show_car(Car $car)
    {
        return view('show_car', compact('car'));
    }

}
