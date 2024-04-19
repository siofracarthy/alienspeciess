<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Guides') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}

            {{-- <x-primary-button><a href="{{ route('guides.create') }}" class="btn-link btn-lg mb-2">Add a
                    Guide</a></x-primary-button> --}}

                @forelse ($guides as $guide)
                <div class="my-20 p-20 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg text-black">
                    @if ($guide->guide_image)
                    <img src="{{ asset($guide->guide_image) }}" alt="{{ $guide->title }}" width="100">
                @else
                    No Image
                @endif
                    <b class="font-bold text-2xl my-2">
                        <a href="{{ route('guides.show', $guide) }}"class="py-2" style="font-size: 2.2rem;"> {{ $guide->title }} </a>
                    </b>
                    <p class="py-3">{{ $guide->description }}</p>


                </div>
            @empty
                <p>No Species</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

