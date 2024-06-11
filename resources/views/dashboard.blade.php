<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            .card-container {
                display: flex;
                flex-wrap: wrap;
            }
            .card {
                flex: 1;
                margin: 10px;
                padding: 20px;
                border-radius: 10px;
                color: white;
                min-width: 200px;
                max-width: 300px; /* Maximum width for the cards */
            }
            .info-card {
                display: flex;
                justify-content: space-between;
                padding: 20px;
                border-radius: 10px;
                background-color: #64a2ff;
                color: white;
                max-width: 1270px; /* Maximum width for the cards */
            }
            .chart-container {
                width: 100%;
                height: 50vh;
            }
            .container {
                margin-left: 0px;
                margin-right: 0px;
                padding-left: 120px;
                padding-right: 120px;
            }
        </style>
    </head>
    <body class="bg-gray-100">
    
          
        <div class="container mx-auto py-10">
            <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
            <div class="card-container">
                <!-- Customers Card -->
                <div class="bg-gradient-to-r  from-green-400 to-green-500 card">
                    <div class="flex items-center  justify-between">
                        <div>
                            <h2 class="text-xl font-bold">Total Customers</h2>
                            <p>Customers</p>
                        </div>
                        <span class="text-4xl font-bold">{{ $totalCustomers ?? 0 }}</span>
                    </div>
                </div>
                <!-- Merchandizers Card -->
                <div class="bg-gradient-to-r from-pink-400 to-pink-500 card">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold">Total Merchandizers</h2>
                            <p>Merchandizers</p>
                        </div>
                        <span class="text-4xl font-bold">{{ $totalMerchandizers ?? 0 }}</span>
                    </div>
                </div>
                <!-- Products Card -->
                <div class="bg-gradient-to-r from-blue-400 to-blue-500 card">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold">Total Products</h2>
                            <p>Products</p>
                        </div>
                        <span class="text-4xl font-bold">{{ $totalProducts ?? 0 }}</span>
                    </div>
                </div>
                <!-- Orders Card -->
                <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 card">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold">Total Orders</h2>
                            <p>Orders</p>
                        </div>
                        <span class="text-4xl font-bold">{{ $totalOrders ?? 0 }}</span>
                    </div>
                </div>
            </div>
            <div class="info-card my-6">
                <div>
                    <h2 class="text-2xl font-bold">Hi, {{ Auth::user()->name }} and welcome to Xenon dashboard!</h2>
                    <p class="text-lg">Here's a quick overview of your sales.</p>
                </div>
                @can('is-superadmin')
                <div class="flex items-center">
                    <img height="20" src="https://i.ibb.co/b7w8RM3/Induwara-Fernando-CV-2023-10-4.png" alt="Avatar" class="rounded-full">
                    </div>
                @endcan
                    </div>
            <div class="mt-6 flex flex-row">
                <div class="w-1/2">
                    <h2 class="text-xl font-bold">Sales Overview</h2>
                    <p class="text-4xl font-bold">Total Sales: LKR {{ number_format($totalSales ?? 0, 2) }}</p>
                    <div class="chart-container">
                        <canvas id="combinedChart"></canvas>
                    </div>
                </div>
                <div class="w-1/2 ml-6 pt-16">
                    <h2 class="text-xl font-bold">Line Chart</h2>
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            
    
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const combinedCtx = document.getElementById('combinedChart').getContext('2d');
                new Chart(combinedCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Customers', 'Merchandizers', 'Products', 'Orders'],
                        datasets: [{
                            label: 'Data',
                            data: [{{ $totalCustomers ?? 0 }}, {{ $totalMerchandizers ?? 0 }}, {{ $totalProducts ?? 0 }}, {{ $totalOrders ?? 0 }}],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
    
                const lineCtx = document.getElementById('lineChart').getContext('2d');
                new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: @json($orderNumbers ?? []),
                        datasets: [{
                            label: 'Total of Each Order',
                            data: @json($orderTotals ?? []),
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            fill: false,
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Number of Orders'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Total of Each Order'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    
    </body>
    </html>
    </x-app-layout>
    