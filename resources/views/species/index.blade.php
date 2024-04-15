<x-app-layout>
    <x-slot name="header">
        <h2 class="bg-customGreen font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Species') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">


            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}

            <h1 class="font-bold text-center text-black py-2" style="font-size: 1.9rem;">{{ __('All Species') }}</h1>
            @forelse ($species as $specie)
            <div class="my-6 p-6 border-b border-gray-200 shadow-sm sm:rounded-lg flex">
                <div class="flex-none px">
                    @if ($specie->species_image)
                        <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}" width="300">
                    @else
                        No Image
                    @endif
                </div>
                <div class="ml-4 flex-grow">
                    <b class="font-bold text-2xl py-5">
                        <a href="{{ route('species.show', $specie) }}" style="font-size: 1.7rem;"> {{ $specie->title }} </a>
                        <p class="font-bold " style="font-size: 1rem;">Habitat: {{ $specie->habitat }} </p>
                    </b>
                    <p class="mt-2">
                        <h3 class="font-bold text-1x1">
                            <p class="font-thin" style="font-size: 1rem;">{{ implode(' ', array_slice(explode(' ', $specie->description), 0, 100)) }}</p>



                            {{-- <strong> Habitat Name:</strong> --}}
                            {{-- Consider turning company name into link which routes to show company func --}}
                            {{-- @if ($specie->habitats)
                                @foreach ($specie->habitats as $habitat)
                                    {{ $habitat->title }}
                                @endforeach
                            @else
                                No habitats found.
                            @endif --}}
                        </h3>
                    </p>
                </div>
            </div>
        @empty
            <p>No Species</p>
        @endforelse


            <div class="flex justify-center py-4">
                <x-primary-button>
                    <a href="{{ route('species.create') }}" class="btn-link btn-lg m-3 p-3" style="font-size: 0.9rem;">Add a Species</a>
                </x-primary-button>
            </div>




        </div>
    </div>
</x-app-layout>
