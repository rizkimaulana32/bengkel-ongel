<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} User
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged as ")}}{{ Auth::user()->name }}!
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-10 text-2xl">
                        Spare Parts
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Image</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">Stock</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spareParts as $sparePart)
                            <tr>
                                <td class="border px-4 py-2 text-center align-middle">{{ $sparePart->id_spare_part }}</td>
                                <td class="border px-4 py-2">{{ $sparePart->nama_spare_part }}</td>
                                <td class="border px-4 py-2">
                                    @if ($sparePart->gambar)
                                    <img src="{{ asset('storage/spare_parts/' . $sparePart->gambar) }}" alt="Spare Part Image" class="max-w-xs">
                                    @else
                                    No image available
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $sparePart->deskripsi }}</td>
                                <td class="border px-4 py-2">{{ $sparePart->harga }}</td>
                                <td class="border px-4 py-2 text-center align-middle">{{ $sparePart->stock_spare_part }}</td>
                                <td class="border px-4 py-2 text-center align-middle">
                                    @if ($sparePart->stock_spare_part > 0)
                                    <form action="{{ route('cart.store', $sparePart->id_spare_part) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Buy</button>
                                    </form>
                                    @else
                                    <button class="btn btn-primary" disabled>No Stock</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>