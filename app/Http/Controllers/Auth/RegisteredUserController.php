<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\passager;
use App\Models\User;
use App\Models\ville;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Taxi;
use App\Models\Trajet;
use App\Models\driver;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $villesDATA = ville::all();
        return view('auth.register',compact('villesDATA'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required','max:2048','mimes:jpeg,png,jpg,gif,svg'],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->file('image')->store('users_images', 'public'),
        ]);
    
        if ($request->has('asChauffeur')){
            $role ='chauffeur';
            $permissionNom ='chauffeurPermission';
        }else{
            $role ='user';
            $permissionNom ='userPermission';
        }
    
        $userRole = Role::firstOrCreate(['name' => $role]);
        $user->assignRole($userRole);
    
        if (!Permission::where('name', $permissionNom)->exists()) {
            $permission = Permission::create(['name' => $permissionNom]);
            $userRole->givePermissionTo($permission);
        }
    
        event(new Registered($user));
    
        Auth::login($user);
    
        if ($request->has('asChauffeur')) {
            $taxi = taxi::create([
                'immatricule' => $request->immatricule,
                'type_vehicule' => $request->type_vehicule,
                'total_seats' => $request->nbr_seats,
                'prix' => $request->prix,
            ]);
    
            $trajet = trajet::create([
                'ville_dep_id' => $request->Ville_Dep,
                'ville_arr_id' => $request->Ville_Arr,
            ]);
    
            driver::create([
                'description' => $request->description, 
                'type_paiement' => $request->type_paiement, 
                'statut' => $request->statut, 
                'user_id' => $user->id,
                'taxi_id' => $taxi->id,
                'trajet_id' => $trajet->id,
            ]);
        }else{
            passager::create([
                'user_id' => $user->id,
            ]);
        }
    
        return redirect()->route('home');
    }
    
}
