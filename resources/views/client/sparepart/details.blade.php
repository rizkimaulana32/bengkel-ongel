<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Spare Part') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $sparePart->name }} Details</h1>
                        <a href="{{ route('welcome') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                    <div class="flex gap-4 justify-between">
                        <div class="flex flex-col w-1/2">
                            <div class="flex flex-col">
                                @if ($sparePart->picture && file_exists(public_path('storage/spare_parts/' . $sparePart->picture)))
                                <img src="{{ asset('storage/spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" class="max-w-xs" width="300" height="300">
                                @elseif ($sparePart->picture && file_exists(public_path('spare_parts/' . $sparePart->picture)))
                                <img src="{{ asset('spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" class="max-w-xs" width="300" height="300">
                                @else
                                <img src="https://via.placeholder.com/300" alt="Placeholder Image" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col w-1/2">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Description:</span>
                                <p class="text-lg">{{ $sparePart->description }}</p>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Price:</span>
                                <span class="text-lg font-semibold">Rp {{ $sparePart->price }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-600">Stock:</span>
                                <span class="text-lg font-semibold">{{ $sparePart->stock }}</span>
                            </div>
                        </div>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 sm:px-20 bg-white" style="padding-top: 7%;">
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex-col justify-center align-center">
                                @csrf
                                <div class="mb-4">
                                    <input type="hidden" id="spare_part_id" name="spare_part_id" value="{{ $sparePart->spare_part_id }}">
                                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                                    <input type="number" id="amount" name="amount" value="{{ old('amount') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @error('amount')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="spareparts" class="flex" style="justify-content: center; margin: 0;">
        @foreach ($spareparts as $sparepart)
        <a href="{{ route('sparepart.details', $sparepart->spare_part_id) }}" class="card spare-part" style="width: 200px; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #ffffff; margin: 0px 20px 100px 20px; text-decoration: none; display: inline-block; transition: transform 0.2s;">
            @if ($sparepart->picture && file_exists(public_path('storage/spare_parts/' . $sparepart->picture)))
            <img src="{{ asset('storage/spare_parts/' . $sparepart->picture) }}" alt="Spare Part Image" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
            @elseif ($sparepart->picture && file_exists(public_path('spare_parts/' . $sparepart->picture)))
            <img src="{{ asset('spare_parts/' . $sparepart->picture) }}" alt="Spare Part Image" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
            @else
            <img src="https://via.placeholder.com/300" alt="Placeholder Image" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
            @endif
            <h2 style="font-size: 24px; margin-bottom: 10px; color: #000;">{{ \Illuminate\Support\Str::limit($sparepart->name, 20) }}</h2>
            <p style="font-size: 16px; line-height: 1.6; color: #555555;">Rp {{ $sparepart->price }}</p>
        </a>
        @endforeach
    </div>

</x-app-layout>