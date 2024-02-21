<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\ville;
use Illuminate\Support\Facades\Auth;
use App\Models\driver;
use App\Models\horaire;
use App\Models\passager;
use App\Models\horaire_driver;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $horaires_driver = horaire_driver::whereHas('driver', function ($query) {
            $query->where('statut', 'disponible');
        })->get();
        $villes = ville::all();
        return view("home", compact(['horaires_driver', 'villes']));
    }
    public function adminDashboard()
    {
        $totalScheduledRides = horaire::count();
        $totalReservations = Reservation::count();

        $totalDrivers = Driver::count();
        $activeDrivers = Driver::where('statut', 'active')->count();

        $totalPassengers = Passager::count();
        return view('adminDashboard', compact('totalScheduledRides', 'totalReservations', 'totalDrivers', 'activeDrivers', 'totalPassengers'));
    }

    public function statistiques()
    {
        


    }

    public function search(Request $request)
    {
        $villes = ville::all();
        $startDest = $request->input('start-dest');
        $endDest = $request->input('end-dest');
        $rideTime = $request->input('ride-time');

        $horaires_driver = horaire_driver::whereHas('driver.trajet.depart', function ($query) use ($startDest) {
            $query->where('ville_name', 'LIKE', '%' . $startDest . '%');
        })
            ->whereHas('driver.trajet.arrivee', function ($query) use ($endDest) {
                $query->where('ville_name', 'LIKE', '%' . $endDest . '%');
            })
            ->whereHas('horaire', function ($query) use ($rideTime) {
                $query->where('date', 'LIKE', '%' . $rideTime . '%');
            })
            ->get();

        return view('search', compact(['horaires_driver', 'villes']));
    }

}
