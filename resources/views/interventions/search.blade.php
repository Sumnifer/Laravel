<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <div class="flex flex-col max-w-8xl mx-auto sm:px-6 lg:px-8 w-full justify-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold self-center">
                {{ __('Rechercher un Client') }}
            </h2>
            <form action="{{ route('interventions.search') }}" method="GET" class="flex items-center mb-4 w-full max-w-5xl flex justify-center">
                <div class="w-full flex items-center justify-center">
                    <input type="text" name="search" id="search-input" placeholder="Rechercher un client..." class="border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600 px-4 py-2 rounded-l-md w-full">
                    <datalist id="clients-list"></datalist>
                    <button type="submit" class="h-full bg-lime-600 text-white px-4 py-2 rounded-r-md border-lime-600 border-[1px]"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

            </form>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <div class="flex gap-2">
                            <details class="relative bg-red w-60">
                                <summary class="bg-lime-600 px-4 py-2 text-white rounded-md focus:rounded-b-none active:rounded-b-none">Filtres</summary>
                                <div class="absolute flex flex-col w-full bg-lime-600 p-4 rounded-b-md">
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1">
                                        <label for="test1">test1qjsdqksjdkqjsdkjqsbdkjqbsdkbqd</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1">
                                        <label for="test1">test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1">
                                        <label for="test1">test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1">
                                        <label for="test1">test1</label>
                                    </div>
                                    <div class="flex items-center gap-2 text-white"><input type="checkbox" name="test1" id="test1">
                                        <label for="test1">test1</label>
                                    </div>
                                </div>
                            </details>
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
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Adresse
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="{{ route('interventions.new', $client) }}" class="text-lime-600 ">
                                                {{ $client->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $client->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $client->address }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('clients.edit', $client) }}" class="text-lime-600 mr-1">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('interventions.new', $client) }}" class="text-lime-600 mr-1">
                                                <i class="fa-solid fa-truck-fast"></i>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Événement "input" pour l'input de recherche
    document.querySelector('#search-input').addEventListener('input', function() {
        // Récupérer la valeur de l'input de recherche
        var searchTerm = this.value;

        // Effectuer la requête AJAX vers la route interventions.search
        fetch('/interventions/search?q=' + searchTerm)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                // Réinitialiser la liste des clients dans l'élément datalist
                var clientsList = document.querySelector('#clients-list');
                clientsList.innerHTML = '';

                // Ajouter chaque client à la liste
                data.forEach(function(client) {
                    var option = document.createElement('option');
                    option.value = client.name;
                    clientsList.appendChild(option);
                });
            })
            .catch(function(error) {
                console.error('Une erreur s\'est produite:', error);
            });
    });
</script>









