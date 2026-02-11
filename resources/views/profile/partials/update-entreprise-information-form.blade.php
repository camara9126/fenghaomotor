<?php

    use App\Models\Entreprise;

    $entreprise = Entreprise::where('id', request()->user()->entreprise_id)->get();
?>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Information Entreprise') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Mettez à jour les informations de votre entreprise, vos coordonnées et votre adresse.") }}
            </p>
        </header>

        @foreach($entreprise as $entreprise)
        <form method="post" action="{{ route('entreprise.update', $entreprise) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <input type="hidden" name="pack_id" value="{{$entreprise->pack_id}}">
            <div>
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" name="nom" readOnly type="text" class="mt-1 block w-full" :value="old('nom', $entreprise->nom)" required autofocus autocomplete="nom" />
                <x-input-error class="mt-2" :messages="$errors->get('nom')" />
            </div>

            <div>
                <x-input-label for="telephone" :value="__('Telephone')" />
                <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $entreprise->telephone)" required autocomplete="telephone" />
                <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
            </div>

            <div>
                <x-input-label for="adresse" :value="__('Adresse')" />
                <x-text-input id="" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $entreprise->adresse)" autofocus autocomplete="adresse" />
                <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
            </div>

            <div>
                <x-input-label for="taux_tva" :value="__('TVA')" />
                <x-text-input id="" name="taux_tva" type="number" class="mt-1 block w-full" :value="old('taux_tva', $entreprise->taux_tva)" autofocus autocomplete="taux_tva" />
                <x-input-error class="mt-2" :messages="$errors->get('taux_tva')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Enregister') }}</x-primary-button>

                @if (session('status') === 'entreprise-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('enregistrée.') }}</p>
                @endif
            </div>
        </form>
        @endforeach
    </section>