<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Species') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('species.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input type="text" name="title" field="title" placeholder="Title.." class="w-full"
                        autocomplete="off" :value="@old('title')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea name="description" rows="10" field="description" placeholder="Description.."
                        style="margin-bottom: 10px;" class="w-full mt-2" :value="@old('description')">
                    </x-textarea>

                    <x-text-input type="text" name="origin" field="origin" placeholder="Origin.." class="w-full"
                    autocomplete="off" :value="@old('origin')"></x-text-input>

                    <x-text-input type="text" name="habitat" field="habitat" placeholder="Habitat.." class="w-full"
                    autocomplete="off" :value="@old('habitat')"></x-text-input>

                    <x-text-input type="text" name="sighting_year" field="sighting_year" placeholder="Sighting Year.." class="w-full"
                    autocomplete="off" :value="@old('sighting_year')"></x-text-input>

                    <x-text-input type="text" name="risk_level" field="risk_level" placeholder="Risk Level.." class="w-full"
                    autocomplete="off" :value="@old('risk_level')"></x-text-input>

                    {{-- <x-text-input type="text" name="lng" field="lng" placeholder="lng.." class="w-full"
                    autocomplete="off" :value="@old('lng')"></x-text-input> --}}

                    <x-file-input type="file" name="species_image" placeholder="Species" class="w-full mt-6"
                        field="species_image" :value="@old('species_image')">>
                    </x-file-input>

                    {{-- <div class="mt-6">
                        <x-select-company name="company_id" :companies="$companies" :selected="old('company_id')" />
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="producers"> <strong> Producers </strong> <br> </label>
                        @foreach ($producers as $producer)
                            <input type="checkbox", value="{{ $producer->id }}" name="producers[]">
                            {{ $producer->first_name }}
                        @endforeach
                    </div> --}}

                    <x-primary-button class="mt-6">Save Film</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
