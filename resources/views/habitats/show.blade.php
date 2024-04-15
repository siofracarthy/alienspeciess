<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot> --}}

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-15 p-10 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="1">
                                    <!-- use the asset function, access the file $book->book_image in the folder storage/images -->
                                    <img src="{{ asset($habitat->species_image) }}" alt="{{ $habitat->title }}"
                                        width="600">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold py-5 ">Title: </td>
                                <td> {{ $habitat->title }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold py-5 ">Description </td>
                                <td>{{ $habitat->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
