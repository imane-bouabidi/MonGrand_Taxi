<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    
        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->file('image')->store('users_images', 'public'),
        ]);
    
        // Assigner le rôle
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
    
        // Événement de création d'utilisateur
        event(new Registered($user));
    
        // Connexion automatique de l'utilisateur après l'enregistrement
        Auth::login($user);
    
        // Création du taxi si l'utilisateur est un chauffeur
        if ($request->has('asChauffeur')) {
            $taxi = taxi::create([
                'immatricule' => $request->immatricule,
                'type_vehicule' => $request->type_vehicule,
                'total_seats' => $request->nbr_seats,
                'prix' => $request->prix,
            ]);
    
            // Création du trajet si nécessaire
            $trajet = trajet::create([
                'ville_dep_id' => $request->Ville_Dep,
                'ville_arr_id' => $request->Ville_Arr,
            ]);
    
            // Création du conducteur
            $driver = driver::create([
                'description' => $request->description, // Assurez-vous que cette donnée est présente dans votre formulaire
                'type_paiement' => $request->type_paiement, // Assurez-vous que cette donnée est présente dans votre formulaire
                'statut' => $request->statut, // Vous pouvez changer cela selon vos besoins
                'user_id' => $user->id,
                'taxi_id' => $taxi->id,
                'trajet_id' => $trajet->id,
            ]);
        }
    
        // Rediriger l'utilisateur vers la page d'accueil après l'enregistrement
        return redirect()->route('home');
    }
    
}
