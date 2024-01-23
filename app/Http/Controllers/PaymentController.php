<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Soumet le reçu de paiement
    public function submit_payment_receipt(Order $order, Request $request)
    {
        // Récupère le fichier du reçu de paiement depuis la requête
        $file = $request->file('payment_receipt');

        // Génère un nom de fichier unique basé sur le temps et le nom de l'utilisateur
        $path = time() . '_struk_' . $request->order->payment->user->name . '_.' . $file->getClientOriginalExtension();

        // Stocke le contenu du fichier dans le système de fichiers
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        // Met à jour le chemin du reçu de paiement dans la base de données
        $order->payment->update([
            'payment_receipt' => $path
        ]);

        $order->car->update([
            'dispo' => false
        ]);

        // Redirige l'utilisateur vers la page précédente
        return Redirect::back();
    }

    // Confirme le paiement
    public function confirmPayment(Order $order )
    {
        // Met à jour le statut du paiement à "payé"
        $order->payment->update([
            'is_paid' => true
        ]);
        $order->car->update([
            'dispo' => false
        ]);

        // Redirige l'utilisateur vers la page précédente
        return Redirect::back();
    }
}
