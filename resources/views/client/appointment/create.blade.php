<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Appointment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('client.appointment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Appointment Date</label>
                            <input type="date" id="date" name="date" value="{{ old('date') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="text" class="block text-gray-700 text-sm font-bold mb-2">Descriptions</label>
                            <input type="text" name="descriptions" value="{{ old('descriptions') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <table class="table-auto w-full mb-6">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">Spare Part</th>
                                    <th class="border px-4 py-2">Quantity</th>
                                    <th class="border px-4 py-2">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
                                    <td class="border px-4 py-2 text-center align-middle">
                                        <a href="{{  route('sparepart.details', $cart->sparePart->spare_part_id)  }}">
                                            {{ $cart->sparePart->name }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $cart->quantity }}</td>
                                    <td class="border px-4 py-2 text-center align-middle">{{ $cart->sparePart->price * $cart->quantity  }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('client.appointment.index') }}" class="btn btn-black mb-2" style="padding: 15px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Back</a>
                        <button type="submit" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Order</button>
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