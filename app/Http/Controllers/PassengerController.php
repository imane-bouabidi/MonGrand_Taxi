<?php

namespace App\Http\Controllers;

use App\Models\Passager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;


class PassengerController extends Controller
{

    public function passengerDashboard(){
        $passager = Passager::where('user_id', Auth::id())->first();
        $reservations = $passager->reservations()->get();
        return view("passengerDashboard",compact('reservations'));
    }

    public function book_taxi($id){
        $horaire_driver_id = $id;
        $date = date('Y-m-d H:i:s');
        // $user_id = Auth::user()->id();
        $passenger_id = passager::where('user_id', Auth::id())->first();
        Reservation::create([
            'date'=>$date,
            'nbr_places'=>1,
            'rating'=>0,
            'horaire_driver_id'=>$horaire_driver_id,
            'passager_id'=>$passenger_id->id,
            'cancelled'=>0,
        ]);

        return redirect()->route('passengerDashboard');
    }
    public function annuler_reser($id){
        $reservation = Reservation::find($id);
        $reservation->cancelled = 1;
        $reservation->save();
        return redirect()->route('passengerDashboard');
    }
}
