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
                        <a href="{{ route('admin.item_ordered.selectuser') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add Items Ordered</a>
                    </div>

                    @if ($itemsorder->isEmpty())
                    <p class="text-xl mb-4 px-2">Silahkan Tambahkan Item Terlebih Dahulu</p>
                    @else
                    <div class="mb-18">
                        <table class="table-auto w-full mb-6 mt-6">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">ID Appointment</th>
                                    <th class="border px-4 py-2">ID Sparepart</th>
                                    <th class="border px-4 py-2">Amount</th>
                                    <th class="border px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemsorder as $itemsOrder)
                                <tr>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->items_ordered_id }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->appointment_id }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->spare_part_id }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $itemsOrder->amount }}</td>
                                    <td class="border px-4 py-2 align-middle">
                                        <div class="flex items-center justify-center">
                                            <x-primary-button style="background-color: rgb(254,245,117); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.item_ordered.edit', $itemsOrder->items_ordered_id) }}" class="btn btn-primary">Edit</a></x-primary-button>
                                            <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.item_ordered.view', $itemsOrder->items_ordered_id) }}" class="btn btn-info">View</a></x-primary-button>
                                            <form action="{{ route('admin.item_ordered.destroy', $itemsOrder->items_ordered_id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button style="background-color: rgb(253,116,116); color: black; border: 1px solid gray;" class="ms-1"><a type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this spare part?')">Delete</a></x-primary-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>