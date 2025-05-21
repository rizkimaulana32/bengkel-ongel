<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Items Ordered') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.item_ordered.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="id_items_ordered" class="block text-gray-700 text-sm font-bold mb-2">Items Ordered ID</label>
                            <input type="number" id="id_items_ordered" name="id_items_ordered" value="{{ old('id_items_ordered') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('id_items_ordered')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="appointment_id" class="block text-gray-700 text-sm font-bold mb-2">Appointment ID</label>
                            <select id="appointment_id" name="appointment_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select Appointment ID</option>
                                @foreach($appointments as $appointment)
                                <option value="{{ $appointment->appointment_id }}">
                                    {{ $appointment->appointment_id }}
                                </option>
                                @endforeach
                            </select>
                            @error('appointment_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="spare_part_id" class="block text-gray-700 text-sm font-bold mb-2">Spare Part Ordered</label>
                            <select id="spare_part_id" name="spare_part_id" value="{{ old('spare_part_id') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="spare_part_id">Select Spare Parts</option>
                                @foreach($spareParts as $sparePart)
                                <option value="{{ $sparePart->spare_part_id }}">
                                    {{ $sparePart->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('spare_part_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                            <input type="number" id="amount" name="amount" value="{{ old('amount') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('amount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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

<script>
    $(document).ready(function() {
        $('#user_id').select2({
            placeholder: "Select a user",
            allowClear: true
        });
    });
</script>