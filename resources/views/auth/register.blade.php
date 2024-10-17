{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

      
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


            <!-- Nombre -->
            <div class="mt-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" nombre="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>


             <!-- Paterno -->
             <div class="mt-4">
                <x-input-label for="paterno" :value="__('Paterno')" />
                <x-text-input id="paterno" class="block mt-1 w-full" type="text" paterno="paterno" :value="old('paterno')" required autofocus autocomplete="paterno" />
                <x-input-error :messages="$errors->get('paterno')" class="mt-2" />
            </div>
    
            <!-- Materno -->
            <div class="mt-4">
                <x-input-label for="materno" :value="__('Materno')" />
                <x-text-input id="materno" class="block mt-1 w-full" type="text" materno="materno" :value="old('materno')" required autofocus autocomplete="materno" />
                <x-input-error :messages="$errors->get('materno')" class="mt-2" />
            </div>
             <!-- Rut -->
             <div class="mt-4">
                <x-input-label for="rut" :value="__('Rut')" />
                <x-text-input id="rut" class="block mt-1 w-full" type="text" rut="rut" :value="old('rut')" required autofocus autocomplete="rut" />
                <x-input-error :messages="$errors->get('rut')" class="mt-2" />
            </div>
    
    
            <!-- Telefono -->
            <div class="mt-4">
                <x-input-label for="telefono" :value="__('Telefono')" />
                <x-text-input id="telefono" class="block mt-1 w-full" type="text" telefono="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>


            <!-- Universidad -->
            <div class="mt-4">
                <x-input-label for="universidad" :value="__('Universidad')" />
                <x-text-input id="universidad" class="block mt-1 w-full" type="text" universidad="universidad" :value="old('universidad')" required autofocus autocomplete="universidad" />
                <x-input-error :messages="$errors->get('universidad')" class="mt-2" />
            </div>


            <!-- Anio -->
            <div class="mt-4">
                <x-input-label for="anio" :value="__('Año')" />
                <x-text-input id="anio" class="block mt-1 w-full" type="text" anio="anio" :value="old('anio')" required autofocus autocomplete="anio" />
                <x-input-error :messages="$errors->get('anio')" class="mt-2" />
            </div>



    
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="paterno" :value="__('Apellido Paterno')" />
            <x-text-input id="paterno" class="block mt-1 w-full" type="text" name="paterno" :value="old('paterno')" required autocomplete="paterno" />
            <x-input-error :messages="$errors->get('paterno')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="materno" :value="__('Apellido Materno')" />
            <x-text-input id="materno" class="block mt-1 w-full" type="text" name="materno" :value="old('materno')" required autocomplete="materno" />
            <x-input-error :messages="$errors->get('materno')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="rut" :value="__('RUT')" />
            <x-text-input id="rut" class="block mt-1 w-full" type="text" name="rut" :value="old('rut')" required autocomplete="rut" />
            <x-input-error :messages="$errors->get('rut')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="universidad" :value="__('Universidad')" />
            <x-text-input id="universidad" class="block mt-1 w-full" type="text" name="universidad" :value="old('universidad')" required autocomplete="universidad" />
            <x-input-error :messages="$errors->get('universidad')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="anio" :value="__('Año que cursa')" />
            <x-text-input id="anio" class="block mt-1 w-full" type="text" name="anio" :value="old('anio')" required autocomplete="anio" />
            <x-input-error :messages="$errors->get('anio')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
