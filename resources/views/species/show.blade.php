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
                                <td rowspan="1">
                                    <div style="display: flex; justify-content: center;">
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($species->species_image) }}" alt="{{ $species->title }}"
                                            width="600">
                                    </div>
                                </td>
                            </tr>


                            <div class="seperation">

                                <tr>
                                    <td class="font-bold py-5" style="font-size: 1.70rem;">{{ $species->title }}</td>
                                </tr>



                                <tr>
                                    <td class="font-thin" style="font-size: 1rem;">{{ $species->description }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold ">Origin: {{ $species->origin }} </td>
                                </tr>

                                <tr>
                                    <td class="font-bold ">Risk Level: {{ $species->risk_level }} </td>
                                </tr>

                                <tr>
                                    <td class="font-bold ">Habitat: {{ $species->habitat }} </td>
                                </tr>

                                <tr>
                                    <td class="font-bold ">Guide:
                                        @if ($species->guides)
                                            @foreach ($species->guides as $guide)
                                                {{ $guide->guide_url }}
                                            @endforeach
                                        @else
                                            No habitats found.
                                        @endif
                                    </td>
                                </tr>

                            </div>
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
