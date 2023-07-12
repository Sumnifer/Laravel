<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="block mt-1 w-full border-lime-600 focus:outline-0 focus:ring-lime-600 focus:border-lime-600">
            @error('name')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600">
            @error('email')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Additional fields -->
        <div class="mt-4">
            <label for="phone" class="block font-medium text-sm text-gray-700">{{ __('Phone Number') }}</label>
            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600">
            @error('phone')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="level" class="block font-medium text-sm text-gray-700">{{ __('Niveau') }}</label>
            <select id="level" type="number" name="level" min="1" max="10" value="{{ old('level') }}" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600">
                <option value="0">Séléctionnez un Niveau</option>
                <option value="1">Utilisateur</option>
                <option value="2">Administrateur</option>
                <option value="3">Root</option>
            </select>
            @error('level')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="status" class="block font-medium text-sm text-gray-700">{{ __('Fonction') }}</label>
            <select id="status" type="text" name="status" value="{{ old('status') }}" class="block mt-1 w-full border-lime-600 focus:ring-lime-600 focus:border-lime-600">
                <option value="0">Séléctionnez une Fonction</option>
                <option value="1">Stagiaire</option>
                <option value="2">Assistante</option>
                <option value="3">Commercial</option>
                <option value="4">Technicien</option>
                <option value="5">Autre</option>
            </select>
            @error('status')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
