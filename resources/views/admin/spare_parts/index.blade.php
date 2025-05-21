<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Spare Parts List') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <a href="{{ route('admin.spare_parts.create') }}" class="btn btn-black mb-2" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Add New Spare Part</a>
                        </div>
                        <div class="relative flex">
                            <form action="{{ route('admin.spare_parts.index') }}" method="GET" id="searchForm">
                                <input type="text" name="search" id="search" value="{{ request()->get('search') }}" placeholder="Search..." class="block w-64 py-2 px-3 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 rounded-md">
                            </form>
                        </div>
                    </div>

                    <div class="mb-6">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2">Image</th>
                                    <th class="border px-4 py-2">Description</th>
                                    <th class="border px-4 py-2">Price</th>
                                    <th class="border px-4 py-2">Stock</th>
                                    <th class="border px-4 py-2">Entry Date</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spareParts as $sparePart)
                                <tr>
                                    <td class="border px-4 py-2">{{ $sparePart->spare_part_id }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($sparePart->name, 30) }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($sparePart->picture && file_exists(public_path('storage/spare_parts/' . $sparePart->picture)))
                                        <img src="{{ asset('storage/spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" class="max-w-xs" width="200" height="200">
                                        @elseif ($sparePart->picture && file_exists(public_path('spare_parts/' . $sparePart->picture)))
                                        <img src="{{ asset('spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" class="max-w-xs" width="200" height="200">
                                        @else
                                        No image available
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ Str::limit($sparePart->description, 50) }}</td>
                                    <td class="border px-4 py-2">{{ $sparePart->price }}</td>
                                    <td class="border px-4 py-2">{{ $sparePart->stock }}</td>
                                    <td class="border px-4 py-2">{{ $sparePart->entry_date }}</td>
                                    <td class="border px-4 py-2">
                                        <div class="flex items-center justify-center">
                                            <x-primary-button style="background-color: rgb(254,245,117); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.spare_parts.edit', $sparePart->spare_part_id) }}" class="btn btn-primary">Edit</a></x-primary-button>
                                            <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.spare_parts.view', $sparePart->spare_part_id) }}" class="btn btn-info">View</a></x-primary-button>
                                            <form action="{{ route('admin.spare_parts.destroy', $sparePart->spare_part_id) }}" method="POST" style="display: inline-block;">
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
                    <div class="mb-6">
                        {{ $spareParts->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const searchForm = document.getElementById('searchForm');

            searchInput.addEventListener('input', function() {
                searchForm.submit();
            });
        });

        function changePerPage() {
            const perPageSelect = document.getElementById('perPage');
            perPageSelect.form.submit();
        }
    </script>

</x-app-layout>