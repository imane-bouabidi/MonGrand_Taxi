<?php

namespace App\Http\Controllers;
use App\Models\reservation;
use App\Models\ville;
use Illuminate\Support\Facades\Auth;
use App\Models\driver;
use App\Models\horaire;
use App\Models\horaire_driver;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $horaires_driver = horaire_driver::whereHas('driver', function ($query) {
            $query->where('statut', 'disponible');
        })->get();
        $villes = ville::all();
        return view("home",compact(['horaires_driver','villes']));
    }
    public function adminDashboard(){
        return view("adminDashboard");
    }
    
    public function afficher_reservations(){
        $reservations = reservation::whereHas('horaire_driver', function ($query) {
            $query->where('driver_id', Auth::id());
        })->toSql();
        dd($reservations);
        // return view("afficher_reservations",compact(['reservations']));
    }

    public function  chauffeurDashboard(){
        $driver = Driver::where('user_id', Auth::id())->first();
        $horaires = Horaire::all();
        return view("chauffeurDashboard",compact(['driver','horaires']));
    }
    public function change_statut_driver(){
        $driver = Driver::where('user_id', Auth::id())->first();
        if($driver->statut == "disponible"){
            $driver->statut = "non disponible";
            $driver->save();
        }else{
            $driver->statut = "disponible";
            $driver->save();
        }
        return redirect()->route('chauffeurDashboard');
    }

    public function add_horaire(Request $request, Horaire $horaire){
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
    
        return view('search', compact(['horaires_driver','villes']));
    }
    
}
