<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .scrollable {
            max-height: 80vh;
            overflow-y: auto;
        }
        .summary {
            position: sticky;
            top: 0;
        }
        .order-summary {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        h2, h3 {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            margin-top: 20px;
            background-color: #007bff;
            border: none;
        }
        .payment-method, .billing-address {
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #e9f5ff;
        }
        .form-check-input:checked + .form-check-label {
            color: #007bff;
        }
        .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }
        .form-check-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .form-check-label img {
            margin-left: 10px;
        }
        .info-text {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }
        /* Add this CSS to your stylesheet */
        .shipping-method {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .shipping-method input[type="radio"]:checked + .form-check-label {
            background-color: #e7f3ff;
            border-color: #b3d8ff;
            color: #007bff;
        }

        .shipping-method input[type="radio"]:checked + .form-check-label + .shipping-cost {
            background-color: #e7f3ff;
            border-color: #b3d8ff;
            color: #007bff;
        }

        .shipping-method .form-check-label, 
        .shipping-method .shipping-cost {
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Ensure the input radio is hidden */
        .shipping-method input[type="radio"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Left Section: Scrollable Form -->
            <div class="col-md-6 scrollable">
                <h2>Checkout</h2>
                <form id="checkout-form" method="POST" action="{{ route('checkout.store') }}">
                    @csrf

                    <!-- Contact -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <!-- Delivery -->
                    <h3>Delivery</h3>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apartment">Apartment, suite, etc. (optional)</label>
                        <input type="text" id="apartment" name="apartment" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>

                    <!-- Shipping method -->
                    <h3>Shipping method</h3>
                    <div class="form-check shipping-method">
                        <input class="form-check-input" type="radio" id="free_shipping" name="shipping_method" value="Free Shipping" checked>
                        <label class="form-check-label" for="free_shipping">Free Shipping</label>
                        <span class="shipping-cost" data-cost="0">Free</span>
                    </div>
                    <div class="form-check shipping-method">
                        <input class="form-check-input" type="radio" id="fast_delivery" name="shipping_method" value="Fast Delivery">
                        <label class="form-check-label" for="fast_delivery">Fast Delivery</label>
                        <span class="shipping-cost" data-cost="500">Rs 500.00</span>
                    </div>

                    <!-- Payment -->
                    <h3>Payment</h3>
                    <div class="payment-method">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="payhere" name="payment_method" value="Bank Card / Bank Account - PayHere" required>
                            <label class="form-check-label" for="payhere">
                                Bank Card / Bank Account - PayHere
                                <div>
                                    <img src="https://img.icons8.com/?size=50&id=87495&format=png&color=000000" alt="Visa">
                                    <img src="https://img.icons8.com/?size=50&id=13610&format=png&color=000000" alt="MasterCard">
                                    <img src="https://img.icons8.com/?size=50&id=So6jK8i6jddZ&format=png&color=000000" alt="Amex">
                                </div>
                            </label>
                        </div>
                        <div class="info-text">
                            After clicking “Pay now”, you will be redirected to Bank Card / Bank Account - PayHere to complete your purchase securely.
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="koko" name="payment_method" value="Koko: Buy Now Pay Later">
                            <label class="form-check-label" for="koko">Koko: Buy Now Pay Later <img src="https://img.icons8.com/?size=50&id=13608&format=png&color=000000" alt="Visa"></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="mintpay" name="payment_method" value="Mintpay | Shop now. Pay later.">
                            <label class="form-check-label" for="mintpay">Mintpay | Shop now. Pay later. <img  src="https://img.icons8.com/?size=50&id=13608&format=png&color=000000" alt="Visa"></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="cod" name="payment_method" value="Cash on Delivery (COD)">
                            <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
                        </div>
                    </div>

                    <!-- Billing address -->
                    <h3>Billing address</h3>
                    <div class="billing-address">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="same_as_shipping" name="billing_address" value="same_as_shipping" checked>
                            <label class="form-check-label" for="same_as_shipping">Same as shipping address</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="different_billing" name="billing_address" value="different_billing">
                            <label class="form-check-label" for="different_billing">Use a different billing address</label>
                        </div>
                    </div>
                    
                    <!-- PayPal Button Container -->
                    <div id="paypal-button-container"></div>

                    <!-- Initialize PayPal Button -->
                    <script src="https://www.paypal.com/sdk/js?client-id=ARzPrfNGDZjLXch6FHKZ5woRmWJvpZMrE51bgbPwK_ZeWeCmne8xgXks48YybkT_2K7H1DmoXrmnwRJP"></script>
                    <script>
                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: calculateGrandTotal(), // Update this with the actual total amount
                                        },
                                    }],
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    alert('Transaction completed by ' + details.payer.name.given_name);
                                    // Handle the result of the payment here
                                });
                            }
                        }).render('#paypal-button-container');
                    </script>
                </form>
            </div>

            <!-- Right Section: Static Product Summary -->
            <div class="col-md-6 summary">
                <div class="order-summary">
                    <h3>Order summary</h3>
                    <div id="cart-items">
                        <!-- Cart items will be displayed here -->

                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">Product</th>
                                    <th class="py-2">Price</th>
                                    <th class="py-2">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            {{-- <img src="{{ Storage::disk('public')->url($item->attributes->image) }}" alt="{{ $item->name }}" class="w-20 h-20 object-cover"> --}}
                                            <div>{{ $item->name }}</div>
                                        </td>
                                        <td class="border px-4 py-2">{{ number_format($item->price, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <p class="text-xl">Subtotal: <span id="subtotal">{{ number_format(Cart::getTotal(), 2) }}</span></p>
                    </div>
                    <p class="text-muted">Shipping: <span id="shipping-cost">Free</span></p>
                    <div class="d-flex justify-content-between">
                        <strong>Grand Total</strong>
                        <p class="text-xl">Rs <span id="grand-total">{{ number_format(Cart::getTotal(), 2) }}</span></p>
                    </div>
                    <form action="{{ route('orders') }}" method="POST">
                        @csrf
                        <!-- Include other necessary fields here -->
                        {{-- <input type="text" name="first_name" placeholder="First Name" required>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                        <input type="text" name="address" placeholder="Address" required>
                        <input type="text" name="city" placeholder="City" required>
                        <input type="text" name="postal_code" placeholder="Postal Code" required>
                        <input type="text" name="phone" placeholder="Phone" required> --}}
                        
                        <button type="submit" id="cod-button" class="btn btn-secondary">Cash on Delivery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to dynamically update shipping cost and grand total
        function updateShippingAndTotal() {
            const shippingCostElement = document.querySelector('input[name="shipping_method"]:checked').nextElementSibling.nextElementSibling;
            const shippingCost = parseFloat(shippingCostElement.dataset.cost);
            document.getElementById('shipping-cost').textContent = shippingCost === 0 ? 'Free' : 'Rs ' + shippingCost.toFixed(2);

            const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/,/g, ''));
            const grandTotal = subtotal + shippingCost;
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
        }

        // Add event listeners for shipping method change
        document.querySelectorAll('input[name="shipping_method"]').forEach(radio => {
            radio.addEventListener('change', updateShippingAndTotal);
        });

        // Initial call to set correct values on page load
        updateShippingAndTotal();

        // Fetch and display cart items
        $(document).ready(function() {
            // Assuming you have a route that returns the cart items in JSON format
            $.get('{{ route("cart.index") }}', function(data) {
                let cartItemsHtml = '';
                data.items.forEach(item => {
                    cartItemsHtml += `
                        <div class="d-flex justify-content-between">
                            <p>${item.name} x ${item.quantity}</p>
                            <p>Rs ${item.price}</p>
                        </div>
                    `;
                });
                $('#cart-items').html(cartItemsHtml);
                $('#subtotal').text(data.total.toFixed(2));
                updateShippingAndTotal();
            });
        });

        // Function to calculate the grand total for PayPal
        function calculateGrandTotal() {
            const shippingCost = parseFloat(document.querySelector('input[name="shipping_method"]:checked').nextElementSibling.nextElementSibling.dataset.cost);
            const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/,/g, ''));
            return (subtotal + shippingCost).toFixed(2);
        }

        document.getElementById('cod-button').addEventListener('click', function() {
            // Set the payment method to COD
            document.getElementById('cod').checked = true;

            // Gather form data
            const formData = {
                email: document.getElementById('email').value,
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                address: document.getElementById('address').value,
                apartment: document.getElementById('apartment').value,
                city: document.getElementById('city').value,
                postal_code: document.getElementById('postal_code').value,
                phone: document.getElementById('phone').value,
                shipping_method: document.querySelector('input[name="shipping_method"]:checked').value,
                payment_method: document.querySelector('input[name="payment_method"]:checked').value,
                billing_address: document.querySelector('input[name="billing_address"]:checked').value,
                total_amount: calculateGrandTotal()
            };

            // Send the form data to the server
            fetch('{{ route('checkout.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Order placed successfully!');
                    // Optionally, redirect to a confirmation page
                    window.location.href = '{{ route('checkout.index') }}';
                } else {
                    alert('There was an error placing your order. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
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
