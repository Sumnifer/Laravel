<x-app-layout>
    <x-slot name="header" class="flex flex-col w-full flex-col">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold self-center">
        {{ __('Journalisation') }}
        </h2>
        <form action="{{ route('logs.clear') }}" method="POST" class="self-end flex justify-end">
            @csrf
            <button type="submit" class="bg-red-600 py-2 px-6 text-white rounded-[10px] w-auto flex flex-row items-center gap-2 text-[1rem] mb-4 flex items-center justify-center">
                <i class="fa-solid fa-broom text-[1rem]"></i> Nettoyer
            </button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <iframe srcdoc="{{ $logContent }}" style="width: 100%; height: 500px;"></iframe>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
