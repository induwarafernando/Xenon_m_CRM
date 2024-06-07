<x-guest-layout>
    <div class="bg-no-repeat bg-cover bg-top relative" style="background-image: url(https://i.ibb.co/Q70q5f8/wepik-export-20240123073209-YAqa.jpg); height:695px">
        <div class="absolute bg-gradient-to-b from-blue-500 to-blue-900 opacity-60 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex justify-center self-center z-10">
                 <!-- Left side with branding -->
                   <div class="self-start hidden lg:flex flex-col text-white mr-32">
                      <img src="" class="mb-3">
                      <h1 class="mb-3 mt-48 sm:mt-64 font-bold text-4xl sm:text-5xl">Hi! Welcome Back</h1>
                      <p class="pr-3 text-sm sm:text-base">"Your Closet's Best Friend – XENON, Your Ultimate Delivery Partner."</p>
                   </div>
                   
                   <!-- Authentication Card -->
                   <div class="flex justify-center self-center z-10">
                        <div class="p-8 sm:p-12 bg-white mx-auto rounded-2xl w-full sm:w-100">
                          <x-validation-errors class="mb-4" />
                          
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <div class="flex justify-left items-left">
                                <div class="relative">
                                  <div class="ml-2 mt-5 w-8 h-8 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/12 left-1/12 transform -translate-x-1/2 -translate-y-1/2 opacity-15"></div>
                                  <div class="ml-2 mt-5 w-6 h-6 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/64 left-1/64 transform -translate-x-1/2 -translate-y-1/2 opacity-30"></div>
                                  <div class="ml-2 mt-5 w-4 h-4 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/128 left-1/128 transform -translate-x-1/2 -translate-y-1/2 opacity-40"></div>
                                  <div class="ml-2 mt-5 w-3 h-3 bg-gradient-to-br from-blue-400  to-green-500 rounded-full animate-pulse absolute top-1/256 left-1/256 transform -translate-x-1/2 -translate-y-1/2"></div>
                                </div> 
                            </div>    
                            <h3 class="font-bold text-2xl sm:text-3xl text-gray-800 pl-8 pt-1">Register</h3>
                            <p class="text-gray-500 text-sm sm:text-base">Create your account to get started.</p>
                        </div>
                        <div class="space-y-4 sm:space-y-1">
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Name</label>
                                <x-input id="name" class="w-full text-xs sm:text-base px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your Name" />
                            </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Email</label>
                                <x-input id="email" class="w-full text-xs sm:text-base px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="mail@gmail.com" />
                            </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Password</label>
                                <x-input id="password" class="w-full content-center text-xs sm:text-base px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
                            </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="mb-4 text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Confirm Password</label>
                                <x-input id="password_confirmation" class="w-full content-center text-xs sm:text-base px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                            </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Role</label>
                                <select name="role" id="role" class="w-full text-xs sm:text-base px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400">
                                    <option value="2">Customer</option>
                                    <option value="3">Merchandizer</option>
                                    <option value="4">Delivery Driver</option>
                                </select> 
                        
                                                   
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />
                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif
                            <div>
                                <x-button class="w-full flex justify-center bg-blue-500 hover:bg-blue-700 text-gray-100 p-2.5 sm:p-3 rounded-full tracking-wide font-bold shadow-lg cursor-pointer transition ease-in duration-500">
                                    Register
                                </x-button>
                            </div>
                        </div>
                    </form>
                    <div class="pt-4 sm:pt-5 text-center text-gray-400 text-xs">
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
