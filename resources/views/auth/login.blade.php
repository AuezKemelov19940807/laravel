<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-5 text-center font-semibold">
            Вход в систему
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <div class="flex relative border  rounded-md">

                <x-text-input id="email" class="block border-none pr-5  w-full" type="email" name="email"
                              :value="old('email')" required
                              autofocus autocomplete="username"/>
                <span
                    class="flex absolute right-0 top-0 bg-white rounded-tr-md rounded-br-md px-2      items-center justify-center h-full w-fit">
                   <img src="{{asset('icons/mail.svg')}} " alt="Icon Mail">
               </span>
            </div>


            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <div class="relative border  rounded-md">
                <x-text-input id="password" class="block border-none pr-5  w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>
                <span
                    class="flex absolute right-0 top-0 bg-white rounded-tr-md rounded-br-md px-2      items-center justify-center h-full w-fit">
                   <img src="{{asset('icons/lock.svg')}}" alt="Icon Mail">
               </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 flex gap-x-1">
            <span class="w-4 h-4">
              <img src="{{asset('icons/login.svg')}} " alt="">
            </span>
                {{ __('Войти') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
