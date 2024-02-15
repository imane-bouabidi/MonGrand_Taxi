<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Photo profile -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Photo Profile')" />

            <x-text-input id="image" class="block mt-1 w-full" type="file"
                name="image" required />

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Register as driver -->
        <div class="mt-4">
            <label for="asChauffeur" class="inline-flex items-center">
                <input id="asChauffeur" type="checkbox" class="form-checkbox" name="asChauffeur">
                <span class="ml-2">{{ __('Register as driver') }}</span>
            </label>
        </div>
        <br><br>
        <!-- Chauffeur Fields -->
        <div class="mt-4 chauffeur-fields" style="display: none;">
            <h2>Informations sur vous :</h2>

            <x-input-label for="description" :value="__('Description')" />

            <textarea id="description" class="block mt-1 w-full" name="description"></textarea>

            <x-input-error :messages="$errors->get('description')" class="mt-2" />




            <!-- type de paiement -->
            <div class="mt-4">
                <x-input-label for="type_paiement" :value="__('Type de paiement')" />
                <select id="type_paiement" class="block mt-1 w-full" name="type_paiement">
                    <option value="cash">Cash</option>
                    <option value="virement">Virement</option>
                </select>
                <x-input-error :messages="$errors->get('type_paiement')" class="mt-2" />
            </div>

            <!-- statut -->
            <div class="mt-4">
                <x-input-label for="statut" :value="__('Statut')" />
                <select id="statut" class="block mt-1 w-full" name="statut">
                    <option value="disponible">Disponible</option>
                    <option value="non disponible">Non disponible</option>
                </select>
                <x-input-error :messages="$errors->get('statut')" class="mt-2" />
            </div>

            <br><br>

            <p>Informations sur votre taxi :</p>
            <x-input-label for="immatricule" :value="__('immatricule')" />

            <x-text-input id="immatricule" class="block mt-1 w-full" type="text" name="immatricule" />

            <x-input-error :messages="$errors->get('immatricule')" class="mt-2" />

            <x-input-label for="type_vehicule" :value="__('type de vehicule')" />

            <x-text-input id="type_vehicule" class="block mt-1 w-full" type="text" name="type_vehicule" />

            <x-input-error :messages="$errors->get('type_vehicule')" class="mt-2" />

            <x-input-label for="nbr_seats" :value="__('nombre de places')" />

            <x-text-input id="nbr_seats" class="block mt-1 w-full" type="number" name="nbr_seats" />

            <x-input-error :messages="$errors->get('nbr_seats')" class="mt-2" />
            <br><br>
            <p>Choisissez votre trajet :</p>
            <h3>Ville depart</h3>
            <div class="mt-4">
                <select name="Ville_Dep" id="Ville_Dep">
                    @foreach ($villesDATA as $ville)
                        <option value="{{ $ville->id }}">
                            {{ $ville->ville_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <h3>Ville arrivée</h3>
            <div class="mt-4">
                <select name="Ville_Arr" id="Ville_Arr">
                    @foreach ($villesDATA as $ville)
                        <option value="{{ $ville->id }} ">
                            {{ $ville->ville_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label for="prix" :value="__('Prix par place')" />

                <x-text-input id="prix" class="block mt-1 w-full" type="text" name="prix" />

                <x-input-error :messages="$errors->get('prix')" class="mt-2" />
            </div>

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var asChauffeurCheckbox = document.getElementById('asChauffeur');
            var chauffeurFieldsDiv = document.querySelector('.chauffeur-fields');

            asChauffeurCheckbox.addEventListener('change', function() {
                if (asChauffeurCheckbox.checked) {
                    chauffeurFieldsDiv.style.display = 'block';
                } else {
                    chauffeurFieldsDiv.style.display = 'none';
                }
            });
        });
    </script>
</x-guest-layout>
