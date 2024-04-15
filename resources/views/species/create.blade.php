<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Species') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <h1 class="font-bold text-center text-black py-2" style="font-size: 1.9rem;">{{ __('Create Species') }}</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('species.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Title:') }}</h1>
                    <x-text-input type="text" name="title" field="title" placeholder="Title.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('title')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Description:') }}</h1>
                    <x-textarea name="description" rows="10" field="description" placeholder="Description.."
                        style="margin-bottom: 20px;" class="w-full mt-2" :value="@old('description')">
                    </x-textarea>

                    <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Origin:') }}</h1>
                    <x-text-input type="text" name="origin" field="origin" placeholder="Origin.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('origin')"></x-text-input>

                        <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Habitat:') }}</h1>
                    <x-text-input type="text" name="habitat" field="habitat" placeholder="Habitat.."
                        style="margin-bottom: 20px;" class="w-full" autocomplete="off" :value="@old('habitat')"></x-text-input>

                        <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Sighting Year:') }}</h1>
                    <x-text-input type="number" name="sighting_year" field="sighting_year"
                        placeholder="Sighting Year.." style="margin-bottom: 20px;" class="w-65" autocomplete="off"
                        :value="@old('sighting_year')"></x-text-input>
                        <h1 class="font-bold text-black p-2" style="font-size: 1rem;">{{ __('Risk Level:') }}</h1>

                    <x-text-input type="number" name="risk_level" field="risk_level" placeholder="Risk Level.."
                        style="margin-bottom: 20px;" class="w-65" autocomplete="off" :value="@old('risk_level')"></x-text-input>

                    {{-- <x-text-input type="text" name="lng" field="lng" placeholder="lng.." class="w-full"
                    autocomplete="off" :value="@old('lng')"></x-text-input> --}}

                    <x-file-input type="file" name="species_image" placeholder="Species" style="margin-bottom: 20px;"
                        class="w-full mt-6" field="species_image" :value="@old('species_image')">>
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
