<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items Ordered List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $user->name  }} Ordered Items</h1>
                        <a href="{{ route('admin.item_ordered.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">ID:</span>
                            <span class="text-lg font-semibold">{{ $itemsOrder->items_ordered_id  }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">ID Appointment</span>
                            <p class="text-lg font-semibold">{{ $itemsOrder->appointment_id  }}</p>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">ID Sparepart</span>
                            <span class="text-lg font-semibold">{{ $itemsOrder->spare_part_id  }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Sparepart Name</span>
                            <span class="text-lg font-semibold">{{ $sparePart->name  }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600">Amount</span>
                            <span class="text-lg font-semibold">{{ $itemsOrder->amount  }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>