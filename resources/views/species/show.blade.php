<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-15 p-10 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="12">
                                    <div style="display: flex; justify-content: center;">
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($species->species_image) }}" alt="{{ $species->title }}" width="600">
                                    </div>
                                </td>
                            </tr>


                                <td class="font-bold ">Title </td>
                                <td>{{ $species->title }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Description </td>
                                <td>{{ $species->description }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Origin </td>
                                <td>{{ $species->origin }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold ">Risk Level </td>
                                <td>{{ $species->risk_level }}</td>
                            </tr>
                        </tbody>


                    </table>

                    <x-primary-button><a href="{{ route('species.edit', $species) }}">Edit</a> </x-primary-button>
                    <form action="{{ route('species.destroy', $species) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button
                            onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
