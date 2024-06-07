<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embroidery Tiered Maxi Dress</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    
</head>
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
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-900 text-underline rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
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
                                <a href="{{route('order.index')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Order</a>
                            </li>    
                            <li>
                                <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>    
                        </ul>    
                    </div>    
                </div>    
            </header>    

    <div class="container mb-20 mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}" class="w-auto mt-8 ml-25 object-cover" style="height: 600px;  border-color: black; border-width: 1px; border-style: solid;">
            </div>
            <!-- Product Details -->
            <div class="flex flex-col mr-20 justify-between p-6">
                <div>
                    <p class="text-gray-600 text-xl">{{ $product->category->name }}</p>
                    <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
                    <p class="text-gray-700 mt-4">{{ $product->description }}</p>
                    <p class="text-red-600 text-2xl font-semibold mt-4">LKR {{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600 mt-2">Hurry! Only 1 unit left in stock!</p>
                </div>
                <div class="mt-4 flex space-x-2">
                    <button class="bg-gray-300 rounded px-2 py-1 text-sm">XS</button>
                    <button class="bg-gray-300 rounded px-2 py-1 text-sm">S</button>
                    <button class="bg-gray-300 rounded px-2 py-1 text-sm">M</button>
                    <button class="bg-gray-300 rounded px-2 py-1 text-sm">L</button>
                    <button class="bg-gray-300 rounded px-2 py-1 text-sm">XL</button>
                </div>

                <div class="mt-4 flex space-x-2">
                    <button class="bg-red-500  w-10 h-10"></button>
                    <button class="bg-green-500  w-10 h-10"></button>
                    <button class="bg-blue-500 w-10 h-10"></button>
                </div>
                <div class="mt-6">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="add-to-cart-form">
                        @csrf
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="quantity" id="quantity" min="1" value="1" class="w-20 p-2 border border-gray-300 rounded mb-4">
                        <p class="text-red-600 text-2xl font-semibold mt-4">Total Price: LKR <span id="total-price">{{ number_format($product->price, 2) }}</span></p>
                        <button type="submit" class="bg-blue-900 text-white py-2 px-4 rounded w-full mt-4">Add to Cart</button>
                    </form>
                    <p>or</p>
                    <form action="{{ route('cart.index') }}" method="GET" class="mt-4">
                        <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded w-full">View Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- You may also like -->
    <div class="container p-20 mx-auto mt-10">
        <h2 class="text-3xl font-bold text-center mb-8">You May Also Like</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            @php
                $relatedProducts = App\Models\Product::where('category_id', $product->category_id)
                                      ->where('id', '!=', $product->id)
                                      ->take(5)
                                      ->get();
            @endphp
            @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white rounded shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-86 object-cover">
                    <div class="p-4">
                        <a href="{{ route('product.detail', ['id' => $relatedProduct->id]) }}">
                            <h3 class="text-lg font-semibold">{{ $relatedProduct->name }}</h3>
                        </a>
                        <p class="text-gray-500">LKR: {{ $relatedProduct->price }}</p>
                        <div class="mt-2">
                            <span class="text-gray-700 text-sm">{{ $relatedProduct->category->name }}</span>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <button class="bg-gray-300 rounded px-2 py-1 text-sm">XS</button>
                            <button class="bg-gray-300 rounded px-2 py-1 text-sm">S</button>
                            <button class="bg-gray-300 rounded px-2 py-1 text-sm">M</button>
                            <button class="bg-gray-300 rounded px-2 py-1 text-sm">L</button>
                            <button class="bg-gray-300 rounded px-2 py-1 text-sm">XL</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
        <div class="container flex px-3 py-8 ">
          <div class="w-full mx-auto flex flex-wrap">
            <div class="flex w-full lg:w-1/2 ">
              <div class="px-3 md:px-0">
                <h3 class="font-bold text-gray-900">About</h3>
                <p class="py-4">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                </p>
              </div>
            </div>
            <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right mt-6 md:mt-0">
              <div class="px-3 md:px-0">
                <h3 class="text-left font-bold text-gray-900">Social</h3>
      
                <div class="w-full flex items-center py-4 mt-0">
                  <a href="#" class="mx-2">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                      <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                    </svg>
                  </a>
                  <a href="#" class="mx-2">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                      <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                    </svg>
                  </a>
                  <a href="#" class="mx-2">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                      <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path>
                    </svg>
                  </a>
                  <a href="#" class="mx-2">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                      <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.getElementById('quantity');
            const totalPriceElement = document.getElementById('total-price');
            const unitPrice = {{ $product->price }};
    
            quantityInput.addEventListener('input', function () {
                const quantity = parseInt(quantityInput.value);
                const totalPrice = (quantity * unitPrice).toFixed(2);
                totalPriceElement.textContent = new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(totalPrice);
            });
        });
    
        document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
            // Remove event.preventDefault() to actually submit the form
            const quantity = document.getElementById('quantity').value;
            alert('Adding ' + quantity + ' items to the cart.');
        });
    </script>
  <script>
    // JavaScript to handle scroll event and update progress bar 
   window.onscroll = function() {
       var progressBarContainer = document.getElementById("progressBarContainer");
       var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
       var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
       var scrolled = (winScroll / height) * 100;
   
       // Update progress bar width
       document.getElementById("progressBar").style.width = scrolled + "%";
   
       // Change position from relative to fixed after scrolling 100 pixels
       if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
           progressBarContainer.classList.remove('relative');
           progressBarContainer.classList.add('fixed');
       } else {
           progressBarContainer.classList.remove('fixed');
           progressBarContainer.classList.add('relative');
       }
   };
   </script>
</body>

</html>
