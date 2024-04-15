<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-black">
                <h1 class="font-bold text-center text-black py-2" style="font-size: 1.9rem;">
                    {{ __('High Level Risk Alien Species') }}</h1>
                <hr class="border border-green-600 my-4">
                </hr>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-10 py-8">

                    @foreach ($species as $index => $specie)
                        <div
                            class="bg-white  py-9 px-5 border border-gray-200 shadow-sm rounded-lg flex
                                    ">

                            <div class="flex-none" style="height: 200px; width: 200px;">
                                @if ($specie->species_image)
                                    <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}"
                                        style="border-radius: 50%; height: 100%; width: 200%;">
                                @else
                                    No Image
                                @endif
                            </div>



                            <div class="ml-4 flex-grow">
                                <p class="font-bold" style="font-size: 1.70rem;">
                                    <a href="{{ route('species.show', $specie) }}"> {{ $specie->title }}
                                    </a>
                                </p>

                                <h3 class="font-bold text-red-600 " style="font-size: 1.3rem;">
                                    <strong> RISK LEVEL: {{ $specie->risk_level }} </strong>
                                </h3>

                                <p class="font-bold py-2" style="font-size: 1.1rem;">Habitat:
                                    @if ($specie->habitats)
                                        @foreach ($specie->habitats as $habitat)
                                            <a href="{{ route('habitats.show', $habitat->id) }}"
                                                style="font-size: 1rem;">{{ $habitat->title }}</a>
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
</x-app-layout>
