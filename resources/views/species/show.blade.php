<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        #map-container {
            width: 80%;
            margin: 0 auto;
            padding-top: 10px;
            padding-bottom: 30px;
            margin-bottom: 50px;
        }

        #map {
            height: 800px;
        }
    </style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-15 p-10 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="1">
                                    <div class="display: flex; justify-content: center;"
                                        style="height: 600px; width: 1120px;">
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($species->species_image) }}" alt="{{ $species->title }}"
                                            style="height:100%; width:200%;">
                                    </div>
                                </td>
                            </tr>
                            <div class="seperation">
                                <tr>
                                    <td class="font-bold py-3" style="font-size: 2.5rem;">{{ $species->title }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold" style="font-size: 1.2rem;">First Sighted:
                                        {{ $species->sighting_year }} </td>
                                </tr>

                                <td class="font-bold" style="font-size: 1.2rem;">Habitat:
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
                                    <td class="font-bold text-red-500" style="font-size: 1.2rem;">Risk Level:
                                        {{ $species->risk_level }} </td>
                                </tr>

                                <tr>
                                    <td class="font-bold " style="font-size: 1.2rem;">Origin: {{ $species->origin }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-bold" style="font-size: 1.2rem;">Guide:
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



                                <tr>
                                    <td class="font-thin py-5" style="font-size: 1.2rem;">
                                        {!! nl2br(preg_replace('/\n{2,}/', "\n", e($species->description))) !!}
                                    </td>
                                </tr>
                                <td colspan="2">
                                    <div id="map-container">
                                        <h1 class="map font-bold text-center py-4" style="font-size: 2.3rem;">Species
                                            Locations Via Map</h1>
                                        <div id="map"></div>
                                        <script>
                                            var map = L.map('map').setView([0, 0], 3);

                                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                maxZoom: 19,
                                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                            }).addTo(map);


                                            L.marker([{{ $species->lat }}, {{ $species->lng }}]).addTo(map)
                                                .bindPopup('{{ $species->title }}')
                                                .openPopup();
                                        </script>
                                    </div>
                                </td>
                            </div>
                        </tbody>


                    </table>
                    <div class="flex justify-center">
                        <div class="mr-4">
                            <x-primary-button><a
                                    href="{{ route('species.edit', $species) }} ">Edit</a></x-primary-button>
                        </div>
                        <form action="{{ route('species.destroy', $species) }}" method="post">
                            <x-primary-button
                                onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                            @method('delete')
                            @csrf
                        </form>
                    </div>


                    </form>
                </div>
            </div>
        </div>
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



</x-app-layout>
