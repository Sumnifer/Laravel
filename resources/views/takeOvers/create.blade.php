<x-app-layout>
    <div class="py-6 flex flex-col items-center w-full">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-6 text-lime-600 uppercase font-bold">
            {{ __('Ajout d\'une Prise en Charge') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
            <div class="bg-white dark:bg-gray-800 overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-2">
                        @php
                        $previousUrl = url()->previous();
                        @endphp
                        <a href="{{ $previousUrl }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-arrow-left text-[1rem] mr-1"></i>
                            Retour
                        </a>

                        <a href="{{ route('dashboard') }}" class="flex items-center justify-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fa-solid fa-house text-[1rem] mr-1"></i>
                            Dashboard
                        </a>

                    </div>
                    <form action="{{ route('takeOvers.index') }}" method="POST" class="flex flex-col gap-2 items-center w-full" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="client_id" class="self-start">Client :</label>
                            <select name="client_id" id="client_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un client</option>
                                @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="phone" class="self-start">Téléphone :</label>
                            <input type="number" name="phone" id="phone" placeholder="Téléphone" class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="problem" class="self-start">Problème :</label>
                            <textarea name="problem" id="problem" rows="4" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600"></textarea>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="user" class="self-start">Utilisateur :</label>
                            <input type="text" name="user" id="user" placeholder="Utilisateur" class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">

                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="password" class="self-start">Mot de passe :</label>
                            <input type="text" name="password" id="password" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="material_id" class="self-start">Matériel :</label>
                            <select name="material_id" id="material_id"  class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un matériel</option>
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="technician_id" class="self-start">Technicien :</label>
                            <select name="technician_id" id="technician_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un technicien</option>
                                @foreach ($technicians as $technician)
                                <option value="{{$technician->id}}">{{$technician->name}} {{$technician->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="lead_technician_id" class="self-start">Responsable :</label>
                            <select name="lead_technician_id" id="lead_technician_id" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="">Sélectionnez un responsable</option>
                                @foreach ($leadTechnicians as $leadTechnician)
                                <option value="{{$leadTechnician->id}}">{{$leadTechnician->name}} {{$leadTechnician->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="loan_material_id" class="self-start">Matériel de Prêt</label>
                            <div>
                                <label for="loanMaterialNo">Oui</label>
                                <input type="radio" id="loanMaterialYes" name="loanMaterial" value="1">
                            </div>
                            <div>
                                <label for="loanMaterialYes">Non</label>
                                <input type="radio" id="loanMaterialNo" name="loanMaterial" value="0" checked>
                            </div>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="intervention" class="self-start">Intervention :</label>
                            <textarea name="intervention" id="intervention" rows="4" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600"></textarea>
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="invoice" class="self-start">Facture :</label>
                            <input type="text" name="invoice" id="invoice" value=""  class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="attachment" class="self-start">Pièce jointe :</label>
                            <input type="file" name="attachment" id="attachment" class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                        </div>

                        <div class="flex flex-col items-start w-[50%]">
                            <label for="status" class="self-start">Statut :</label>
                            <select name="status" id="status" required class="w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
                                <option value="0">Sélectionnez un statut</option>
                                <option value="1">test</option>
                                <option value="2">test</option>

                            </select>
                        </div>

                        <div class="flex justify-center mt-4">
                            <button type="submit" class="px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:outline-none focus:border-lime-700 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
