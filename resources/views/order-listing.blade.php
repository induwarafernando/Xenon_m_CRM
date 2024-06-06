<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Listing</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-summary {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
        .order-summary .row {
            margin-bottom: 10px;
        }
        .order-summary img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }
        .order-summary .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container mt-5">
        <h1 class="mb-4">Order Listing</h1>
        @foreach ($orders as $order)
            <div class="order-summary">
                <div class="row">
                    <div class="col-3 font-weight-bold">ORDER NO:</div>
                    <div class="col-3">{{ $order->id }}</div>
                    <div class="col-3 font-weight-bold">SHIPPED DATE:</div>
                    <div class="col-3">{{ $order->shipped_date ?? 'N/A' }}</div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold">STATUS:</div>
                    <div class="col-3">{{ $order->status }}</div>
                    <div class="col-3 font-weight-bold">ORDER AMOUNT:</div>
                    <div class="col-3">${{ $order->total }}</div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex align-items-center">
                        @foreach($order->products as $product)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail">
                        @endforeach
                        <span>+{{ $order->products->count() - 3 }} more</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('order.details', $order->id) }}" class="btn btn-primary">Order Details</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('order.track', $order->id) }}" class="btn btn-secondary">Track Order</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
