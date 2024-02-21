<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\driver;
use App\Models\horaire;
use App\Models\horaire_driver;

use Illuminate\Http\Request;

class chauffeurController extends Controller
{
    public function historique_driver()
    {
        $horaires_driver = horaire_driver::whereHas('driver', function ($query){
            $query->where('user_id', Auth::id());
        })->get();
        $averageRatings = [];
        foreach ($horaires_driver as $horaire_driver) {
            $ratings = $horaire_driver->reservation->pluck('rating');
            $averageRating = $ratings->avg();
            $averageRatings[] = $averageRating;
        }
        $totalAverageRating = collect($averageRatings)->avg();
        return view("historique_driver",compact(['horaires_driver','totalAverageRating']));
    }

    public function afficher_reservations()
    {
        $reservations = Reservation::join('horaire_driver', 'reservation.horaire_driver_id', '=', 'horaire_driver.id')
            ->join('driver', 'horaire_driver.driver_id', '=', 'driver.id')
            ->where('driver.statut', 'disponible')
            ->get();

        // dd($reservations);
        // $driver = driver::where('user_id',Auth::id())->first();
        // $horaires_driver = $driver->horaire_driver;
        return view("afficher_reservations",compact(['reservations']));
    }

    public function chauffeurDashboard()
    {
        $driver = Driver::where('user_id', Auth::id())->first();
        $horaires = Horaire::all();
        return view("chauffeurDashboard", compact(['driver', 'horaires']));
    }
    public function change_statut_driver()
    {
        $driver = Driver::where('user_id', Auth::id())->first();
        if ($driver->statut == "disponible") {
            $driver->statut = "non disponible";
            $driver->save();
        } else {
            $driver->statut = "disponible";
            $driver->save();
        }
        return redirect()->route('chauffeurDashboard');
    }

    public function add_horaire(Request $request, Horaire $horaire)
    {
        $userId = Auth::id();
        $driver = Driver::where('user_id', $userId)->first();
        $driverId = $driver->id;

        horaire_driver::create([
            'driver_id' => $driverId,
            'horaire_id' => $horaire->id,
            'statut' => 'en attente',
        ]);
        return redirect()->route('chauffeurDashboard');
    }

}
