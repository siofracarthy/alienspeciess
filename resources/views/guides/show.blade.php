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
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="6">
                                    <!-- use the asset function, access the file $book->book_image in the folder storage/images -->
                                    <img src="{{ asset($guide->guide_image) }}" alt="{{ $guide->title }}"
                                        width="300">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Title </td>
                                <td>{{ $guide->title }}</td>
                            </tr>

                            <tr>
                                <td class="font-bold">Description </td>
                                <td>{{ $guide->description }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Origin </td>
                                <td>{{ $guide->origin }}</td>
                            </tr>


                        </tbody>


                    </table>

                    <x-primary-button><a href="{{ route('guides.edit', $guide) }}">Edit</a> </x-primary-button>
                    <form action="{{ route('guides.destroy', $guide) }}" method="post">
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
