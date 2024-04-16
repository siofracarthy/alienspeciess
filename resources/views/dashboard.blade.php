<x-app-layout>
    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-black">
                <h1 class="font-bold text-white pt-5 my-5  max-w-md" style="font-size: 4.9rem;">
                    {{ __('Invasive Alien Species') }}</h1>


                <p class="text-white max-w-md" style="font-size: 1.3rem;">Invasive alien species are species that aren't
                    native to a country and are therefore treacherous to the native species. Invasive alien species are
                    species that aren't native to a country and are therefore </p>

                <x-primary-button class="bg-green-700 hover:bg-green-800 my-8 rounded-lg py-2">
                    <a href="{{ route('species.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg !important"
                        style="font-size: 0.9rem;">View all Species</a>
                </x-primary-button>


            </div>
        </div>

        <div class="bg-gray-100 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" text-black">
                    <h1 class=" font-bold text-center text-black py-2" style="font-size: 2.3rem;">
                        {{ __(' High Risk Level Species') }}</h1>
                    {{-- <hr class="border border-green-600 my-4">
                    </hr> --}}

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-10 py-8">

                        @foreach ($species as $index => $specie)
                            <div
                                class="bg-white py-9 px-5 border border-gray-200 shadow-sm rounded-lg flex
                                        {{ $index % 2 == 0 ? 'flex-row' : 'flex-row-reverse' }}">


                                <div class="flex-none" style="height: 200px; width: 200px;">
                                    @if ($specie->species_image)
                                        <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}"
                                            style="border-radius: 50%; height: 100%; width: 200%;">
                                    @else
                                        No Image
                                    @endif
                                </div>

                                <div class="ml-4 flex-grow">
                                    <p class="font-bold my-1" style="font-size: 1.70rem;">
                                        <a href="{{ route('species.show', $specie) }}"> {{ $specie->title }}
                                        </a>
                                    </p>

                                    <h3 class="font-bold text-red-600 my-1" style="font-size: 1.3rem;">
                                        <strong> RISK LEVEL: {{ $specie->risk_level }} </strong>
                                    </h3>

                                    <p class="font-bold" style="font-size: 1rem;">Habitat:
                                        @if ($specie->habitats)
                                            @foreach ($specie->habitats as $habitat)
                                                {{-- https://www.tailwindtoolbox.com/icons --}}
                                                <a href="text-blue-300 {{ route('habitats.show', $habitat->id) }}"
                                                    style="font-size: 0.9rem; display: inline-flex;">
                                                    {{ $habitat->title }}
                                                    @if ($habitat->id === 2)
                                                        <svg class="mx-2 h-5 w-6 text-blue-600" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                                        </svg>
                                                    @endif

                                                    @if ($habitat->id === 3)
                                                        <svg class="h-5 w-8 text-red-600" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z" />
                                                        </svg>
                                                    @endif
                                                </a>
                                            @endforeach
                                        @else
                                            No relevant habitat found.
                                        @endif
                                    </p>






                                    <p class="font-thin" style="font-size: 1rem;">
                                        {{ implode(' ', array_slice(explode(' ', $specie->description), 0, 55)) }}
                                    </p>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
