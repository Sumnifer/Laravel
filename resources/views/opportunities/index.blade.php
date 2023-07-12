<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full" >
        <div class="flex flex-col max-w-8xl mx-auto sm:px-6 lg:px-8 w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold self-center">
                {{ __('Opportunités') }}
            </h2>
        </div>
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
                        </div>
                        <div>
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('opportunities.search') }}" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Nouveau <i class="fa-solid fa-plus text-[1rem]"></i></a>
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
                                    Dâte
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom du Client
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Crée par
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Responsable
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($opportunities as $opportunity)
                                @if($opportunity->status == 'denied')
                                <tr class="border-l-4 !border-l-red-500 !border-b-0 relative">
                                    @elseif($opportunity->status == 'accepted')
                                <tr class="border-l-4 !border-l-blue-500 !border-b-0 relative">
                                    @elseif($opportunity->status == 'solved')
                                <tr class="border-l-4 !border-l-green-500  !border-b-0 relative">
                                    @else
                                <tr class="">
                                    @endif
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('opportunities.show', $opportunity) }}" class="text-lime-600 uppercase">
                                        {{ $opportunity->created_at->format('d-m-Y') }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('clients.show', $opportunity->client_id) }}" class="uppercase">
                                        {{ $opportunity->client->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $opportunity->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $opportunity->createdBy->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $opportunity->managedBy->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex gap-2">
                                    <a href="{{ route('opportunities.edit', $opportunity) }}" class="text-lime-600">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('opportunities.destroy', $opportunity) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-lime-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="flex justify-center items-center w-full">
                            {{ $opportunities->links() }}
                        </div>
                        <!---------------->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

