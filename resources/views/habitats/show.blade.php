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
                                    <div class="display: flex; justify-content: center;"
                                        style="height: 600px; width: 1120px;">
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($habitat->species_image) }}" alt="{{ $habitat->title }}"
                                            style="height:100%; width:200%;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold py-3" style="font-size: 2.5rem;">{{ $habitat->title }}</td>
                            </tr>

                            <td class="font-bold" style="font-size: 1.2rem;">Habitat:
                                @if ($habitat->species)
                                    @foreach ($habitat->species as $specie)
                                        <a href="{{ route('species.show', $specie->id) }}">{{ $specie->title }}</a>
                                    @endforeach
                                @else
                                    No relevent habitat found.
                                @endif
                            </td>



                            <tr>
                                <td class="font-thin" style="font-size: 1.2rem;">
                                    {!! nl2br(preg_replace('/\n{2,}/', "\n", e($habitat->description))) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
