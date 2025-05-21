<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Select User') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table class="table-auto w-full mb-6 mt-6">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Username</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">
                                    <x-primary-button style="background-color: rgb(116,116,253); color: black; border: 1px solid gray;" class="ms-1"><a href="{{ route('admin.item_ordered.create', $user->id) }}" class="btn btn-info">{{ $user->name  }}</a></x-primary-button>
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

<script>
    $(document).ready(function() {
        $('#user_id').select2({
            placeholder: "Select a user",
            allowClear: true
        });
    });
</script>