<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarReturn;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ReturnCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Ajouter une commande liée à une voiture
    public function add_order(Car $car, Request $request)
    {
        // Validation des dates
        $validator = Validator::make($request->all(), [
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after:rent_date'
        ]);

        // Vérification de la validation
        if ($validator->fails()) {
            // Action si la validation échoue
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Récupération de l'ID de l'utilisateur authentifié et de l'ID de la voiture
        $user_id = Auth::id();
        $car_id = $car->id;

        // Calcul du coût de la location en fonction des dates choisies
        $rentDate = new \DateTime($request->rent_date);
        $returnDate = new \DateTime($request->return_date);
        $cost = $returnDate->diff($rentDate)->days * $car->price;

        // Création d'un paiement pour la commande
        $payment = Payment::create([
            'user_id' => $user_id,
            'cost' => $cost
        ]);

        // Création de la commande liée à la voiture, au paiement et aux dates de location
        $order = Order::create([
            'car_id' => $car_id,
            'payment_id' => $payment->id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
        ]);

        // Création d'une entrée dans CarReturn liée à la commande
        CarReturn::create([
            'order_id' => $order->id
        ]);

        // Redirection vers l'affichage de la commande
        return Redirect::route('show_order');
    }

    // Afficher le tableau de bord des commandes pour l'administrateur
    public function dashboard_order()
    {
        $orders = Order::all();
        return view('admin.dashboard_order', compact('orders'));
    }

    // Afficher les commandes de l'utilisateur authentifié
    public function show_order()
    {
        $user_id = Auth::id();
        $orders = Order::whereHas('payment', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('show_order', compact('orders'));
    }

    // Afficher le tableau de bord principal pour l'administrateur
    public function dashboard_home()
    {
        $orders = Order::all();
        return view('admin.dashboard_home', compact('orders'));
    }

    // Afficher les commandes en fonction d'une période spécifique (semaine, mois, année)
    public function dashboard_home_($range)
    {
        $currentDate = now();

        if ($range === 'week') {
            $startDate = $currentDate->startOfWeek()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfWeek()->format('Y-m-d H:i:s');
            $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
        } elseif ($range === 'month') {
            $startDate = $currentDate->startOfMonth()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfMonth()->format('Y-m-d H:i:s');
            $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
        } elseif ($range === 'year') {
            $startDate = $currentDate->startOfYear()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfYear()->format('Y-m-d H:i:s');
            $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
        }

        return view('admin.dashboard_home_', compact('orders'));
    }
}

