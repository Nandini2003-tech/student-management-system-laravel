<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
         
        <!-- heading -->
         <div class="text-center  bg-green-700 text-white p-3 rounded">
             <h1 class="text-2xl">Student Management System</h1>
             <h4 class="text-xl-center">Create your Account</h4>
         </div>

          <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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

<!-- register button -->
        <div class="mt-5 w-full">
            <x-primary-button class=" bg-green-700 w-100 text-lg-center">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="text-center mt-2">
            {{ __('Already have an account?') }} 
             <a class="underline mt-3  text-blue-600 hover:text-gray-900 rounded" href="{{ route('login') }}">
                Login
            </a>
        </div>
    </form>
   
</x-guest-layout>
 
