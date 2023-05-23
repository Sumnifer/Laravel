<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Dashboard') }}
        </h2>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ session('success') }}
                            @if (session('showCancelButton'))
                            <form action="{{ session('cancelUrl') }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="underline font-bold">
                                    Annuler
                                </button>
                            </form>
                            @endif
                        </div>
                    @endif
                    <div class="flex justify-between mb-6">
                        <div class="">
                            <details class="relative bg-red w-60 ">
                                <summary class="bg-lime-600 px-4 py-2 text-white rounded-md focus:rounded-b-none active:rounded-b-none">Filtres</summary>
                                <div class="absolute flex flex-col w-full bg-lime-600 p-4 rounded-b-md">
                                    <div class="flex items-center gap-2 text-white">
                                        <input type="checkbox" name="test1" id="test1">
                                        <label for="test1" >test1qjsdqksjdkqjsdkjqsbdkjqbsdkbqd</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white">
                                        <input type="checkbox" name="test1" id="test1">
                                        <label for="test1" >test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white">
                                        <input type="checkbox" name="test1" id="test1">
                                        <label for="test1" >test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white">
                                        <input type="checkbox" name="test1" id="test1">
                                        <label for="test1" >test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white">
                                        <input type="checkbox" name="test1" id="test1">
                                        <label for="test1" >test1</label>
                                    </div>
                                </div>
                            </details>
                        </div>
                        <div>
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('tickets.create') }}" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Nouveau <i class="fa-solid fa-plus text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Excel <i class="fa-solid fa-file-excel text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Copie <i class="fa-solid fa-copy text-[1rem]"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-center">
                        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
                            {{ __('Liste des Tickets') }}
                        </h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom du Client
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th><th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Crée par
                                    </th><th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Responsable
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="{{ route('tickets.show', $ticket) }}" class="text-lime-600 ">
                                                {{ $ticket->client->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ticket->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ticket->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ticket->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ticket->createdBy->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ticket->managedBy->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('tickets.edit', $ticket) }}" class="text-lime-600 mr-1">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('interventions.ticket', ['client' => $ticket->client->id, 'ticket' => $ticket]) }}" class="text-lime-600">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </a>
                                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-lime-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
                                                    <i class="fa-solid fa-trash mr-1"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('tickets.duplicate', $ticket->id) }}" method="GET" class="inline">
                                                @csrf
                                                <button type="submit" class="text-lime-600 mr-1">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="flex justify-center items-center w-full">
                            {{ $tickets->links() }}
                        </div>
                        <!---------------->
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between mb-6">
                        <div class="">
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
                        </div>
                        <div>
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('interventions.search') }}" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Nouveau <i class="fa-solid fa-plus text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Excel <i class="fa-solid fa-file-excel text-[1rem]"></i></a>
                                <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Copie <i class="fa-solid fa-copy text-[1rem]"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-center mb-8">
                        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
                            {{ __('Liste des Interventions') }}
                        </h3>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom du Client
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th><th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Crée par
                                    </th><th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Responsable
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($interventions as $intervention)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="{{ route('interventions.show', $intervention) }}" class="text-lime-600 ">
                                                {{ $intervention->client->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $intervention->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $intervention->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $intervention->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $intervention->createdBy->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $intervention->managedBy->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('interventions.edit', $intervention) }}" class="text-lime-600 mr-1">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('interventions.destroy', $intervention) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-lime-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette intervention ?')">
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
