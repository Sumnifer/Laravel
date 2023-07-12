<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full" >
        <div class="flex flex-col max-w-8xl mx-auto sm:px-6 lg:px-8 w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold self-center">
                {{ __('Atelier') }}
            </h2>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-4 items-center gap-6">
                    <a href="{{route('takeOvers.index')}}" class="flex flex-col items-center justify-center bg-lime-600 text-white rounded-[10px] text-[1.2rem] aspect-[2]"><i class="fa-solid fa-screwdriver-wrench text-[4rem]"></i> Prise en Charge</a>
                    <a href="#" class="flex flex-col items-center justify-center bg-lime-600 text-white rounded-[10px] text-[1.2rem] aspect-[2]"><i class="fa-solid fa-headset text-[4rem]"></i> Service Après Vente</a>
                    <a href="#" class="flex flex-col items-center justify-center bg-lime-600 text-white rounded-[10px] text-[1.2rem] aspect-[2]"><i class="fa-solid fa-person-carry-box text-[4rem]"></i> Matériels de Prêt</a>
                    <a href="#" class="flex flex-col items-center justify-center bg-lime-600 text-white rounded-[10px] text-[1.2rem] aspect-[2]"><i class="fa-solid fa-boxes-stacked text-[4rem]"></i> Inventaire</a>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>

