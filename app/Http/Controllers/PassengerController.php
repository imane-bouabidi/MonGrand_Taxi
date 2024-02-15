<?php

namespace App\Http\Controllers;

use App\Models\passager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;


class PassengerController extends Controller
{
    public function book_taxi($id){
        $horaire_driver_id = $id;
        $date = date('Y-m-d H:i:s');
        // $user_id = Auth::user()->id();
        $passenger_id = passager::where('user_id', Auth::id())->toSql();
        dd($passenger_id); 
        // Reservation::create([
        //     'date'=>$date,
        //     'nbr_places'=>1,
        //     'rating'=>0,
        //     'horaire_driver_id'=>$horaire_driver_id,
        //     'passager_id'=>$passenger_id,
        // ]);

        // return redirect()->route('passengerDashboard');
    }
}
