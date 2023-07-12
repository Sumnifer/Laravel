<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Clients') }}
        </h2>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <div class="flex gap-2">
                            <details class="relative bg-red w-60 ">
                                <summary class="bg-lime-600 px-4 py-2 text-white rounded-md focus:rounded-b-none active:rounded-b-none">Filtres</summary>
                                <div class="absolute flex flex-col w-full bg-lime-600 p-4 rounded-b-md">
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1"><label for="test1" >test1qjsdqksjdkqjsdkjqsbdkjqbsdkbqd</label></div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1"><label for="test1" >test1</label></div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1"><label for="test1" >test1</label></div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1"><label for="test1" >test1</label></div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1"><label for="test1" >test1</label></div>
                                </div>
                            </details>
                            <form action="{{ route('clients.index') }}" method="GET" class="flex items-center">
                                <input type="text" name="search" placeholder="Rechercher un client..." class="border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600 px-4 py-2 rounded-l-md">
                                <button type="submit" class="h-full bg-lime-600 text-white px-4 py-2 rounded-r-md border-lime-600"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div>
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('clients.create') }}" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Nouveau <i class="fa-solid fa-plus text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Excel <i class="fa-solid fa-file-excel text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Copie <i class="fa-solid fa-copy text-[1rem]"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="w-full">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Téléphone
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    Adresse
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    Contrat
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($clients as $client)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('clients.show', $client) }}" class="text-lime-600 uppercase">
                                        {{ $client->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $client->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    {{ $client->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    {{ $client->address }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    @if($client->contract == 1)
                                    <i class="fa-solid fa-badge-check text-green-500 text-[1.2rem]"></i>
                                    @else
                                    <i class="fa-solid fa-badge text-red-500 text-[1.2rem]"></i>

                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    <a href="{{ route('clients.edit', $client) }}" class="text-lime-600 mr-2">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('tickets.new', $client) }}" class="text-lime-600 mr-2">
                                        <i class="fa-solid fa-ticket"></i>
                                    </a>
                                    <a href="{{ route('interventions.new', $client) }}" class="text-lime-600 mr-2">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </a>
                                    <a href="{{ route('opportunities.new', $client) }}" class="text-lime-600 mr-2">
                                        <i class="fa-solid fa-handshake"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-lime-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

