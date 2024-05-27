<x-guest-layout>
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script>
        let map;
        let marker;

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('openModalBtn').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission
                document.getElementById('mapModal').style.display = "block";
                initMap();
            });

            document.getElementsByClassName('close')[0].addEventListener('click', function() {
                document.getElementById('mapModal').style.display = "none";
            });

            window.addEventListener('click', function(event) {
                if (event.target == document.getElementById('mapModal')) {
                    document.getElementById('mapModal').style.display = "none";
                }
            });
        });

        function initMap() {
            // Check if geolocation is supported
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the current location
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Initialize the map centered at the current location
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: currentLocation,
                        zoom: 13
                    });

                    // Initialize the marker at the current location
                    marker = new google.maps.Marker({
                        position: currentLocation,
                        map: map,
                        draggable: true
                    });

                    // Add an event listener to update the input field when the marker is moved
                    marker.addListener('dragend', function() {
                        const position = marker.getPosition();
                        document.getElementById('location-input').value = `${position.lat()}, ${position.lng()}`;
                    });

                    // Update the input field with the current marker position
                    document.getElementById('location-input').value = `${currentLocation.lat}, ${currentLocation.lng}`;
                }, function() {
                    // Handle location error
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            // Handle location error
            const errorMsg = browserHasGeolocation ? 
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.';
            alert(errorMsg);
        }
    </script>
    <style>
        /* Add some basic styling */
        #map {
            height: 400px;
            width: 100%;
        }
        
        /* Modal styling */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
        
    <div class="bg-no-repeat bg-cover bg-top relative" style="background-image: url(https://i.ibb.co/Q70q5f8/wepik-export-20240123073209-YAqa.jpg); height:100vh">
        <div class="absolute bg-gradient-to-b from-blue-500 to-blue-900 opacity-60 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex justify-center self-center z-10">
                 <!-- Left side with branding -->
                   <div class="self-start hidden lg:flex flex-col text-white mr-8">
                      <img src="" class="mb-3">
                      <h1 class="mb-3 mt-32 font-bold text-3xl sm:text-4xl">Hi! Welcome Back</h1>
                      <p class="pr-3 text-xs sm:text-sm">"Your Closet's Best Friend – XENON, Your Ultimate Delivery Partner."</p>
                   </div>
                   
                   <!-- Authentication Card -->
                   <div class="flex justify-center self-center z-10">
                        <div class="p-6 sm:p-8 bg-white mx-auto rounded-2xl w-full sm:w-100">
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
                            <h3 class="font-bold text-lg sm:text-xl text-gray-800 pl-8 mt-3">Register</h3>
                            <p class="text-gray-500 text-xs sm:text-sm">Create your Merchandizer account to get started.</p>
                        </div>
                        <div class="space-y-2 sm:space-y-1">
                           <!-- Add these fields inside your registration form -->

                           <div class="space-y-1 sm:space-y-2">
                            <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Shop Name</label>
                            <input type="text" name="name" class="w-full text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" required>
                        </div>
                        <div class="space-y-1 sm:space-y-2">
                            <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Location</label>
                            <input id="location-input" type="text" name="location" class="w-full text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" required>
                            <button id="openModalBtn" class="px-4 py-2 bg-blue-500 text-white rounded">Select Location</button>
                        </div>
                    
                        <!-- The Modal -->
                        <div id="mapModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div id="map"></div>
                            </div>
                        </div>
                       
                        <div class="space-y-1 sm:space-y-2">
                            <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Logo</label>
                            <input type="file" name="logo" class="w-full text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400">
                        </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Email</label>
                                <x-input id="email" class="w-full text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="mail@gmail.com" />
                            </div>
                            <div class="space-y-1 sm:space-y-2">
                                <label class="text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Password</label>
                                <x-input id="password" class="w-full content-center text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
                            </div>
                            <!-- Set the user role as merchandizer -->
                            <input type="hidden" name="role" value="3">
                            <div class="space-y-1 sm:space-y-2">
                                <label class="mb-4 text-xs sm:text-sm font-medium text-gray-700 tracking-wide">Confirm Password</label>
                                <x-input id="password_confirmation" class="w-full content-center text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                            </div>
                                                   
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />
                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-xs sm:text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-xs sm:text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif
                            <div>
                                <x-button class="w-full flex justify-center bg-blue-500 hover:bg-blue-700 text-gray-100 p-2 sm:p-2.5 rounded-full tracking-wide font-bold shadow-lg cursor-pointer transition ease-in duration-500">
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9eUmqR95ebfKdaI8ROL0PY8BmfI4Iy6Y
    &callback=initMap"></script>

</x-guest-layout>
