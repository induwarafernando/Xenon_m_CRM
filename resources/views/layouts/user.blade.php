<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: inline-block;
            animation: marquee 15s linear infinite;
        }
    </style>
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }
        
        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }
        
        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }
        
        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }
        
        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
            
        }

        .relative { position: relative; }

        .parallax-bg {
            background-image: url('https://i.ibb.co/hLZkBQ8/Screenshot-2024-01-07-215252.png'); /* Make sure the path to the image is correct */
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
    </style>    
</head>
<body class="text-gray-600 work-sans leading-normal text-base tracking-normal">
    <!-- Progress Bar -->
  <div class="relative top-0 left-0 w-full h-2 z-50 bg-black" id="progressBarContainer">
    <div class="h-full bg-gradient-to-r from-teal-300  via-purple-300  to-blue-400 " id="progressBar"></div>
</div>
        <!--Nav-->
        
        <header>
            <div class="overflow-hidden bg-black text-white p-3.5">
                <div class="animate-marquee whitespace-nowrap">
                    <span class="mx-4">Islandwide Delivery</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">SHOP, CLICK, DELIVER</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">Islandwide Delivery</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">SHOP, CLICK, DELIVER</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">Islandwide Delivery</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">SHOP, CLICK, DELIVER</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">Islandwide Delivery</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">SHOP, CLICK, DELIVER</span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    <span class="mx-4">                   </span>
                    
                    
                    
                </div>    
            </div>    
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 z-10"  style="box-shadow: 0 4px 2px -2px gray">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="" class="flex items-center">
                        {{-- <img src="https://i.ibb.co/1s6tb8V/Xenon-Name.png" class="mr-3 h-6 sm:h-9" alt="" /> --}}
                        <span class="self-center text-3xl font-extrabold whitespace-nowrap text-blue-900 dark:text-white">X E N O N</span>
                    </a>    
                    <div class="flex items-center lg:order-2">
                        {{-- // if user is logged in show the dashboard  and logout button --}}
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2 text-lg font-medium text-center text-blue border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mr-5">Dashboard</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center px-5 py-2 text-lg font-medium text-center text-blue border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mr-5">Logout</button>
                            </form>
                        @else

                        {{-- if user is not logged in show the login and register button --}}

                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2 text-lg font-medium text-center text-blue border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 mr-5">Log in</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 lg:px-5 py-2 lg:py-2.5 mr-2 text-base font-medium text-center text-white bg-blue-800 hover:bg-blue-700 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</a>
                        @endauth
                        
                        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">

                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>    
                    </div>    
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium text-lg lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="{{route('home')}}" class="block py-2 pr-4 pl-3 text-gray-900 text-underline rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                            </li>                              
                            <li>
                                <a href="{{ route('shop')}}" class="block py-2 pr-4 pl-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
                            </li>    
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Cart</a>
                            </li>    
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Track Order</a>
                            </li>    
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Order History</a>
                            </li>    
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>    
                        </ul>    
                    </div>    
                </div>    
            </header>    
            
