<x-app-layout>
    {{-- <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Species') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <h1 class="font-bold text-center text-black py-2" style="font-size: 2.9rem;">{{ __('Edit Species') }}</h1>
            <hr class="border border-green-600 my-4">
        </hr>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('species.update', $species) }}" method="post" enctype="multipart/form-data">


                    @method('put')
                    @csrf

                    <h1 style="margin-left: 3px;">Title:</h1>

                    <x-text-input type="text" name="title" field="title" placeholder="Title" class="w-full"
                        :value="@old('title', $species->title)">
                    </x-text-input>
                    @error('title')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 style="margin-left: 3px;">Description:</h1>
                    <x-textarea name="description" rows="10" field="description" placeholder="Description..."
                        class="w-full mt-6" :value="@old('description', $species->description)">
                    </x-textarea>

                    @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 style="margin-left: 3px;">Origin:</h1>
                    <x-text-input type="text" name="origin" field="origin" placeholder="origin" class="w-full"
                        :value="@old('origin', $species->origin)">
                    </x-text-input>

                    @error('origin')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                    <h1 style="margin-left: 3px;">Habitat:</h1>
                    <x-text-input type="text" name="habitat" field="habitat" placeholder="habitat" class="w-full"
                        :value="@old('habitat', $species->habitat)">
                    </x-text-input>

                    @error('habitat')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 style="margin-left: 3px;">Lat:</h1>
                    <x-text-input type="text" name="lat" field="lat" placeholder="lat" class="w-full"
                        :value="@old('lat', $species->lat)">
                    </x-text-input>


                    @error('lat')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                    <h1 style="margin-left: 3px;">Lng:</h1>
                    <x-text-input type="text" name="lng" field="lng" placeholder="lng" class="w-full"
                        :value="@old('lng', $species->lng)">
                    </x-text-input>


                    @error('lng')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror



                    <h1 style="margin-left: 3px;">Sighting Year:</h1>
                    <x-text-input type="text" name="sighting_year" field="sighting_year" placeholder="sighting_year"
                        class="w-full" :value="@old('sighting_year', $species->sighting_year)">
                    </x-text-input>

                    @error('sighting_year')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                    <h1 style="margin-left: 3px;">Risk Level:</h1>
                    <x-text-input type="text" name="risk_level" field="risk_level" placeholder="risk_level"
                        class="w-full" :value="@old('risk_level', $species->risk_level)">
                    </x-text-input>

                    @error('risk_level')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror

                    <h1 style="margin-left: 3px;">Image:</h1>
                    @if ($species->species_image)
                        <img src="{{ asset($species->species_image) }}" alt="Current Species Image" class="w-64 mt-4">
                    @endif
                    <x-file-input type="file" name="species_image" placeholder="species" class="w-full mt-6"
                        field="species_image">
                    </x-file-input>




                    {{-- <div class="mt-6">
                    <x-select-company name="company_id" :companies="$companies" :selected="old('company_id')"/>
                </div> --}}


                    <x-primary-button class="mt-6">Save Species</x-primary-button>

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
