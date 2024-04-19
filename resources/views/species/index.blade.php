<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <h1 class="font-bold text-center text-black py-2" style="font-size: 2.9rem;">{{ __('All Species') }}</h1>


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-10 py-8">
                @forelse ($species as $specie)
                    <div class="bg-white py-9 px-5 border border-gray-200 shadow-sm rounded-lg flex" style="border-radius: 8;">
                        <div class="flex-none ">
                            @if ($specie->species_image)
                                <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}"style="border-radius: 5%;" width="220">
                            @else
                                No Image
                            @endif
                        </div>

                        <div class="ml-4 flex-grow">
                            <b class="font-bold">
                                <a href="{{ route('species.show', $specie) }}" style="font-size: 1.7rem;">{{ implode(' ', array_slice(explode(' ', $specie->title), 0, 3)) }} </a>

                                <p class="font-bold text-decoration:underline" style="font-size: 1.2rem; text-decoration: underline;">Habitat:
                                    @if ($specie->habitats)
                                        @foreach ($specie->habitats as $habitat)
                                            <a href="{{ route('habitats.show', $habitat->id) }}" style="font-size: 1.2rem;">{{ $habitat->title }}</a>
                                        @endforeach
                                    @else
                                        No relevent habitat found.
                                    @endif



                                </p>

                            </b>
                            <p class="mt-2">
                                <h3 class="font-bold text-1x1">
                                    <p class="font-thin" style="font-size: 1rem;">{{ implode(' ', array_slice(explode(' ', $specie->description), 0, 25)) }}</p>
                                </h3>
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No Species</p>
                @endforelse
            </div>

            <div class="flex justify-center py-4">
                <x-primary-button class="bg-green-700 hover:bg-green-800 my-6 rounded-lg">
                    <a href="{{ route('species.create') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg !important" style="font-size: 0.9rem;">Add a Species</a>
                </x-primary-button>
            </div>


        </div>
        <div class="dividers bg-green-800">
            <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
        </div>
        <footer class="bg-green-800 text-white py-5">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-5">
                        <h3 class="text-center">Invasive Alien Species</h3>
                        <!-- Add your footer content here -->
                    </div>
                    <div class="col-md-2">
                        {{-- <h3>MENU</h3> --}}
                        <!-- Add your footer content here -->
                    </div>
                    <div class="col-md-2">
                        {{-- <h3>SUPPORT</h3> --}}
                        <!-- Add your footer content here -->
                    </div>
                    <div class="col-md-2">
                        {{-- <h3>CONTACT</h3> --}}
                        <!-- Add your footer content here -->
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>
