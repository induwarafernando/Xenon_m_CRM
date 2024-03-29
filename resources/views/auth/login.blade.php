{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


<x-guest-layout>
  <div class="bg-no-repeat bg-cover bg-top relative" style="background-image: url(https://i.ibb.co/Q70q5f8/wepik-export-20240123073209-YAqa.jpg); height:695px">
      <div class="absolute bg-gradient-to-b from-blue-500 to-blue-900 opacity-60 inset-0 z-0"></div>
      <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
          <div class="flex-col flex self-center p-10 sm:max-w-5xl xl:max-w-2xl z-10">
              <!-- Left side with branding -->
              <div class="self-start hidden lg:flex flex-col text-white">
                  <img src="" class="mb-3">
                  <h1 class="mb-3 font-bold text-5xl">Hi! Welcome Back</h1>
                  <p class="pr-3">"Your Closet's Best Friend – XENON, Your Ultimate Delivery Partner."</p>
              </div>
          </div>
          <div class="flex justify-center self-center z-10">
              <!-- Authentication Card -->
              <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                  <x-validation-errors class="mb-4" />
                  @if (session('status'))
                      <div class="mb-4 font-medium text-sm text-green-600">
                          {{ session('status') }}
                      </div>
                  @endif
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="flex justify-left items-left">
                        <div class="relative">
                          <div class="ml-2 mt-5 w-8 h-8 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/12 left-1/12 transform -translate-x-1/2 -translate-y-1/2 opacity-15" ></div>
                          <div class="ml-2 mt-5 w-6 h-6 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/64 left-1/64 transform -translate-x-1/2 -translate-y-1/2 opacity-30"></div>
                          <div class="ml-2 mt-5 w-4 h-4 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/128 left-1/128 transform -translate-x-1/2 -translate-y-1/2 opacity-40"></div>
                          <div class="ml-2 mt-5 w-3 h-3 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/256 left-1/256 transform -translate-x-1/2 -translate-y-1/2"></div>
                        </div> 
                    </div>    
                      <div class="mb-4">
                          <h3 class="font-semibold text-3xl pt-1 text-gray-800">&nbsp;&nbsp;&nbsp;&nbsp;Login</h3>
                          <p class="text-gray-500">Please login to your account.</p>
                      </div>
                      <div class="space-y-5">
                          <div class="space-y-2">
                              <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                              <x-input id="email" class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="mail@gmail.com" />
                          </div>
                          <div class="space-y-2">
                              <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">Password</label>
                              <x-input id="password" class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                          </div>
                          <div class="flex items-center justify-between">
                              <div class="flex items-center">
                                  <x-checkbox id="remember_me" name="remember" class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded" />
                                  <label for="remember_me" class="ml-2 block text-sm text-gray-800">Remember me</label>
                              </div>
                              @if (Route::has('password.request'))
                                  <div class="text-sm">
                                      <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-800">Forgot your password?</a>
                                  </div>
                              @endif
                          </div>
                          <div>
                              <x-button class="w-full flex justify-center bg-blue-400 hover:bg-blue-600 text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                                  Login
                              </x-button>
                          </div>
                      </div>
                  </form>
                  <div class="pt-5 text-center text-gray-400 text-xs">
                      <span>
                          Copyright © 2021-2022
                          <a href="https://codepen.io/uidesignhub" rel="" target="_blank" title="Ajimon" class="text-green hover:text-green-500">AJI</a>
                      </span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-guest-layout>