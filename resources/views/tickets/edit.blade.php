<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Modifier le Ticket') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2">
                        @if(url()->previous() == route('tickets.index'))
                        <a href="{{ route('tickets.index') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('tickets.show', $ticket->id))
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('dashboard'))
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('clients.show', $ticket->client_id))
                        <a href="{{ route('clients.show', $ticket->client_id) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @else
                        <!-- Autre lien ou code à afficher si la page précédente ne correspond ni à tickets.index ni à tickets.show -->
                        @endif

                    </div>
                    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="flex flex-col gap-2 items-center w-full" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="description" class="self-start">Description :</label>
                            <textarea name="description" id="description" rows="4" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">{{ $ticket->description }}</textarea>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="client_id" class="self-start">Client :</label>
                            <select name="client_id" id="client_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un client</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ $ticket->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="created_by" class="self-start">Créé par :</label>
                            <select name="created_by" id="created_by" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $ticket->created_by == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="managed_by" class="self-start">Responsable :</label>
                            <select name="managed_by" id="managed_by" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un utilisateur</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $ticket->managed_by == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="status" class="self-start">Statut</label>
                            <select name="status" id="status" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un statut</option>
                                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>En Cours</option>
                                <option value="solved" {{ $ticket->status == 'solved' ? 'selected' : '' }}>Résolu</option>
                                <option value="archived" {{ $ticket->status == 'archived' ? 'selected' : '' }}>Archivé</option>
                            </select>
                        </div>


                        <button type="submit" class="bg-lime-600 w-[50%] self-center py-2 px-6 rounded-[10px] text-white uppercase font-bold mt-4">Modifier</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
