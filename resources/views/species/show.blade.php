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
                                    <div class="display: flex; justify-content: center;" style="height: 600px; width: 1120px;" >
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($species->species_image) }}" alt="{{ $species->title }}"
                                        style="height:100%; width:200%;">
                                    </div>
                                </td>
                            </tr>
                            <div class="seperation">
                                <tr>
                                    <td class="font-bold py-2" style="font-size: 1.9rem;">{{ $species->title }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold" style="font-size: 1.2rem;">First Sighted:
                                        {{ $species->sighting_year }} </td>
                                </tr>
                                <tr>
                                    <td class="font-bold text-red-500" style="font-size: 1.2rem;">Risk Level:
                                        {{ $species->risk_level }} </td>
                                </tr>


                                <tr>
                                    <td class="font-thin" style="font-size: 1.2rem;">
                                        {!! nl2br(preg_replace('/\n{2,}/', "\n", e($species->description))) !!}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-bold ">Origin: {{ $species->origin }} </td>
                                </tr>
                                <td class="font-bold">Habitat:
                                    @if ($species->habitats)
                                        @foreach ($species->habitats as $habitat)
                                            <a
                                                href="{{ route('habitats.show', $habitat->id) }}">{{ $habitat->title }}</a>
                                        @endforeach
                                    @else
                                        No relevent habitat found.
                                    @endif
                                </td>

                                <tr>
                                    <td class="font-bold">Guide:
                                        @if ($species->guides)
                                            @foreach ($species->guides as $guide)
                                                <a
                                                    href="{{ route('guides.show', $guide->id) }}">{{ $guide->guide_url }}</a>
                                            @endforeach
                                        @else
                                            No relevent guides found.
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
