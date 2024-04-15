<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <div class="text-black">
                    <h1 class="font-bold text-center text-black py-2" style="font-size: 1.9rem;">{{ __('High Level Risk Alien Species') }}</h1>

                    @forelse ($species as $specie)
                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                            @if ($specie->species_image)
                                <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}" width="500">
                            @else
                                No Image
                            @endif
                            <b class="font-bold text-2xl">
                                <a href="{{ route('species.show', $specie) }}"> {{ $specie->title }} </a>
                            </b>

                            <p class="mt-2">
                                <h3 class="font-bold text-1x1 "> <strong> Risk Level: {{ $specie->risk_level }} </strong></h3>
                                <p class="font-thin">{{ $specie->description }}</p>
                            </p>
                        </div>
                    @empty
                        <p>No Species</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
