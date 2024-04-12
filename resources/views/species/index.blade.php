<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Species') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}

            <x-primary-button><a href="{{ route('species.create') }}" class="btn-link btn-lg mb-2">Add a
                    Species</a></x-primary-button>

                @forelse ($species as $specie)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <b class="font-bold text-2xl">
                        <a href="{{ route('species.show', $specie) }}"> {{ $specie->title }} </a>
                    </b>

                    <p class="mt-2">

                        <h3 class="font-bold text-1x1"> <strong> Habitat Name: </strong> {{-- Consider turning company name into link which routes to show company func --}}

                            @if($specie->habitats)
                            @foreach($specie->habitats as $habitat)
                                {{ $habitat->title }}
                            @endforeach
                        @else
                            No habitats found.
                        @endif


                            {{ $specie->description }}
                            @if ($specie->species_image)
                                <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}" width="100">
                            @else
                                No Image
                            @endif
                            </p>

                </div>
            @empty
                <p>No Films</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

