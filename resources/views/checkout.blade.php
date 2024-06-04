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
                <form method="POST" action="{{ route('checkout.store') }}">
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
                <span class="shipping-cost">Free</span>
                </div>
                
                {{-- // Add more shipping methods here fast delivery duplicate the above code and change the values --}}
                <div class="form-check
                shipping-method">
                <input class="form-check-input" type="radio" id="fast_delivery" name="shipping_method" value="Fast Delivery">
                <label class="form-check-label" for="fast_delivery">Fast Delivery</label>
                <span class="shipping-cost">Rs 500.00</span>

    


                    


                </div>

                    <!-- Payment -->
                    <h3>Payment</h3>
                    <div class="payment-method">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="payhere" name="payment_method" value="Bank Card / Bank Account - PayHere" required>
                            <label class="form-check-label" for="payhere">
                                Bank Card / Bank Account - PayHere
                                <div>
                                    <img src="https://example.com/visa.png" alt="Visa">
                                    <img src="https://example.com/mastercard.png" alt="MasterCard">
                                    <img src="https://example.com/amex.png" alt="Amex">
                                    <img src="https://example.com/discover.png" alt="Discover">
                                </div>
                            </label>
                        </div>
                        <div class="info-text">
                            After clicking “Pay now”, you will be redirected to Bank Card / Bank Account - PayHere to complete your purchase securely.
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="koko" name="payment_method" value="Koko: Buy Now Pay Later">
                            <label class="form-check-label" for="koko">Koko: Buy Now Pay Later <img src="https://example.com/visa.png" alt="Visa"></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="mintpay" name="payment_method" value="Mintpay | Shop now. Pay later.">
                            <label class="form-check-label" for="mintpay">Mintpay | Shop now. Pay later. <img src="https://example.com/visa.png" alt="Visa"></label>
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
                                        value: '7000', // Update this with the actual total amount
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
            </div>

            <!-- Right Section: Static Product Summary -->
            <div class="col-md-6 summary">
                <div class="order-summary">
                    <h3>Order summary</h3>
                    <div class="d-flex justify-content-between">
                        <p>Aqua Blue Washed Oxford Long Sleeve Shirt</p>
                        <p>Rs 7,000.00</p>
                    </div>
                    <p class="text-muted">Shipping: Free</p>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <p class="text-xl">Subtotal: {{ number_format(Cart::getTotal(), 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
