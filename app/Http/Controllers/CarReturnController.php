<?php

namespace App\Http\Controllers;

use App\Models\CarReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarReturnController extends Controller
{
    // Affiche le tableau de bord des retours de voiture pour l'administrateur
    public function dashboard_return()
    {
        $CarReturns = CarReturn::all();
        return view('admin.dashboard_return', compact('CarReturns'));
    }

    // Affiche la page de modification de validation du retour de voiture pour l'administrateur
    public function edit_validate_car(CarReturn $CarReturn)
    {
        return view('admin.dashboard_edit_return', compact('CarReturn'));
    }

    // Met à jour les informations sur le retour de voiture après validation par l'administrateur
    public function update_return(CarReturn $CarReturn, Request $request)
    {
        $request->validate([
            'date_of_return' => 'required',
            'fines' => 'required|min:0',
        ]);

        $CarReturn->update([
            'date_of_return' => $request->date_of_return,
            'fines' => $request->fines,
            'validate_admin' => true,
        ]);

        $CarReturn->order->car->update(
            [
                'dispo' => true
                ],
            );

        return Redirect::route('dashboard_return');
    }
}
