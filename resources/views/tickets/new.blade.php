<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Nouveau Ticket') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2">
                        @if(url()->previous() == route('tickets.index'))
                            <a href="{{ route('tickets.index') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                                Retour
                            </a>
                            <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <i class="fa-solid fa-house text-[1rem] mr-1"></i>
                                Retour
                            </a>
                        @elseif(url()->previous() == route('dashboard'))
                            <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                                Retour
                            </a>
                        @elseif(url()->previous() == route('clients.show', $selectedClient))
                        <a href="{{ route('clients.show', $selectedClient) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                            Retour
                        </a>
                        @else
                        @endif
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-house text-[1rem] mr-1"></i>
                            Dashboard
                        </a>
                    </div>
                    <form action="{{ route('tickets.store') }}" method="POST" class="flex flex-col gap-2 items-center w-full" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="description" class="self-start">Description :</label>
                            <textarea name="description" id="description" rows="4" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">{{ old('description') }}</textarea>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="client_id" class="self-start">Client :</label>
                            <select name="client_id" id="client_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="{{ $selectedClient->id }}">{{ $selectedClient->name }}</option>
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="created_by" class="self-start">Créé par :</label>
                            <select name="created_by" id="created_by" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="managed_by" class="self-start">Responsable</label>
                            <select name="managed_by" id="managed_by" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="status" class="self-start">Statut</label>
                            <select name="status" id="status" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un statut</option>
                                <option value="Non Traité">Non Traité</option>
                                <option value="En Cours">En Cours</option>
                                <option value="Résolu">Résolu</option>
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="attachment" class="self-start">Pièce jointe :</label>
                            <input type="file" name="attachment" id="attachment" class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <button type="submit" class="bg-lime-600 w-[50%] self-center py-2 px-6 rounded-[10px] text-white uppercase font-bold mt-4">Créer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
