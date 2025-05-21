<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="px-4 flex justify-between">
                        <h2 class="text-2xl mb-4">Your Cart</h2>
                        @if (!$carts->isEmpty())
                        <div class="mt-10 mb-10 text-2xl">
                            <a href="{{ route('client.appointment.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Make Appointment</a>
                        </div>
                        @endif
                    </div>
                    @if ($carts->isEmpty())
                    <p class="text-md mb-4 px-4">Silahkan Masukkan Barang ke Keranjang Terlebih Dahulu</p>
                    @else
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Spare Part</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Total Price</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td class="border px-4 py-2 text-center align-middle">
                                    <a href="{{ route('sparepart.details', $cart->sparePart->spare_part_id) }}">
                                        {{ $cart->sparePart->name }}
                                    </a>
                                </td>
                                <td class="border px-4 py-2 text-center align-middle">{{ $cart->quantity }}</td>
                                <td class="border px-4 py-2 text-center align-middle">{{ $cart->sparePart->price * $cart->quantity }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center space-x-1">
                                        <form action="{{ route('cart.update', $cart->cart_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="action" value="decrease" class="text-gray-600 focus:outline-none focus:text-gray-900 px-2 py-1 text-md">
                                                Decrease
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.update', $cart->cart_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="action" value="increase" class="text-gray-600 focus:outline-none focus:text-gray-900 px-2 py-1 text-md">
                                                Increase
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.destroy', $cart->cart_id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-2 py-1 text-md">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>