<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment List') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h2 class="text-2xl mb-4">Your Appointment</h2>
                    @if ($appointments->isEmpty())
                        <p class="text-md mb-4">Silahkan Buat Janji Terlebih Dahulu</p>
                    @else
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="mb-18">
                            <table class="table-auto w-full mb-6 mt-6">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2">Day</th>
                                        <th class="border px-4 py-2">Status</th>
                                        <th class="border px-4 py-2">Descriptions</th>
                                        <th class="border px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $appointment->date }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->status }}</td>
                                        <td class="border px-4 py-2">{{ $appointment->descriptions }}</td>
                                        <td class="border px-4 py-2">
                                            <div class="flex items-center justify-center">
                                                @if ($appointment->status != 'done')
                                                    <x-primary-button style="background-color: rgb(254,245,117); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('client.appointment.edit', $appointment->appointment_id) }}" class="btn btn-primary">Edit</a></x-primary-button>
                                                    <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{  route('client.appointment.ordered', $appointment->appointment_id)  }}">View Ordered Items</a></x-primary-button>
                                                    <form action="{{ route('client.appointment.destroy', $appointment->appointment_id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-primary-button style="background-color: rgb(253,116,116); color: black; border: 1px solid gray;" class="ms-1"><a type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this spare part?')">Cancel</a></x-primary-button>
                                                    </form>
                                                @else
                                                    <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{  route('client.appointment.ordered', $appointment->appointment_id)  }}">View Ordered Items</a></x-primary-button>
                                                @endif
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
