<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged as ")}}{{ Auth::user()->name }}!
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-10 text-2xl">
                        Financial Overview
                    </div>
                    <canvas id="financialChart" width="400" height="200"></canvas> <!-- Lebar dan tinggi canvas disesuaikan -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const financialChart = document.getElementById('financialChart').getContext('2d');
            const chart = new Chart(financialChart, {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [{
                            label: 'Sales Amount',
                            data: @json($salesAmount),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                            yAxisID: 'y-axis-1'
                        },
                        {
                            label: 'Parts Sold',
                            data: @json($partsSold),
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1,
                            yAxisID: 'y-axis-2'
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                                type: 'linear',
                                display: true,
                                position: 'left',
                                id: 'y-axis-1',
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Sales Amount ($)'
                                }
                            },
                            {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                id: 'y-axis-2',
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Parts Sold'
                                }
                            }
                        ]
                    }
                }
            });
        });
    </script>
</x-app-layout>