<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        #map-container {
            width: 50%;
            margin: 0 auto;
            padding-top: 10px;
            padding-bottom: 30px;
            margin-bottom: 50px;
        }

        #map {
            height: 1000px;
        }
    </style>

    <div class="bg-green-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <div class="text-black flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-white pt-5 my-5 " style="font-size: 4.9rem;">
                        {{ __('Invasive Alien Species') }}</h1>

                    <p class="text-white py-5" style="font-size: 1.3rem;">An invasive alien species refers to a plant, animal, or microorganism that is introduced to a new environment and causes harm to native species, ecosystems, or human activities. They often outcompete native species for resources, disrupt ecosystems, and can have negative economic and ecological impacts.</p>

                    <x-primary-button class="bg-green-700 hover:bg-green-800 my-8 rounded-lg py-3">
                        <a href="{{ route('species.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg"
                            style="font-size: 0.9rem;">View
                            all Species</a>
                    </x-primary-button>
                </div>

            </div>
        </div>

    </div>

    <div class="bg-gray-100 py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
            <div class="text-black py-12 ">
                <h1 class="font-bold text-black py-2" style="font-size: 2.3rem;">
                    {{ __('High Risk Level Species') }}
                </h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 py-8">
                    @forelse ($species as $specie)
                        <div class="bg-white rounded-lg border border-gray-200 shadow-sm flex flex-col">
                            <div class="h-48 relative">

                                @if ($specie->species_image)
                                    <img src="{{ asset($specie->species_image) }}" alt="{{ $specie->title }}"
                                        class="object-cover w-full h-full">
                                @else
                                    <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                                        No Image
                                    </div>
                                @endif

                            </div>
                            <div class="px-6 py-4">
                                <b class="font-bold">
                                    <p class="font-bold  text-red-600" style="font-size: 1rem;">
                                        <strong> Risk Level: {{ $specie->risk_level }} </strong>
                                    </p>
                                    <a href="{{ route('species.show', $specie) }}"
                                        style="font-size: 1.4rem;">{{ implode(' ', array_slice(explode(' ', $specie->title), 0, 2)) }}</a>
                                </b>
                                <p class="font-thin" style="font-size: 1rem;">
                                    {{ implode(' ', array_slice(explode(' ', $specie->description), 0, 25)) }}
                                </p>

                            </div>
                        </div>
                    @empty
                        <p class="text-center">No Species</p>
                    @endforelse
                </div>

            </div>
        </div>

    </div>


    <div class="dividers bg-green-800">
        <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
    </div>

    <div class="bg-white py-12">
        <div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-8 py-1">
            <h1 class="font-bold text-green-800 py-2 " style="font-size: 2.3rem;">
                {{ __('Recently Added Guides') }}</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-10 py-7">
                @forelse ($guides as $guide)
                    <div class="bg-white py-9 px-5 border border-green-600 shadow-sm rounded-lg flex">
                        <div class="flex-none" style="height: 200px; width: 200px;">
                            @if ($guide->guide_image)
                                <img src="{{ asset($guide->guide_image) }}" alt="{{ $guide->title }}"
                                    style="border-radius: 50%; height: 100%; width: 200%;">
                            @else
                                No Image
                            @endif
                        </div>

                        <div class="ml-4 flex-grow">
                            <b class="font-bold">
                                <a href="{{ route('guides.show', $guide) }}" class="text-green-00"
                                    style="font-size: 1.7rem;">{{ implode(' ', array_slice(explode(' ', $guide->title), 0, 3)) }}
                                </a>
                            </b>
                            <p class="mt-2">
                            <h3 class="font-bold text-1x1">
                                <p class="font-thin text-green-600" style="font-size: 1.1rem;">
                                    {{ implode(' ', array_slice(explode(' ', $guide->description), 0, 25)) }}</p>
                            </h3>
                            </p>
                        </div>
                    </div>
                @empty
                    {{-- <p class="text-center">No Species</p> --}}
                @endforelse

            </div>
        </div>
        <div class="flex justify-center py-4">
            <x-primary-button class="bg-green-600 hover:bg-green-800 my-6 rounded-lg">
                <a href="{{ route('guides.index') }}" class="btn btn-link btn-lg px-5 py-3 rounded-lg"
                    style="font-size: 0.9rem;">View All Guides</a>
            </x-primary-button>
        </div>
    </div>




    <div class="dividers bg-green-800">
        <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
    </div>
    <div id="map-container">
        <h1 class="map font-bold text-center py-4" style="font-size: 2.3rem;">Species Locations Via Map</h1>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);


            @foreach ($species as $specie)
                var marker = L.marker([{{ $specie->lat }}, {{ $specie->lng }}]).addTo(map);
                marker.bindPopup('{{ $specie->title }}').openPopup();
            @endforeach
        </script>
    </div>





    <div class="dividers bg-green-800">
        <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
    </div>
    <footer class="bg-green-800 text-white py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col lg:flex-row items-start">
            <div class="lg:mr-12">
                <h3 class="font-bold text-center lg:text-left" style="font-size: 2rem;">Invasive Alien Species</h3>
                <p class="font-thin max-w-xl text-center lg:text-left">
                    An invasive alien species refers to a plant, animal, or microorganism that is introduced to a new
                    environment and causes harm to native species, ecosystems, or human activities. They often
                    outcompete
                    native species for resources, disrupt ecosystems, and can have negative economic and ecological
                    impacts.
                </p>
            </div>
            <ul class="flex flex-col py-4 mx-4">
                <h3 class="text-center text-bold" style="font-size: 1.3rem;">Quick Links:</h3>
                <li class="text-thin py-1">
                    <a href="{{ route('species.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Species</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('guides.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Guides</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('habitats.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Habitats</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('milestone.leaderboard') }}"
                        class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3" style="font-size: 0.9rem;">View
                        Leaderboard</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('profile.edit') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View Profile</a>
                </li>
            </ul>
        </div>
    </footer>


    </div>



</x-app-layout>
