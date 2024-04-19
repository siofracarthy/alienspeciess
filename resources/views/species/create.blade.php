<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html,
        body,
        #map {
            height: 100%;
            width: 10;
        }
    </style>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <h1 class="font-bold text-center text-black py-2" style="font-size: 1.9rem;">{{ __('Create Species') }}</h1>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <hr class="border border-green-600 my-4">
            </hr>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('species.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Title:') }}</h1>
                    <x-text-input type="text" name="title" field="title" placeholder="Title.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('title')"></x-text-input>

                    @error('title')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Description:') }}</h1>
                    <x-textarea name="description" rows="10" field="description" placeholder="Description.."
                        style="margin-bottom: 20px;" class="w-full mt-2" :value="@old('description')">
                    </x-textarea>

                    @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Origin:') }}</h1>
                    <x-text-input type="text" name="origin" field="origin" placeholder="Origin.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('origin')"></x-text-input>

                    @error('origin')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Habitat:') }}</h1>

                    <x-text-input type="text" name="habitat" field="habitat" placeholder="Habitat.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('habitat')"></x-text-input>

                    {{-- <div class="form-group">
                            <label for="habitats"> <strong> Habitats: </strong> <br> </label>
                            @foreach ($habitats as $habitat)
                                <input type="checkbox" value="{{ $habitat->id }}" name="habitats[]">
                                {{ $habitat->title }}
                            @endforeach
                        </div> --}}

                    @error('habitats')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror


                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Sighting Date:') }}</h1>
                    <x-text-input type="date" name="sighting_year" field="sighting_year"
                        placeholder="Sighting Year.." style="margin-bottom: 20px;" class="w-65" autocomplete="off"
                        :value="@old('sighting_year')"></x-text-input>

                    @error('sighting_year')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Risk Level:') }}</h1>

                    <x-text-input type="number" name="risk_level" field="risk_level" placeholder="Risk Level.."
                        style="margin-bottom: 20px;" class="w-65" autocomplete="off" :value="@old('risk_level')"></x-text-input>

                    @error('risk_level')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Latitude:') }}</h1>

                    <x-text-input type="text" name="lat" id="latitude" field="lat" placeholder="Latitude.."
                        style="margin-bottom: 20px;" class="w-65" autocomplete="off" :value="old('lat')"></x-text-input>

                    @error('lat')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Longitude:') }}</h1>
                    <x-text-input type="text" name="lng" id="longitude" field="lng" placeholder="Longitude.."
                        style="margin-bottom: 20px;" class="w-65" autocomplete="off" :value="old('lng')"></x-text-input>

                    @error('lng')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <x-file-input type="file" name="species_image" placeholder="Species" style="margin-bottom: 20px;"
                        class="w-full mt-6" field="species_image" :value="@old('species_image')">>
                    </x-file-input>



                    <div id="map" style="height: 400px;"></div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var map = L.map('map').fitWorld();

                            map.locate({
                                setView: true,
                                maxZoom: 16
                            });

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '© OpenStreetMap'
                            }).addTo(map);

                            function onLocationFound(e) {
                                var radius = e.accuracy;

                                L.marker(e.latlng).addTo(map)
                                    .bindPopup("You are within " + radius + " meters from this point").openPopup();

                                L.circle(e.latlng, radius).addTo(map);

                                // Populate the latitude and longitude fields in the form
                                document.getElementById('latitude').value = e.latlng.lat;
                                document.getElementById('longitude').value = e.latlng.lng;
                            }

                            map.on('locationfound', onLocationFound);

                            function onLocationError(e) {
                                alert(e.message);
                            }

                            map.on('locationerror', onLocationError);

                            // Prevent form submission when clicking on the map
                            map.on('click', function(e) {
                                if (document.activeElement.tagName.toLowerCase() !== 'input') {
                                    map.removeEventListener('locationfound',
                                        onLocationFound); // Remove event listener temporarily
                                    map.removeEventListener('locationerror', onLocationError);
                                }
                            });
                        });
                    </script>


                    {{-- <div class="mt-6">
                        <x-select-company name="company_id" :companies="$companies" :selected="old('company_id')" />
                    </div> --}}

                    <div class="text-center">
                        <x-primary-button class="mt-6">Save Film</x-primary-button>
                    </div>
                </form>

            </div>
            <hr class="border border-green-600 my-4">
            </hr>
        </div>

    </div>
    <div class="dividers bg-green-800">
        <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
    </div>
    <footer class="bg-green-800 text-white py-12">
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

</x-app-layout>
