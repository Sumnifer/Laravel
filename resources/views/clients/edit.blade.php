<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Modifier le Client') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2">
                        @php
                        $previousUrl = url()->previous();
                        @endphp
                        <a href="{{ $previousUrl }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                            Retour
                        </a>

                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-house text-[1rem] mr-1"></i>
                            Dashboard
                        </a>
                    </div>
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="flex flex-col gap-2 items-center w-full">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="name" class="self-start">Nom :</label>
                            <input type="text" name="name" id="name" value="{{ $client->name }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="email" class="self-start">Email :</label>
                            <input type="email" name="email" id="email" value="{{ $client->email }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="address" class="self-start">Adresse :</label>
                            <input type="text" name="address" id="address" value="{{ $client->address }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="postalCode" class="self-start">Code postal :</label>
                            <input type="number" name="postalCode" id="postalCode" value="{{ $client->postalCode }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="city" class="self-start">Ville :</label>
                            <input type="text" name="city" id="city" value="{{ $client->city }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="phone" class="self-start">Téléphone :</label>
                            <input type="number" name="phone" id="phone" value="{{ $client->phone }}" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="contract" class="self-start">Contrat :</label>
                            <select name="contract" id="contract" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="0" @if($client->contract == 0) selected @endif>Non</option>
                                <option value="1" @if($client->contract == 1) selected @endif>Oui</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-lime-600 w-[50%] self-center py-2 px-6 rounded-[10px] text-white uppercase font-bold mt-4">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
