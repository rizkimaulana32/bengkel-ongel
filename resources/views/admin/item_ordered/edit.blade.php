<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.item_ordered.update', $itemsOrder->items_ordered_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="items_ordered_id" class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                            <input type="text" id="items_ordered_id" name="items_ordered_id" value="{{ $itemsOrder->items_ordered_id }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="appointment_id" class="block text-gray-700 text-sm font-bold mb-2">Appointment ID</label>
                            <input type="text" id="appointment_id" name="appointment_id" value="{{ $itemsOrder->appointment_id }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="spare_part_id" class="block text-gray-700 text-sm font-bold mb-2">Sparepart ID</label>
                            <input type="text" id="spare_part_id" name="spare_part_id" value="{{ $itemsOrder->spare_part_id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                            <input type="number" id="amount" name="amount" value="{{ $itemsOrder->amount }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <a href="{{ route('admin.item_ordered.index') }}" class="btn btn-black mb-2" style="padding: 15px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Back</a>
                        <button type="submit" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>