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
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mt-10 mb-10 text-2xl">
                        <a href="{{ route('admin.appointment.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add Appointment</a>
                    </div>

                    @if ($appointments->isEmpty())
                    <p class="text-xl mb-4 px-2">Silahkan Buat Janji Terlebih Dahulu</p>
                    @else
                    <div class="mb-18">
                        <table class="table-auto w-full mb-6 mt-6">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Items Ordered</th>
                                    <th class="border px-4 py-2">ID User</th>
                                    <th class="border px-4 py-2">Day</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td class="border px-4 py-2">{{ $appointment->appointment_id }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.item_ordered.indexappointment', $appointment->appointment_id) }}">View Ordered Items</a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $appointment->user_id }}</td>
                                    <td class="border px-4 py-2">{{ $appointment->date }}</td>
                                    <td class="border px-4 py-2">{{ $appointment->status }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex items-center justify-center">
                                            @if ($appointment->status != 'done')
                                            <x-primary-button style="background-color: rgb(254,245,117); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.appointment.edit', $appointment->appointment_id) }}" class="btn btn-primary">Edit</a></x-primary-button>
                                            <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.appointment.view', $appointment->appointment_id) }}" class="btn btn-info">View</a></x-primary-button>
                                            <form action="{{ route('admin.appointment.destroy', $appointment->appointment_id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button style="background-color: rgb(253,116,116); color: black; border: 1px solid gray;" class="ms-1"><a type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</a></x-primary-button>
                                            </form>
                                            <form action="{{ route('admin.appointment.done', $appointment->appointment_id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <x-primary-button style="background-color: rgb(116, 253, 162); color: black; border: 1px solid gray;" class="ms-1"><a type="submit" class="btn btn-info">Done</a></x-primary-button>
                                            </form>
                                            @else
                                            <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.appointment.view', $appointment->appointment_id) }}" class="btn btn-info">View</a></x-primary-button>
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