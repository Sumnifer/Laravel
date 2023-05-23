<x-app-layout>


    <div class="py-6 flex flex-col items-center w-full" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Tickets') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
        <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
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
                        <div class="flex flex-row gap-2">
                            <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Nouveau <i class="fa-solid fa-plus text-[1rem]"></i></a>
                            <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Excel <i class="fa-solid fa-file-excel text-[1rem]"></i></a>
                            <a href="#" class="bg-lime-600 py-2 px-6 text-white rounded-md w-auto flex flex-row items-center gap-2 text-[1rem]">Copie <i class="fa-solid fa-copy text-[1rem]"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
