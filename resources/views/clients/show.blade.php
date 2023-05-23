<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{$client->name}}
        </h2>
        <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg w-full">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fa-solid fa-arrow-left mr-1"></i>
                    Retour
                </a>
                <div class="flex gap-2">
                    <a href="{{ route('tickets.new', $client)}}" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-ticket mr-1"></i>
                        Ticket
                        <i class="fa-solid fa-plus ml-2"></i>
                    </a>
                    <a href="{{ route('interventions.new', $client) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-truck-fast mr-1"></i>
                        Intervention
                        <i class="fa-solid fa-plus ml-2"></i>

                    </a>

                    <a href="{{ route('opportunities.new', $client)}}" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-handshake mr-1"></i>
                        Opportunité
                        <i class="fa-solid fa-plus ml-2"></i>
                    </a>
                    <a href="{{ route('clients.edit', $client->id)}}" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Modifier
                    </a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                            <i class="fa-solid fa-trash mr-1"></i>
                            Supprimer
                        </button>
                    </form>



                </div>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $client->email }}
                        </dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Adresse
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $client->address }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Code Postal
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $client->postalCode }}
                        </dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Ville
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $client-> city }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Téléphone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $client->phone }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg w-full mt-6">
                <div class="px-4 py-5 sm:px-6 flex justify-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 uppercase">Tickets du client</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <i class="fa-solid fa-eye"></i>
                        </th>
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
                        @foreach ($client->tickets as $ticket)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 uppercase">
                                <a href="{{ route('tickets.show', $ticket->id)}}" class="text-lime-600">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 uppercase">
                                    {{ $ticket->client->name }}
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex gap-2">
                                <a href="{{ route('tickets.edit', $ticket) }}" class="text-lime-600">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <a href="{{ route('interventions.ticket', ['client' => $ticket->client->id, 'ticket' => $ticket]) }}" class="text-lime-600">
                                    <i class="fa-solid fa-truck-fast"></i>
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-lime-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <form action="{{ route('tickets.archive', $ticket) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-lime-600">
                                        <i class="fa-solid fa-archive"></i>
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
</x-app-layout>






