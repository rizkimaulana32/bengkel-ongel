<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items Ordered List') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mt-10 mb-10 text-2xl">
                        <a href="{{ route('client.appointment.index') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Back</a>
                    </div>

                    <div class="mb-18">
                        <table class="table-auto w-full mb-6 mt-6">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">Sparepart</th>
                                    <th class="border px-4 py-2">Amount</th>
                                    <th class="border px-4 py-2">Price</th>
                                    <th class="border px-4 py-2">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderedItems as $itemsOrder)
                                <tr>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->sparePart->name }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->amount }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->sparePart->price }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->amount * $itemsOrder->sparePart->price  }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>