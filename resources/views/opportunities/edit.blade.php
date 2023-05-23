<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Modifier l\'Opportunité') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2">
                        @if(url()->previous() == route('opportunities.index'))
                        <a href="{{ route('opportunities.index') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('dashboard'))
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('clients.index'))
                        <a href="{{ route('clients.index') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @elseif(url()->previous() == route('opportunities.search'))
                        <a href="{{ route('opportunities.search') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @else
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem]"></i>
                        </a>
                        @endif
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-house text-[1rem]"></i>
                        </a>
                    </div>
                    <form action="{{ route('opportunities.update', $opportunity) }}" method="POST" class="flex flex-col gap-2 items-center w-full">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="client_id" class="self-start">Client</label>
                            <select type="text" name="client_id" id="client_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="{{$opportunity->client->id}}">{{$opportunity->client->name}}</option>
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="description" class="self-start">Description :</label>
                            <textarea name="description" id="description" rows="4" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">{{ $opportunity->description }}</textarea>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="managed_by" class="self-start">Responsable</label>
                            <select name="managed_by" id="managed_by" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $opportunity->managed_by == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="status" class="self-start">Statut</label>
                            <select name="status" id="status" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un Statut</option>
                                <option value="accepted" {{ $opportunity->status == 'accepted' ? 'selected' : '' }}>Validée</option>
                                <option value="denied" {{ $opportunity->status == 'denied' ? 'selected' : '' }}>Refusée</option>
                                <option value="solved" {{ $opportunity->status == 'solved' ? 'selected' : '' }}>Effectuée</option>
                                <option value="archived" {{ $opportunity->status == 'archived' ? 'selected' : '' }}>Archivée</option>
                            </select>
                        </div>
                        <div class="flex flex-col items-start w-[50%]">
                            <label for="type" class="self-start">Type</label>
                            <select name="type" id="type" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un Type</option>
                                <option value="material" {{ $opportunity->type == 'material' ? 'selected' : '' }}>Matériel</option>
                                <option value="gestion" {{ $opportunity->type == 'gestion' ? 'selected' : '' }}>Gestion</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-lime-600 w-[50%] self-center py-2 px-6 rounded-[10px] text-white uppercase font-bold mt-4">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
