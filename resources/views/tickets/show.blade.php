<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full relative overflow-hidden">
        @if($ticket->status == 'Non Traité')
        <div class="absolute top-0 left-0 w-[140px] aspect-square bg-red-500 rotate-45 -translate-x-1/2 -translate-y-1/2 flex items-center justify-end p-4"><i class="fa-solid fa-ticket -rotate-45 text-[1.6rem] text-white"></i></div>
        @elseif($ticket->status == 'En Cours')
        <div class="absolute top-0 left-0 w-[140px] aspect-square bg-blue-500 rotate-45 -translate-x-1/2 -translate-y-1/2 flex items-center justify-end p-4"><i class="fa-solid fa-ticket -rotate-45 text-[1.6rem] text-white"></i></div>
        @elseif($ticket->status == 'Résolu')
        <div class="absolute top-0 left-0 w-[140px] aspect-square bg-green-500 rotate-45 -translate-x-1/2 -translate-y-1/2 flex items-center justify-end p-4"><i class="fa-solid fa-ticket -rotate-45 text-[1.6rem] text-white"></i></div>
        @elseif($ticket->status == 'Archivé')
        <div class="absolute top-0 left-0 w-[140px] aspect-square bg-gray-500 rotate-45 -translate-x-1/2 -translate-y-1/2 flex items-center justify-end p-4"><i class="fa-solid fa-ticket -rotate-45 text-[1.7rem] text-white grid place-items-center relative"><i class="fa-solid fa-archive text-[.7rem] text-gray-500 absolute"></i></i></div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            Détails du Ticket
            @if ($ticket->priority == 1)<i class="fa-solid fa-circle-exclamation text-red-500"></i>
            @endif
        </h2>
        <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg w-full">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <div class="flex gap-2">
                    @php
                    $previousUrl = url()->previous();
                    @endphp
                    <a href="{{ $previousUrl }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                        Retour
                    </a>
                    <a href="{{ route('clients.show', $ticket->client_id) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-user flex justify-center items-center"></i>
                    </a>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('interventions.ticket', ['client' => $ticket->client->id, 'ticket' => $ticket]) }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-truck-fast mr-1"></i>
                        Intervention
                    </a>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Modifier
                    </a>
                    <form action="{{ route('tickets.archive', $ticket) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-archive mr-1"></i>
                            Archiver
                        </button>
                    </form>
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
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
                            Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->description }}
                        </dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Client
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->client->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Créé par
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->createdBy->name }}
                        </dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Responsable
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->managedBy->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Statut
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $ticket->status }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
