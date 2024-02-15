<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\driver;
use App\Models\horaire;
use App\Models\horaire_driver;

use Illuminate\Http\Request;

class homeController extends Controller
{

    // public function search()
    // {
    //     $search = $_GET['query'];
    //     $drivers = driver::where('title','LIKE','%'.$search.'%')->orwhere('description','LIKE','%'.$search.'%')->get();
    //     return view('recipe_book.search', compact('recipes'));
    // }

    public function index(){
        $horaires_driver = horaire_driver::all();
        return view("home",compact('horaires_driver'));
    }
    public function adminDashboard(){
        return view("adminDashboard");
    }
    public function passengerDashboard(){
        return view("passengerDashboard");
    }

    public function chauffeurDashboard(){
        $driver = Driver::where('user_id', Auth::id())->first();
        $horaires = Horaire::all();
        return view("chauffeurDashboard",compact(['driver','horaires']));
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
}
