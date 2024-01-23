<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    // Affiche un PDF avec un simple contenu HTML
    public function view_pdf(Request $request)
    {
        // Charge un contenu HTML dans le PDF
        $pdf = PDF::loadHtml('<h1>Essayez de tester les fichiers</h1>');

        // Retourne le PDF en streaming
        return $pdf->stream();
    }

    // Génère un reçu de paiement pour l'utilisateur connecté
    public function preuve_paiement()
    {
        // Récupère l'ID de l'utilisateur actuellement connecté
        $user_id = Auth::id();

        // Récupère les commandes associées au paiement de l'utilisateur
        $orders = Order::whereHas('payment', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        // Chemin vers l'image du logo
        $imagePath = public_path('user/img/logo.png');

        // Génère le PDF avec la vue 'pdf.preuve_paiement'
        $pdf = PDF::loadView('pdf.preuve_paiement', compact('orders', 'imagePath'));

        // Retourne le PDF en streaming
        return $pdf->stream();
    }

    // Génère un état financier pour une période donnée (semaine, mois, année)
    public function etat_financiers($range)
    {
        // Date actuelle
        $currentDate = now();

        // Détermine la période de recherche en fonction de la valeur de $range
        if ($range === 'week') {
            $startDate = $currentDate->startOfWeek()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfWeek()->format('Y-m-d H:i:s');
        } elseif ($range === 'month') {
            $startDate = $currentDate->startOfMonth()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfMonth()->format('Y-m-d H:i:s');
        } elseif ($range === 'year') {
            $startDate = $currentDate->startOfYear()->format('Y-m-d H:i:s');
            $endDate = $currentDate->endOfYear()->format('Y-m-d H:i:s');
        }

        // Récupère les commandes dans la période spécifiée
        $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();

        // Chemin vers l'image du logo
        $imagePath = public_path('user/img/logo.png');

        // Génère le PDF avec la vue 'pdf.etat_financiers'
        $pdf = PDF::loadView('pdf.etat_financiers', compact('orders', 'imagePath'));

        // Retourne le PDF en streaming
        return $pdf->stream();
    }
}
